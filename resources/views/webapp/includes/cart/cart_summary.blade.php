<div class="cart-summary">
    <div class="cart-summary-wrap">
        <h4 th:text="#{shopping}">Kupovina</h4>
        <p th:text="#{total}">Ukupno <span>{{Cart::getTotal().' RSD'}}</span></p>
        <p th:text="#{shipping.fee}">Poštarina <span>{{Cart::getTotal()>5000?'Besplatna isporuka':'/'}}</span></p>
        <h2 th:text="#{total.price}">Ukupan iznos za uplatu <span>{{Cart::getTotal().' RSD'}}</span>
        </h2>
    </div>
    <div class="cart-summary-button">
        <a href="{{route('create.checkout')}}">
            <button class="checkout-btn" th:text="#{place.order}">Završi kupovinu</button>
        </a>
    </div>
</div>
