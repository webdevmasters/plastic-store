<div class="fl-slider {{isset($type)?$type:'tab-product-slider'}}">
    <!--=======  single product  =======-->
    @foreach($products as $product)
        <div class="fl-product">
            <div class="image {{$product->sale?' sale-product':''}}">
                <a href="{{route('single.product.by.id',$product)}}">
                    @foreach($product->images as $image)
                        @if(count($product->images)==1)
                            <img alt="" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                            <img alt="" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                        @else
                            <img alt="" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                        @endif
                        @if($loop->index==1)@break @endif
                    @endforeach
                </a>
            </div>
            <div class="content">
                <h2 class="product-title"><a href="{{route('single.product.by.id',$product->id)}}">{{$product->name}}</a></h2>
                <div class="rating">
                    <i class="fa fa-star {{$product->avgRating()>=1?'active':''}}"></i>
                    <i class="fa fa-star {{$product->avgRating()>=2?'active':''}}"></i>
                    <i class="fa fa-star {{$product->avgRating()>=3?'active':''}}"></i>
                    <i class="fa fa-star {{$product->avgRating()>=4?'active':''}}"></i>
                    <i class="fa fa-star {{$product->avgRating()>=5?'active':''}}"></i>
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
                        <li><a data-tooltip="{{__('messages.add.to.cart')}}" href="{{route('single.product.by.id',$product)}}"><i class="icon ion-md-cart"></i></a></li>
                        <li><a href="#" data-tooltip="{{__('messages.add.to.wishlist')}}" onclick=openWishListDialog("{{$product->id}}")> <i class="icon ion-md-heart-empty"></i></a></li>
                        <li><a href="#" data-tooltip="{{__('messages.details')}}" onclick="openProductModal({{$product->id}})"><i class="icon ion-md-open"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach

</div>
