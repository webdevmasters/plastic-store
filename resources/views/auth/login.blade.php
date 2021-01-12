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
                                <li th:text="#{login.title}">Prijava</li>
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
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                    <!-- Login Form s-->
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title" th:text="#{login.title}">Prijava</h4>
                            <div class="row">
                                @if(session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="col-md-12 col-12 mb-0 invalid-feedback d-block">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <div class="col-md-12 col-12 mb-20">
                                    <label for="name" th:text="#{username}">Korisničko ime</label>
                                    <input id="name" class="mb-0" name="name" placeholder="#{username}" value="{{old('name')}}" type="text" autofocus>
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="password" th:text="#{password}">Šifra</label>
                                    <input id="password" class="mb-0" name="password" placeholder="#{password}" type="password">
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input id="remember-me" name="remember" type="checkbox">
                                        <label for="remember-me" th:text="#{remember.me}">Zapamti me</label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                        <a href="{{ route('password.request') }}" th:text="#{forgot.password}+'?'">Zaboravljena šifra?</a>
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <button class="register-button mt-0" th:text="#{login}" type="submit">Uloguj se</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 5000);
        });
    </script>
@endpush
