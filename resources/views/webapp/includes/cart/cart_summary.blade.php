<div class="cart-summary">
    <div class="cart-summary-wrap">
        <h4>{{__('messages.shopping')}}</h4>
        <p>{{__('messages.total')}} <span>{{Cart::getTotal().' RSD'}}</span></p>
        <p>{{__('messages.shipping.fee')}} <span>{{Cart::getTotal()>5000?'Besplatna isporuka':'/'}}</span></p>
        <h2>{{__('messages.total.price')}} <span>{{Cart::getTotal().' RSD'}}</span>
        </h2>
    </div>
    <div class="cart-summary-button">
        <a href="{{route('create.checkout')}}">
            <button class="checkout-btn">{{__('messages.place.order')}}</button>
        </a>
    </div>
</div>
