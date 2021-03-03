<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Repositories\interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public $productRepository;

    public function __construct(ProductInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function renderSliderBySubcategory($subcategory_id) {
        return $this->productRepository->renderSliderBySubcategory($subcategory_id);
    }

    public function loadProductsBySubcategory($subcategory_id) {
        return $this->productRepository->loadProductsBySubcategory($subcategory_id);
    }

    public function addReview(ReviewRequest $request) {
        return $this->productRepository->addReview($request);
    }

    public function showProductModal($id) {
        return $this->productRepository->showProductModal($id);
    }

    public function showSingleProduct(Product $product) {
        return $this->productRepository->showSingleProduct($product);
    }

    public function searchProduct(Request $request) {
        return $this->productRepository->searchProduct($request);
    }

    public function searchAutocomplete(Request $request) {
        return $this->productRepository->searchAutocomplete($request);
    }

    public function renderSearchedProductList($data) {
        return $this->productRepository->renderSearchedProductList($data);
    }

    public function renderProductList($data) {
        return $this->productRepository->renderProductList($data);
    }

    public function minTotalPrice($products) {
        return $this->productRepository->minTotalPrice($products);
    }

    public function maxTotalPrice($products) {
        return $this->productRepository->maxTotalPrice($products);
    }

    public function showProductsByCategory(Category $category) {
        return $this->productRepository->showProductsByCategory($category);
    }

    public function showProductsBySubcategory(Subcategory $subcategory) {
        return $this->productRepository->showProductsBySubcategory($subcategory);
    }
}
