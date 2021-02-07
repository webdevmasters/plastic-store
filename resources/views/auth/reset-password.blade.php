{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}

{{--            <!-- Password Reset Token -->--}}
{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                    type="password"--}}
{{--                                    name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}

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
                                <li>{{__('messages.password.reset')}}</li>
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
                                <h2 class="text-center">{{__('messages.password.reset')}}</h2>
                                <div class="panel-body">
                                    <div>
                                        <form method="post" action="{{ route('password.update') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                            @error('token')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-control" id="email" placeholder="{{__('messages.email.address')}}" value="{{old('email')}}" type="email" name="email" required autofocus/>
                                                    @error('email')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-control" id="password" name="password" placeholder="{{__('messages.new.password')}}" type="password" required/>
                                                    @error('password')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="{{__('messages.confirm.password')}}" name="password_confirmation" data-rule-confirm_password="true" data-rule-equalTo="#password" id="confirm_password" type="password" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-success" type="submit">{{__('messages.reset.password')}}
                                                </button>
                                            </div>
                                        </form>

                                    </div>
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
