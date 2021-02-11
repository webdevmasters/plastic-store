@extends('webapp.layouts.main')
@section('title','Korpa')
@section('content')
    <div class="breadcrumb-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb container  =======-->

                    <div class="breadcrumb-container">
                        <nav>
                            <ul>
                                <li class="parent-page"><a href="{{url('/')}}">{{__('messages.home')}}</a></li>
                                <li>{{__('messages.content.cart')}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>
    @if(Cart::getContent()->count()>0)
        <div class="page-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="cart-table table-responsive mb-40">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pro-thumbnail">{{__('messages.picture')}}</th>
                                        <th class="pro-title">{{__('messages.product')}}</th>
                                        <th class="pro-color">{{__('messages.color')}}</th>
                                        <th class="pro-size">{{__('messages.size')}}</th>
                                        <th class="pro-price" >{{__('messages.price')}}</th>
                                        <th class="pro-quantity" >{{__('messages.quantity')}}</th>
                                        <th class="pro-subtotal">{{__('messages.total')}}</th>
                                        <th class="pro-remove">{{__('messages.remove')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::getContent() as $item)
                                        <tr>
                                            <td class="pro-thumbnail">
                                                <a href="{{route('single.product.by.id',$item->associatedModel)}}">
                                                    @foreach($item->associatedModel->images as $image)
                                                        <img alt="" style="width: 64px; height: 64px;" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                                                        @if($loop->index==0)@break @endif
                                                    @endforeach
                                                </a>
                                            </td>
                                            <td class="pro-title"><a href="{{route('single.product.by.id',$item->associatedModel)}}">{{$item->associatedModel->name}}</a></td>
                                            <td class="pro-color"><span class="color-block" style="background-color:{{$item->attributes->color_code}};" title="{{$item->attributes->color_name}}"></span></td>
                                            <td class="pro-size"><span>{{$item->attributes->size}}</span></td>
                                            <td class="pro-price" id="{{$item->associatedModel->id.'-'.$item->attributes->size.'-'.$item->price.'-'.$item->attributes->color_code}}"><span>{{$item->price. 'RSD'}}</span></td>
                                            <td class="pro-quantity">
                                                <div id="{{$item->id}}" class="pro-qty {{$item->associatedModel->id.'-'.$item->attributes->size.'-'.$item->price.'-'.$item->attributes->color_code}}">
                                                    <input id="input_value" onkeypress="onEnter(this,event);" value="{{$item->quantity}}" type="text">
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span id="{{$item->associatedModel->id.'-'.$item->attributes->size.'-'.$item->price.'-'.$item->attributes->color_code}}">{{$item->price*$item->quantity.' RSD'}}</span></td>
                                            <td class="pro-remove"><a href="{{route('delete.cart.item',$item->id)}}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--=======  End of cart table  =======-->
                        </form>

                        <div class="row">

                            <div class="col-lg-6 col-12"></div>

                            <div class="col-lg-6 col-12 d-flex">
                                <!--=======  Cart summery  =======-->
                            @include('webapp.includes.cart.cart_summary')
                            <!--=======  End of Cart summery  =======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center">
                                <img class="img-fluid" height="300" style="background: transparent" src="{{asset('static/images/shop/empty-cart.png')}}" width="300">
                                <h3><strong>{{__('messages.empty.cart')}}</strong></h3>
                                <h4>{{__('messages.add.content')}}</h4>
                                <div class="newsletter-form mb-20 mt-30"><a href="{{url('/')}}">{{__('messages.continue.shopping')}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.inc').on('click', function () {
                updateSubTotal($(this));
                var id = $(this).parent().attr('id');
                var quantity = $(this).parent().children(":first").val();
                updateMiniCart(id, quantity);
            });
            $('.dec').on('click', function () {
                updateSubTotal($(this));
                var id = $(this).parent().attr('id');
                var quantity = $(this).parent().children(":first").val();
                updateMiniCart(id, quantity);
            });
        });

        function updateMiniCart(id, quantity) {
            $.ajax({
                url: '/cart/update_mini_cart/' + id + '/' + quantity,
                type: 'get',
                success: function (response) {
                    $(".minicart-section").replaceWith(response['mini_cart']);
                    $(".cart-summary").replaceWith(response['cart_summary']);
                    $("#cart-icon").on("click", function (event) {
                        event.stopPropagation();
                        $("#cart-floating-box").slideToggle();
                        $("#accountList").slideUp("slow");
                        $("#languageList").slideUp("slow");
                    });

                    $("body:not(#cart-icon)").on("click", function () {
                        $("#cart-floating-box").slideUp("slow");
                    });
                }
            });
        }

        function updateSubTotal(inc) {
            var id = inc.parent().attr('class').split(' ')[1];
            var price = id.split('-')[2];
            var quantity = inc.parent().children(":first").val();
            var subtotal = price * quantity;
            inc.parent().parent().next().children(":first").text(subtotal + ' RSD');
        }

        function updateSubTotalOnEnter(input) {
            var id = input.parent().attr('class').split(' ')[1];
            var price = id.split('-')[2];
            var quantity = input.parent().children(":first").val();
            var subtotal = price * quantity;
            input.parent().parent().next().children(":first").text(subtotal + ' RSD');
        }

        function onEnter(input_value, event) {
            if (event.which === 13) {
                if ($(input_value).parent().children(":first").val() > 0) {
                    updateSubTotalOnEnter($(input_value));
                    var id = $(input_value).parent().attr('id');
                    var quantity = $(input_value).parent().children(":first").val();
                    updateMiniCart(id, quantity);
                    return false;
                }
            }
        }
    </script>
@endpush
