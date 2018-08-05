<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductController extends Controller
{
	public function index()
	{
		/*$apples = Product::whereSub_category('apples')->get()->count();
		$oranges = Product::whereSub_category('oranges')->get()->count();
		$tables = Product::whereSub_category('tables')->get()->count();
		$chairs = Product::whereSub_category('chairs')->get()->count();
		$tShirt = Product::whereSub_category('t-shirt')->get()->count();
		$cap = Product::whereSub_category('cap')->get()->count();
		$menshoes = Product::whereCategory('mens')->whereSub_category('shoes')->get()->count();

		$womensShoes = Product::whereCategory('womens')->whereSub_category('shoes')->get()->count();

		$hijab = Product::whereSub_category('hijab')->get()->count();
		$abaya = Product::whereSub_category('abaya')->get()->count();
		$story = Product::whereSub_category('story')->get()->count();
		$programming = Product::whereSub_category('programming')->get()->count();					
		$counts =  [$apples , $oranges , $tables, $chairs, $tShirt, $cap , $menshoes , $womensShoes , $hijab , $abaya  , $story, $programming];*/

		$book = Product::whereCategory('Books')->first();
		$furnitures = Product::whereCategory('furnitures')->first();
		$fruit = Product::whereCategory('fruits')->first();

		$products = [$book , $furnitures , $fruit];
		
		return view('shop.index' , compact('products'));
	}

	public function getProduct($sub , $main = null)
	{
		if (! is_null($main) ) {
			$products = Product::whereSub_category($sub)->whereCategory($main)->get();	
		}else{
			$products = Product::whereSub_category($sub)->get();	
		}

		return view( 'shop.index-of-sub-category' , compact('products') );
	}

}
