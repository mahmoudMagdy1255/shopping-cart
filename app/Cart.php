<?php

namespace App;

use \App\Product;

class Cart
{
	public $products = [] , $totalQty = 0 , $totalPrice = 0;

    public function addToShoppingCart($id)
	{
		$product = Product::find($id);

		$newProduct = ['product' => $product , 'qty' => 0  , 'price' => $product->price];

		if ( count ($this->products) > 0) {
			if ( array_key_exists($id, $this->products) ) {
				 $newProduct = $this->products[$id] ;
			}
		}

		$newProduct['qty']++;
		$newProduct['price'] = $newProduct['qty'] * $product->price;
		$this->products[$id] = $newProduct;
		$this->totalQty++;
		$this->totalPrice += $product->price;
	}

	public function updateProduct($id)
	{
		
		if (array_key_exists($id, $this->products)) {
			 
			if (request('qty') > 0) {
				$this->totalQty -= $this->products[$id]['qty'];
				$this->totalQty += request('qty');
				$this->products[$id]['qty'] = request('qty');
				$this->totalPrice -= $this->products[$id]['price'];
				$this->products[$id]['price'] = $this->products[$id]['product']->price * request('qty');
				$this->totalPrice += $this->products[$id]['price'];

			}else{
				unset($this->products[$id]);
			}
		}		
	}

	public function removeProduct($id)
	{
		
		if (array_key_exists($id, $this->products)) {
			
			unset($this->products[$id]);
		}		
	}
}
