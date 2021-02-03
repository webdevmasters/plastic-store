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
                <form class="needs-validation" novalidate id="i10l" action="{{route('admin.products.store')}}" method="post" name="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="password">Šifra :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="password" placeholder="Šifra" name="code" value="{{ old('code') }}" type="text"/>
                            @error('code')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name">Naziv :</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="name" placeholder="Naziv" name="name" value="{{ old('name') }}" type="text"/>
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="description">Opis :</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="description" placeholder="Opis" name="description" value="{{ old('description') }}" rows="3"></textarea>
                            @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="manufacturer">Proizvođač</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="manufacturer" placeholder="Proizvođač" value="{{ old('manufacturer') }}" name="manufacturer" type="text"/>
                            @error('manufacturer')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="category">Kategorija :</label>
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
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="subcategory">Pod :</label>
                        <div class="col-sm-9">
                            <select class="selectpicker form-control" id="subcategory" name="subcategory" value="{{ old('subcategory') }}"></select>
                            @error('subcatgory')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="size">Dimenzije :</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="size" name="sizes[]" value="{{ old('sizes[]') }}" multiple></select>
                            @error('sizes')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="price">Cene :</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" id="price" name="prices[]" value="{{ old('prices[]') }}" multiple></select>
                            @error('prices')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="price-discounted">Cene-akcija :</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="price-discounted" name="discounted_prices[]" value="{{ old('discounted_prices') }}" multiple></select>
                            @error('discounted_prices')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Slika :</label>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-danger btn-file" id="chooseBtn">
                                    Izaberi<input type="file" id="fileUpload" name="images[]" multiple>
                                </span>
                                @error('images')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </span>
                        </div>
                    </div>
                    <div id="image-holder"></div>

                    <div class="form-group row" style="margin-top: 30px;">
                        <label class="col-sm-3 col-form-label" for="multiple-checkboxes">Boja</label>
                        <div class="col-sm-9">
                            <select class="selectpicker form-control" data-actions-box="true"
                                    data-deselect-all-text="Deselektuj sve"
                                    data-dropup-auto="false"
                                    data-none-selected-text="Izaberite boju"
                                    data-select-all-text="Selektuj sve" data-selected-text-format="count"
                                    data-size="6"
                                    id="multiple-checkboxes"
                                    multiple
                                    name="colors[]"
                                    value="{{ old('colors[]') }}">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}" style="background: {{$color->code}}">{{$color->name}}</option>
                                @endforeach
                            </select>
                            @error('colors')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Stanje :</div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" id="status" name="available" value="{{ old('available') }}" type="checkbox"/>
                                @error('available')
                                <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                <label class="form-check-label" for="status"> Na stanju </label></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Akcija :</div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" name="sale" id="sale" value="{{ old('sale') }}" type="checkbox"/>
                                @error('sale')
                                <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                <label class="form-check-label" for="sale"> Na akciji </label></div>
                        </div>
                    </div>
                    <div class="row c60069">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 c60077">
                            <button class="btn btn-primary btn-lg" id="saveBtn" type="submit">Sačuvaj</button>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 c60086">
                            <a class="btn btn-primary" id="btn-return" href="{{route('admin.products.index')}}">Nazad</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            //event na promenu kategorije
            $("#category").on('change', function () {
                loadSubcategoriesByCategory();
            });
            clearDuplicates();
            //inicijalno okidanje event-a za dropdown kategorije
            $("#category").trigger('change');

            //aktivacija dropdown menija
            $('#multiple-checkboxes').selectpicker();
            $('#category').selectpicker();
            $('#subcategory').selectpicker();

            $('#price-discounted').prop('disabled', 'disabled');
            if ($("#sale").is(":checked")) {
                $('#price-discounted').prop('disabled', false);
            } else {
                $('#price-discounted').empty();
            }

            $('#size').select2({
                tags: true,
                allowClear: true,
                placeholder: "Unesite dimenzije"
            });

            $('#price').select2({
                tags: true,
                allowClear: true,
                placeholder: "Unesite cene"
            });

            $(document).on('keypress', '.select2-search__field', function () {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });

            $('#price-discounted').select2({
                tags: true,
                allowClear: true,
                placeholder: "Unesite akcijske cene"
            });

            $('#sale').on('change', function () {
                if ($("#sale").is(":checked")) {
                    $('#price-discounted').prop('disabled', false);
                } else {
                    $('#price-discounted').prop('disabled', 'disabled');
                    $('#price-discounted').empty();
                }
            });
        });

        //slanje ajax zahteva za ucitavanje podkategorija po kategoriji
        function loadSubcategoriesByCategory() {
            var category_id = $("#category").val();
            var url = '{{ route("admin.subcategories", ":id") }}';
            url = url.replace(':id', category_id);

            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    $("#subcategory").empty();

                    $.each(data, function (item) {
                        $('#subcategory').append($("<option></option>").attr("value", data[item].id).text(data[item].name));
                    });
                    $('#subcategory').select(0);
                    $('#subcategory').selectpicker('refresh');
                }
            })
        }

        $('form').on("submit", function (event) {
            var edit = $('#edit').val();
            var sizes = $('#size :selected').length;
            var prices = $('#price :selected').length;
            var discounted_prices = $('#price-discounted :selected').length;
            if (sizes !== prices) {
                event.preventDefault();
                bootbox.alert({
                    message: "Odnos veličina i cena mora biti isti!",
                    callback: function () {
                        window.location.reload();
                    }
                });
            }
            if ($('#sale').is(":checked")) {
                if (prices !== discounted_prices) {
                    event.preventDefault();
                    bootbox.alert({
                        message: "Odnos regularnih cena i cena na akciji mora biti isti!",
                        callback: function () {
                            window.location.reload();

                        }
                    });
                }
            }
        });

        //automatsko zatvaranje bootrstap popup-a
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);

        function clearDuplicates() {
            var a = [];
            $("#size").children("option").each(function (x) {
                test = false;
                b = a[x] = $(this).val();
                for (i = 0; i < a.length - 1; i++) {
                    if (b == a[i]) test = true;
                }
                if (test) $(this).remove();
            });

            var c = [];
            $("#price").children("option").each(function (x) {
                test = false;
                b = c[x] = $(this).val();
                for (i = 0; i < c.length - 1; i++) {
                    if (b == c[i]) test = true;
                }
                if (test) $(this).remove();
            });
        }
    </script>
@endpush

