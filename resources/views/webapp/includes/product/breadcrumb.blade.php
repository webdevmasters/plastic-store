<div class="breadcrumb-area pt-15 pb-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  breadcrumb container  =======-->
                <div class="breadcrumb-container">
                    <nav>
                        <ul>
                            <li class="parent-page"><a href="{{url('/')}}">{{__('messages.home')}}</a></li>
                            <li id="breadcrumb_category" class="{{isset($selected_subcategory)?'parent-page':''}}" value="{{$selected_category->id}}">
                                <a href="{{route('products.by.category',$selected_category)}}">{{$selected_category->name}}</a>
                            </li>
                            @if(isset($selected_subcategory))
                                <li id="breadcrumb_subcategory" value="{{$selected_subcategory->id}}">
                                    <a href="{{route('products.by.subcategory',$selected_subcategory)}}"> {{$selected_subcategory->name}}</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!--=======  End of breadcrumb container  =======-->
            </div>
        </div>
    </div>
</div>
