<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller {

    public function index() {
        return view('admin.product.index')->with('categories', Category::all())->with('products', Product::all());
    }

    public function create() {
        return view('admin.product.create')->with('categories', Category::all())->with('colors', Color::all());
    }

    public function findSubcategoriesByCategory($category_id) {
        return response()->json(SubCategory::where('category_id', $category_id)->get());
    }

    public function store(StoreProductRequest $request) {
        $validated = $request->validated();
        $product = new Product();
        $product->code = $validated['code'];
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->manufacturer = $validated['manufacturer'];
        $product->category_id = $validated['category'];
        $product->sub_category_id = $validated['subcategory'];
        $product->sale = $request->has('sale');
        $product->available = $request->has('available');
        $product->save();

        foreach($validated['images'] as $file) {
            $image = new Image();
            $image->name = $file->getClientOriginalName();
            $image->path = 'images/' . Category::find($validated['category'])->name . '/' . SubCategory::find($validated['subcategory'])->name;
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

    public function show($id) {
        //
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
        $product->sub_category_id = $validated['subcategory'];
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
                $image->path = 'images/' . Category::find($validated['category'])->name . '/' . SubCategory::find($validated['subcategory'])->name;
                $file->storeAs('public/' . $image->path, $image->name);
                $image->product()->associate($product)->save();
            }
        }

        $product->prices()->delete();
        foreach($validated['prices'] as $index => $value) {
            $price = Price::updateOrCreate(['value' => $value]);
            if($request->has('discounted_prices'))
                $product->prices()->attach($price, ['discounted_price' => $validated['discounted_prices'][$index]]);
            else {
                $product->prices()->attach($price);
            }
        }
        $product->sizes()->delete();
        foreach($validated['sizes'] as $index => $value) {
            $size = Size::updateOrCreate(['value' => $value]);
            $product->sizes()->attach($size);
        }

        $product->colors()->sync($validated['colors']);

        return back()->with('message', 'Uspešno ste izmenili proizvod ' . $product->name);
    }

    public function destroy(Product $product) {
        self::deleteImageFiles($product->id);
        Product::destroy($product->id);

        return back()->with('message', 'Uspešno ste obrisali proizvod ' . $product->name);
    }

    public function deleteImageFiles($product_id) {
        $imgsToDelete = Image::whereProductId($product_id)->get();

        foreach($imgsToDelete as $img) {
            Storage::delete('public/' . $img->path . '/' . $img->name);
        }
    }
}
