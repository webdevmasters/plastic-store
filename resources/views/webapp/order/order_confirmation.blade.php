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
                            <li>{{__('messages.order.confirmation')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-page-content mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2">
                <p style="font-weight: bold; font-size: 20px">{{__('messages.order.accepted')}}</p>
                <p style="font-weight: bold; font-size: 16px">{{__('messages.order.thanks')}}</p>
                <p style="font-weight: bold; font-size: 16px">{{ __('messages.order.number.confirmation').': '.$order->order_number}}</p>
                <p style="font-weight: normal; font-size: 14px">{{__('messages.order.email.received')}}</p>
                <div class="order-summary-button">
                    <a href="{{url('/')}}"><button class="checkout-btn">{{__('messages.continue.shopping')}}</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var order_id=@json($order->id);
            //zabrama klika na dugme back na browseru
            history.pushState(null, null, `{{ url('/order/order_confirmation') }}`+'/'+order_id);
            window.addEventListener('popstate', function () {
                history.pushState(null, null, `{{ url('/order/order_confirmation') }}`+'/'+order_id);
            });
        });
    </script>
@endpush

