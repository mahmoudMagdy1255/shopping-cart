<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
	public function signin()
	{
		return view('user.signin');
	}

	public function signinValidate()
	{
		$data =  request()->validate([
			'email' => 'required|email',
			'password' => 'required|min:4|max:15',
		]);

		if ( auth()->attempt(['email' => $data['email'] , 'password' => $data['password']]) ) {
			return redirect()->route('products.index');
		}

		return redirect()->back();
	}

	public function signup()
	{
		return view('user.signup');
	}

	public function signupValidate()
	{
		$data = request()->validate([
			'name' => 'required|string|min:3|max:15',
			'email' => 'required|email|unique:users,email',
			'password' => 'required_with:confirmed_password|min:4|max:15|same:confirmed_password',
			'confirmed_password' => 'min:4|max:15',
		]);

		$data['password'] = bcrypt( $data['password'] );

		$user = User::create($data);

		Auth::login($user);

		return redirect()->route('products.index');
	}

	public function profile()
	{

		$orders = auth()->user()->orders;

		$orders->transform(function ($order){
			$order->cart = unserialize($order->cart);

			return $order;
		});

		return view('user.profile' , compact('orders'));
	}

	public function logout()
	{
		Auth::logout();

		dd('666666666');

		return redirect()->route('products.index');
	}
}
