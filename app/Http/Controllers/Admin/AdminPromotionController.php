<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class AdminPromotionController extends Controller {

    public function index() {
        return view('admin.promotion.index')->with('categories', Category::all())
            ->with('promotions', Promotion::all());
    }

    public function create() {
        return view('admin.promotion.create')->with('categories', Category::all());
    }

    public function destroy($id) {
        Promotion::destroy($id);
        return back()->with('message','Uspešno ste izrisali promociju');
    }

    public function update($id,Request $request) {
        Promotion::where('id',$id)->update([
            'category_id' => $request->category,
            'product_id'  => $request->product
        ]);
        return back()->with('message','Uspešno ste ažurirali promociju za proizvod '.Product::findOrFail($request->product)->name);
    }

    public function edit($id) {
        return view('admin.promotion.edit')
            ->with('promotion',  Promotion::findOrFail($id))
            ->with('categories',  Category::all());
    }

    public function store(Request $request) {
        Promotion::create([
            'category_id' => $request->category,
            'product_id'  => $request->product
        ]);
        return back()->with('message','Uspešno ste uneli promociju za proizvod '.Product::findOrFail($request->product)->name);
    }
}
