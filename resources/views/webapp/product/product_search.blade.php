@extends('webapp.layouts.main')
@section('title','Pretraga proizvoda')
@section('content')

    <!--=============================================
=            breadcrumb area         =
=============================================-->

    <div class="breadcrumb-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb container  =======-->

                    <div class="breadcrumb-container">
                        <nav>
                            <ul>
                                <li class="parent-page"><a href="{{url('/')}}">{{__('messages.home')}}</a></li>
                                <li>{{__('messages.search')}}</li>
                                <li>{{__('messages.keyword').$search}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>

    @if(count($products)>0)
        <div class="shop-page-content mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-1 order-lg-2">

                        <!--=======  Shop header  =======-->

                        <div class="shop-header mb-30">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center">
                                    <!--=======  view mode  =======-->

                                    <div class="view-mode-icons mb-xs-10">
                                        <a class="active" data-target="grid" href="#"><i class="icon ion-md-apps"></i></a>
                                        <a data-target="list" href="#"><i class="icon ion-ios-list"></i></a>
                                    </div>

                                    <!--=======  End of view mode  =======-->

                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
                                    <!--=======  Sort by dropdown  =======-->
                                    <div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
                                        <p class="mr-10 mb-0">{{__('messages.sort.by')}}</p>
                                        <select class="nice-select" id="sort-by" name="sort-by">
                                            <option value="min-price">{{__('messages.sort.by.price.low')}}</option>
                                            <option value="max-price">{{__('messages.sort.by.price.high')}}</option>
                                            <option selected value="name-asc">{{__('messages.sort.by.name.a.z')}}</option>
                                            <option value="name-desc">{{__('messages.sort.by.name.z.a')}}</option>
                                        </select>
                                    </div>

                                    <div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
                                        <p class="mr-10 mb-0">{{__('messages.show')}}</p>
                                        <select class="nice-select" id="show-by" name="show-by">
                                            <option value="20">20</option>
                                            <option value="40">40</option>
                                            <option value="60">60</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>

                                    <!--=======  End of Sort by dropdown  =======-->
                                    @include('webapp.includes.product.product_header')
                                </div>
                            </div>
                        </div>

                        <!--=======  End of Shop header  =======-->

                        <!--=======  shop product display area  =======-->
                        @include('webapp.includes.product.product_list')

                        @include('webapp.includes.product.pagination')
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="shop-page-content mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-1 order-lg-2">
                        <p style="font-weight: bold; font-size: 20px">{{__('messages.search.results').' '.$search}}</p>
                        <p style="font-weight: bold; font-size: 16px">{{__('messages.search.no.products')}}</p>
                        <p style="font-weight: bold; font-size: 14px">{{__('messages.suggestions')}}</p>
                        <p style="font-weight: normal; font-size: 14px">{{__('messages.try.keywords')}}</p>
                        <p style="font-weight: normal; font-size: 14px">{{__('messages.try.another.words')}}</p>
                        <p style="font-weight: normal; font-size: 14px">{{__('messages.try.general.words')}}</p>
                        <p style="font-weight: normal; font-size: 14px">{{__('messages.try.small.words')}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('webapp.includes.scroll-top')

@endsection
@push('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.modal').on('shown.bs.modal', function (e) {
                $('.small-image-slider').resize();
                addProductSlider();
            });
            $('#sort-by').on('change', function () {
                showSearchedProductList();
            });

            $('#show-by').on('change', function () {
                showSearchedProductList();
            });

            $('.pagination-area > ul > li.page-item > a').each(function () {
                $(this).on('click', function (e) {
                    e.preventDefault();
                    showSearchedProductList($(this).text());
                    $('html,body').animate({
                        scrollTop: 0
                    }, 1000);
                });

            });
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

        function showSearchedProductList(page) {
            var search =@json($search);
            var size = $('#show-by').val();
            var sort = $('#sort-by').val();
            var data = JSON.stringify({sort: sort, size: size, search: search});
            if (page === undefined) {
                page = 1;
            }
            $.ajax({
                url: '{{url('products_list_searched_fragment')}}' + '/' + data + '?page=' + page,
                type: 'get',
                success: function (response) {
                    $('.view-mode-icons a:nth-child(1)').addClass('active');
                    $('.view-mode-icons a:nth-child(2)').removeClass('active');
                    $('.shop-product-wrap').replaceWith(response['products_list']);
                    $('#pagination').replaceWith(response['pagination']);
                    $(".result-show-message").replaceWith(response['header']);
                    $('.pagination-area > ul > li.page-item > a').each(function () {
                        $(this).on('click', function (e) {
                            e.preventDefault();
                            showSearchedProductList($(this).text());
                            $('html,body').animate({
                                scrollTop: 0
                            }, 1000);
                        });
                    });
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

