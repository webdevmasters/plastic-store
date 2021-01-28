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
                        <p th:text="#{free.shipping.info}"><i class="icon ion-md-alarm"></i> Besplatna dostava za porudžbine preko 5000 din. -
                            <span class="support-no" th:text="#{support.number}">Podrška: 062 464 406</span>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!--=======  header top dropdowns  =======-->
                    <div class="header-top-dropdown d-flex justify-content-center justify-content-lg-end">
                        <div class="single-dropdown">
                            <span class="d-none d-sm-inline-block" th:text="#{language}+': '">Language:</span>
                            <a href="#" id="changeLanguage">
                                <span id="languageName" th:text="${lang=='en'}? #{english}:#{serbian}" th:with="lang=${#locale.language}">English <i class="fa fa-angle-down"></i></span>
                            </a>
                            <div class="language-currency-list hidden" id="languageList">
                                <ul>
                                    <li class="eng"><a href="?lang=en" th:text="#{english}">English</a></li>
                                    <li class="srb"><a href="?lang=sr" th:text="#{serbian}">Serbian</a></li>
                                </ul>
                            </div>
                        </div>

                        <span class="separator pl-15 pr-15">|</span>

                        <!--=======  single dropdown  =======-->
                        @if (Route::has('login'))
                            @guest()
                                <a href="{{route('login')}}" th:text="#{login}">Prjavi se </a>
                                @if (Route::has('register'))
                                    <span> / </span>
                                    <a href="{{route('register')}}" th:text="#{register}">Registruj se</a>
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
                                            <li><a href="{{route('show.cart')}}" th:text="#{cart}">Korpa</a></li>
                                            <li><a href="{{route('show.wishlist')}}" th:text="#{wishlist}">Lista želja</a></li>
                                            <li><a href="{{route('customer.my.account')}}" th:text="#{my.account}">Moj nalog</a></li>
                                            @can('manage-customers')
                                                <li><a href="{{route('admin.products.index')}}" th:text="#{administration}">Administracija</a></li>
                                            @endcan
                                            <li>
                                                <a th:text="#{logout}" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odjavi se</a>
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
                    <a href="{{url('/')}}">
                        <img alt="" class="img-fluid" src="{{'static/images/shop/logo.png'}}">
                    </a>
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
                                                <li>
                                                    <a href="{{route('products.by.subcategory',$subcategory)}}">{{$subcategory->name}}</a>
                                                </li>
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
                            <input id="search" name="search" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Unesite reč pretrage')" required
                                   placeholder="#{search.products}+' ...'" value="{{isset($search)?$search:''}}" type="search">
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
                                <li th:text="#{address}+': Vojvode Stepe 148, 36000 Kraljevo.'">Adresa: Vojvode Stepe 148, 36000 Kraljevo.</li>
                                <li th:text="#{phone.number}+': 062 464 406'">Telefon: 062 464 406</li>
                                <li th:text="#{email}+' : plastika.draskovic@gmail.com'">Email: plastika.draskovic@gmail.com
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--=======  End of address block  =======-->
                </div>
                <div class="col-lg-2 col-md-6">
                    <!--=======  widget block  =======-->

                    <div class="widget-block">
                        <h4 class="footer-widget-title mb-sm-10" th:text="#{information}">INFORMACIJE</h4>
                        <ul>
                            <li><a href="{{route('show.about')}}" th:text="#{about.us}">O nama</a></li>
                            <li><a href="{{route('show.contact')}}" th:text="#{contact}">Kontakt</a></li>
                            <li><a href="{{route('show.shipping.info')}}" th:text="#{delivery.info}">Informacije o dostavi</a></li>
                            <li><a href="{{route('show.selling.terms')}}" th:text="#{selling.terms}">Uslovi kupovine</a></li>
                        </ul>
                    </div>

                    <!--=======  End of widget block  =======-->
                </div>
                <div class="col-lg-2 col-md-6">
                    <!--=======  widget block  =======-->

                    <div class="widget-block">
                        <h4 class="footer-widget-title mt-sm-20 mb-sm-10" th:text="#{my.account.big}">MOJ NALOG</h4>
                        <ul>
                            <li><a href="{{route('customer.my.account')}}" th:text="#{my.account}">Moj nalog</a></li>
                            <li><a href="{{route('show.cart')}}" th:text="#{cart}">Korpa</a></li>
                            <li><a href="{{route('show.wishlist')}}" th:text="#{wishlist}">Lista želja</a></li>
                            <li><a href="{{route('show.faqs')}}" th:text="#{faqs}">Česta pitanja</a></li>
                        </ul>
                    </div>

                    <!--=======  End of widget block  =======-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--=======  widget block  =======-->

                    <div class="widget-block">
                        <h4 class="footer-widget-title mt-sm-20 mb-sm-10" th:text="#{contact.us.big}">KONTAKTIRAJTE NAS </h4>
                        <p th:text="#{contact.info.suggestions}">Kontaktirajte nas kako biste imali najnovije informacije o proizvodima ili predloge kako bismo usavršili naš sajt.</p>

                        <div class="newsletter-form mb-20">
                            <a href="{{route('show.contact')}}" th:text="#{contact}">Kontakt</a>
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
