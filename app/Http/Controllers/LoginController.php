<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        if(session('login')) {
            return redirect()->route('index'); 
            
                   }
        return view('login');
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $md5 = md5($password);
    
        if (!empty($username) && !empty($password)) {
            $id_user = User::where('username', $username)
                ->where('password', $md5)
                ->value('id_user');
    
            if ($id_user) {
                $request->session()->put('login', $id_user);
            }
        }
    
        $id = Cookie::get('id');
        $quantity =Cookie::get('quantity') ;
        $price =  Cookie::get('price');
    
        if ( $request->session()->has('login') && !$id) {
            return redirect()->route('index')->with('success',$username );
        }
    
        if ( $request->session()->has('login') && $id) {
            $session = session('login');

            $total = $price * $quantity;
            $cart = Cart::where('id_user', $session)
                ->where('id_pro', $id)
                ->first();
                if (!$cart) {
                    Cart::insert([
                        'id_user' => $session,
                        'id_pro' => $id,
                        'quantity' => $quantity,
                        'total' => $total,
                        'created_at' => null,
                        'updated_at' => null
            
                    ]);
                }
        
                Cart::where('id_user',$session )
                ->where('id_pro',  $id)->update([
                    'quantity' => $quantity,
                    'total' => $total,
                    'updated_at' => null
        
                ]);
               
    
                return redirect()->route('cart');
            }
            if ( !$request->session()->has('login')) {
                return redirect()->route('login')->with('failed','2');
            }
        }
    

        public function logout()
        {
            Cookie::queue(Cookie::forget('id'));
            Cookie::queue(Cookie::forget('price'));
            Cookie::queue(Cookie::forget('quantity'));
            session()->flush();
            return redirect()->route('index');
        }
}
