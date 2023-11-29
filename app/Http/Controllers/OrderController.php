<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
public function index(){
    $orders = Order::Where('user_id', session('login'))->orderBy('id','desc')->get();
    if(count($orders)==0){
        $num = 'No Orders Yet';
        return view('orders' ,['num'=>$num]);
    }
        return view('orders',['orders'=>$orders]);
   
    
}
}
