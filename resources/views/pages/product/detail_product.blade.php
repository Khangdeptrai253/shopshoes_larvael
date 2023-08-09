@extends('welcome')
@section('content')
    <div class="colorlib-product">
        <div class="container">
            @foreach ($product as $key => $value)
                <form>
                    @csrf
                    <div class="row row-pb-lg product-detail-wrap">
                        <div class="col-sm-8">
                            <div class="owl-carousel owl-theme owl-loaded">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-1460px, 0px, 0px); transition: all 0s ease 0s; width: 5840px;">
                                        <div class="owl-item cloned" style="width: 730px; margin-right: 0px;">
                                            <div class="item">
                                                <div class="product-entry border">
                                                    <a href="#" class="prod-img">
                                                        <img src="../public/uploads/products/<?= $value->image ?>"
                                                            class="img-fluid" alt="Free html5 bootstrap 4 template">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 730px; margin-right: 0px;">
                                            <div class="item">
                                                <div class="product-entry border">
                                                    <a href="#" class="prod-img">
                                                        <img src="../public/uploads/products/<?= $value->image ?>"
                                                            class="img-fluid" alt="Free html5 bootstrap 4 template">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item active" style="width: 730px; margin-right: 0px;">
                                            <div class="item">
                                                <div class="product-entry border">
                                                    <a href="#" class="prod-img">
                                                        <img src="../public/uploads/products/<?= $value->image ?>"
                                                            class="img-fluid" alt="Free html5 bootstrap 4 template">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 730px; margin-right: 0px;">
                                            <div class="item">
                                                <div class="product-entry border">
                                                    <a href="#" class="prod-img">
                                                        <img src="../public/uploads/products/<?= $value->image ?>"
                                                            class="img-fluid" alt="Free html5 bootstrap 4 template">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 730px; margin-right: 0px;">
                                            <div class="item">
                                                <div class="product-entry border">
                                                    <a href="#" class="prod-img">
                                                        <img src="../public/uploads/products/<?= $value->image ?>"
                                                            class="img-fluid" alt="Free html5 bootstrap 4 template">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 730px; margin-right: 0px;">
                                            <div class="item">
                                                <div class="product-entry border">
                                                    <a href="#" class="prod-img">
                                                        <img src="../public/uploads/products/<?= $value->image ?>"
                                                            class="img-fluid" alt="Free html5 bootstrap 4 template">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 730px; margin-right: 0px;">
                                            <div class="item">
                                                <div class="product-entry border">
                                                    <a href="#" class="prod-img">
                                                        <img src="../public/uploads/products/<?= $value->image ?>"
                                                            class="img-fluid" alt="Free html5 bootstrap 4 template">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 730px; margin-right: 0px;">
                                            <div class="item">
                                                <div class="product-entry border">
                                                    <a href="#" class="prod-img">
                                                        <img src="../public/uploads/products/<?= $value->image ?>"
                                                            class="img-fluid" alt="Free html5 bootstrap 4 template">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-controls">
                                    <div class="owl-nav">
                                        <div class="owl-prev" style="display: none;"><i
                                                class="icon-chevron-left owl-direction"></i></div>
                                        <div class="owl-next" style="display: none;"><i
                                                class="icon-chevron-right owl-direction"></i></div>
                                    </div>
                                    <div class="owl-dots" style="">
                                        <div class="owl-dot active"><span></span></div>
                                        <div class="owl-dot"><span></span></div>
                                        <div class="owl-dot"><span></span></div>
                                        <div class="owl-dot"><span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-desc">
                                <h3><?= $value->product_name ?></h3>
                              <input type="hidden" value="{{$value->product_id}}"
                                class="cart_product_id_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->product_name}}"
                                class="cart_product_name_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->image}}"
                                class="cart_product_image_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->price}}"
                                class="cart_product_price_{{$value->product_id}}">
                                <p class="price">
                                    <span><?= number_format($value->price, 0) ?> VND</span>
                                    <span class="rate">
                                        <i class="icon-star-full"></i>
                                        <i class="icon-star-full"></i>
                                        <i class="icon-star-full"></i>
                                        <i class="icon-star-full"></i>
                                        <i class="icon-star-half"></i>
                                        (74 Rating)
                                    </span>
                                </p>
                                <p><?= $value->product_desc ?></p>
                                <div class="size-wrap">
                                    <div class="block-26 mb-2">
                                        <h4>Size</h4>
                                        <ul>
                                            <li><a href="#">7</a></li>
                                            <li><a href="#">7.5</a></li>
                                            <li><a href="#">8</a></li>
                                            <li><a href="#">8.5</a></li>
                                            <li><a href="#">9</a></li>
                                            <li><a href="#">9.5</a></li>
                                            <li><a href="#">10</a></li>
                                            <li><a href="#">10.5</a></li>
                                            <li><a href="#">11</a></li>
                                            <li><a href="#">11.5</a></li>
                                            <li><a href="#">12</a></li>
                                            <li><a href="#">12.5</a></li>
                                            <li><a href="#">13</a></li>
                                            <li><a href="#">13.5</a></li>
                                            <li><a href="#">14</a></li>
                                        </ul>
                                    </div>
                                    <div class="block-26 mb-4">
                                        <h4>Width</h4>
                                        <ul>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">W</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="input-group mb-4">

                                    <input type="number" id="quantity" name="quantity"
                                        class="form-control input-number cart_product_qty_{{$value->product_id}}" value="1" min="1" max="100">

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <button type="button" class="btn btn-info add-to-cart" data-id_product="<?= $value->product_id ?>" name="add-to-cart"
                                            style="height: 54px;width: 323px;
                                            padding: 0;
                                        ">
                                            <p><i style="padding-top: 10px;
                                                padding-left: 61px;
                                                        font-size: 31px;
                                                        float: left;"
                                                    class="icon-shopping-cart"></i></p>
                                            <p style="padding-right: 90px">Add To Cart</p>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-12 pills">
                                    <div class="bd-example bd-example-tabs">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                                    href="#pills-description" role="tab"
                                                    aria-controls="pills-description" aria-expanded="true">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill"
                                                    href="#pills-manufacturer" role="tab"
                                                    aria-controls="pills-manufacturer"
                                                    aria-expanded="true">Manufacturer</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-review-tab" data-toggle="pill"
                                                    href="#pills-review" role="tab" aria-controls="pills-review"
                                                    aria-expanded="true">Review</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane border fade show active" id="pills-description"
                                                role="tabpanel" aria-labelledby="pills-description-tab">
                                                <p></p>
                                                <p><?= $value->product_desc ?></p>
                                                <ul>
                                                    <li>The Big Oxmox advised her not to do so</li>
                                                    <li>Because there were thousands of bad Commas</li>
                                                    <li>Wild Question Marks and devious Semikoli</li>
                                                    <li>She packed her seven versalia</li>
                                                    <li>tial into the belt and made herself on the way.</li>
                                                </ul>
                                            </div>

                                            <div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel"
                                                aria-labelledby="pills-manufacturer-tab">
                                                <p><?= $value->content ?></p>

                                            </div>

                                            <div class="tab-pane border fade" id="pills-review" role="tabpanel"
                                                aria-labelledby="pills-review-tab">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h3 class="head">23 Reviews</h3>
                                                        <div class="review">
                                                            <div class="user-img"
                                                                style="background-image: url(images/person1.jpg)"></div>
                                                            <div class="desc">
                                                                <h4>
                                                                    <span class="text-left">Jacob Webb</span>
                                                                    <span class="text-right">14 March 2018</span>
                                                                </h4>
                                                                <p class="star">
                                                                    <span>
                                                                        <i class="icon-star-full"></i>
                                                                        <i class="icon-star-full"></i>
                                                                        <i class="icon-star-full"></i>
                                                                        <i class="icon-star-half"></i>
                                                                        <i class="icon-star-empty"></i>
                                                                    </span>
                                                                    <span class="text-right"><a href="#"
                                                                            class="reply"><i
                                                                                class="icon-reply"></i></a></span>
                                                                </p>
                                                                <p>When she reached the first hills of the Italic Mountains,
                                                                    she had a last view back on the skyline of her hometown
                                                                    Bookmarksgrov</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        </form>
        @endforeach
    </div>
    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                    <h2>Related Product</h2>
                </div>
            </div>

            <div class="row row-pb-md">
                @foreach ($related_product as $key => $value)
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            <a href="" class="prod-img">
                                <img src="../public/uploads/products/<?= $value->image ?>" class="img-fluid"
                                    alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc">
                                <h2><a href="#"><?= $value->product_name ?></a></h2>
                                <span class="price"><?= number_format($value->price, 0) ?> VND</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p><a href="#" class="btn btn-primary btn-lg">Shop All Products</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
