@extends('webapp.layouts.main')
@section('title','Zaboravljena šifra')
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
                                <li >{{__('messages.forgot.password')}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>
    <div class="page-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30" style="margin: auto;">
                    <div class="panel panel-default text-center">
                        <div class="panel-body " style="width: 80%;">
                            <div class="text-center">
                                <h3><i class="glyphicon glyphicon-lock" style="font-size:2em;"></i></h3>
                                <h2 class="text-center">{{__('messages.forgot.password').'?'}}</h2>
                                <p>{{__('messages.forgot.password.mail')}}</p>
                                <div class="panel-body" style="width: 60%;margin: auto;">
                                    @if(session('status'))
                                        <div class="alert alert-info">{{ session('status') }}</div>
                                    @endif
                                    <form method="post" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="input-group" style="display: inline-flex;">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input class="form-control" id="email" placeholder="{{__('messages.email.address')}}" value="{{old('email')}}" type="email" name="email"/>
                                            @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-block" type="submit">{{__('messages.reset.password')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Route::has('login'))
                        @guest()
                            @if (Route::has('register'))
                                <div class="col-md-5 float-left">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">{{__('messages.new.customer').'?'}}
                                        <a href="{{route('register')}}">{{__('messages.register')}}</a>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-5 mt-10 mb-20 text-left d-inline-block">{{__('messages.already.registered').'?'}}
                                <a href="{{route('login')}}">{{__('messages.login')}}</a>
                            </div>
                        @endguest
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
