{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}


    <!DOCTYPE html>
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
                                <li class="parent-page"><a href="{{url('/')}}" th:text="#{home}">Početna</a></li>
                                <li th:text="#{forgot.password}">Zaboravljena šifra</li>
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
                                <h2 class="text-center" th:text="#{forgot.password}+'?'">Zaboravljena šifra?</h2>
                                <p th:text="#{forgot.password.mail}">Unesite vaš email kako bi smo Vam poslali link za resetovanje šifre.</p>
                                <div class="panel-body" style="width: 60%;margin: auto;">
                                    @if(session('status'))
                                        <div class="alert alert-info">{{ session('status') }}</div>
                                    @endif
                                    <form method="post" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="input-group" style="display: inline-flex;">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input class="form-control" id="email" th:placeholder="#{email.address}" value="{{old('email')}}" type="email" name="email"/>
                                            @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-block" th:text="#{reset.password}" type="submit">Resetuj šifru</button>
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
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10" th:text="#{new.customer}+'?'">Novi korisnik?
                                        <a href="{{route('register')}}" th:text="#{register}">Registruj se</a>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-5 mt-10 mb-20 text-left d-inline-block" th:text="#{already.registered}+'?'">Već registrovan?
                                <a href="{{route('login')}}" th:text="#{login}">Prijavi se</a>
                            </div>
                        @endguest
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
