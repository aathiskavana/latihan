<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Auth;
use Session;

class UserController extends Controller
{
    public function getSignup() {
    	return view('user.signup');
    }

    public function postSignup(Request $request) {
    	$this->validate($request, [
    		'username' => 'required',
    		'email'	=>	'required',
    		'password'	=>	'required',
    	]);

    	$users = new User([
    		'username'	=>	$request->input('username'),
    		'email'		=>	$request->input('email'),
    		'password'	=>	bcrypt($request->input('password')),
    	]);

    	$users->save();

        if (Session::has('oldUrl')) {
               $oldUrl = Session::get('oldUrl');
               Session::forget('oldUrl');
               return redirect()->to($oldUrl);
           }

    	return redirect()->route('user.signin')->with('pesan', 'Silahkan Masuk');
    }

    public function getSignin() {
    	return view('user.signin');
    }

    public function postSignin(Request $request) {
    	
    	$email = $request['email'];
    	$password = $request['password'];


    	if (Auth::attempt(['email' => $email,'password' => $password])) {
    	   if (Session::has('oldUrl')) {
               $oldUrl = Session::get('oldUrl');
               Session::forget('oldUrl');
               return redirect()->to($oldUrl);
           }
        	return redirect()->route('shop.index');
    	}
    	return redirect()->back()->with('pesan', 'Maaf Email/Password Anda Salah');
    }

    public function getProfile() {
        //mengambil data barang order 
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
    	return view('profile.index', ['orders' => $orders]);
    }

    public function getLogout() {
    	Auth::logout();
    	return redirect()->route('user.signin');
    }
}
