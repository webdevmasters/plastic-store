<div class="wishlist-section">
    <a id="wishlist-icon" href="{{route('show.wishlist')}}">
        <span class="image"><i class="icon ion-md-heart"></i></span>
        <h5><i class="fa fa-angle-down"></i></h5>
        @if(Wishlist::getContent()->count()>0)
            <p class="wishlist-counter">{{Wishlist::getContent()->count()}}</p>
        @endif
    </a>
</div>
