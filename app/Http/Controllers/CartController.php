<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Cart;
use \App\Order;
use \App\Product;

use Session;

use Stripe\Stripe;
use Stripe\Charge;

class CartController extends Controller
{

	public function addToShoppingCart($id)
	{
		if (Session::has('cart')) {
			$cart = Session::get('cart');
		}else{
			$cart = new Cart();
		}

		$cart->addToShoppingCart($id);

		Session::put('cart' , $cart);

		return redirect()->back();
	}

	public function shoppingCart()
	{
		if (Session::has('cart')) {

			$cart = Session::get('cart');

			return view('shop.cart' , ['products' => $cart->products , 'totalPrice' => $cart->totalPrice , 'EstimatedShipping' => 6.94 ]);
		}

		return view('shop.cart');
	}

	public function checkout()
	{
		if (Session::has('cart')) {

			$cart = Session::get('cart');
			$countries = array(
				'Egypt' , 'Grenada','Guadeloupe','Guam','Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Heard and Mc Donald Islands','Holy See (Vatican City State)','Honduras','Hong Kong' ,'Hungary','Japan','Philippines','Pitcairn','Poland','Portugal','Qatar','Saudi Arabia','Sierra Leone',' , Singapore',' , Slovakia (Slovak Republic)',' , Slovenia',' , Solomon Islands',' , Somalia',' , South Africa',' , South Georgia and the South Sandwich Islands',' , Spain',' , Sri Lanka',' , St. Helena',' , St. Pierre and Miquelon',' , Sudan',' , Suriname',' , Svalbard and Jan Mayen Islands',' , Swaziland',' , Sweden',' , Switzerland',' , Syrian Arab Republic',' , Taiwan, Province of China',' , Tajikistan',' , Tanzania, United Republic of',' , Thailand',' , Togo',' , Tokelau',' , Tonga',' , Trinidad and Tobago',' , Tunisia',' , Turkey',' , Turkmenistan',' , Turks and Caicos Islands',' , Tuvalu',' , Uganda',' , Ukraine','United Arab Emirates','United Kingdom','United States','United States Minor Outlying Islands','Uruguay','Uzbekistan','Vanuatu','Venezuela','Vietnam','Virgin Islands (British)','Virgin Islands (U.S.)','Wallis and Futuna Islands','Western Sahara' , 'Yugoslavia','Zambia','Zimbabwe'
			);

			return view('shop.checkout' , ['total' => $cart->totalPrice , 'countries' => $countries]);
		}

		return view('shop.cart');
	}

	public function checkoutValidate()
	{
		$cart = Session::get('cart');
		try {

			Stripe::setApiKey('sk_test_FemB8hDUGWfH24aiCc1ZjABt');
			$charge = Charge::create([
				'amount' => $cart->totalPrice * 100,
				'currency'=>'usd',
				'source' => request('token'),
				'description' => 'Purshaced Some Of Product',
			]);

			$order = new Order();

			$order->user_id = auth()->user()->id;
			$order->payment_id = $charge->id;
			$order->cart = serialize( $cart );
			$order->name = request('name');
			$order->address = request('address');

			$order->save();

			Session::forget('cart');

			return redirect()->route('products.index')->with('success' , 'Purshaced Product Successfully');

		} catch (Exception $e) {
			return redirect()->route('cart.checkout')->with('error' , $e->getMessage());
		}
		
	}

	public function updateProduct($id)
	{
		if (Session::has('cart')) {
			$cart = Session::get('cart');
			$cart->updateProduct($id);

			if ( count($cart->products) > 0 ) {
				Session::put('cart' , $cart);	
			}else{
				Session::forget('cart');
			}
			
		}

		return redirect()->route('cart.show');
	}

	public function removeProduct($id)
	{
		if (Session::has('cart')) {
			$cart = Session::get('cart');
			$cart->removeProduct($id);

			if ( count($cart->products) > 0 ) {
				Session::put('cart' , $cart);	
			}else{
				Session::forget('cart');
			}
			
		}

		return redirect()->route('cart.show');
	}
}
