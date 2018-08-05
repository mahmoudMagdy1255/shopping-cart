<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$product = new Product();

    	$product->title = 'Harry Potter';
    	$product->description = 'This is the serios 7 of harry potter';
    	$product->image = '';
    	$product->category = 'book';
    	$product->price = 12;

    	$product->save();

        $product = new Product();
    	$product->title = 'Intro To PHP';
    	$product->description = 'This is the version 7 of PHP learn you hot to programming with PHP';
    	$product->image = '';
    	$product->category = 'book';
    	$product->price = 50;

    	$product->save();
        
        $product = new Product();
    	$product->title = 'Nike';
    	$product->description = 'This is shoes Made In China';
    	$product->image = '';
    	$product->category = 'shoes';
    	$product->price = 100;

    	$product->save();
        
        $product = new Product();
    	$product->title = 'Addidas';
    	$product->description = 'This is Shoes From Addidas Company';
    	$product->image = '';
    	$product->category = 'shoes';
    	$product->price = 150;

    	$product->save();

        $product = new Product();
    	$product->title = 'Orange';
    	$product->description = 'This is Orange Was Grown In Sudan';
    	$product->image = '';
    	$product->category = 'fruit';
    	$product->price = 5;

    	$product->save();
    
        $product = new Product();
    	$product->title = 'Apple';
    	$product->description = 'This is Apple Was Grown In Egypt';
    	$product->image = '';
    	$product->category = 'fruit';
    	$product->price = 5;

    	$product->save();
        
        $product = new Product();
    	$product->title = 'Tables';
    	$product->description = 'This is Tables Made In Egypt';
    	$product->image = '';
    	$product->category = 'furnitures';
    	$product->price = 12;

    	$product->save();
        
        $product = new Product();
    	$product->title = 'Chairs';
    	$product->description = 'This is Chairs Made In Jaban';
    	$product->image = '';
    	$product->category = 'furnitures';
    	$product->price = 10;

    	$product->save();
        
        $product = new Product();
    	$product->title = 'Wood';
    	$product->description = 'This is Wood Made In Egypt';
    	$product->image = '';
    	$product->category = 'furnitures';
    	$product->price = 1000;

    	$product->save();
    }
}
