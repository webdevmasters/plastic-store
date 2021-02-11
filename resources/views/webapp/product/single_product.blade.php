@extends('webapp.layouts.main')
@section('title',$single_product->name)
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
                                <li class="parent-page"><a href="{{route('products.by.category',$single_product->category->name)}}">{{$single_product->category->name}}</a></li>
                                <li>{{$single_product->name}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->

    <!--=============================================
    =            single product content         =
    =============================================-->

    <div class="single-product-content-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-xs-12 mb-xxs-25 mb-xs-25 mb-sm-25">
                    <!-- single product tabstyle one image gallery -->
                    <div class="product-image-slider fl-product-image-slider fl3-product-image-slider">
                        <!--product large image start -->
                        <div class="tab-content product-large-image-list fl-product-large-image-list fl3-product-large-image-list" id="myTabContent">
                            @foreach($single_product->images as $image)
                                <div role="tabpanel" aria-labelledby="{{'single-slide-tab-'.$loop->index}}" class="{{$loop->index==1? 'tab-pane fade show active':'tab-pane fade'}}" id="{{'single-slide-'.$loop->index}}">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img alt="" class="img-fluid" id="imgtodrag"
                                             src="{{asset($image->getOriginalName())}}">
                                        <a class="big-image-popup" href="{{asset($image->getOriginalName())}}"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                            @endforeach
                        </div>
                        <!--product large image End-->

                        <!--product small image slider Start-->
                        <div class="product-small-image-list fl-product-small-image-list fl3-product-small-image-list">
                            <div class="nav image-slider fl3-image-slider" role="tablist">
                                @foreach($single_product->images as $image)
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" href="{{'#single-slide-'.$loop->index}}" id="{{'single-slide-tab-'.$loop->index}}">
                                            <img alt="" class="img-fluid" src="{{asset($image->getOriginalName())}}"></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--product small image slider End-->
                    </div>
                    <!-- end of single product tabstyle one image gallery -->
                </div>
                <div class="col-lg-7 col-md-6 col-xs-12">
                    <!-- product view description -->
                    <div class="product-feature-details">
                        <h2 class="product-title mb-15">{{$single_product->name}}</h2>

                        <div class="rating d-inline-block mb-15" id="single-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        @if(count($single_product->reviews)>0)
                            <p class="d-inline-block ml-10 review-link">
                                @if(count($single_product->reviews)>1)
                                    <a>{{count($single_product->reviews).' '.__('messages.reviews')}}</a>
                                @else
                                    <a>{{count($single_product->reviews).' '.__('messages.review')}}</a>
                                @endif
                            </p>
                        @endif
                        <div class="availability mb-0">
                            <span class="title">{{__('messages.availability').':'}}</span>
                            @if($single_product->available)
                                <h3 class="product-available mb-15">{{'('.__('messages.in.stock').')'}}</h3>
                            @else
                                <h3 class="product-not-available mb-15">{{'('.__('messages.out.of.stock').')'}}</h3>
                            @endif
                        </div>

                        <div class="price mb-0">
                            <span class="title">{{__('messages.price').':'}}</span>
                            <h2 class="product-price mb-0">
                                <span class="main-price {{$single_product->sale?'discounted':''}}">{{$single_product->prices()->first()->value.' DIN'}}</span>
                                @if($single_product->sale)
                                    <span class="discounted-price">{{$single_product->prices()->first()->pivot->discounted_price.' DIN'}}</span>
                                    <span class="discount-percentage">{{$single_product->savings()}}</span>
                                @endif
                            </h2>
                        </div>

                        <br>
                        <div class="manufacturer mb-0">
                            <span class="title">{{__('messages.manufacturer').':'}}</span>
                            <p class="product-manufacturer mb-20">{{$single_product->manufacturer}}</p>
                        </div>

                        <p class="product-description mb-20">{{$single_product->description}}</p>

                        <div class="size mb-20">
                            <span class="title">{{__('messages.size').':'}}</span> <br>
                            <select class="nice-select" id="chooseSize" name="chooseSize">
                                @foreach($single_product->sizes as $size)
                                    <option value="{{$single_product->prices()->pluck('value')->all()[$loop->index].'-'.$single_product->prices()->pluck('discounted_price')->all()[$loop->index]}}">{{$size->value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="color mb-20">
                            <span class="title">{{__('messages.color').':'}}</span> <br>
                            @foreach($single_product->colors as $color)
                                <a value="{{$color->code}}">
                                    <span class="color-block {{$loop->first?'active':''}}" style="{{'background-color:'.$color->code.';'}}" title="{{$color->name}}"></span>
                                </a>
                            @endforeach
                        </div>

                        <div class="cart-buttons mb-20">
                            <span class="quantity-title mr-10">{{__('messages.quantity').':'}}</span>
                            <div class="pro-qty mb-20">
                                <input id="quantity" type="text" value="1">
                            </div>
                            <div class="add-to-cart-btn ml-10 d-inline-block">
                                @if($single_product->available)
                                    <a class="fl-btn" href="#" onclick="addToCart()"><i class="fa fa-shopping-cart"></i>{{'  '.__('messages.add.to.cart')}}</a>
                                @else
                                    <a class="fl-btn" href="#" onclick="shakeProduct()"><i class="fa fa-shopping-cart"></i>{{'  '.__('messages.add.to.cart')}}</a>
                                @endif
                            </div>
                        </div>

                        <p class="wishlist-link mb-20 pb-15">
                            <a href="{{route('show.wishlist')}}"> <i class="icon ion-md-heart-empty"></i>{{__('messages.search.wishlist')}}</a>
                        </p>

                        <div class="category-list-container mb-20">
                            <span>{{__('messages.categories')}}</span>
                            <ul>
                                @foreach($single_product->category->subcategories as $subcategory)
                                    <li><a href="{{route('products.by.subcategory',$subcategory->id)}}">{{$subcategory->name}}</a>,</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- end of product quick view description -->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of single product content  ======-->

    <!--=======  product description review   =======-->

    <div class="product-description-review-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product description review container  =======-->

                    <div class="tab-slider-wrapper product-description-review-container">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a aria-selected="true" class="nav-item nav-link active" data-toggle="tab" href="#product-description" id="description-tab" role="tab">{{__('messages.description')}}</a>
                                <a aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#review" id="review-tab" role="tab">{{__('messages.view')}}</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div aria-labelledby="description-tab" class="tab-pane fade show active"
                                 id="product-description" role="tabpanel">
                                <!--=======  product description  =======-->

                                <div class="product-description">
                                    @empty($single_product->description)
                                        <p>{{__('messages.description.empty')}}</p>
                                    @else
                                        <p>{{$single_product->description.'.'}}</p>
                                    @endempty
                                </div>

                                <!--=======  End of product description  =======-->
                            </div>
                            <div aria-labelledby="review-tab" class="tab-pane fade" id="review" role="tabpanel">
                                <!--=======  review content  =======-->
                                <div class="product-ratting-wrap">
                                    @if(count($single_product->reviews)>0)
                                        <div class="pro-avg-ratting">
                                            <h4>{{round($single_product->avgRating(),1)}}<span>{{'('.__('messages.average').')'}}</span></h4>
                                            <span>{{__('messages.based.on').count($single_product->reviews).' '.__('messages.comments')}}</span>
                                        </div>
                                        <div class="ratting-list">
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>{{$ratings[5]}}</span>
                                            </div>
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>{{$ratings[4]}}</span>
                                            </div>
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>{{$ratings[3]}}</span>
                                            </div>
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>{{$ratings[2]}}</span>
                                            </div>
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>{{$ratings[1]}}</span>
                                            </div>
                                        </div>
                                        <div class="rattings-wrapper">
                                            @foreach($single_product->reviews as $review)
                                                <div class="sin-rattings">
                                                    <div class="ratting-author">
                                                        <h3>{{$review->reviewer}}</h3>
                                                        @switch($review->rating)
                                                            @case(1)
                                                            <div class="ratting-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>{{$review->rating}}</span>
                                                            </div>
                                                            @break
                                                            @case(2)
                                                            <div class="ratting-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>{{$review->rating}}</span>
                                                            </div>
                                                            @break
                                                            @case(3)
                                                            <div class="ratting-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>{{$review->rating}}</span>
                                                            </div>
                                                            @break
                                                            @case(4)
                                                            <div class="ratting-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>{{$review->rating}}</span>
                                                            </div>
                                                            @break
                                                            @case(5)
                                                            <div class="ratting-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <span>{{$review->rating}}</span>
                                                            </div>
                                                            @break
                                                        @endswitch
                                                    </div>
                                                    <p>{{$review->comment}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div>
                                            <p style="font-size: 20px; font-weight: bold; text-align: center; margin-bottom: 50px; margin-top: 30px;">{{__('messages.review.empty')}}</p>
                                        </div>
                                    @endif
                                    <div class="rated_success" hidden>
                                        <p style="font-size: 20px; font-weight: bold; text-align: center; margin-bottom: 50px; margin-top: 30px;">Hvala što ste ocenili ovaj proizvod!</p>
                                    </div>
                                    <div class="ratting-form-wrapper fix">
                                        <h3>{{__('messages.rate.product')}}</h3>
                                        <form id="comment_form">
                                            <div class="ratting-form row">
                                                <div class="col-12 mb-15">
                                                    <h5>{{__('messages.price').':'}}</h5>
                                                    <!-- Rating Stars Box -->
                                                    <div class='rating-stars'>
                                                        <ul id='stars'>
                                                            <li class='star' data-value='1' title='Poor'><i class='fa fa-star fa-fw'></i></li>
                                                            <li class='star' data-value='2' title='Fair'><i class='fa fa-star fa-fw'></i></li>
                                                            <li class='star' data-value='3' title='Good'><i class='fa fa-star fa-fw'></i></li>
                                                            <li class='star' data-value='4' title='Excellent'><i class='fa fa-star fa-fw'></i></li>
                                                            <li class='star' data-value='5' title='WOW!!!'><i class='fa fa-star fa-fw'></i></li>
                                                        </ul>
                                                        <input id="rating" name="rating" type="text" hidden>
                                                        <div id="rating_error" class="invalid-feedback d-block"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="reviewer">{{__('messages.first.name')}}:</label>
                                                    <input id="reviewer" name="reviewer" placeholder="{{__('messages.first.name')}}" value="{{isset(Auth::User()->name)?Auth::User()->name:''}}" type="text">
                                                    <div id="reviewer_error" class="invalid-feedback d-block"></div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="email">{{__('messages.email')}}:</label>
                                                    <input id="email" name="email" placeholder="{{__('messages.email.address')}}" value="{{isset(Auth::User()->email)?Auth::User()->email:''}}" type="text">
                                                    <div id="email_error" class="invalid-feedback d-block"></div>
                                                </div>
                                                <div class="col-12 mb-15">
                                                    <label for="comment">{{__('messages.comment')}}:</label>
                                                    <textarea id="comment" name="comment" placeholder="{{__('messages.comment')}}"></textarea>
                                                    <div id="comment_error" class="invalid-feedback d-block"></div>
                                                </div>
                                                <div class="col-12">
                                                    <input type="submit" value="{{__('messages.add.comment')}}">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of product description review   =======-->

    <!--=============================================
    =            related product slider         =
    =============================================-->

    <div class="related-product-slider-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title">
                        <h2>{{__('messages.similar.products')}}</h2>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @include('webapp.includes.product_slider',['products'=>$similar_products])
                </div>
            </div>
        </div>
    </div>

    @include('webapp.includes.search_overlay')
    @include('webapp.includes.scroll-top')
    @push('scripts')
        <script type="text/javascript">

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {

                $('.modal').on('shown.bs.modal', function (e) {
                    $('.small-image-slider').resize();
                    addProductSlider();
                });
                var savings =@json($single_product->savings());
                var available = @json($single_product->available);
                var avg_rating = @json($single_product->avgRating());

                $('.fl-btn').on('click', function () {
                    if (available) {
                        var cart = $('.minicart-section').children(":first").children(":first");
                        var imgtodrag = $('.single-product-img').children(":first");
                        if (imgtodrag) {
                            var imgclone = imgtodrag.clone()
                                .offset({
                                    top: imgtodrag.offset().top,
                                    left: imgtodrag.offset().left
                                })
                                .css({
                                    'opacity': '0.5',
                                    'position': 'absolute',
                                    'height': '150px',
                                    'width': '150px',
                                    'z-index': '100'
                                })
                                .appendTo($('body'))
                                .animate({
                                    'top': cart.offset().top + 10,
                                    'left': cart.offset().left + 10,
                                    'width': 75,
                                    'height': 75
                                }, 1000, 'easeInOutExpo');

                            setTimeout(function () {
                                cart.effect("bounce", {
                                    times: 2
                                }, 200);
                            }, 1500);

                            imgclone.animate({
                                'width': 0,
                                'height': 0
                            }, function () {
                                $(this).detach()
                            });
                        }
                    }
                });

                $('.discount-percentage').text('Ušteda ' + Math.round(parseInt(savings)) + ' %');

                $('#chooseSize').on('change', function () {
                    var value = this.value.split("-");
                    var price = value[0];
                    var discounted_price = value[1];
                    if (discounted_price > 0) {
                        var discount_percentage = (price - discounted_price) * 100 / price;
                        $('.main-price').addClass('discounted');
                        $('.main-price').text(price + ' DIN');
                        $('.discounted-price').text(discounted_price + ' DIN');
                        $('.discount-percentage').text('Ušteda ' + Math.round(discount_percentage) + ' %');
                    } else {
                        $('.main-price').text(price + ' DIN');
                    }
                });

                $('.color span.color-block').on('click', function (e) {
                    $('.color span.color-block').removeClass('active');
                    $(this).addClass('active');
                });

                $('#comment_form').on('submit', function (e) {
                    e.preventDefault();
                    var rating = $('#stars li.selected').length;
                    $('#rating').attr('value', rating);
                    addReview();
                });

                $('#single-rating').children('i').each(function (index, e) {
                    if (avg_rating === 0)
                        return false;
                    $(this).addClass('active');
                    if (index + 1 === avg_rating)
                        return false;
                });

                //prikaz i akcija na zvezdice
                $('#stars li').on('mouseover', function () {
                    var onStar = parseInt($(this).data('value'), 10);

                    $(this).parent().children('li.star').each(function (e) {
                        if (e < onStar) {
                            $(this).addClass('hover');
                        } else {
                            $(this).removeClass('hover');
                        }
                    });

                }).on('mouseout', function () {
                    $(this).parent().children('li.star').each(function (e) {
                        $(this).removeClass('hover');
                    });
                });

                $('#stars li').on('click', function () {
                    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                    var stars = $(this).parent().children('li.star');

                    for (i = 0; i < stars.length; i++) {
                        $(stars[i]).removeClass('selected');
                    }

                    for (i = 0; i < onStar; i++) {
                        $(stars[i]).addClass('selected');
                    }
                });
            });

            function openWishListDialog(product_id) {
                var id={'product_id':product_id};
                $.ajax({
                    url: "{{route('add.to.wishlist')}}",
                    type: 'POST',
                    dataType:'JSON',
                    data:id,
                    success: function (response) {
                        $(".wishlist-section").replaceWith(response['mini-wishlist']);
                        if(!response['duplicate']) {
                            bootbox.dialog({
                                title: 'Lista želja',
                                message: 'Uspešno ste dodali proizvod ' + response['product_name'] + ' u listu želja',
                                size: 'medium',
                                onEscape: false,
                                buttons: {
                                    cancel: {
                                        label: "Nastavi sa kupovinom",
                                        className: 'btn-success',
                                        callback: function () {
                                        }
                                    },
                                    ok: {
                                        label: "Pregledaj listu želja",
                                        className: 'btn-success',
                                        callback: function () {
                                            showWishListProducts();
                                        }
                                    }
                                }
                            });
                        }
                    }
                });
            }

            function showWishListProducts() {
                window.location = '/wishlist/show_wishlist';
            }

            function addReview() {
                var review = {
                    "product_id": @json($single_product->id),
                    "reviewer": $('#reviewer').val(),
                    "comment": $('#comment').val(),
                    "rating": $('#rating').val(),
                    "email": $('#email').val()
                };
                $.ajax({
                    url: "{{route('add.review')}}",
                    type: "POST",
                    dataType: 'JSON',
                    data: review,
                    success: function (result) {
                        bootbox.dialog({
                            title: 'Ocena proizvoda',
                            message: 'Uspešno ste ocenili proizvod ' + @json($single_product->name),
                            size: 'medium',
                            onEscape: false,
                            buttons: {
                                ok: {
                                    label: "OK",
                                    className: 'btn-success',
                                    callback: function () {
                                        $(".rated_success").removeClass('d-block');
                                        $('#comment_form')[0].reset();
                                        $(".ratting-form-wrapper").replaceWith($(".rated_success").html());
                                    }
                                }
                            }
                        });
                    },
                    error: function (reject) {
                        if (reject.status === 422) {
                            $(".invalid-feedback").removeClass('d-block');
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                $("#" + key + "_error").addClass('d-block');
                                $("#" + key + "_error").text(val[0]);
                            });
                        }
                    }
                });
            }

            function addToCart() {
                var product_id = @json($single_product->id);
                var sale = @json($single_product->sale);
                var price = '';
                if (sale) price = $('.product-price span.discounted-price').text().split(' DIN')[0];
                else price = $('.product-price span.main-price').text().split(' DIN')[0];
                var quantity = $('#quantity').val();
                var size = $('.nice-select > span.current').text();
                var color = $(".color").find("span").filter(".active").parent().attr('value');
                var cart_item = {
                    "product_id": product_id,
                    "quantity": quantity,
                    "size": size,
                    "color": color,
                    "price": price
                };

                $.ajax({
                    url: "{{route('add.to.cart')}}",
                    type: "POST",
                    dataType: 'JSON',
                    data: cart_item,
                    success: function (response) {
                        $(".minicart-section").replaceWith(response['mini_cart']);
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

            function shakeProduct() {
                $('.availability').effect("bounce", {times: 3}, "slow");
                return false;
            }

            function refreshMinicart() {
                $.ajax({
                    url: '/cart/refresh_minicart',
                    type: 'get',
                    success: function (response) {
                        $(".minicart-section").replaceWith(response);
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

            function openProductModal(productID) {
                $.ajax({
                    url: '{{url('/product_modal')}}' + '/' + productID,
                    type: 'get',
                    success: function (response) {
                        $(".modal").html(response);
                        $(".modal").modal('show');
                    }
                });
            }

            function addProductSlider() {
                $('.small-image-slider, .quickview-small-image-slider').slick({
                    prevArrow: '<i class="fa fa-angle-left slick-prev"></i>',
                    nextArrow: '<i class="fa fa-angle-right slick-next"></i>',
                    arrows: true,
                    dots: false,
                    slidesToShow: 4,
                    responsive: [
                        {
                            breakpoint: 1499,
                            settings: {
                                slidesToShow: 4,
                            }
                        },
                        {
                            breakpoint: 1199,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 3,
                                arrows: false
                            }
                        },
                        {
                            breakpoint: 575,
                            settings: {
                                slidesToShow: 3,
                                arrows: false
                            }
                        },
                        {
                            breakpoint: 479,
                            settings: {
                                slidesToShow: 2,
                                arrows: false
                            }
                        }
                    ]
                });
            }

        </script>
    @endpush
@endsection
