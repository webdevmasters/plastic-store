@extends('webapp.layouts.main')
@section('content')
    <div class="breadcrumb-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb container  =======-->
                    <div class="breadcrumb-container">
                        <nav>
                            <ul>
                                <li class="parent-page"><a href="{{url('/')}}" th:text="#{home}">Početna</a></li>
                                @auth
                                    <li class="parent-page"><a href="{{route('customer.my.account')}}" th:text="#{my.account}">Moj nalog</a></li>
                                @endauth
                                <li th:text="#{order.content}">Sadržaj Vaše porudžbine</li>
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
                    <form action="#">
                        <!--=======  cart table  =======-->
                        <div class="cart-table table-responsive mb-40">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail" th:text="#{picture}">Slika</th>
                                    <th class="pro-title" th:text="#{product}">Proizvod</th>
                                    <th class="pro-color" th:text="#{color}">Boja</th>
                                    <th class="pro-size" th:text="#{size}">Veličina</th>
                                    <th class="pro-price" th:text="#{price}">Cena</th>
                                    <th class="pro-quantity" th:text="#{quantity}">Količina</th>
                                    <th class="pro-subtotal" th:text="#{total}">Ukupno</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href="{{route('single.product.by.id',$item->product)}}">
                                                @foreach($item->product->images as $image)
                                                    <img alt="" style="width: 64px; height: 64px;" class="img-fluid" src="{{asset($image->getOriginalName())}}">
                                                    @if($loop->index==0)@break @endif
                                                @endforeach
                                            </a>
                                        </td>
                                        <td class="pro-title"><a href="{{route('single.product.by.id',$item->product)}}">{{$item->product->name}}</a></td>
                                        <td class="pro-color"><span class="color-block" style="background-color:{{$item->color}};" title="{{$item->color}}"></span></td>
                                        <td class="pro-size"><span>{{$item->size}}</span></td>
                                        <td class="pro-price"><span>{{$item->price. ' RSD'}}</span></td>
                                        <td class="pro-quantity"><span>{{$item->quantity}}</span></td>
                                        <td class="pro-subtotal"><span>{{$item->quantity*$item->price}}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
