@extends('webapp.layouts.main')
@section('title','Početna')
@section('content')

    <!--SLIDER-->

    <div class="hero-area mb-30">
        <!--=======  slider container  =======-->

        <div class="slider-container">
            <!--=======  hero slider one  =======-->

            <div class="hero-slider">
                <!--=======  slider item  =======-->

                <div class="hero-slider-item slider-bg-1">

                    <!--=======  slider content  =======-->

                    <div class="d-flex flex-column justify-content-center align-items-start h-100">
                        <div class="container">
                            <div class="row">
                                @foreach($promotions as $promotion)
                                    <div class="col-lg-12">
                                        @if($promotion->category->name=='Nameštaj')
                                            <div class="slider-content">
                                                <p>{{__('messages.exclusive.offer')}}</p>
                                                <h1>{{$promotion->product->name}}</h1>
                                                <p class="slider-price">{{__('messages.starts.from.big').' '}}<span>{{$promotion->product->minPrice().' RSD'}}</span></p>
                                                <a class="slider-btn" href="{{route('single.product.by.id',$promotion->product)}}">{{__('messages.buy')}}</a>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!--=======  End of slider content  =======-->
                </div>

                <!--=======  End of slider item  =======-->

                <!--=======  slider item  =======-->

                <div class="hero-slider-item slider-bg-2">
                    <!--=======  slider content  =======-->

                    <div class="d-flex flex-column justify-content-center align-items-start h-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach($promotions as $promotion)
                                        <div class="col-lg-12">
                                            @if($promotion->category->name=='Kupatilo')
                                                <div class="slider-content">
                                                    <p>{{__('messages.exclusive.offer')}}</p>
                                                    <h1>{{$promotion->product->name}}</h1>
                                                    <p class="slider-price">{{__('messages.starts.from.big').' '}}<span>{{$promotion->product->minPrice().' RSD'}}</span></p>
                                                    <a class="slider-btn" href="{{route('single.product.by.id',$promotion->product)}}">{{__('messages.buy')}}</a>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--=======  End of slider content  =======-->
                </div>

                <!--=======  End of slider item  =======-->

                <!--=======  slider item  =======-->

                <div class="hero-slider-item slider-bg-3">
                    <!--=======  slider content  =======-->

                    <div class="d-flex flex-column justify-content-center align-items-start h-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach($promotions as $promotion)
                                        <div class="col-lg-12">
                                            @if($promotion->category->name=='Saksije i bašta')
                                                <div class="slider-content">
                                                    <p>{{__('messages.exclusive.offer')}}</p>
                                                    <h1>{{$promotion->product->name}}</h1>
                                                    <p class="slider-price">{{__('messages.starts.from.big').' '}}<span>{{$promotion->product->minPrice(). ' RSD'}}</span></p>
                                                    <a class="slider-btn" href="{{route('single.product.by.id',$promotion->product)}}">{{__('messages.buy')}}</a>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-product-slider-container mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  tab slider wraspper  =======-->

                    <div class="tab-slider-wrapper">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a aria-selected="true" class="nav-item nav-link active" data-toggle="tab" href="#featured" id="featured-tab" role="tab">{{__('messages.popular.products')}}</a>
                                <a aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#new-arrivals" id="new-arrival-tab" role="tab">{{__('messages.new.products')}}</a>
                                <a aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#on-sale" id="nav-onsale-tab" role="tab">{{__('messages.sale.products')}}</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div aria-labelledby="featured-tab" class="tab-pane fade show active" id="featured" role="tabpanel">
                                <!--=======  tab product slider  =======-->
                            @include('webapp.includes.product_slider',['products'=>$popular_products])
                            <!--=======  End of tab product slider  =======-->
                            </div>

                            <div aria-labelledby="new-arrival-tab" class="tab-pane fade" id="new-arrivals" role="tabpanel">
                                <!--=======  tab product slider  =======-->

                            @include('webapp.includes.product_slider',['products'=>$new_products])

                            <!--=======  End of tab product slider  =======-->
                            </div>

                            <div aria-labelledby="nav-onsale-tab" class="tab-pane fade" id="on-sale" role="tabpanel">
                                <!--=======  tab product slider  =======-->

                            @include('webapp.includes.product_slider',['products'=>$sale_products])

                            <!--=======  End of tab product slider  =======-->
                            </div>
                        </div>
                    </div>

                    <!--=======  End of tab slider wraspper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of tab slider section  ======-->

    <!--=============================================
    =            slider with banner and sidebar         =
    =============================================-->

    <div class="slider-banner-sidebar-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  slider with banner and sidebar container  =======-->
                    <div class="slider-banner-sidebar-container">
                        <div class="row no-gutters">
                            <div class="col-lg-3 col-xl-2 col-md-4">
                                <!--=======  sidebar  =======-->
                                <div class="slider-sidebar">
                                    <h3 class="slider-sidebar-title">{{__('messages.garden')}}</h3>
                                    <div class="sidebar-first">
                                        <ul>
                                            @foreach($categories as $category)
                                                @if($category->id==3)
                                                    @foreach($category->subcategories as $subcategory)
                                                        <li><a onclick="showFirstProductsBySubcategory({{$subcategory->id}})">{{$subcategory->name}}</a></li>
                                                    @endforeach
                                                    @break
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!--=======  End of sidebar  =======-->
                            </div>
                            <div class="col-lg-9 col-xl-10 col-md-8" id="first_slider">
                                <div class="fl-slider banner-slider"></div>
                                <!--=======  slider banner  =======-->
                                @foreach($promotions as $promotion)
                                    <div class="slider-banner home-one-banner banner-bg banner-bg-1">
                                        @if($promotion->category->name=='Saksije i bašta')
                                            <div class="banner-text">
                                                <p>{{__('messages.week.product')}}</p>
                                                <a href="{{route('single.product.by.id',$promotion->product)}}"><p class="big-text">{{$promotion->product->name}}</p></a>
                                                <p>{{__('messages.starts.from.big').' '.$promotion->product->minPrice().' RSD'}}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!--=======  End of slider with banner and sidebar container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of slider with banner and sidebar  ======-->

    <!--=============================================
    =            slider with banner and sidebar         =
    =============================================-->

    <div class="slider-banner-sidebar-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  slider with banner and sidebar container  =======-->

                    <div class="slider-banner-sidebar-container">
                        <div class="row no-gutters">
                            <div class="col-lg-3 col-xl-2 col-md-4">
                                <!--=======  sidebar  =======-->

                                <div class="slider-sidebar">
                                    <h3 class="slider-sidebar-title">{{__('messages.kids.program')}}</h3>
                                    <div class="sidebar-second">
                                        <ul>
                                            @foreach($categories as $category)
                                                @if($category->id==6)
                                                    @foreach($category->subcategories as $subcategory)
                                                        <li><a onclick="showSecondProductsBySubcategory({{$subcategory->id}})">{{$subcategory->name}}</a></li>
                                                    @endforeach
                                                    @break
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <!--=======  End of sidebar  =======-->
                            </div>

                            <div class="col-lg-9 col-xl-10 col-md-8" id="second_slider">
                                <!--=======  banner slider  =======-->

                                <div class="fl-slider banner-slider"></div>

                                <!--=======  End of banner slider  =======-->

                                <!--=======  slider banner  =======-->
                                @foreach($promotions as $promotion)
                                    <div class="slider-banner home-one-banner banner-bg banner-bg-2">
                                        @if($promotion->category->name=='Dečiji program')
                                            <div class="banner-text">
                                                <p>{{__('messages.week.product')}}</p>
                                                <a href="{{route('single.product.by.id',$promotion->product)}}"><p class="big-text">{{$promotion->product->name}}</p></a>
                                                <p>{{__('messages.starts.from.big').' '.$promotion->product->minPrice().' RSD'}}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--=======  End of slider with banner and sidebar container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of slider with banner and sidebar  ======-->

    <!--=============================================
    =            slider with banner and sidebar         =
    =============================================-->

    <div class="slider-banner-sidebar-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  slider with banner and sidebar container  =======-->

                    <div class="slider-banner-sidebar-container">
                        <div class="row no-gutters">
                            <div class="col-lg-3 col-xl-2 col-md-4">
                                <!--=======  sidebar  =======-->

                                <div class="slider-sidebar">
                                    <h3 class="slider-sidebar-title">{{__('messages.kitchen')}}</h3>
                                    <div class="sidebar-third">
                                        <ul>
                                            @foreach($categories as $category)
                                                @if($category->id==5)
                                                    @foreach($category->subcategories as $subcategory)
                                                        <li><a onclick="showThirdProductsBySubcategory({{$subcategory->id}})">{{$subcategory->name}}</a></li>
                                                        @if($loop->index==9) @break @endif
                                                    @endforeach
                                                    @break
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <!--=======  End of sidebar  =======-->
                            </div>
                            <div class="col-lg-9 col-xl-10 col-md-8" id="third_slider">
                                <!--=======  banner slider  =======-->

                                <div class="fl-slider banner-slider"></div>

                                <!--=======  End of banner slider  =======-->

                                <!--=======  slider banner  =======-->

                                @foreach($promotions as $promotion)
                                    <div class="slider-banner home-one-banner banner-bg banner-bg-3">
                                        @if($promotion->category->name=='Kuhinja')
                                            <div class="banner-text">
                                                <p>{{__('messages.week.product')}}</p>
                                                <a href="{{route('single.product.by.id',$promotion->product)}}"><p class="big-text">{{$promotion->product->name}}</p></a>
                                                <p>{{__('messages.starts.from.big').' '.$promotion->product->minPrice().' RSD'}}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!--=======  End of slider with banner and sidebar container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of slider with banner and sidebar  ======-->

