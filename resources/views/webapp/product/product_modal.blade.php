<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-xs-12 mb-xxs-25 mb-xs-25 mb-sm-25">
                    <!-- single product tabstyle one image gallery -->
                    <div class="product-image-slider fl-product-image-slider fl3-product-image-slider quickview-product-image-slider">
                        <!--product large image start -->
                        <div class="tab-content product-large-image-list fl-product-large-image-list fl3-product-large-image-list quickview-product-large-image-list" id="myTabContent2">
                            @foreach($product->images as $image)
                                <div role="tabpanel" aria-labelledby="{{'single-slide-tab-'.$loop->index}}" class="{{$loop->index==0? 'tab-pane fade show active':'tab-pane fade'}}" id="{{'single-slide-'.$loop->index}}">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img alt="" class="img-fluid" id="imgtodrag" src="{{asset($image->getOriginalName())}}">
                                        <a class="big-image-popup" href="{{asset($image->getOriginalName())}}"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                            @endforeach
                        </div>
                        <!--product large image End-->

                        <!--product small image slider Start-->
                        <div class="product-small-image-list fl-product-small-image-list fl3-product-small-image-list quickview-product-small-image-list">
                            <div class="nav small-image-slider fl3-small-image-slider" role="tablist">
                                @foreach($product->images as $image)
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" href="{{'#single-slide-'.$loop->index}}" id="{{'single-slide-tab-'.$loop->index}}">
                                            <img alt="" class="img-fluid" src="{{asset($image->getOriginalName())}}"></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--product small image slider End-->
                    </div>
                    <!-- end of single product tabstyle one image gallery -->
                </div>
                <div class="col-lg-7 col-md-6 col-xs-12">
                    <!-- product quick view description -->
                    <div class="product_modal_rating">
                        <div class="product-feature-details">
                            <h2 class="product-title mb-15">{{$product->name}}</h2>

                            <div class="rating d-inline-block mb-15" id="single-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            @if(count($product->reviews)>0)
                                <p class="d-inline-block ml-10 review-link">
                                    @if(count($product->reviews)>1)
                                        <a>{{count($product->reviews).' '.__('messages.reviews')}}</a>
                                    @else
                                        <a>{{count($product->reviews).' '.__('messages.review')}}</a>
                                    @endif
                                </p>
                            @endif
                            <div class="availability mb-0">
                                <span class="title">{{__('messages.availability').':'}}</span>
                                @if($product->available)
                                    <h3 class="product-available mb-15">{{'('.__('messages.in.stock').')'}}</h3>
                                @else
                                    <h3 class="product-not-available mb-15">{{'('.__('messages.out.of.stock').')'}}</h3>
                                @endif
                            </div>

                            <div class="price mb-0">
                                <span class="title">{{__('messages.price')}}</span>
                                <h2 class="product-price mb-0">
                                    <span class="main-price-modal {{$product->sale?'discounted':''}}">{{$product->prices->first()->value.' DIN'}}</span>
                                    @if($product->sale)
                                        <span class="discounted-price">{{$product->prices->first()->pivot->discounted_price.' DIN'}}</span>
                                        <span class="discount-percentage">{{$product->savings()}}</span>
                                    @endif
                                </h2>
                            </div>

                            <br>
                            <div class="manufacturer mb-0">
                                <span class="title">{{__('messages.manufacturer').':'}}</span>
                                <p class="product-manufacturer mb-20">{{$product->manufacturer}}</p>
                            </div>

                            <p class="product-description mb-15">{{$product->description}}</p>

                            <div class="size mb-15">
                                <span class="title"> {{__('messages.size').':'}}</span> <br>
                                <select class="nice-select-modal" id="chooseSize" name="chooseSize">
                                    @foreach($product->sizes as $size)
                                        <option value="{{$product->prices->pluck('value')->all()[$loop->index].'-'.$product->prices->pluck('discounted_price')->all()[$loop->index]}}">{{$size->value}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="color mb-15">
                                <span class="title">{{__('messages.color').':'}}</span> <br>
                                @foreach($product->colors as $color)
                                    <a value="{{$color->name}}">
                                        <span class="color-block {{$loop->first?'active':''}}" style="{{'background-color:'.$color->code.';'}}" title="{{$color->name}}"></span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- end of product quick view description -->
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                var savings =@json($product->savings());
                var avg_rating = @json($product->avgRating());

                $('.discount-percentage').text('Ušteda ' + Math.round(parseInt(savings)) + ' %');
                $('.nice-select-modal').niceSelect();

                $('#chooseSize').on('change', function () {
                    var value = this.value.split("-");
                    var price = value[0];
                    var discounted_price = value[1];
                    if (discounted_price > 0) {
                        var discount_percentage = (price - discounted_price) * 100 / price;
                        $('.main-price-modal').addClass('discounted');
                        $('.main-price-modal').text(price + ' DIN');
                        $('.discounted-price-modal').text(discounted_price + ' DIN');
                        $('.discount-percentage').text('Ušteda ' + Math.round(discount_percentage) + ' %');
                    } else {
                        $('.main-price-modal').text(price + ' DIN');
                    }
                });

                $('#single-rating').children('i').each(function (index, e) {
                    if (avg_rating === 0) return false;
                    $(this).addClass('active');
                    if (index + 1 === avg_rating) return false;
                });

                $('.color span.color-block').on('click', function (e) {
                    $('.color span.color-block').removeClass('active');
                    $(this).addClass('active');
                });
            });
        </script>
    </div>
</div>
