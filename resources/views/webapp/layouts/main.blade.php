<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="{{mix('css/external/external.css')}}" type="text/css" rel="stylesheet"/>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{mix('css/app/app.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{mix('css/webapp/theme.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{mix('css/webapp/main.css')}}" type="text/css" rel="stylesheet"/>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <title>{{ config('app.name') }} - @yield('title')</title>
</head>
<body>
<div class="header-container header-sticky">

    <!--=============================================
    =            header top         =
    =============================================-->

    <div class="header-top pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="header-top-text text-center text-lg-left mb-0 mb-md-15 mb-sm-15">
                        <p><i class="icon ion-md-alarm"></i> {{__('messages.free.shipping.info')}}
                            <span class="support-no">{{' | '.__('messages.support.number').' - 062 464 406'}}</span>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!--=======  header top dropdowns  =======-->
                    <div class="header-top-dropdown d-flex justify-content-center justify-content-lg-end">
                        <div class="single-dropdown">
                            <span class="d-none d-sm-inline-block">{{__('messages.language').':'}}</span>
                            <a href="#" id="changeLanguage">
                                <span id="languageName">{{app()->getLocale()=='en'?__('messages.english'):__('messages.serbian')}} <i class="fa fa-angle-down"></i></span>
                            </a>
                            <div class="language-currency-list hidden" id="languageList">
                                <ul>
                                    <li class="eng"><a href="#">{{__('messages.english')}}</a></li>
                                    <li class="srb"><a href="#">{{__('messages.serbian')}}</a></li>
                                </ul>
                            </div>
                        </div>

                        <span class="separator pl-15 pr-15">|</span>

                        <!--=======  single dropdown  =======-->
                        @if (Route::has('login'))
                            @guest()
                                <a href="{{route('login')}}">{{__('messages.login')}}</a>
                                @if (Route::has('register'))
                                    <span> / </span>
                                    <a href="{{route('register')}}">{{__('messages.register')}}</a>
                                @endif
                            @endguest
                            @auth
                                <div class="single-dropdown">
                                    <a href="#" id="changeAccount">
                                        <span id="accountMenuName">{{Auth::user()->name}}</span>
                                        <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <div class="language-currency-list hidden" id="accountList">
                                        <ul>
                                            <li><a href="{{route('show.cart')}}">{{__('messages.cart')}}</a></li>
                                            <li><a href="{{route('show.wishlist')}}">{{__('messages.wishlist')}}</a></li>
                                            <li><a href="{{route('customer.my.account')}}">{{__('messages.my.account')}}</a></li>
                                            @can('manage-customers')
                                                <li><a href="{{route('admin.products.index')}}">{{__('messages.administration')}}</a></li>
                                            @endcan
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('messages.logout')}}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endauth
                        @endif

                    </div>
                    <!--=======  End of header top dropdowns  =======-->
                </div>
            </div>
        </div>
    </div>

    <div class="navigation-menu-top pt-35 pb-35 pt-md-15 pb-md-15 pt-sm-15 pb-sm-15">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-lg-2 col-md-6 col-sm-6 order-1 order-lg-1">
                    <!--=======  logo  =======-->

                    <div class="logo" style="width: 250px;">
                        <a href="{{url('/')}}">
                            <img alt="" class="img-fluid" src="{{asset('static/images/shop/logo.png')}}">
                        </a>
                    </div>

                    <!--=======  End of logo  =======-->
                </div>
                <div class="col-12 col-lg-7 col-md-12 col-sm-12 order-3 order-lg-2"></div>
                <div class=" col-6 col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                    <!--=======  cart icon  =======-->
                    @include('webapp.includes.cart.mini_cart')

                    @include('webapp.includes.wishlist.mini_wishlist')
                </div>
            </div>
        </div>
    </div>

    <div class="navigation-menu">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <!--=======  sticky logo  =======-->

                <div class="sticky-logo" style="width: 250px;">
                    <a href="{{url('/')}}"><img alt="" class="img-fluid" src="{{asset('static/images/shop/logo.png')}}"></a>
                </div>

                <!--=======  End of sticky logo  =======-->

                <!--=======  search icon for tablet  =======-->

                <div class="search-icon-menutop-tablet text-right d-inline-block d-lg-none">
                    <a href="#" id="search-overlay-active-button">
                        <i class="icon ion-md-search"></i>
                    </a>
                </div>

                <!--=======  End of search icon for tablet  =======-->

                <div class="col-12 col-lg-6" id="navigation-section">
                    <!-- navigation section -->
                    <div class="main-menu">
                        <nav>
                            <ul class="main-menu-item">
                                @foreach($categories as $category)
                                    <li class="menu-item-has-children {{isset($selected_category)&&$selected_category->name==$category->name?'active':''}}" value="{{$category->id}}">
                                        <a href="{{route('products.by.category',$category)}}">{{$category->name}}</a>
                                        <ul class="sub-menu">
                                            @foreach($category->subcategories as $subcategory)
                                                @if($subcategory->products_count>0)
                                                    <li><a href="{{route('products.by.subcategory',$subcategory)}}">{{$subcategory->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <!-- end of navigation section -->
                </div>
                <form id="searchForm" method="get" action="{{route('search_by_name')}}">
                    {{ csrf_field() }}
                    <div class="col-12 col-lg-3" id="search-section">
                        <!--=======  navigation search bar  =======-->
                        <div class="navigation-search d-none d-lg-block">
                            <input class="typeahead form-control" id="search" name="search" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity({{__('messages.enter.keyword')}})" required
                                   placeholder="{{__('messages.search.products').' ...'}}" value="{{isset($search)?$search:''}}" type="text">
                            <button type="submit"><i class="icon ion-md-search"></i></button>
                        </div>
                        <!--=======  End of navigation search bar  =======-->
                    </div>
                </form>
                <div class="col-12 d-block d-lg-none">
                    <!-- Mobile Menu -->
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of navigation menu  ======-->

</div>
<section id="section">
    @yield('content')
</section>
<div class="footer-container">
    <div class="footer-navigation pt-40 pb-20 pb-lg-40 pt-sm-30 pb-sm-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!--=======  address block  =======-->

                    <div class="address-block" style="padding-top: 20px;">
                        <div class="image">
                            <a href="{{url('/')}}">
                                <img alt="" class="img-fluid" src="{{asset('static/images/shop/logo.png')}}">
                            </a>
                        </div>

                        <div class="address-text">
                            <ul>
                                <li>{{__('messages.address').': Vojvode Stepe 148, 36000 Kraljevo.'}}</li>
                                <li>{{__('messages.phone.number').': 062 464 406'}}</li>
                                <li>{{__('messages.email').': plastika.draskovic@gmail.com'}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--=======  End of address block  =======-->
                </div>
                <div class="col-lg-2 col-md-6">
                    <!--=======  widget block  =======-->

                    <div class="widget-block">
                        <h4 class="footer-widget-title mb-sm-10">{{__('messages.information')}}</h4>
                        <ul>
                            <li><a href="{{route('show.about')}}">{{__('messages.about.us')}}</a></li>
                            <li><a href="{{route('show.contact')}}">{{__('messages.contact')}}</a></li>
                            <li><a href="{{route('show.shipping.info')}}">{{__('messages.delivery.info')}}</a></li>
                            <li><a href="{{route('show.selling.terms')}}">{{__('messages.selling.terms')}}</a></li>
                        </ul>
                    </div>

                    <!--=======  End of widget block  =======-->
                </div>
                <div class="col-lg-2 col-md-6">
                    <!--=======  widget block  =======-->

                    <div class="widget-block">
                        <h4 class="footer-widget-title mt-sm-20 mb-sm-10">{{__('messages.my.account.big')}}</h4>
                        <ul>
                            <li><a href="{{route('customer.my.account')}}">{{__('messages.my.account')}}</a></li>
                            <li><a href="{{route('show.cart')}}">{{__('messages.cart')}}</a></li>
                            <li><a href="{{route('show.wishlist')}}">{{__('messages.wishlist')}}</a></li>
                            <li><a href="{{route('show.faqs')}}">{{__('messages.faqs')}}</a></li>
                        </ul>
                    </div>

                    <!--=======  End of widget block  =======-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--=======  widget block  =======-->

                    <div class="widget-block">
                        <h4 class="footer-widget-title mt-sm-20 mb-sm-10">{{__('messages.contact.us.big')}}</h4>
                        <p>{{__('messages.contact.info.suggestions')}}</p>

                        <div class="newsletter-form mb-20">
                            <a href="{{route('show.contact')}}">{{__('messages.contact')}}</a>
                        </div>
                    </div>

                    <!--=======  End of widget block  =======-->
                </div>
            </div>
        </div>
    </div>
</div>

@include('webapp.includes.search_overlay')
@include('webapp.includes.product_modal')
@include('webapp.includes.scroll-top')

<script src="{{mix('js/external/external.js')}}" type="text/javascript"></script>
<script src="{{mix('js/webapp/main.js')}}" type="text/javascript"></script>
@stack('scripts')
</body>
</html>
