<?php


namespace App\Repositories\interfaces;


use App\Http\Requests\ReviewRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

interface ProductInterface {

    public function renderSliderBySubcategory($subcategory_id);

    public function loadProductsBySubcategory($subcategory_id);

    public function addReview(ReviewRequest $request);

    public function showProductModal($id);

    public function showSingleProduct(Product $product);

    public function searchProduct(Request $request);

    public function searchAutocomplete(Request $request);

    public function renderSearchedProductList($data);

    public function renderProductList($data);

    public function minTotalPrice($products);

    public function maxTotalPrice($products);

    public function showProductsByCategory(Category $category);

    public function showProductsBySubcategory(Subcategory $subcategory);
}
