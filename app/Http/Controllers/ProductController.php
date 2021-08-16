<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $products = Product::all(); 
       return view('product.index', compact('products'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $productCategories = ProductCategory::all()->pluck('name', 'id');
       return view('product.create', compact('productCategories'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreProductRequest $request)
   {  
       Product::create($request->all());

       return redirect()->route('product.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show(Product $product)
   {
       return view('product.show', compact('product'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(Product $product)
   { 
       $productCategories = ProductCategory::all()->pluck('name', 'id');
       return view('product.edit', compact('product', 'productCategories'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateProductRequest $request, Product $product)
   {
       $product->update($request->all());

       return redirect()->route('product.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Product $product)
   {
       $product->delete();

       return back();
   }
}
