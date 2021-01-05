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
                                <div class="col-lg-12" th:each="promotion: ${promotions}">
                                    <div class="slider-content" th:if="${promotion.getCategory().getName()=='Nameštaj'}">
                                        <p th:text="#{exclusive.offer}">Ekskluzivna ponuda ove nedelje </p>
                                        <h1 th:text="${promotion.getProduct().getName()}"></h1>
                                        <p class="slider-price" th:text="#{starts.from}">počev od <span th:text="${promotion.getProduct().getMinPrice()}+' RSD'"></span></p>
                                        <a class="slider-btn" th:href="@{/product/single_product/__${promotion.getProduct().getId()}__}" th:text="#{buy}">KUPI</a>
                                    </div>
                                </div>
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
                                    <div class="col-lg-12" th:each="promotion: ${promotions}">
                                        <div class="slider-content" th:if="${promotion.getCategory().getName()=='Kupatilo'}">
                                            <p th:text="#{exclusive.offer}">Ekskluzivna ponuda ove nedelje </p>
                                            <h1 th:text="${promotion.getProduct().getName()}"></h1>
                                            <p class="slider-price" th:text="#{starts.from}">počev od <span th:text="${promotion.getProduct().getMinPrice()}+' RSD'"></span></p>
                                            <a class="slider-btn" th:href="@{/product/single_product/__${promotion.getProduct().getId()}__}" th:text="#{buy}">KUPI</a>
                                        </div>
                                    </div>
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
                                    <div class="col-lg-12" th:each="promotion: ${promotions}">
                                        <div class="slider-content" th:if="${promotion.getCategory().getName()=='Saksije i bašta'}">
                                            <p th:text="#{exclusive.offer}">Ekskluzivna ponuda ove nedelje </p>
                                            <h1 th:text="${promotion.getProduct().getName()}"></h1>
                                            <p class="slider-price" th:text="#{starts.from}">počev od <span th:text="${promotion.getProduct().getMinPrice()}+' RSD'"></span></p>
                                            <a class="slider-btn" th:href="@{/product/single_product/__${promotion.getProduct().getId()}__}" th:text="#{buy}">KUPI</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--=======  End of slider content  =======-->
                </div>

                <!--=======  End of slider item  =======-->

            </div>

            <!--=======  End of hero slider one  =======-->
        </div>

        <!--=======  End of slider container  =======-->
    </div>

    <!--END OFF SLIDER-->

    <!--=============================================
    =            tab slider section         =
    =============================================-->

    <div class="tab-product-slider-container mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  tab slider wraspper  =======-->

                    <div class="tab-slider-wrapper">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a aria-selected="true" class="nav-item nav-link active" data-toggle="tab" href="#featured" id="featured-tab" role="tab">Popularni proizvodi</a>
                                <a aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#new-arrivals" id="new-arrival-tab" role="tab">Novi proizvodi</a>
                                <a aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#on-sale" id="nav-onsale-tab" role="tab">Proizvodi na akciji</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div aria-labelledby="featured-tab" class="tab-pane fade show active" id="featured" role="tabpanel">
                                <!--=======  tab product slider  =======-->
                            @include('webapp.includes.tab_slider',['products'=>$popular_products])
                            <!--=======  End of tab product slider  =======-->
                            </div>

                            <div aria-labelledby="new-arrival-tab" class="tab-pane fade" id="new-arrivals" role="tabpanel">
                                <!--=======  tab product slider  =======-->

                            @include('webapp.includes.tab_slider',['products'=>$new_products])

                            <!--=======  End of tab product slider  =======-->
                            </div>

                            <div aria-labelledby="nav-onsale-tab" class="tab-pane fade" id="on-sale" role="tabpanel">
                                <!--=======  tab product slider  =======-->

                            @include('webapp.includes.tab_slider',['products'=>$sale_products])

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
                                    <h3 class="slider-sidebar-title" th:text="#{garden}">SAKSIJE I BAŠTA</h3>
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
                                <div class="slider-banner home-one-banner banner-bg banner-bg-1" th:each="promotion: ${promotions}">
                                    <div class="banner-text" th:if="${promotion.getCategory().getName()=='Saksije i bašta'}">
                                        <p th:text="#{week.product}">Proizvod nedelje</p>
                                        <a th:href="@{/product/single_product/__${promotion.getProduct().getId()}__}"><p class="big-text" th:text="${promotion.getProduct().getName()}"></p></a>
                                        <p th:text="'Počev od '+${promotion.getProduct().getMinPrice()}+' RSD'"></p>
                                    </div>
                                </div>
                                <!--=======  End of slider banner  =======-->
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
                                    <h3 class="slider-sidebar-title" th:text="#{kids.program}">DEČIJI PROGRAM</h3>
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
                                <div class="slider-banner home-one-banner banner-bg banner-bg-2"
                                     th:each="promotion: ${promotions}">
                                    <div class="banner-text" th:if="${promotion.getCategory().getName()=='Dečiji program'}">
                                        <p th:text="#{week.product}">Proizvod nedelje</p>
                                        <a th:href="@{/product/single_product/__${promotion.getProduct().getId()}__}"><p class="big-text" th:text="${promotion.getProduct().getName()}"></p></a>
                                        <p th:text="'Počev od '+${promotion.getProduct().getMinPrice()}+' RSD'"></p>
                                    </div>
                                </div>

                                <!--=======  End of slider banner  =======-->
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
                                    <h3 class="slider-sidebar-title" th:text="#{kitchen}">KUHINJA</h3>
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

                                <div class="slider-banner home-one-banner banner-bg banner-bg-3" th:each="promotion: ${promotions}">
                                    <div class="banner-text" th:if="${promotion.getCategory().getName()=='Kuhinja'}">
                                        <p th:text="#{week.product}">Proizvod nedelje</p>
                                        <a th:href="@{/product/single_product/__${promotion.getProduct().getId()}__}"><p class="big-text" th:text="${promotion.getProduct().getName()}"></p></a>
                                        <p th:text="'Počev od '+${promotion.getProduct().getMinPrice()}+' RSD'"></p>
                                    </div>
                                </div>

                                <!--=======  End of slider banner  =======-->
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
                url: '/product/product_modal/' + productID,
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
