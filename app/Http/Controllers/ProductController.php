<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function getProductsBuSubcategory($subcategory_id){
       $slider_products=Product::whereSubCategoryId($subcategory_id)->get();
       return view('webapp.partials.product_slider')->with('slider_products',$slider_products)->render();
   }
}
