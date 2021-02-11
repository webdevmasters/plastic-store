@extends('webapp.layouts.main')
@section('title','Kontakt')
@section('content')
    <div class="breadcrumb-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb container  =======-->

                    <div class="breadcrumb-container">
                        <nav>
                            <ul>
                                <li class="parent-page"><a href="{{url('/')}}" >{{__('messages.home')}}</a></li>
                                <li >{{__('messages.contact')}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>
    <div class="page-content mb-5">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-12 mb-sm-45 order-1 order-lg-2 mb-md-45">
                    <!--=======  contact page side content  =======-->

                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title" >{{__('messages.contact')}}</h3>
                        <p class="contact-page-message mb-30">{{__('messages.contact.info')}}</p>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> {{__('messages.address')}}</h4>
                            <p>Vojvode Stepe 148, 36000, Kraljevo</p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> {{__('messages.phone.number')}}</h4>
                            <p>Mob. - 062 464 406</p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-envelope-o" ></i> {{__('messages.email')}}</h4>
                            <p>plastika.draskovic@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                    <!--=======  contact form content  =======-->
                    @if(session('message'))
                        <div class="contact-form-content">
                            <p style="text-align: center; font-size: 25px;font-weight: bold;padding-top: 200px;">{{session('message')}}</p>
                        </div>
                    @else
                        <div class="contact-form-content">
                            <h3 class="contact-page-title" >{{__('messages.ask.us')}}</h3>

                            <div class="contact-form">
                                <form id="contact-form" method="post" action="{{route('send.message')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" >{{__('messages.name')}} <span class="required">*</span></label>
                                        <input id="name" name="name" value="{{auth()->check()?Auth::user()->first_name:old('name')}}" type="text">
                                        @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email" >{{__('messages.email')}} <span class="required">*</span></label>
                                        <input id="email" name="email"  value="{{auth()->check()?Auth::user()->email:old('email')}}" type="email">
                                        @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="subject" >{{__('messages.title')}} <span class="required">*</span></label>
                                        <input id="subject" name="subject" value="{{old('subject')}}" type="text">
                                        @error('subject')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="message" >{{__('messages.message')}} <span class="required">*</span></label>
                                        <textarea id="message" name="message" value="{{old('message')}}" style="line-height: 2"></textarea>
                                        @error('message')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <button class="fl-btn" id="submit" name="submit" type="submit" value="submit">{{__('messages.send')}}</button>
                                    </div>
                                </form>
                            </div>
                            <p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
