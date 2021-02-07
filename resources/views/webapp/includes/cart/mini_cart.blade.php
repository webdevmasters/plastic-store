<div class="minicart-section">
    <a href="#" id="cart-icon">
        <span class="image"><i class="icon ion-md-cart" id="cart-image"></i></span>
        <h5><i class="fa fa-angle-down"></i>{{Cart::getTotal().' RSD'}}</h5>
        @if(Cart::getContent()->count()==1)
            <p>{{Cart::getContent()->count().' '.__('messages.item')}}</p>
        @else
            <p>{{Cart::getContent()->count().' '.__('messages.items')}}</p>
        @endif
    </a>

    <!-- cart floating box -->
    <div class="cart-floating-box hidden" id="cart-floating-box">
        {{--                        da li je null?--}}
        <div class="cart-items">
            @foreach(Cart::getContent() as $item)
                <div class="cart-float-single-item d-flex">
                                    <span class="remove-item" id="remove-item">
                                        @if(!Route::is('create.checkout'))
                                        <a onclick='deleteFromMiniCart("{{$item->id}}",{{Route::is('show.cart')}});'>
                                        <i class="icon ion-md-close"></i>
                                        </a>
                                        @endif
                                    </span>
                    <div class="cart-float-single-item-image">
                        <a href="{{route('single.product.by.id',$item->associatedModel)}}">
                            @foreach($item->associatedModel->images as $image)
                                <img alt="" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                                @if($loop->index==0)@break @endif
                            @endforeach
                        </a>
                    </div>
                    <div class="cart-float-single-item-desc">
                        <p class="product-title"><a href="{{route("single.product.by.id",$item->associatedModel)}}">{{$item->associatedModel->name}}</a></p>
                        <p class="quantity">{{__('messages.quantity').': '.$item->quantity}}</p>
                        <p class="quantity">{{__('messages.color').': '.$item->attributes->color_name}}</p>
                        <p class="price">{{$item->price.' RSD'}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart-calculation">
            @if(Cart::getContent()->count()>0)
                <div class="calculation-details">
                    <p class="total">{{__('messages.total')}}<span>{{Cart::getTotal().' RSD'}}</span></p>
                </div>
                <div class="floating-cart-btn text-center">
                    <a class="fl-btn pull-left" href="{{route('show.cart')}}">{{__('messages.cart')}}</a>
                    <a class="fl-btn pull-right" href="{{route('create.checkout')}}" >{{__('messages.place.order')}}</a>
                </div>
            @else
                <div class="calculation-details">
                    <p class="total">{{__('messages.empty.cart')}}</p>
                </div>
            @endif
        </div>

    </div>
    <!-- end of cart floating box -->
</div>

