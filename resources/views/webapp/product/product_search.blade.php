@extends('webapp.layouts.main')

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
                                <li class="parent-page"><a href="{{url('/')}}" th:text="#{home}">Početna</a></li>
                                <li th:text="#{search}">Pretraga</li>
                                <li>{{'> Reč pretrage: '.$search}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>

    @if(count($products)>0)
        <div class="shop-page-content mb-50" th:if="${products.size()>0}">
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
                                        <p class="mr-10 mb-0" th:text="#{sort.by}">Sortiraj: </p>
                                        <select class="nice-select" id="sort-by" name="sort-by">
                                            <option th:text="#{sort.by.price.low}" value="min-price">Najjeftinije prvo</option>
                                            <option th:text="#{sort.by.price.high}" value="max-price">Najskuplje prvo</option>
                                            <option selected th:text="#{sort.by.name.a.z}" value="name-asc">Naziv A-Z</option>
                                            <option th:text="#{sort.by.name.z.a}" value="name-desc">Naziv Z-A</option>
                                        </select>
                                    </div>

                                    <div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
                                        <p class="mr-10 mb-0" th:text="#{show}">Prikaži: </p>
                                        <select class="nice-select" id="show-by" name="show-by">
                                            <option value="20">20</option>
                                            <option value="40">40</option>
                                            <option value="60">60</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>

                                    <!--=======  End of Sort by dropdown  =======-->
                                    @include('webapp.product.includes.product_header')
                                </div>
                            </div>
                        </div>

                        <!--=======  End of Shop header  =======-->

                        <!--=======  shop product display area  =======-->
                        @include('webapp.product.includes.product_list')

                        @include('webapp.product.includes.pagination')
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="shop-page-content mb-50" th:unless="${products.size()>0}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-1 order-lg-2">
                        <p style="font-weight: bold; font-size: 20px"
                           th:text="'Rezultati pretraživanja za pojam: '+${search}"></p>
                        <p style="font-weight: bold; font-size: 16px">Nema proizvoda koji zadovoljavaju zadati kriterijum.</p>
                        <p style="font-weight: bold; font-size: 14px">Predlozi:</p>
                        <p style="font-weight: normal; font-size: 14px">Uverite se da ste sve ključne reči upisali ispravno.</p>
                        <p style="font-weight: normal; font-size: 14px">Probajte sa drugim ključnim rečima.</p>
                        <p style="font-weight: normal; font-size: 14px">Probajte uopštenije klične reči.</p>
                        <p style="font-weight: normal; font-size: 14px">Probajte manje ključnih reči.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('webapp.includes.scroll-top')
    @include('webapp.includes.product_modal')

@endsection
@push('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
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

        function openWishListDialog(productID) {
            $.ajax({
                url: '/product/add_product_to_wishlist/' + productID,
                type: 'get',
                success: function (response) {
                    bootbox.dialog({
                        title: 'Lista želja',
                        message: 'Uspešno ste dodali proizvod ' + response + ' u listu želja',
                        size: 'medium',
                        onEscape: false,
                        buttons: {
                            cancel: {
                                label: "Nastavi sa kupovinom",
                                className: 'btn-success',
                                callback: function () {
                                    refreshMinicart();
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
            });
        }

        function refreshMinicart() {
            $.ajax({
                url: '/cart/refresh_minicart',
                type: 'get',
                success: function (response) {
                    $(".navigation-menu-top").replaceWith(response);
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

        function showWishListProducts() {
            window.location = '/product/show_wishlist';
        }

        function openProductModal(productID) {
            $.ajax({
                url: '/product/product_modal/' + productID,
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

