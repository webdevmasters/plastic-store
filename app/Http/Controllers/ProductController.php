<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Price;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function renderSliderBySubcategory($subcategory_id) {
        return view('webapp.partials.product_slider')->with('slider_products', self::loadProductsBySubcategory($subcategory_id))->render();
    }

    public function searchProduct(Request $request) {
        $products = Product::where('name', 'LIKE', '%' . $request->input('search') . '%')->orderBy('name')->paginate(20);

        return view('webapp.product.product_search')
            ->with('products', $products)
            ->with('search', $request->input('search'))
            ->with('pagination', json_decode(json_encode($products), true));
    }

    public function renderSearchedProductList($data) {
        $params = json_decode($data);

        $products_eloquent = Product::where('name', 'LIKE', '%' . $params->search . '%');
        switch($params->sort) {
            case 'name-asc':
                $products_eloquent->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $products_eloquent->orderBy('name', 'desc');
                break;
            case 'min-price':
                $products_eloquent->orderBy(Price::select('value')
                    ->join('product_price', 'product_price.price_id', '=', 'prices.id')
                    ->whereColumn('product_price.product_id', '=', 'products.id')
                    ->oldest('prices.value')
                    ->take(1), 'asc');
                break;
            case 'max-price':
                $products_eloquent->orderBy(Price::select('value')
                    ->join('product_price', 'product_price.price_id', '=', 'prices.id')
                    ->whereColumn('product_price.product_id', '=', 'products.id')
                    ->latest('prices.value')
                    ->take(1), 'desc');
                break;
        }

        $paginated_products = $products_eloquent->paginate($params->size);

        $product_list_view = view('webapp.product.includes.product_list')->with('products', $paginated_products)->render();
        $pagination = view('webapp.product.includes.pagination')->with('products', $paginated_products)->render();
        $header = view('webapp.product.includes.product_header')->with('pagination', json_decode(json_encode($paginated_products), true))->render();

        return response()->json(['products_list' => $product_list_view,
                                 'pagination'    => $pagination,
                                 'header'        => $header,
                                 'search'        => $params->search]);
    }

    public function renderProductList($data) {
        $params = json_decode($data);
        $products_eloquent = null;
        if(isset($params->subcategory_id)) {
            $products_eloquent = Product::whereSubcategoryId($params->subcategory_id);
        } else {
            $products_eloquent = Product::whereCategoryId($params->category_id);
        }
        $min_price = 0;
        $max_price = 0;
        $colorsByProducts = Color::whereHas('products', function($query) use ($products_eloquent) {
            $query->whereIn('product_id', $products_eloquent->get()->pluck('id'));
        })->with('products', function($query) use ($products_eloquent) {
            $query->whereIn('product_id', $products_eloquent->get()->pluck('id'));
        })->get();

        if(!$params->category_changed) {
            $colorsByProductsChanged = null;
            if($params->price_changed) {
                $products_eloquent->whereHas('prices', function($query) use ($params) {
                    $query->whereBetween('value', [$params->min_price, $params->max_price]);
                });
                $min_price = $params->min_price;
                $max_price = $params->max_price;

                $colorsByProductsChanged = Color::whereHas('products', function($query) use ($products_eloquent) {
                    $query->whereIn('product_id', $products_eloquent->get()->pluck('id'));
                })->with('products', function($query) use ($products_eloquent) {
                    $query->whereIn('product_id', $products_eloquent->get()->pluck('id'));
                })->get();
                $colorsByProducts = $colorsByProductsChanged;
            }
            if($params->color_changed) {
                $products_eloquent->whereHas('colors', function($query) use ($params) {
                    if(!empty($params->colors)) {
                        $query->whereIn('name', $params->colors);
                    }
                });
                if(!$params->price_changed) {
                    $min_price = $this->minTotalPrice($products_eloquent->get());
                    $max_price = $this->maxTotalPrice($products_eloquent->get());
                }
            }
        } else {
            $min_price = $this->minTotalPrice($products_eloquent->get());
            $max_price = $this->maxTotalPrice($products_eloquent->get());
        }
        switch($params->sort) {
            case 'name-asc':
                $products_eloquent->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $products_eloquent->orderBy('name', 'desc');
                break;
            case 'min-price':
                $products_eloquent->orderBy(Price::select('value')
                    ->join('product_price', 'product_price.price_id', '=', 'prices.id')
                    ->whereColumn('product_price.product_id', '=', 'products.id')
                    ->oldest('prices.value')
                    ->take(1), 'asc');
                break;
            case 'max-price':
                $products_eloquent->orderBy(Price::select('value')
                    ->join('product_price', 'product_price.price_id', '=', 'prices.id')
                    ->whereColumn('product_price.product_id', '=', 'products.id')
                    ->latest('prices.value')
                    ->take(1), 'desc');
                break;
        }
        $paginated_products = $products_eloquent->paginate($params->size);

        $product_list_view = view('webapp.product.includes.product_list')->with('products', $paginated_products)->render();
        $pagination = view('webapp.product.includes.pagination')->with('products', $paginated_products)->render();
        $colors = view('webapp.product.includes.product_colors')->with('colorsByProducts', $colorsByProducts)->render();
        $header = view('webapp.product.includes.product_header')->with('pagination', json_decode(json_encode($paginated_products), true))->render();

        return response()->json(['products_list' => $product_list_view,
                                 'pagination'    => $pagination,
                                 'header'        => $header,
                                 'min_price'     => $params->category_changed || $params->color_changed ? $min_price : $params->min_price,
                                 'max_price'     => $params->category_changed || $params->color_changed ? $max_price : $params->max_price,
                                 'colors'        => $colors]);
    }

    public function showProductsByCategory($category_id) {
        $products_eloquent = Product::whereCategoryId($category_id)->orderBy('name');
        $products = $products_eloquent->get();
        $paginated_products = $products_eloquent->paginate(20);

        $colorsByProducts = Color::whereHas('products', function($query) use ($products) {
            $query->whereIn('product_id', $products->pluck('id'));
        })->with('products', function($query) use ($products) {
            $query->whereIn('product_id', $products->pluck('id'));
        })->get();

        return view('webapp.product.product_list')
            ->with('products', $paginated_products)
            ->with('colorsByProducts', $colorsByProducts)
            ->with('selected_category', Category::where('id', $category_id)->first())
            ->with('min_price', $this->minTotalPrice($products))
            ->with('max_price', $this->maxTotalPrice($products))
            ->with('pagination', json_decode(json_encode($paginated_products), true));
    }

    public function showProductsBySubcategory($subcategory_id) {
        $products = Product::whereSubcategoryId($subcategory_id)->get();
        $paginated_products = Product::whereSubcategoryId($subcategory_id)->paginate(20);
        $colorsByProducts = Color::whereHas('products', function($query) use ($products) {
            $query->whereIn('product_id', $products->pluck('id'));
        })->with('products', function($query) use ($products) {
            $query->whereIn('product_id', $products->pluck('id'));
        })->get();

        return view('webapp.product.product_list')
            ->with('products', $paginated_products)
            ->with('colorsByProducts', $colorsByProducts)
            ->with('selected_subcategory', Subcategory::where('id', $subcategory_id)->first())
            ->with('selected_category', Subcategory::where('id', $subcategory_id)->first()->category)
            ->with('min_price', $this->minTotalPrice($products))
            ->with('max_price', $this->maxTotalPrice($products))
            ->with('pagination', json_decode(json_encode($paginated_products), true));
    }

    public function minTotalPrice($products) {
        $minPrices = array();
        foreach($products as $product) {
            array_push($minPrices, $product->minPrice());
        }

        return min($minPrices);
    }

    public function maxTotalPrice($products) {
        $maxPrices = array();
        foreach($products as $product) {
            array_push($maxPrices, $product->maxPrice());
        }

        return max($maxPrices);
    }

    public function loadProductsBySubcategory($subcategory_id) {
        return Product::whereSubcategoryId($subcategory_id)->get();
    }
}
