<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use PayMob\Facades\PayMob;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::where('user_id', session('login'))->orderBy('id', 'desc')->get();
    
    if ($orders->isEmpty()) {
        $num = 'No Orders Yet';
        return view('orders', ['num' => $num]);
    }
    
    foreach ($orders as $order) {
        $totals = []; // Move the initialization of $totals here, outside the inner foreach loop

        $details = OrderDetails::where('id', $order->order_details_id)->first();

        $ids = explode(',', $details->product_id);
        $counts = explode(',', $details->count); // Retrieve counts

        foreach ($ids as $index => $id) {
            $product = Product::find($id);
            if ($product) {
                // Check date and multiply by offer or price accordingly
                $date = strtotime($product->date);
                $currentDate = strtotime(date('Y-m-d'));
                $price = $date > $currentDate ? $product->offer : $product->price;

                // Multiply price by count to get the total for this product
                $totalForProduct = $price * $counts[$index];
                $totals[] = $totalForProduct; // Add the total for this product to the totals array
            }
        }

        // Update the total field of OrderDetails
        $details->update([
            'total' => implode(',', $totals)
        ]);

        // Update the total field of Order
        $order->total = array_sum($totals);
        $order->save(); // Use save() instead of update()
    }
    // Reload the orders after updating the details
    $orders = Order::where('user_id', session('login'))->orderBy('id', 'desc')->get();

    return view('orders', ['orders' => $orders]);
}
    
public function paymob(Request $request){

    if(isset($request->id)){
        $order_data = Order::findOrFail($request->id);
    }
    else{
        $order_data = Order::where('user_id',session('login'))->orderBy('id','desc')->first();
    }
    

    $user = User::find(session('login'));

    $amountCents = intval($order_data->total * 100);

    $auth = PayMob::AuthenticationRequest();

        $order = PayMob::OrderRegistrationAPI([
            'auth_token' => $auth->token,
            'amount_cents' => $amountCents, //put your price
            'currency' => 'EGP',
            'delivery_needed' => false, // another option true
            'merchant_order_id' => time().'_'.session('login'), //put order id from your database must be unique id
            'items' => [] // all items information or leave it empty
        ]);

        $PaymentKey = PayMob::PaymentKeyRequest([
            'auth_token' => $auth->token,
            'amount_cents' => $amountCents, //put your price
            'currency' => 'EGP',
            'order_id' => $order->id,
            "billing_data" => [ // put your client information
                "apartment" => "803",
"email" => 'hodamedocrv@gmail.com',
"floor" => "42",
"first_name" => $user->username,
"street" => "Ethan Land",
"building" => "8028",
"phone_number" => '01280506474',
"shipping_method" => "PKG",
"postal_code" => 222,
"city" => $order_data->shipping_city,
"country" => $order_data->shipping_address,
"last_name" => $user->username,
"state" => $order_data->shipping_state
            ]
        ]);

        return view('paymob')->with(['token' => $PaymentKey->token]);
}
    
public function status(){
    $data =request()->query();
    if($data['success'] == 'true'){
        Order::where('user_id',session('login'))->orderBy('id','desc')->first()->update([
            'status'=>'Paid'
        ]);
       
        return redirect()->route('orders')->with('success','Your Payment of Order has been paid successfully');
    }
    else{ 
       
     return  redirect()->route('orders')->with('failed','Your Payment of Order has been failed');
    }
}
    
}
