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
                                <li th:text="#{registration}">Registracija</li>
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
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <form id="registration_form" method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title" th:text="#{registration}">Registracija</h4>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label for="name1" th:text="#{first.name}">Ime</label>
                                    <input class="mb-0" id="name1" name="first_name" value="{{old('first_name')}}" type="text">
                                    @error('first_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label for="name2" th:text="#{last.name}">Prezime</label>
                                    <input class="mb-0" id="name2" name="last_name" value="{{old('last_name')}}" type="text">
                                    @error('last_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label for="email" th:text="#{email}">Mejl adresa*</label>
                                    <input class="mb-0" id="email" name="email" value="{{old('email')}}" type="email">
                                    @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label for="name" th:text="#{username}">Korisničko ime*</label>
                                    <input class="mb-0" id="name" name="name" value="{{old('name')}}" type="text" autofocus>
                                    @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label for="password" th:text="#{password}">Šifra</label>
                                    <input class="mb-0" id="password" name="password" type="password">
                                    @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label for="password_confirmation" th:text="#{confirm.password}">Potvrdi šifru</label>
                                    <input class="mb-0" id="password_confirmation" name="password_confirmation" type="password">
                                    @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <button class="register-button mt-0" th:text="#{register}" type="submit">Registruj se</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
