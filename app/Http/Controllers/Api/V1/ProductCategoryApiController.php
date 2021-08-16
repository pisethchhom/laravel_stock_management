<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Symfony\Component\HttpFoundation\Response;

use App\Models\ProductCategory;

class ProductCategoryApiController extends Controller
{
   public function index()
   {  
       return new ProductCategoryResource(ProductCategory::all());
   }

   public function store(StoreProductCategoryRequest $request)
   {  
       $productCategory = ProductCategory::create($request->all());

       return (new ProductCategoryResource($productCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
   } 

   public function show(ProductCategory $productCategory)
   {
       return new ProductCategoryResource($productCategory);
   }

   public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
   {
       $productCategory->update($request->all());

       eturn (new ProductCategoryResource($productCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(ProductCategory $productCategory)
   {
       $productCategory->delete();

       return response(null, Response::HTTP_NO_CONTENT);
   }
}
