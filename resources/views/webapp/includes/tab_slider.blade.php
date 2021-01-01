<div class="fl-slider tab-product-slider">
    <!--=======  single product  =======-->
    @foreach($products as $product)
        <div class="fl-product">
            <div class="image {{$product->sale?' sale-product':''}}">
                <a th:href="@{/product/single_product/__${popular_product.id}__}">
                    @foreach($product->images as $image)
                        <img alt="" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                        @if($loop->index==1)@break @endif
                    @endforeach
                </a>
            </div>
            <div class="content">
                <h2 class="product-title"><a href="@{/product/single_product/__${popular_product.id}__}">{{$product->name}}</a></h2>
                <div class="rating">
                    <i class="fa fa-star" th:classappend="${popular_product.getAverageRating()>=1}?'active'"></i>
                    <i class="fa fa-star" th:classappend="${popular_product.getAverageRating()>=2}?'active'"></i>
                    <i class="fa fa-star" th:classappend="${popular_product.getAverageRating()>=3}?'active'"></i>
                    <i class="fa fa-star" th:classappend="${popular_product.getAverageRating()>=4}?'active'"></i>
                    <i class="fa fa-star" th:classappend="${popular_product.getAverageRating()>=5}?'active'"></i>
                </div>
                <p class="product-price">
                    @if($product->sale)
                        @if(count($product->sizes)>1)
                            <span class="main-price discounted">{{$product->minPrice().' - '.$product->maxPrice().' RSD'}}</span><br>
                            <span class="discounted-price">{{$product->minDiscountedPrice().' - '.$product->maxDiscountedPrice().' RSD'}}</span>
                        @elseif(count($product->sizes)==1)
                            <span class="main-price discounted">{{$product->minPrice().' RSD'}}</span>
                            <span class="discounted-price">{{$product->minDiscountedPrice().' RSD'}}</span>
                        @endif
                    @else
                        @if(count($product->sizes)>1)
                            <span class="discounted-price">{{$product->minPrice().' - '.$product->maxPrice().' RSD'}}</span>
                        @elseif(count($product->sizes)==1)
                            <span class="discounted-price">{{$product->minPrice().' RSD'}}</span>
                        @endif
                    @endif
                </p>

                <div class="hover-icons">
                    <ul>
                        <li><a data-tooltip="Dodaj u korpu" th:href="@{/product/single_product/__${popular_product.id}__}"><i class="icon ion-md-cart"></i></a></li>
                        <li><a data-tooltip="Dodaj u listu želja" href="#" th:onclick="|openWishListDialog(${popular_product.id})|"> <i class="icon ion-md-heart-empty"></i></a></li>
                        <li><a data-tooltip="Detaljnije" href="#" th:onclick="'javascript:openProductModal(\'' + ${popular_product.id} + '\');'"><i class="icon ion-md-open"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach

</div>
