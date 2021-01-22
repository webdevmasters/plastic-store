@extends('webapp.layouts.main')

@section('title',isset($selected_subcategory)?$selected_subcategory->name:$selected_category->name)
@section('content')
    <!--==========   breadcrumb area   ===========-->
    @include('webapp.includes.product.breadcrumb')

    <div class="shop-page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--=======  page sidebar   =======-->

                    <div class="page-sidebar">
                        <!--=======  single sidebar block  =======-->

                        <div class="single-sidebar">
                            <h3 class="sidebar-title" th:text="#{categories}">KATEGORIJE</h3>

                            <div class="category">
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a value="{{$category->id}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!--=======  End of single sidebar block  =======-->

                        <!--=======  single sidebar block  =======-->
                    @include('webapp.includes.product.product_price')

                    <!--=======  End of single sidebar block  =======-->

                        <!--=======  single sidebar block  =======-->
                    @include('webapp.includes.product.product_colors')
                    <!--=======  End of single sidebar block  =======-->

                        <!--=======  single sidebar block  =======-->

                        <div class="single-sidebar">
                            <h3 class="sidebar-title" th:text="#{popuar.tags}">POPULARNI TAGOVI</h3>

                            <!--=======  tag container  =======-->

                            <ul class="tag-container">
                                <li><a href="{{route('products.by.subcategory',$categories->get(0)->subcategories->get(1))}}">{{$categories->get(0)->subcategories->get(1)->name}}</a></li>
                                <li><a href="{{route('products.by.subcategory',$categories->get(1)->subcategories->get(1))}}">{{$categories->get(1)->subcategories->get(1)->name}}</a></li>
                                <li><a href="{{route('products.by.subcategory',$categories->get(2)->subcategories->get(3))}}">{{$categories->get(2)->subcategories->get(3)->name}}</a></li>
                                <li><a href="{{route('products.by.subcategory',$categories->get(3)->subcategories->get(1))}}">{{$categories->get(3)->subcategories->get(1)->name}}</a></li>
                                <li><a href="{{route('products.by.subcategory',$categories->get(4)->subcategories->get(8))}}">{{$categories->get(4)->subcategories->get(8)->name}}</a></li>
                                <li><a href="{{route('products.by.subcategory',$categories->get(5)->subcategories->get(5))}}">{{$categories->get(5)->subcategories->get(5)->name}}</a></li>
                                <li><a href="{{route('products.by.subcategory',$categories->get(6)->subcategories->get(3))}}">{{$categories->get(6)->subcategories->get(3)->name}}</a></li>
                                <li><a href="{{route('products.by.subcategory',$categories->get(6)->subcategories->get(6))}}">{{$categories->get(6)->subcategories->get(6)->name}}</a></li>
                            </ul>

                            <!--=======  End of tag container  =======-->
                        </div>

                        <!--=======  End of single sidebar block  =======-->
                    </div>

                    <!--=======  End of page sidebar   =======-->
                </div>

                <div class="col-lg-9 order-1 order-lg-2">

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
                                    <p class="mr-10 mb-0" th:text="#{sort.by}+':'">Sortiraj: </p>
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
                                        <option value="80">80</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                                <!--=======  End of Sort by dropdown  =======-->
                                @include('webapp.includes.product.product_header')
                            </div>
                        </div>
                    </div>

                    <!--=======  End of Shop header  =======-->

                    <!--=======  shop products display area  =======-->
                @include('webapp.includes.product.product_list')

                <!--=======  End of shop products display area  =======-->

                    <!--=======  pagination area  =======-->

                @include('webapp.includes.product.pagination')

                <!--=======  End of pagination area  =======-->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#price-range").slider('option', 'min', @json($min_price));
            $("#price-range").slider('option', 'max', @json($max_price));

            setSliderMinMaxPrice(@json($min_price), @json($max_price));

            $('.modal').on('shown.bs.modal', function (e) {
                $('.small-image-slider').resize();
                addProductSlider();
            });

            $('.category > ul > li a').each(function () {
                if ($(this).attr('value') === $("#breadcrumb_category").attr('value')) {
                    $(this).addClass('active');
                }
            });

            $('.category > ul > li a').on('click', function (e) {
                $('.category > ul > li a').removeClass();
                $(this).addClass('active');

                setDefault();

                $("#breadcrumb_subcategory").attr("value", null);
                refreshBreadCrumb($(this).text(), '');

                var categoryID = $(this).attr("value");

                $(".main-menu-item li").each(function (e) {
                    if ($(this).attr("value") === categoryID) {
                        $($(this)).addClass('active');
                    } else {
                        $($(this)).removeClass("active");
                    }
                });
                showProductList(true, false, false);
            });

            $('#sort-by').on('change', function () {
                var selected_colors = [];
                $('.color-category > ul > li > a').each(function () {
                    if ($(this).parent().hasClass('active')) {
                        selected_colors.push($(this).text());
                    }
                });
                showProductList(false, selected_colors.length > 0, true);
            });

            $('#show-by').on('change', function () {
                var selected_colors = [];
                $('.color-category > ul > li > a').each(function () {
                    if ($(this).parent().hasClass('active')) {
                        selected_colors.push($(this).text());
                    }
                });
                showProductList(false, selected_colors.length > 0, false);
            });

            $('#price-range').slider({
                change: function (event, ui) {
                    var selected_colors = [];
                    $('.color-category > ul > li > a').each(function () {
                        if ($(this).parent().hasClass('active')) {
                            selected_colors.push($(this).text());
                        }
                    });
                    showProductList(false, selected_colors.length > 0, true);
                }
            });

            $('.color-category > ul > li >a').on('click', function () {
                if ($(this).parent().hasClass('active')) {
                    $(this).parent().removeClass();
                } else {
                    $(this).parent().addClass('active');
                }
                showProductList(false, true, false);
            });

            $('.pagination-area > ul > li.page-item > a').each(function () {
                $(this).on('click', function (e) {
                    e.preventDefault();
                    showProductList(false, false, false, $(this).text());
                });
            });

        });

        function refreshSlider(min, max) {
            $('#price-range').slider('destroy');
            $('#price-range').slider({
                range: true,
                min: min,
                max: max,
                values: [min, max],
                slide: function (event, ui) {
                    $('#price-amount').val('Cena: ' + ui.values[0] + ' - ' + ui.values[1] + ' RSD');
                },
                change: function (event, ui) {
                    var selected_colors = [];
                    $('.color-category > ul > li > a').each(function () {
                        if ($(this).parent().hasClass('active')) {
                            selected_colors.push($(this).text());
                        }
                    });
                    showProductList(false, selected_colors.length > 0, true);
                }
            });
            setSliderMinMaxPrice(min, max);
        }

        function setDefault() {
            $('.nice-select').niceSelect('destroy');
            $('#sort-by').removeAttr('style');
            $('#sort-by').val('name-asc');
            $('#show-by').removeAttr('style');
            $('#show-by').val('20');
            $('.nice-select').niceSelect();
            $('.color-category > ul > li > a').each(function () {
                $(this).parent().removeClass();
            });
        }
        function refreshMiniWishlist(){
            $.ajax({
                url: '/cart/refresh_minicart',
                type: 'get',
                success: function (response) {
                    $(".wishlist-section").replaceWith(response['mini-wishlist']);
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

        function setSliderMinMaxPrice(min, max) {
            $('#price-amount').val('Cena: ' + min + ' - ' + max + ' RSD');
        }

        function showProductList(category_changed, color_changed, price_changed, page) {
            var categoryId = $(".category > ul > li a.active").attr("value");
            var subcategoryId = $("#breadcrumb_subcategory").attr("value");
            var min = $("#price-range").slider("values", 0);
            var max = $("#price-range").slider("values", 1);
            var size = $('#show-by').val();
            var sort = $('#sort-by').val();
            var selected_colors = [];
            $('.color-category > ul > li > a').each(function () {
                if ($(this).parent().hasClass('active')) {
                    selected_colors.push($(this).text());
                }
            });
            var data = JSON.stringify({category_changed: category_changed, price_changed: price_changed, color_changed: color_changed, category_id: categoryId, subcategory_id: subcategoryId, sort: sort, min_price: min, max_price: max, size: size, colors: selected_colors});

            if (page === undefined) {
                page = 1;
            }
            $.ajax({
                url: '{{url('products_list_fragment')}}' + '/' + data + '?page=' + page,
                type: 'get',
                async: false,
                success: function (response) {
                    $('.view-mode-icons a:nth-child(1)').addClass('active');
                    $('.view-mode-icons a:nth-child(2)').removeClass('active');
                    window.history.replaceState(null, null, location.href.substring(0, location.href.lastIndexOf('/') + 1) + categoryId);
                    $('.shop-product-wrap').replaceWith(response['products_list']);
                    $('#pagination').replaceWith(response['pagination']);
                    $('.pagination-area > ul > li.page-item > a').each(function () {
                        $(this).on('click', function (e) {
                            e.preventDefault();
                            showProductList(category_changed, color_changed, price_changed, $(this).text());
                        });
                    });

                    setSliderMinMaxPrice(response['min_price'], response['max_price']);

                    if ((category_changed || color_changed) && !price_changed) {
                        refreshSlider(response['min_price'], response['max_price']);
                    }
                    $(".result-show-message").replaceWith(response['header']);

                    $("#product_colors").replaceWith(response['colors']);
                    $('.color-category > ul > li > a').each(function () {
                        if (selected_colors.length > 0 && selected_colors.includes($(this).text())) {
                            $(this).parent().addClass('active');
                        } else
                            $(this).parent().removeClass();
                    });

                    $('.color-category > ul > li >a').on('click', function () {
                        if ($(this).parent().hasClass('active')) {
                            $(this).parent().removeClass();
                        } else {
                            $(this).parent().addClass('active');
                        }
                        showProductList(false, true, false);
                    });

                }
            });
        }

        function refreshBreadCrumb(categoryName, subcategoryName) {
            $("#breadcrumb_category").text(categoryName);
            $("#breadcrumb_subcategory").text(subcategoryName);
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
