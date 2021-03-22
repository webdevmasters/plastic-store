<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller {

    public function index() {
        return view('admin.product.index')->with('categories', Category::all())->with('products', Product::with('category','prices','sizes','images')->get());
    }

    public function create() {
        return view('admin.product.create')->with('categories', Category::all())->with('colors', Color::all());
    }

    public function findSubcategoriesByCategory($category_id) {
        return response()->json(Subcategory::where('category_id', $category_id)->get());
    }

    public function store(StoreProductRequest $request) {
        $validated = $request->validated();
        $product = new Product();
        $product->code = $validated['code'];
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->manufacturer = $validated['manufacturer'];
        $product->category_id = $validated['category'];
        $product->subcategory_id = $validated['subcategory'];
        $product->sale = $request->has('sale');
        $product->available = $request->has('available');
        $product->save();

        foreach($validated['images'] as $file) {
            $image = new Image();
            $image->name = $file->getClientOriginalName();
            $image->path = 'images/' . Category::find($validated['category'])->name . '/' . Subcategory::find($validated['subcategory'])->name;
            $file->storeAs('public/' . $image->path, $image->name);
            $image->product()->associate($product)->save();
        }

        foreach($validated['prices'] as $index => $value) {
            $price = Price::updateOrCreate(['value' => $value]);
            if($request->has('discounted_prices'))
                $product->prices()->attach($price, ['discounted_price' => $validated['discounted_prices'][$index]]);
            else $product->prices()->attach($price);
        }

        foreach($validated['sizes'] as $index => $value) {
            $size = Size::updateOrCreate(['value' => $value]);
            $product->sizes()->attach([$size->id]);
        }

        $product->colors()->attach($validated['colors']);

        return back()->with('message', 'Uspešno ste sačuvali proizvod');
    }

    public function edit(Product $product) {
        return view('admin.product.edit')->with('categories', Category::all())->with('colors', Color::all())->with('product', $product);
    }

    public function update(StoreProductRequest $request, Product $product) {
        $validated = $request->validated();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->manufacturer = $validated['manufacturer'];
        $product->category_id = $validated['category'];
        $product->subcategory_id = $validated['subcategory'];
        $product->sale = $request->has('sale');
        $product->available = $request->has('available');
        $product->save();

        if($request->has('images')) {
            try {
                self::deleteImageFiles($product->id);
                Image::whereProductId($product->id)->delete();
            } catch(\Exception $e) {
            }
            foreach($validated['images'] as $file) {
                $image = new Image();
                $image->name = $file->getClientOriginalName();
                $image->path = 'images/' . Category::find($validated['category'])->name . '/' . Subcategory::find($validated['subcategory'])->name;
                $file->storeAs('public/' . $image->path, $image->name);
                $image->product()->associate($product)->save();
            }
        }

        $price_ids = array();
        $size_ids = array();
        $color_ids = array();

        foreach($validated['prices'] as $index => $value) {
            $price = Price::updateOrCreate(['value' => $value]);
            array_push($price_ids, $price->id);
            if($request->has('discounted_prices')) {
                $product->prices()->updateExistingPivot($price->id, ['discounted_price' => $validated['discounted_prices'][$index]], true);
            } else {
                $product->prices()->updateExistingPivot($price->id, ['discounted_price' => 0], true);
            }
        }

        foreach($validated['sizes'] as $index => $value) {
            $size = Size::updateOrCreate(['value' => $value]);
            array_push($size_ids, $size->id);
        }
        $product->sizes()->detach($size_ids);
        $product->prices()->detach($price_ids);
        $product->prices()->sync($price_ids);
        $product->sizes()->sync($size_ids);
        $product->colors()->sync($validated['colors']);

        return back()->with('message', 'Uspešno ste izmenili proizvod ' . $product->name);
    }

    public function deleteImageFiles($product_id) {
        $imgsToDelete = Image::whereProductId($product_id)->get();

        foreach($imgsToDelete as $img) {
            Storage::delete('public/' . $img->path . '/' . $img->name);
        }
    }

    public function destroy(Product $product) {
        self::deleteImageFiles($product->id);
        Product::destroy($product->id);

        return back()->with('message', 'Uspešno ste obrisali proizvod ' . $product->name);
    }

    public function loadProductsByCategory($id) {
        return response()->json(Product::whereCategoryId($id)->with('prices','sizes','images')->orderBy('name')->get());
    }
}
