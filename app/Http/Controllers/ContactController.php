<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }
    public function addmessage(Request $request)
{
    Validator::extend('valid_email', function ($attribute, $value, $parameters, $validator) {
        $email_parts = explode('@', $value);
        if (count($email_parts) !== 2) {
            return false; // must contain exactly one "@" symbol
        }
        $domain_parts = explode('.', $email_parts[1]);
        if (count($domain_parts) < 2) {
            return false; // must contain at least one dot in the domain name
        }
        return true;
    });
    $messages = [
        'valid_email' => 'The email must be a valid email address.',
    ];
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'number' => ['required', 'digits:11', 'regex:/^0\d{10}$/'],
        'email' => [
            'required',
            'email',
            'valid_email',],
        'message' => 'required|string',
    ],$messages);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()]);
    }

    Message::insert([
        'name' => $request->input('name'),
        'number' => $request->input('number'),
        'email' => $request->input('email'),
        'message' => strip_tags($request->input('message')),
        'view' => 0,
    ]);

    return response()->json(['success' => true]);
}
}
