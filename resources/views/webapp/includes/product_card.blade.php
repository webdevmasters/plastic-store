<div class="fl-product {{$type}}">
    <div class="image {{$product->sale? 'sale-product':''}}">
        <a href="@{/product/single_product/__${product.id}__}">
            @foreach($product->images as $image)
                <img alt="" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                @if($loop->index==1)@break @endif
            @endforeach
        </a>
    </div>
    <div class="content">
        <h2 class="product-title"><a href="@{/product/single_product/__${product.id}__}">{{$product->name}}</a></h2>
        <div class="rating" id="grid-rating">
            <i class="fa fa-star" th:classappend="${product.getAverageRating()>=1}?'active'"></i>
            <i class="fa fa-star" th:classappend="${product.getAverageRating()>=2}?'active'"></i>
            <i class="fa fa-star" th:classappend="${product.getAverageRating()>=3}?'active'"></i>
            <i class="fa fa-star" th:classappend="${product.getAverageRating()>=4}?'active'"></i>
            <i class="fa fa-star" th:classappend="${product.getAverageRating()>=5}?'active'"></i>
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
        @if(isset($description))
            <p class="product-description">{{$product->description}}</p>
        @endif
        <div class="hover-icons">
            <ul>
                <li><a th:data-tooltip="#{add.to.cart}" th:href="@{/product/single_product/__${product.id}__}"><i class="icon ion-md-cart"></i></a></li>
                <li><a href="#" th:data-tooltip="#{add.to.wishlist}" th:onclick="|openWishListDialog(${product.id})|"> <i class="icon ion-md-heart-empty"></i></a></li>
                <li><a href="#" th:data-tooltip="#{details}" th:onclick="'javascript:openProductModal(\'' + ${product.id} + '\');'"><i class="icon ion-md-open"></i></a></li>
            </ul>
        </div>
    </div>
</div>
