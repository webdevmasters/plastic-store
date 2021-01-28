@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <h4 data-type="header" id="header">{{'Porudzbina '.$order->order_number}}</h4>
        <hr>
        <div class="row" id="category1">
            <div class="col-md-12 col-lg-12 col-xl-12 offset-md-0" id="rightColumn">
                <table class="table table-striped table-bordered table-hover" id="orders_table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Proizvod</th>
                        <th>Slika</th>
                        <th>Boja</th>
                        <th>Veličina</th>
                        <th>Cena</th>
                        <th>Količina</th>
                        <th>Ukupno</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items()->get() as $item)
                        <tr>
                            <td><a style="color: black" href="{{route('admin.products.edit',$item->product)}}">{{$item->product->name}}</a></td>
                            <td style="text-align: center"><a href="{{route('admin.products.edit',$item->product)}}">
                                    @foreach($item->product->images as $image)
                                        <img alt="" style="width: 32px; height: 32px;" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                                        @if($loop->index==0)@break @endif
                                    @endforeach</a></td>
                            <td style="text-align: center"><span style="display: inline-block;'">{{$item->color_name}}</span></td>
                            <td style="text-align: center"><span>{{$item->size}}</span></td>
                            <td style="text-align: center"><span>{{$item->price.' RSD'}}</span></td>
                            <td style="text-align: center"><span>{{$item->quantity}}</span></td>
                            <td style="text-align: center"><span>{{$item->price*$item->quantity.' RSD'}}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
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
                <br>
                <div class="row c60069">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 c60086">
                        <a class="btn btn-primary" id="btn-return" href="{{route('admin.orders.index')}}">Nazad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

