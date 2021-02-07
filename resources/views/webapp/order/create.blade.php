@extends('webapp.layouts.main')
@section('content')
    <div class="breadcrumb-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-container">
                        <nav>
                            <ul>
                                <li class="parent-page"><a href="{{url('/')}}">{{__('messages.home')}}</a></li>
                                <li>{{__('messages.order.processing')}}</li>
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
                                        <h4 class="checkout-title">{{__('messages.delivery')}}</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="first_name">{{__('messages.first.name')}}</label>
                                                <input id="first_name" name="first_name" value="{{auth()->check()?$user->first_name:''}}" type="text">
                                                <div id="first_name_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="last_name">{{__('messages.last.name')}}</label>
                                                <input id="last_name" name="last_name" value="{{auth()->check()?$user->last_name:''}}" type="text">
                                                <div id="last_name_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="email">{{__('messages.email')}}</label>
                                                <input id="email" name="email" value="{{auth()->check()?$user->email:''}}" type="email">
                                                <div id="email_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="phone">{{__('messages.phone.number')}}</label>
                                                <input id="phone" name="phone" value="{{auth()->check()?$user->phone:''}}" type="text">
                                                <div id="phone_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-12 mb-20">
                                                <label for="address">{{__('messages.address')}}</label>
                                                <input id="address" name="address" value="{{auth()->check()?$user->address:''}}" type="text">
                                                <div id="address_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>{{__('messages.country')}}</label>
                                                <select class="nice-select" name="country">
                                                    <option value="Srbija">{{__('messages.serbia')}}</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="city">{{__('messages.city')}}</label>
                                                <input id="city" name="city" value="{{auth()->check()?$user->city:''}}" type="text">
                                                <div id="city_error" class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label for="zip_code">{{__('messages.zip.code')}}</label>
                                                <input id="zip_code" name="zip_code" value="{{auth()->check()?$user->zip_code:''}}" type="text">
                                                <div id="zip_code_error" class="invalid-feedback d-block"></div>

                                                <div class="col-12 mt-20">
                                                    <div class="check-box">
                                                        <input id="create_account" type="checkbox">
                                                        <label for="create_account"><a href="{{route('register')}}">{{__('messages.create.account')}}</a></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20" style="display: grid">
                                                <label for="note" style="margin-bottom: 0px;">{{__('messages.note')}}</label>
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
                                            <h4 class="checkout-title">{{__('messages.shopping')}}</h4>
                                            <div class="checkout-cart-total">
                                                <h4>{{__('messages.products')}} <span>{{__('messages.total')}}</span></h4>
                                                <ul>
                                                    @foreach(Cart::getContent() as $item)
                                                        <li class="d-flex justify-content-between">
                                                            <div>{{$item->associatedModel->name.'   x'.$item->quantity}}</div>
                                                            <div>{{$item->price.' RSD'}}</div>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <p>{{__('messages.total')}} <span>{{Cart::getTotal().' RSD'}}</span></p>
                                                <p>{{__('messages.delivery')}}<span>{{Cart::getTotal()>5000?'Kurirska služba (Besplatna dostava)': 'Kurirska služba'}}</span></p>
                                                <h4>{{__('messages.total.price')}}<span>{{Cart::getTotal().' RSD'}}</span></h4>
                                            </div>
                                        </div>

                                        <!-- Payment Method -->
                                        <div class="col-12">
                                            <h4 class="checkout-title">{{__('messages.payment.method')}}</h4>
                                            <div class="checkout-payment-method">
                                                <div class="singled-method">
                                                    <input id="payment_cash" name="payment_method" type="checkbox" value="cash">
                                                    <label for="payment_cash" class="payment_method_label">{{__('messages.cash.on.delivery')}}</label>
                                                    <div id="payment_method_error" class="invalid-feedback d-block"></div>
                                                </div>

                                                <div class="singsle-method">
                                                    <input class="accept_terms" id="accept_terms" name="terms" type="checkbox">
                                                    <label class="terms_label" for="accept_terms"><a href="{{route('show.selling.terms')}}">{{__('messages.accept.terms')}}</a></label>
                                                    <div id="terms_error" class="invalid-feedback d-block"></div>
                                                </div>
                                            </div>
                                            <button class="place-order" type="submit">{{__('messages.confirm.order')}}</button>
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
                                <h3><strong>{{__('messages.empty.cart')}}</strong></h3>
                                <h4>{{__('messages.add.content')}}</h4>
                                <div class="newsletter-form mb-20 mt-30"><a href="{{url('/')}}">{{__('messages.continue.shopping')}}</a></div>
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
                $('.loader-wrap').removeClass('d-none');
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



