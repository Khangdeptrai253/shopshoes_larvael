@extends('welcome')
@section('content')
    <div class="colorlib-product">
        <div class="container">

            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                    <h2>Best Sellers</h2>
                </div>
                <div class="col-lg-3 col-xl-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="side border mb-1">
                                <h3>Brand</h3>
                                <ul>
                                    @foreach ($brand_product as $key=>$value )
                                    <li><a href="{{route('show_brand',[$value->brand_id])}}"><?= $value->brand_name ?></a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-xl-9">
                    <div class="row row-pb-md">
                        @foreach ($search_product as $key => $value)
                        <div class="col-lg-4 mb-4 text-center">
                            <div class="product-entry border">
                                <a href="{{route('detail_product',[$value->product_id])}}" class="prod-img">
                                    <img src="public/uploads/products/<?= $value->image ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
                                </a>
                                <div class="desc">
                                    <h2><a href="#"><?= $value->product_name ?></a></h2>
                                    <span class="price"> <?php echo number_format($value->price, 0); ?></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
