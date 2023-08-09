@extends('welcome')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($category_name as $key => $value)
                <p class="bread"><span><a href="index.html">Home</a></span> / <span><?= $value->category_name ?></span></p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="breadcrumbs-two">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumbs-img" style="background-image: url({{asset('public/frontend/images/cover-img-1.jpg')}});">
                    <h2>Women's</h2>
                </div>
                <div class="menu text-center">
                    <p><a href="#">New Arrivals</a> <a href="#">Best Sellers</a> <a href="#">Extended Widths</a> <a href="#">Sale</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="colorlib-featured">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="featured">
                    <div class="featured-img featured-img-2" style="background-image: url({{asset('public/frontend/images/img_bg_2.jpg')}});">
                        <h2>Casuals</h2>
                        <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="featured">
                    <div class="featured-img featured-img-2" style="background-image: url({{asset('public/frontend/images/women.jpg')}});">
                        <h2>Dress</h2>
                        <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="featured">
                    <div class="featured-img featured-img-2" style="background-image: url({{asset('public/frontend/images/item-11.jpg')}});">
                        <h2>Sports</h2>
                        <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xl-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="side border mb-1">
                                <h3>Brand</h3>
                                <ul>
                                    @foreach ($brand_name as $key => $value)
                                        <li><a
                                                href="{{ route('show_brand', [$value->brand_id]) }}"><?= $value->brand_name ?></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-xl-9">
                    <div class="row row-pb-md">
                        @foreach ($product as $key => $value)
                            <div class="col-lg-4 mb-4 text-center">
                                <div class="product-entry border">
                                    <a href="{{route('detail_product',[$value->product_id])}}" class="prod-img">
                                        <img src="../public/uploads/products/<?= $value->image ?>" class="img-fluid"
                                            alt="Free html5 bootstrap 4 template">
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
