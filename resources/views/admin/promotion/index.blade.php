@extends('admin.layouts.master')
@section('title','Promocije')

@section('content')
    <div class="container">
        <h4 data-type="header" id="header">PRIKAZ PROMOCIJA </h4>
        <hr>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="row" id="category1">
            <div class="col-md-12 col-lg-12 col-xl-12 offset-md-0" id="rightColumn">
                <div class="row c60069">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 c60086">
                        <a class="btn btn-primary" id="btn-return" href="{{route('admin.promotions.create')}}">Unesite promociju</a>
                    </div>
                </div>
                <br>
                <table class="table table-striped table-bordered table-hover" id="promotions_table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kategorija</th>
                        <th>Proizvod</th>
                        <th>Opcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promotions as $promotion)
                        <tr>
                            <td data-id="${promotion.id}">{{$promotion->id}}</td>
                            <td style="text-align: center">{{$promotion->category->name}}</td>
                            <td style="text-align: center"><a style="color:black;" href="{{route('admin.products.edit',$promotion->product)}}">{{{$promotion->product->name}}}</a></td>
                            <td style="text-align: center">
                                <a class="btn btn-warning btn-sm" href="{{route('admin.promotions.edit',$promotion->id)}}"><i class="fa fa-edit"></i></a>
                                <form class="d-lg-inline-block" action="{{ route('admin.promotions.destroy',$promotion->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </form>

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