@endsection


@push('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            showFirstProductsBySubcategory(9);
            showSecondProductsBySubcategory(37);
            showThirdProductsBySubcategory(19);

            $('.modal').on('shown.bs.modal', function (e) {
                $('.small-image-slider').resize();
                addProductSlider();
            });

            $('.sidebar-first > ul > li a:first').addClass('active');
            $('.sidebar-second > ul > li a:first').addClass('active');
            $('.sidebar-third > ul > li a:first').addClass('active');

            $('.main-menu >nav > ul > li a').on('click', function () {
                $('.main-menu > nav > ul > li a').removeClass();
                $(this).addClass('active');
            });

            $('.sidebar-first > ul > li a').on('click', function () {
                $('.sidebar-first > ul > li a').removeClass();
                $(this).addClass('active');
            });
            $('.sidebar-second > ul > li a').on('click', function () {
                $('.sidebar-second > ul > li a').removeClass();
                $(this).addClass('active');
            });
            $('.sidebar-third > ul > li a').on('click', function () {
                $('.sidebar-third > ul > li a').removeClass();
                $(this).addClass('active');
            });
        });

        $('#searchForm').keypress(function (e) {
            if (e.which === 13) {
                $('#searchForm').submit();
                return false;
            }
        });

        function openWishListDialog(product_id) {
            var id = {'product_id': product_id};
            $.ajax({
                url: "{{route('add.to.wishlist')}}",
                type: 'POST',
                dataType: 'JSON',
                data: id,
                success: function (response) {
                    $(".wishlist-section").replaceWith(response['mini-wishlist']);
                    if (!response['duplicate']) {
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

        function searchProducts() {
            var name = $('input[type="search"]').val();
            $.ajax({
                url: '/product/searchProductsByName/' + name,
                type: 'get',
                success: function (response) {
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

        function showFirstProductsBySubcategory(subcategoryId) {
            $.ajax({
                url: '{{ url("slider_products_by_subcategory") }}' + '/' + subcategoryId,
                type: 'get',
                success: function (response) {
                    $('#first_slider').children().first().replaceWith(response);
                    addBannerSlider($('#first_slider').children().first());
                }
            });
        }

        function showSecondProductsBySubcategory(subcategoryId) {
            $.ajax({
                url: '{{ url("slider_products_by_subcategory") }}' + '/' + subcategoryId,
                type: 'get',
                success: function (response) {
                    $('#second_slider').children().first().replaceWith(response);
                    addBannerSlider($('#second_slider').children().first());
                }
            });
        }

        function showThirdProductsBySubcategory(subcategoryId) {
            $.ajax({
                url: '{{ url("slider_products_by_subcategory") }}' + '/' + subcategoryId,
                type: 'get',
                success: function (response) {
                    $('#third_slider').children().first().replaceWith(response);
                    addBannerSlider($('#third_slider').children().first());
                }
            });
        }

        function addBannerSlider(slider) {
            var $this = slider;
            var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
            $this.slick({
                infinite: true,
                arrows: true,
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                rows: $row,
                prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
                responsive: [{
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
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 479,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
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
