<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SingleController extends Controller
{
    

public function single($id)
{
    $session = session('login');
    $product = Product::with(['category', 'brand'])
    ->where('id', '=', $id)
    ->firstOrFail();

    $related_products = Product::with(['category', 'brand'])
    ->where('cat', $product->cat)
    ->where('id', '<>', $id)
    ->orderBy('id')
    ->paginate(4);
    
    $comments = Comment::where('id_pro', $id)->orderBy('id', 'desc')->get();
    $num = count($comments);
    $rating_product_count = Rating::where("product_id",$id)->count();
    $rating_product_avg = Rating::where("product_id",$id)->avg('rating');
    $rating_user_avg = Rating::where("product_id",$id)->where("user_id",$session)->avg('rating');
    if($num==0){
        $message = 'There is No Comment For This Product';
        return view('single', [
            'product' => $product,
            'related_products' => $related_products,
            'message' => $message,
            'rating_product_count'=> $rating_product_count,
            'rating_product_avg' => $rating_product_avg,
            'rating_user_avg' => $rating_user_avg
        ]);
    }
    else{
        return view('single', [
            'product' => $product,
            'related_products' => $related_products,
            'comments' => $comments,
            'rating_product_count'=> $rating_product_count,
            'rating_product_avg' => $rating_product_avg,
            'rating_user_avg' => $rating_user_avg
        ]);
    }
        
    
}
public function addtocart(Request $request){
    $session = session('login');
    if($session){

        $product_id = $request->input('pro_id');
        $price = $request->input('price');
    
        $quantity = $request->input('quantity');
        $total = $price * $quantity;

        $cart = Cart::where('id_user', $session)
            ->where('id_pro', $product_id)
            ->first();

        if (!$cart) {
            Cart::insert([
                'id_user' => $session,
                'id_pro' => $product_id,
                'quantity' => $quantity,
                'total' => $total,
                'created_at' => null,
                'updated_at' => null
    
            ]);
        }

        Cart::where('id_user',$session )
        ->where('id_pro',  $product_id)->update([
            'quantity' => $quantity,
            'total' => $total,
            'updated_at' => null

        ]);
        return redirect()->route('cart');
    }
    else{
        Cookie::queue('price', $request->input('price'), 30);
        Cookie::queue('quantity', $request->input('quantity'), 30);
        Cookie::queue('id', $request->input('pro_id'), 30);
        return redirect()->route('login');
    }
}
public function addcomment(Request $request)
    {
        $id_user = session('login');
        $id_pro = $request->input('pro');
        $message = strip_tags($request->input('message'));
        if ($request->isMethod('post')) {
        if(mb_strlen($message, 'utf8') > 0){
            $user = User::find($id_user);
            $name = $user->username;
            Comment::insert([
                'id_user' => $id_user,
                'id_pro' => $id_pro,
                'name' => $name,
                'comment' => $message,
            ]);
        } else {
            return response()->json(['error' => 'Empty Input Data'], 422);
        }

        return response()->json(['success' => 'The comment has been added successfully']);
    }
}
public function updateComment(Request $request)
{
    $update = $request->input('update');
    $message = strip_tags($request->input('message'));

    if (mb_strlen($message, 'utf8') > 0) {
        DB::table('comment')
        ->where('id', $update)
        ->update(['comment' => $message]);

        $comment = Comment::find($update);

        $date = $comment->date;
        $commentText = $comment->comment;
        $arr = ['date' => $date, 'comment' => $commentText];

        return response()->json($arr);
    }

    return response()->json(2);
}
public function deleteComment(Request $request)
{
    $id = $request->input('delete');
    $idPro = $request->input('pro');

    DB::table('comment')
        ->where('id', $id)
        ->delete();

    $numComments = Comment::where('id_pro', $idPro)->count();
    $arr = ['num' => $numComments];

    return response()->json($arr);
}
public function update_rating(Request $request){
    $product_id = $request->input("pro_id");
    $user_id =session("login");
    $rating = $request->input("index");
    $ratings =Rating::where("user_id",$user_id)->where("product_id",$product_id)->count();
    if($ratings ==0){
Rating::insert([
    'user_id'=>$user_id,
    'product_id'=>$product_id,
    'rating'=>$rating,
]);
    }else{
DB::table('ratings')->where("user_id",$user_id)->where("product_id",$product_id)->update([
    'rating'=>$rating,
]);
    }

}
}
