<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class SignupController extends Controller
{
    public function index(){
        if(session('login')) {
            return redirect()->route('index'); 
            
                   }
        return view('signup');
    }
    public function signup(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $md5 = md5($password);
    
        $validator = Validator::make($request->all(), [
            'username' => 'required|regex:/^[a-zA-Z0-9]{6,20}$/',
            'password' => 'required|regex:/^[a-zA-Z0-9]{6,20}$/',
        ]);
    
        if ($validator->fails()) {
                return redirect()->route('signup')->with('failed','2');
          
        }
    
        $userExists = User::where('username', '=', $username)
            ->orWhere('password', '=', $md5)
            ->exists();
    
        if (!$userExists) {
            User::insert([
                'username' => $username,
                'password' => $md5
            ]);
    
                return redirect()->route('login');
        } else {
                return redirect()->route('signup')->with('warning','username or password is already exist');
            
        }
    }
}
