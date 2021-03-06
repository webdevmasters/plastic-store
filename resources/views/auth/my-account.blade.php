@extends('webapp.layouts.main')
@section('title','Moj nalog')
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
                                <li>{{__('messages.my.account')}}</li>
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
                <div class="col-12">
                    <div class="row">
                        <!-- My Account Tab Menu Start -->
                        <div class="col-lg-3 col-12">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a data-toggle="tab" href="#dashboard" id="dashboard_link">
                                    <i class=" fa fa-dashboard"></i>{{__('messages.dashboard')}}</a>
                                <a data-toggle="tab" href="#orders" id="orders_link">
                                    <i class="fa fa-cart-arrow-down"></i>{{__('messages.my.orders')}}</a>
                                <a data-toggle="tab" href="#wishlist">
                                    <i class="fa fa-cart-arrow-down"></i>{{__('messages.wishlist')}}</a>
                                <a data-toggle="tab" href="#account-info">
                                    <i class="fa fa-user"></i>{{__('messages.userdata')}}</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>{{__('messages.logout')}}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-12">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>{{__('messages.dashboard')}}</h3>
                                        <div class="welcome mb-20">
                                            <p style="font-weight: bold">{{__('messages.hello').' '.$user->name}}</p>
                                        </div>
                                        <p class="mb-0">{{__('messages.dashboard.info')}}</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                    @if(Wishlist::getContent()->count()>0)
                                        <div class="myaccount-content">
                                            <h3>{{__('messages.wishlist')}}</h3>

                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>{{__('messages.picture')}}</th>
                                                        <th>{{__('messages.name')}}</th>
                                                        <th>{{__('messages.size')}}</th>
                                                        <th>{{__('messages.price')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(Wishlist::getContent() as $item)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td class="pro-thumbnail">
                                                                <a href="{{route('single.product.by.id',$item->associatedModel)}}">
                                                                    @foreach($item->associatedModel->images as $image)
                                                                        <img alt="" style="width: 64px; height: 64px;" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                                                                        @if($loop->index==0)@break @endif
                                                                    @endforeach</a>
                                                            </td>
                                                            <td class="pro-title"><a href="{{route('single.product.by.id',$item->associatedModel)}}">{{$item->associatedModel->name}}</a></td>
                                                            <td class="pro-quantity {{$item->associatedModel->id}}">
                                                                <select>
                                                                    @foreach($item->associatedModel->sizes as $size)
                                                                        <option value="{{$item->associatedModel->prices->pluck('value')->all()[$loop->index]}}">{{$size->value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td class="pro-price">
                                                                <span id="{{$item->associatedModel->id}}">{{$item->associatedModel->minPrice().' - '.$item->associatedModel->maxPrice().' RSD'}}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @else
                                        <div class="myaccount-content">
                                            <p style="text-align: center;font-weight: bold;font-size: 22px;">{{__('messages.wishlist.empty')}}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    @if(count($user->orders)>0)
                                        <div class="myaccount-content">
                                            <h3>{{__('messages.orders')}}</h3>

                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>{{__('messages.date.created')}}</th>
                                                        <th>Status</th>
                                                        <th>{{__('messages.total')}}</th>
                                                        <th>{{__('messages.view')}}</th>
                                                        <th>{{__('messages.option')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($user->orders as $order)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>{{ \Carbon\Carbon::parse($order->date_updated)->format('d/m/Y')}}</td>
                                                            <td>{{$order->status}}</td>
                                                            <td>{{$order->total.' RSD'}}</td>
                                                            <td><a class="btn" href="{{route('order.details',$order->id)}}">{{__('messages.details')}}</a></td>
                                                            @if($order->status=='ORDERED')
                                                                <td><a class="btn btn-danger btn-sm" href="#" onclick=showWarningDialog("{{$order->id}}")><i class="fa fa-times"></i></a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @else
                                        <div class="myaccount-content">
                                            <p style="text-align: center;font-weight: bold;font-size: 22px;">{{__('messages.orders.empty')}}</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>{{__('messages.userdata')}}</h3>

                                        <div class="account-details-form">
                                            <form id="account_form" action="{{route('customer.update',auth()->id())}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <label for="first_name">{{__('messages.first.name')}}</label>
                                                        <input id="first_name" name="first_name" value="{{$user->first_name}}" type="text">
                                                        @error('first_name')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <label for="last-name">{{__('messages.last.name')}}</label>
                                                        <input id="last-name" name="last_name" type="text" value="{{$user->last_name}}">
                                                        @error('last_name')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <label for="phone-number">{{__('messages.phone.number')}}</label>
                                                        <input id="phone-number" name="phone" type="text" value="{{$user->phone}}">
                                                        @error('phone')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <label for="address">{{__('messages.address')}}</label>
                                                        <input id="address" name="address" type="text" value="{{$user->address}}">
                                                        @error('address')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <label for="city">{{__('messages.city')}}</label>
                                                        <input id="city" name="city" type="text" value="{{$user->city}}">
                                                        @error('city')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <label for="zip-code">{{__('messages.zip.code')}}</label>
                                                        <input id="zip-code" name="zip_code" type="text" value="{{$user->zip_code}}">
                                                        @error('zip_code')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="col-12 mb-30">
                                                        <label for="email">{{__('messages.email')}}</label>
                                                        <input id="email" name="email" type="email" value="{{$user->email}}" readonly>
                                                        @error('email')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="col-12 mb-30">
                                                        <label for="display-name">{{__('messages.username')}}</label>
                                                        <input id="display-name" placeholder="{{__('messages.username')}}" name="name" type="text" value="{{$user->name}}" readonly>
                                                        @error('name')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="save-change-btn" type="submit">{{__('messages.save')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @if(session('message'))
                                    <div class="alert alert-success">{{ session('message') }}</div>
                                @endif
                            </div>
                        </div>
                        <!-- My Account Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var active_tab = 'user_panel';
            @if(isset($active_tab))
                active_tab = @json($active_tab);
            @endif
            $('.pro-quantity select').on('change', function () {
                var price = this.value;
                var id = $(this).parent().attr('class').split(' ')[1];
                $('span#' + id + '').text(price + ' RSD');
            });

            if (active_tab === 'orders_panel') {
                $('#orders_link').click();
            } else $('#dashboard_link').click();

            $('.pro-quantity select').trigger("change");

            //automatsko zatvaranje bootrstap popup-a
            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 5000);
        });

        function showWarningDialog(orderID) {
            bootbox.dialog({
                title: 'Upozorenje!',
                message: 'Da li želite da otkažete porudžbinu?',
                size: 'medium',
                onEscape: false,
                buttons: {
                    ok: {
                        label: "Potvrdi",
                        className: 'btn-success',
                        callback: function () {
                            window.location = '{{url('/order/cancel_order')}}' + '/' + orderID;
                        }
                    },
                    cancel: {
                        label: "Odustani",
                        className: 'btn-danger',
                        callback: function () {
                        }
                    }
                }
            });
        }
    </script>
@endpush
