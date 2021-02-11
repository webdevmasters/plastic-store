@extends('admin.layouts.master')
@section('title','Proizvodi')

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
                <a href="{{route('admin.products.create')}}">
                    <button class="btn btn-primary" type="button">Unesi proizvod</button>
                </a>
            </div>
            <br>
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
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
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->code}}</td>
                            <td>{{$product->name}}</td>
                            <td class="{{$product->id}}">
                                <select class="sizes" style="width: 100px">
                                    @foreach($product->sizes as $size)
                                        <option value="{{$product->prices()->pluck('value')->all()[$loop->index]}}">{{$size->value}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <span id="{{$product->id}}">{{$product->minPrice().' - '.$product->maxPrice().' RSD'}}</span>
                            </td>
                            <td id="availableCBox" onclick="return false;"><input type="checkbox" {{$product->available?'checked':''}}/></td>
                            <td id="saleCBox" onclick="return false;"><input type="checkbox" {{$product->sale?'checked':''}}/></td>
                            <td id="tblImg"><img alt="" src="{{asset($product->mainImage())}}" border=3 height=40 width=40/></td>
                            <td hidden="hidden" id="categoryColumn">{{$product->category->name}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{route('admin.products.edit',['product' => $product])}}"><i class="fa fa-edit"></i></a>
                                <form class="d-lg-inline-block" action="{{ route('admin.products.destroy',['product' => $product]) }}" method="POST">
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
@endsection

@push('scripts')
    <script>
        $('.sizes').on('change', function () {
            var price = this.value;
            var id = $(this).parent().attr('class').split(' ')[0];
            $('span#' + id + '').text(price + ' RSD');
        });
        $('.sizes').trigger("change");

        //automatsko zatvaranje bootrstap popup-a
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);
    </script>
@endpush
