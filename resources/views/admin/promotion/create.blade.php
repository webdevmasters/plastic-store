@extends('admin.layouts.master')
@section('content')
    <div class="container c1691">
        <div class="row c1859">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-4 col-12 c1867">
                <h4 data-type="header" id="ibxf1lw">UNOS PROIZVODA</h4>
                <hr>
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <form enctype="multipart/form-data" id="i10l" method="post" name="form" action="{{route('admin.promotions.store')}}">
                    @csrf
                    <div class="form-group row" hidden><label class="col-sm-3 col-form-label" for="id">Id :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="id" placeholder="Id" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-form-label col-sm-3" for="category">Kategorija :</label>
                        <div class="col-sm-9">
                            <select class="selectpicker form-control" id="category" name="category" value="{{ old('category') }}">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-form-label col-sm-3" for="product">Proizvod :</label>
                        <div class="col-sm-9">
                            <select class="selectpicker form-control" id="product" name="product" ></select>
                        </div>
                    </div>
                    <div class="row c60069">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 c60077">
                            <button class="btn btn-primary btn-lg" id="saveBtn" type="submit">Sačuvaj</button>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 c60086">
                            <a class="btn btn-primary" id="btn-return" href="{{route('admin.promotions.index')}}">Nazad</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            //event na promenu kategorije
            $("#category").on('change', function () {
                sendAjaxRequest();
            });

            //okidanje event-a za dropdown kategorije
            $("#category").trigger('change');

            //aktivacija dropdown menija
            $('#category').selectpicker();
            $('#product').selectpicker();

            @if (Route::is('admin.products.edit'))
                $('#category').prop('disabled', true);
                $('#category').selectpicker('refresh');
            @endif
        });

        //slanje ajax zahteva za ucitavanje proizvoda
        function sendAjaxRequest() {
            var productId=undefined;
            @if(isset($promotion))
            productId = @json($promotion->product->id);
            @endif
            var category_id = $("#category").val();

            $.get("{{url('/admin/products/products_by_category')}}"+'/' + category_id, function (data) {
                $("#product").empty();
                $.each(data, function (item) {
                    $('#product').append($("<option></option>").attr("value", data[item].id).text(data[item].name));
                });
                if (productId !== undefined) {
                    $('#product').val(productId);
                }
                $('#product').selectpicker('refresh');
            });
        }

        $('form').on("submit", function (event) {

        });

        //automatsko zatvaranje bootrstap popup-a
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);

    </script>
@endpush
