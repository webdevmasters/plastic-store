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
                                <li th:text="#{wishlist}">Lista želja</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>
    @if(Wishlist::getContent()->count()>0)
        <div class="page-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <!--=======  wishlist table  =======-->
                            <div class="cart-table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pro-thumbnail" th:text="#{picture}">Slika</th>
                                        <th class="pro-title" th:text="#{name}">Naziv</th>
                                        <th class="pro-quantity" th:text="#{size}">Dimenzije</th>
                                        <th class="pro-price" th:text="#{price}">Cena</th>
                                        <th class="pro-remove" th:text="#{remove}">Obriši</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Wishlist::getContent() as $item)
                                        <tr>
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
                                                        <option value="{{$item->associatedModel->prices()->pluck('value')->all()[$loop->index]}}">{{$size->value}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pro-price">
                                                <span id="{{$item->associatedModel->id}}">{{$item->associatedModel->minPrice().' - '.$item->associatedModel->maxPrice().' RSD'}}</span>
                                            </td>
                                            <td class="pro-remove"><a href="{{route('delete.wishlist.item',$item->id)}}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--=======  End of wishlist table  =======-->
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
                                <img class="img-fluid" height="300" style="background: transparent" src="{{asset('static/images/shop/empty-wishlist.png')}}" width="300" alt="">
                                <h3 th:text="#{wishlist.empty}"><strong>Vaša lista želja je trenutno prazna</strong></h3>
                                <h4 th:text="#{add.content}">Dodajte nešto kako biste videli sadržaj :)</h4>
                                <div class="newsletter-form mb-20 mt-30">
                                    <a href="{{url('/')}}" th:text="#{continue.shopping}">Nastavi kupovinu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.pro-quantity select').on('change', function () {
                var price = this.value;
                var id = $(this).parent().attr('class').split(' ')[1];
                $('span#' + id + '').text(price + ' RSD');
            });

            $('.pro-quantity select').trigger("change");
        });
    </script>
@endpush
