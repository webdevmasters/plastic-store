@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <h4 data-type="header" id="header">PRIKAZ PROIZVODA </h4>
        <hr>
        <div>
            <ul class="list-group text-center" style="display: ruby">
                <li class="list-group-item" id="allProducts" style="width: 150px"><a><span>Svi proizvodi</span></a></li>
                @foreach($categories as $category)
                    <li class="list-group-item" style="width: 150px"><a><span>{{$category->name}}</span></a></li>
                @endforeach
            </ul>
            <div class="newProduct">
                <a href="{{route('admin.products.create')}}"><button  class="btn btn-primary" type="button">Unesi proizvod</button></a>
            </div>
        </div>
        <div class="row" id="category1">
            <div class="col-md-12 col-lg-12 col-xl-12 offset-md-0" id="rightColumn">
                <table class="table table-striped table-bordered table-hover" id="products_table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Šifra</th>
                        <th>Naziv</th>
                        <th>Veličine</th>
                        <th>Cene</th>
                        <th>Stanje</th>
                        <th>Akcija</th>
                        <th>Slika</th>
                        <th hidden="hidden">Kategorija</th>
                        <th>Opcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <label>
                                <select class="sizes" style="width: 100px">
                                    <option>
                                </select>
                            </label>
                        </td>
                        <td><span></span></td>
                        <td id="availableCBox" onclick="return false;"><input type="checkbox"/></td>
                        <td id="saleCBox" onclick="return false;"><input type="checkbox"/></td>
                        <td id="tblImg"><img alt="" src="" border=3 height=40 width=40/></td>
                        <td hidden="hidden" id="categoryColumn"></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
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
@endsection
