<div class="shop-product-wrap grid row mb-30 no-gutters">
    @foreach($products as $product)
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <!--=======  grid view product  =======-->
            @include('webapp.includes.product_card',['type'=>'shop-grid-view-product'])
            @include('webapp.includes.product_card',['type'=>'shop-list-view-product','description'=>'true'])
        </div>
    @endforeach
</div>
