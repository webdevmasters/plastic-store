<?php


namespace App\Repositories\repositories;


use App\Http\Requests\ReviewRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Price;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
use App\Repositories\interfaces\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductRepository implements ProductInterface {

    public function renderSliderBySubcategory($subcategory_id) {
        return view('webapp.includes.product_slider')
            ->with('products', self::loadProductsBySubcategory($subcategory_id))
            ->with('type', 'banner-slider')->render();
    }

    public function loadProductsBySubcategory($subcategory_id) {
        return Product::whereSubcategoryId($subcategory_id)->with('images', 'prices', 'sizes')->get();
    }

    public function addReview(ReviewRequest $request) {
        Review::create([
            'reviewer'   => $request->reviewer,
            'email'      => $request->email,
            'comment'    => $request->comment,
            'rating'     => $request->rating,
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return response()->json(['product_id' => $request->product_id]);
    }

    public function showProductModal($id) {
        return view('webapp.product.product_modal')->with('product', Product::findOrFail($id))->render();
    }

    public function showSingleProduct(Product $product) {
        $similar_products = Product::whereCategoryId($product->category_id)->with('images', 'sizes', 'prices')->inRandomOrder()->take(15)->get();
        $product = Product::whereId($product->id)->with('prices', 'reviews')->firstOrFail();
        $product_ratings = Review::where('product_id', '=', 3)->pluck('rating')->toArray();

        $ratings = ['1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0];

        foreach($product_ratings as $rating) {
            if($rating == 1) $ratings['1']++;
            if($rating == 2) $ratings['2']++;
            if($rating == 3) $ratings['3']++;
            if($rating == 4) $ratings['4']++;
            if($rating == 5) $ratings['5']++;
        }

        return view('webapp.product.single_product')
            ->with('single_product', $product)
            ->with('ratings', $ratings)
            ->with('similar_products', $similar_products);
    }

    public function searchProduct(Request $request) {
        $products = Product::where('name', 'LIKE', '%' . $request->input('search') . '%')->with('prices', 'sizes', 'images')->orderBy('name')->paginate(20);

        return view('webapp.product.product_search')
            ->with('products', $products)
            ->with('search', $request->input('search'))
            ->with('pagination', json_decode(json_encode($products), true));
    }

    public function searchAutocomplete(Request $request) {
        $data = Product::select("name")
            ->where("name", "LIKE", "%{$request->search}%")
            ->get();

        return response()->json($data);
    }

    public function renderSearchedProductList($data) {
        $params = json_decode($data);

        $products_eloquent = Product::where('name', 'LIKE', '%' . $params->search . '%')->with('prices', 'sizes', 'images');
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

        $product_list_view = view('webapp.includes.product.product_list')->with('products', $paginated_products)->render();
        $pagination = view('webapp.includes.product.pagination')->with('products', $paginated_products)->render();
        $header = view('webapp.includes.product.product_header')->with('pagination', json_decode(json_encode($paginated_products), true))->render();

        return response()->json(['products_list' => $product_list_view,
                                 'pagination'    => $pagination,
                                 'header'        => $header,
                                 'search'        => $params->search]);
    }

    public function renderProductList($data) {
        $params = json_decode($data);
        $products_eloquent = null;
        $category_name = Str::of(Category::findOrFail($params->category_id)->name)->slug('-');
        if(isset($params->subcategory_id)) {
            $products_eloquent = Product::whereSubcategoryId($params->subcategory_id)->with('prices', 'sizes', 'images');
        } else {
            $products_eloquent = Product::whereCategoryId($params->category_id)->with('prices', 'sizes', 'images');
        }
        $products = $products_eloquent->get();
        $min_price = 0;
        $max_price = 0;
        $colorsByProducts = Color::whereHas('products', function($query) use ($products) {
            $query->whereIn('product_id', $products->pluck('id'));
        })->with('products', function($query) use ($products) {
            $query->whereIn('product_id', $products->pluck('id'));
        })->get();

        if(!$params->category_changed) {
            $colorsByProductsChanged = null;
            if($params->price_changed) {
                $products_eloquent->whereHas('prices', function($query) use ($params) {
                    $query->whereBetween('value', [$params->min_price, $params->max_price]);
                });
                $min_price = $params->min_price;
                $max_price = $params->max_price;

                $colorsByProductsChanged = Color::whereHas('products', function($query) use ($products) {
                    $query->whereIn('product_id', $products->pluck('id'));
                })->with('products', function($query) use ($products) {
                    $query->whereIn('product_id', $products->pluck('id'));
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
                    $min_price = $this->minTotalPrice($products);
                    $max_price = $this->maxTotalPrice($products);
                }
            }
        } else {
            $min_price = $this->minTotalPrice($products);
            $max_price = $this->maxTotalPrice($products);
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

        $product_list_view = view('webapp.includes.product.product_list')->with('products', $paginated_products)->render();
        $pagination = view('webapp.includes.product.pagination')->with('products', $paginated_products)->render();
        $colors = view('webapp.includes.product.product_colors')->with('colorsByProducts', $colorsByProducts)->render();
        $header = view('webapp.includes.product.product_header')->with('pagination', json_decode(json_encode($paginated_products), true))->render();

        return response()->json(['products_list'     => $product_list_view,
                                 'pagination'        => $pagination,
                                 'selected_category' => (string) $category_name,
                                 'header'            => $header,
                                 'min_price'         => $params->category_changed || $params->color_changed ? $min_price : $params->min_price,
                                 'max_price'         => $params->category_changed || $params->color_changed ? $max_price : $params->max_price,
                                 'colors'            => $colors]);
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

    public function showProductsByCategory(Category $category) {
        $products = Product::whereCategoryId($category->id)->with('prices', 'sizes', 'images')->orderBy('name')->paginate(10);
        $colorsByProducts = Color::whereHas('products', function($query) use ($products) {
            $query->whereIn('product_id', collect($products->items())->pluck('id'));
        })->with('products', function($query) use ($products) {
            $query->whereIn('product_id', collect($products->items())->pluck('id'));
        })->get();

        return view('webapp.product.product_list')
            ->with('products', $products)
            ->with('colorsByProducts', $colorsByProducts)
            ->with('selected_category', Category::where('id', $category->id)->first())
            ->with('min_price', $this->minTotalPrice($products))
            ->with('max_price', $this->maxTotalPrice($products))
            ->with('pagination', json_decode(json_encode($products), true));
    }

    public function showProductsBySubcategory(Subcategory $subcategory) {
        $products = Product::whereSubcategoryId($subcategory->id)->with('prices', 'sizes', 'images')->orderBy('name')->paginate(10);
        $colorsByProducts = Color::whereHas('products', function($query) use ($products) {
            $query->whereIn('product_id', collect($products->items())->pluck('id'));
        })->with('products', function($query) use ($products) {
            $query->whereIn('product_id', collect($products->items())->pluck('id'));
        })->get();

        return view('webapp.product.product_list')
            ->with('products', $products)
            ->with('colorsByProducts', $colorsByProducts)
            ->with('selected_subcategory', $subcategory)
            ->with('selected_category', $subcategory->category)
            ->with('min_price', $this->minTotalPrice($products))
            ->with('max_price', $this->maxTotalPrice($products))
            ->with('pagination', json_decode(json_encode($products), true));
    }
}
