<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Product;

class ProductApiController extends Controller
{
   public function index()
   { 
       return new ProductResource(Product::all());
   }

   public function store(StoreProductRequest $request)
   {  
       $product = Product::create($request->all());

       return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
   } 

   public function show(Product $product)
   {
       return new ProductResource($product);
   }

   public function update(UpdateProductRequest $request, Product $product)
   {
       $product->update($request->all());

       eturn (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
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

       return response(null, Response::HTTP_NO_CONTENT);
   }
}
