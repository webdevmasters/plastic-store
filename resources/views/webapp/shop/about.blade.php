@extends('webapp.layouts.main')
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
                                <li>{{__('messages.about.us')}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!-- About Section Start -->
    <div class="about-section mb-50">
        <div class="container">

            <div class="row row-30">

                <!-- About Image -->
                <div class="about-image col-lg-6 mb-50">
                    <img alt="" src="{{asset('static/images/banners/aboutus.png')}}" >
                </div>

                <!-- About Content -->
                <div class="about-content col-lg-6">
                    <div class="row">
                        <div class="col-12 mb-50">
                            <h1>{{__('messages.welcome.to.ecommerce')}}<span>{{__('messages.store.name')}}</span></h1>
                            <p>Mi smo nova internet prodavnica koja ima za cilj prodaju plastike. Cilj nam je da naše
                                kvalitetne proizvode isporučimo u najkraćem mogućem roku, jer nam je najvažnije zadovoljstvo
                                kupca. Naši proizvodi su odličnog kvaliteta i proizvedeni su u Srbiji, a proizvođači su
                                Drina, Pobeda, Megaplast, Miškone, Sanja Ippi, Bigplast, Immos Plast i drugi...
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mission, Vission & Goal -->
            <div class="about-mission-vission-goal row row-20 mb-30">

                <div class="col-lg-4 col-md-6 col-12 mb-sm-30">
                    <h3>{{__('messages.our.vision')}}</h3>
                    <p>{{__('messages.vision.info')}}</p>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-sm-30">
                    <h3>{{__('messages.our.mission')}}</h3>
                    <p>{{__('messages.mission.info')}}</p>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-sm-0">
                    <h3>{{__('messages.our.goal')}}</h3>
                    <p>{{__('messages.goal.info')}}</p>
                </div>
            </div>

            <div class="row row-10 mb-50">

                <!-- Banner -->
                <div class="col-md-4 mb-sm-30">
                    <div class="single-banner">
                        <a href="#"><img alt="" src="{{asset('static/images/banners/vision.png')}}"></a>
                    </div>
                </div>
                <div class="col-md-4 col-12 mb-sm-30">
                    <div class="single-banner">
                        <a href="#"><img alt="" src="{{asset('static/images/banners/mission.png')}}"></a>
                    </div>
                </div>
                <div class="col-md-4 col-12 mb-sm-00">
                    <div class="single-banner">
                        <a href="#"><img alt="" src="{{asset('static/images/banners/goal.png')}}"></a>
                    </div>
                </div>
            </div>

            <div class="row mb-30">
                <!-- About Feature -->
                <div class="about-feature col-md-7 col-12 mb-sm-30">
                    <div class="row pt-100" >

                        <div class="col-md-6 col-12 mb-30">
                            <h4>{{__('messages.fast.delivery')}}</h4>
                            <p>{{__('messages.fast.delivery.info')}}</p>
                        </div>

                        <div class="col-md-6 col-12 mb-30">
                            <h4>{{__('messages.products.quality')}}</h4>
                            <p>{{__('messages.products.quality.info')}}</p>
                        </div>

                        <div class="col-md-6 col-12 mb-30">
                            <h4>{{__('messages.order.tracking')}}</h4>
                            <p>{{__('messages.order.tracking.info')}}</p>
                        </div>

                        <div class="col-md-6 col-12 mb-30 mb-sm-0">
                            <h4>{{__('messages.support.24.7')}}</h4>
                            <p>{{__('messages.support.24.7.info')}}</p>
                        </div>

                    </div>
                </div>

                <!-- About Feature Banner -->
                <div class="about-feature-banner col-md-5 col-12">
                    <div class="single-banner"><a href="#"><img alt="" src="{{asset('static/images/banners/delivery-quality_tracking_support.png')}}"></a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
