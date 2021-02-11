@extends('admin.layouts.master')
@section('title','Porudžbine')

@section('content')
    <div class="container">
        <h4 data-type="header" id="header">PRIKAZ PORUDŽBINA </h4>
        <hr>
        <div class="row" id="category1">
            <div class="col-md-12 col-lg-12 col-xl-12 offset-md-0" id="rightColumn">
                <table class="table table-striped table-bordered table-hover" id="orders_table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kupac</th>
                        <th>Ukupno</th>
                        <th>Status</th>
                        <th>Datum</th>
                        <th>Opcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->order_number}}</td>
                            @if($order->user!=null)
                                <td style="text-align: center"><a style="color: black" href="{{route('admin.orders.customer.details',$order->id)}}">{{$order->user->name}}</a></td>
                            @else
                                <td style="text-align: center"><a style="color: black" href="{{route('admin.orders.customer.details',$order->id)}}">{{$order->first_name.' '.$order->last_name}}</a></td>
                            @endif
                            <td style="text-align: center">{{$order->total.' RSD'}}</td>
                            <td style="text-align: center">{{$order->status}}</td>
                            <td style="text-align: center">{{\Carbon\Carbon::parse($order->date_updated)->format('d/m/Y')}}</td>
                            <td style="text-align: center">
                                @if($order->note!=null)
                                    <a class="btn btn-warning btn-sm" href="#" onclick=showInfoDialog(this.getAttribute('data-message')) data-message="{{$order->note}}"><i class="fa fa-comment-o"></i></a>
                                @endif
                                <a class="btn btn-info btn-sm" href="{{route('admin.orders.show',$order->id)}}"><i class="fa fa-bars"></i></a>
                                @if($order->status=='ORDERED')
                                    <a class="btn btn-success btn-sm" href="#" onclick=showConfirmDialog("{{$order->id}}")><i class="fa fa-check"></i></a>
                                @endif
                                <a class="btn btn-danger btn-sm" href="#" onclick=showWarningDialog("{{$order->id}}")><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="gutter">
                            <div class="line number1 index0 alt2" style="display: none;">1</div>
                        </td>
                        <td class="code">
                            <div class="container" style="display: none;">
                                <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
            $('.loader-wrap').addClass('d-none');
        });

        function showWarningDialog(orderID) {
            bootbox.dialog({
                title: 'Upozorenje!',
                message: 'Da li želite da obrišete porudžbinu?',
                size: 'medium',
                onEscape: false,
                buttons: {
                    ok: {
                        label: "Potvrdi",
                        className: 'btn-success',
                        callback: function () {
                            window.location = '{{url('admin/orders/delete_order')}}' + '/' + orderID;
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

        function showInfoDialog(message) {
            bootbox.alert({
                size: "medium",
                title: "Napomena!",
                message: message,
                callback: function () {
                }
            })
        }

        function showConfirmDialog(orderID) {
            bootbox.dialog({
                title: 'Obaveštenje!',
                message: 'Da li želite da potvrdite porudžbinu?',
                size: 'medium',
                onEscape: false,
                buttons: {
                    ok: {
                        label: "Potvrdi",
                        className: 'btn-success',
                        callback: function () {
                            $('.loader').attr('data-after', 'Potvrda porudžbine u toku, molimo sačekajte...');
                            $('.loader-wrap').show();
                            $('.loader-wrap').removeClass('d-none');
                            window.location = '{{url('admin/orders/confirm_order')}}' + '/' + orderID;
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
