@extends('webapp.layouts.main')
@section('content')
    <div class="breadcrumb-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-container">
                        <nav>
                            <ul>
                                <li class="parent-page"><a href="{{url('/')}}" th:text="#{home}">Početna</a></li>
                                <li th:text="#{order.processing}">Obrada porudžbine</li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if(Cart::getContent()->count()>0)
        <div class="page-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Form s-->
                        <form class="checkout-form" id="checkout-form-validation" method="post" action="{{route('place.order')}}">
                            <div class="row row-40">
                                <div class="col-lg-7 mb-20">
                                    <!-- Billing Address -->
                                    <div class="mb-40" id="billing-form">
                                        <h4 class="checkout-title" th:text="#{delivery}">ISPORUKA</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="first_name" th:text="#{first.name}">Ime*</label>
                                                <input id="first_name" name="first_name" value="{{auth()->check()?$user->first_name:''}}" type="text">
                                                <div id="first_name_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="last_name" th:text="#{last.name}">Prezime*</label>
                                                <input id="last_name" name="last_name" value="{{auth()->check()?$user->last_name:''}}" type="text">
                                                <div id="last_name_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="email" th:text="#{email}">Email*</label>
                                                <input id="email" name="email" value="{{auth()->check()?$user->email:''}}" type="email">
                                                <div id="email_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="phone" th:text="#{phone.number}">Telefon*</label>
                                                <input id="phone" name="phone" value="{{auth()->check()?$user->phone:''}}" type="text">
                                                <div id="phone_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-12 mb-20">
                                                <label for="address" th:text="#{address}">Adresa*</label>
                                                <input id="address" name="address" value="{{auth()->check()?$user->address:''}}" type="text">
                                                <div id="address_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Država*</label>
                                                <select class="nice-select" name="country">
                                                    <option th:text="#{serbia}" value="Srbija">Srbija</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="city" th:text="#{city}">Grad*</label>
                                                <input id="city" name="city" value="{{auth()->check()?$user->city:''}}" type="text">
                                                <div id="city_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="zip_code" th:text="#{zip.code}">Poštanski broj*</label>
                                                <input id="zip_code" name="zip_code" value="{{auth()->check()?$user->zip_code:''}}" type="text">
                                                <div id="zip_code_error" class="invalid-feedback d-block"></div>

                                                <div class="col-12 mt-20">
                                                    <div class="check-box">
                                                        <input id="create_account" type="checkbox">
                                                        <label for="create_account"><a href="{{route('register')}}" th:text="#{create.account}">Kreiraj nalog?</a></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20" style="display: grid">
                                                <label for="note" style="margin-bottom: 0px;" th:text="#{note}">Napomena</label>
                                                <textarea id="note" name="note" style="height: 100px; resize: none;"></textarea>
                                                <div id="note_error" class="invalid-feedback d-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="row">
                                        <!-- Cart Total -->
                                        <div class="col-12 mb-60">
                                            <h4 class="checkout-title" th:text="#{shopping}">Kupovina</h4>
                                            <div class="checkout-cart-total">
                                                <h4 th:text="#{products}">Proizvodi <span th:text="#{total}">Ukupno</span></h4>
                                                <ul>
                                                    @foreach(Cart::getContent() as $item)
                                                        <li class="d-flex justify-content-between">
                                                            <div>{{$item->associatedModel->name.'   x'.$item->quantity}}</div>
                                                            <div>{{$item->price.' RSD'}}</div>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <p th:text="#{total}">Ukupno <span>{{Cart::getTotal().' RSD'}}</span></p>
                                                <p th:text="#{delivery}">Dostava<span>{{Cart::getTotal()>5000?'Kurirska služba (Besplatna dostava)': 'Kurirska služba'}}</span></p>
                                                <h4 th:text="#{total.price}">Ukupan iznos za uplatu<span>{{Cart::getTotal().' RSD'}}</span></h4>
                                            </div>
                                        </div>

                                        <!-- Payment Method -->
                                        <div class="col-12">
                                            <h4 class="checkout-title" th:text="#{payment.method}">Izaberite način plaćanja</h4>
                                            <div class="checkout-payment-method">
                                                <div class="singled-method">
                                                    <input id="payment_cash" name="payment_method" type="checkbox" value="cash">
                                                    <label for="payment_cash" class="payment_method_label" th:text="#{cash.on.delivery}">Plaćanje prilikom preuzimanja</label>
                                                    <div id="payment_method_error" class="invalid-feedback d-block"></div>
                                                </div>

                                                <div class="singsle-method">
                                                    <input class="accept_terms" id="accept_terms" name="terms" type="checkbox">
                                                    <label class="terms_label" for="accept_terms"><a th:href="@{/selling_terms}" th:text="#{accept.terms}">Prihvatam uslove kupovine</a></label>
                                                    <div id="terms_error" class="invalid-feedback d-block"></div>
                                                </div>
                                            </div>
                                            <button class="place-order" th:text="#{confirm.order}" type="submit">Potvrdi kupovinu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center">
                                <img class="img-fluid" height="300" style="background: transparent" src="{{asset('static/images/shop/empty-cart.png')}}" width="300">
                                <h3 th:text="#{empty.cart}"><strong>Vaša korpa je trenutno prazna</strong></h3>
                                <h4 th:text="#{add.content}">Dodajte nešto kako biste videli sadržaj :)</h4>
                                <div class="newsletter-form mb-20 mt-30"><a href="{{url('/')}}" th:text="#{continue.shopping}">Nastavi kupovinu</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="loader-wrap d-none">
        <div class="loader">
            <div class="holder">
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('.loader').attr('data-after', 'Vaša porudžbina se obrađuje, molimo sačekajte...');
            $("#checkout-form-validation").submit(function (e) {
                $('.loader-wrap').show();
                e.preventDefault();

                var form = $(this);
                $.ajax({
                    type: "POST",
                    url: "{{route('place.order')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: form.serialize(),
                    success: function (order_id) {
                        $('.loader-wrap').addClass('d-none');
                        window.location = '{{url('/order/order_confirmation')}}' + '/' + order_id;
                    },
                    error: function (reject) {
                        if (reject.status === 422) {
                            $(".invalid-feedback").removeClass('d-block');
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                $("#" + key + "_error").addClass('d-block');
                                $("#" + key + "_error").text(val[0]);
                            });
                        } else if (reject.status === 419) {
                            bootbox.alert({
                                message: "Vaša sesija je istekla molimo Vas dodajte artikle ponovo u vašu korpu",
                                callback: function () {
                                    window.location.reload();
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush



