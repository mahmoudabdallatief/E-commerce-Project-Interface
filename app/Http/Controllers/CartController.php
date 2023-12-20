<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

public function index()
{
    
    $session = session('login');
    $carts = Cart::with('product')
    ->where('id_user', $session)
    ->orderBy('id', 'desc')
    ->get();
   
    $num = count($carts);
    $time = date('m/d/Y H:i:s', time());
    $time_num= strtotime($time)+3600;

    foreach ($carts as $cart) {
        $quantity_cart = $cart->quantity;
        $id_product_cart = $cart->id_pro;
        $product = Product::where('id', $id_product_cart)->first();
        $date_product= $product->date;
        $offer_product= $product->offer;
        $price_product= $product->price;
        $date_product_num= strtotime($date_product);
        
        if($date_product_num > $time_num){
            $total = sprintf("%.2f",$offer_product*$quantity_cart);
            $cart->total = $total;
        }
        else{
            $total = sprintf("%.2f",$price_product*$quantity_cart );
            $cart->total = $total;
        }
        
        $cart->save();
        
    }
    $sum =  sprintf("%.2f", $carts->sum('total'));
    if ($num == 0) {
        $message = 'No Products Added To Cart';
        return view('cart', compact('message', 'sum'));
    } else {               
        return view('cart', compact('carts', 'sum'));
    }

}
public function updateacart(Request $request){

    $session =session("login");
      $id =$request->input("id");
      $quantity =$request->input("quantity");
      $price =$request->input("price");
      $total = $quantity * $price;
      DB::table('chart')->where("id",$id)->update([
        'quantity' => $quantity,
        'total' => $total,
      ]);
      $cart = Cart::find($id);
      $rowtotal = $cart->total;
      $sum = Cart::where("id_user",$session)->sum("total");
      $arr = ["total" =>$rowtotal, "sum" =>$sum];
      return response()->json($arr);

}
public function deletefromcart(Request $request){

    $session =session("login");
    $id = $request->input("delid");
    DB::table("chart")->where("id",$id)->delete();
    $count = Cart::where("id_user",$session)->count();
    $sum = Cart::where("id_user",$session)->sum("total");
    $arr =["count"=>$count, "sum" => $sum];
    return response()->json($arr);

}
public function deleteallfromcart(){
$id = session('login');
DB::table('chart')->where('id_user',$id)->delete();
return redirect()->route('cart');

}
public function checkout(Request $request)
{
    // Validate the form data
    $validator = Validator::make($request->all(), [
        'billing_name' => 'required',
        'billing_address' => 'required',
        'billing_city' => 'required',
        'billing_state' => 'required',
        'billing_zip' => 'required | integer',
        'shipping_name' => 'required',
        'shipping_address' => 'required',
        'shipping_city' => 'required',
        'shipping_state' => 'required',
        'shipping_zip' => 'required | integer',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $order = new Order();
$order->user_id = session('login');
$order->billing_name = $request->input('billing_name');
$order->billing_address = $request->input('billing_address');
$order->billing_city = $request->input('billing_city');
$order->billing_state = $request->input('billing_state');
$order->billing_zip = $request->input('billing_zip');
$order->shipping_name = $request->input('shipping_name');
$order->shipping_address = $request->input('shipping_address');
$order->shipping_city = $request->input('shipping_city');
$order->shipping_state = $request->input('shipping_state');
$order->shipping_zip = $request->input('shipping_zip');
$order->total = Cart::where("id_user",session('login'))->sum("total");
$order->save();


DB::table('chart')->where('id_user',session('login'))->delete();
    return response()->json(['redirect_url' => route('orders')]);
}
}
