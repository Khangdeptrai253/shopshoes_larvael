@extends('welcome')
@section('content')
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 offset-md-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Shopping Cart</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>02</span></p>
                        <h3>Checkout</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>Order Complete</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                    <h2>Billing Details</h2>
                    <div class="row">
                        <div class="product-name d-flex">
                            <div class="one-forth text-left px-4">
                                <span>Product Details</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Price</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Quantity</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Total</span>
                            </div>
                        </div>
                        @if (Session::get('cart') == true)

                                @csrf
                                @php
                                    $total = 0;
                                @endphp
                                @foreach (Session::get('cart') as $key => $value)
                                    @php
                                        $sub_total = $value['product_qty'] * $value['product_price'];
                                    $total += $sub_total; @endphp
                                    <div class="product-cart d-flex">
                                        <div class="one-forth">
                                            <div class="product-img"
                                                style="background-image: url(public/uploads/products/<?= $value['product_image'] ?>);">
                                            </div>
                                            <div class="display-tc">
                                                <h3><?= $value['product_name'] ?></h3>
                                            </div>
                                        </div>
                                        <div class="one-eight text-center">
                                            <div class="display-tc">
                                                <span class="price"><?= number_format($value['product_price']) ?></span>
                                            </div>
                                        </div>
                                        <div class="one-eight text-center">
                                            <div class="display-tc">
                                                <span class="price"><?=  $value['product_qty'] ?></span>
                                            </div>
                                        </div>
                                        <div class="one-eight text-center">
                                            <div class="display-tc">
                                                <span class="price"><?= number_format($sub_total, 0, ' ') ?>VND</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                    </div>
                </div>
                <form action="{{ route('place-order') }}" method="POST">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart-detail">
                                    <h2>Cart Total</h2>
                                    <ul>
                                        <li>
                                            <span>Subtotal</span> <span><?= number_format($sub_total, 0, ' ') ?>VND</span>
                                        </li>
                                        <li><span>Shipping</span> <span>$0.00</span></li>
                                        <li><span>Order Total</span> <span>$180.00</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="cart-detail">
                                    <h2>Payment Method</h2>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="ATM"> ATM</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="Tiền Mặt">Tiền Mặt</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="Thẻ Ghi Nợ"> Thẻ Ghi Nợ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value=""> I have read and accept the
                                                    terms and
                                                    conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p><a href="#" class="btn btn-primary">Place an order</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @else
    @php
        echo 'bạn không có sản phẩm nào trong giỏ hàng';
    @endphp
    @endif
    </div>


@endsection
