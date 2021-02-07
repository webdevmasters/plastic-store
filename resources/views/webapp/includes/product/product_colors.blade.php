<div class="single-sidebar mb-30" id="product_colors">
    <h3 class="sidebar-title color-title" >{{__('messages.colors.big')}}</h3>
    <div class="color-category">
        <ul id="selected_colors">
            @foreach($colorsByProducts as $color)
                <li><a value="{{$color->code}}">{{$color->name}}</a> <span class="counter">{{count($color->products)}}</span></li>
            @endforeach
        </ul>
    </div>
</div>
