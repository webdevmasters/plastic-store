@extends('admin.layouts.master')
@section('title','Detalji kupca')
@section('content')
    <div class="container c1691">
        <div class="row c1859">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-4 col-12 c1867">
                <h4 data-type="header" id="ibxf1lw">{{'Kupac - '.$order->first_name.' '.$order->last_name}}</h4>
                <hr>
                <form enctype="multipart/form-data" id="i10l" method="post" name="form">
                    <div class="form-group row"><label class="col-sm-3 col-form-label" for="password">Ime :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="password" value="{{$order->first_name}}" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-3 col-form-label" for="name">Prezime :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="name" value="{{$order->last_name}}" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-3 col-form-label" for="email">Email :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="email" value="{{$order->email}}" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-3 col-form-label" for="phone">Telefon :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="phone" value="{{$order->phone}}" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-3 col-form-label" for="address">Adresa :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="address" value="{{$order->address}}" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-3 col-form-label" for="zipcode">Poštanski broj :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="zipcode" value="{{$order->zip_code}}" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-3 col-form-label" for="city">Grad :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="city" value="{{$order->city}}" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-3 col-form-label" for="country">Država :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="country" value="{{$order->country}}" type="text"/>
                        </div>
                    </div>
                    <br>
                    <div class="row c60069">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 c60086">
                            <a class="btn btn-primary" id="btn-return" href="{{route('admin.orders.index')}}">Nazad</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
