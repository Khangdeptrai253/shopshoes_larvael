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
        </div>
        <?php
        $massage = session()->get('massage');
        if ($massage) {
            echo $massage;
            session()->put('massage', null);
        }
        ?>
        <div class="row row-pb-lg">
            <div class="col-md-12">
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
                    <div class="one-eight text-center px-4">
                        <span>Remove</span>
                    </div>
                </div>
                @if (Session::get('cart') == true)
                    <form action="{{ route('update-cart') }}" method="POST">
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
                                        <input type="number" id="quantity" name="cart_qty[{{ $value['session_id'] }}]"
                                            class="form-control input-number text-center"
                                            value="<?= $value['product_qty'] ?>" min="1" max="100">
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price"><?= number_format($sub_total, 0, ' ') ?>VND</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <a href="{{ route('del-product', [$value['session_id']]) }}" class="closed"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach;
                        <div class="col-sm-3 d-flex">
                            <input type="submit" class="btn btn-primary" value="Update cart">
                            <a href="{{ route('delete-all-cart') }}" class="btn btn-primary">Xóa tất cả</a>
                        </div>
                    </form>
                    <div class="row row-pb-lg">
                        <div class="col-md-12">
                            <div class="total-wrap">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <form action="{{ route('check-coupon') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="row form-group">
                                                <div class="col-sm-9">
                                                    <input type="text" name="enter_code"
                                                        class="form-control input-number"
                                                        placeholder="Your Coupon Number...">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <div class="total">
                                            <div class="sub">
                                                <p><span>total:</span>
                                                    <span><?= number_format($total, 0) ?></span>
                                                </p>
                                                @if (session::get('coupon'))
                                                    @foreach (session::get('coupon') as $key => $value)
                                                        @if ($value['coupon_func'] == 2)
                                                            <p><span>Giảm:</span> <span><?= $value['coupon_condition'] ?>
                                                                    VND </span></p>
                                                            <p><span>Tiền Sau Khi Giảm:</span>
                                                                <span><?= number_format($total - $value['coupon_condition'], 0) ?>
                                                                    VND </span>
                                                            </p>
                                                        @else
                                                            <p><span>Giảm:</span> <span><?= $value['coupon_condition'] ?> %
                                                                </span></p>
                                                            <p><span>TIền Sau Khi Giảm</span>
                                                                <span><?= number_format($total - ($total * $value['coupon_condition']) / 100, 0) ?>
                                                                    VND </span>
                                                            </p>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <?php
                                                    $unvalid = session()->get('unvalid');
                                                    if ($unvalid) {
                                                        echo $unvalid;
                                                        session()->put('unvalid', null);
                                                    }
                                                    ?>
                                                @endif
                                            </div>
                                            <div>
                                                <?php
                                                        $customer_id = session()->get('customer_id');
                                                        if($customer_id != null){
                                                        ?>
                                                <a href="{{ route('check-out') }}" class="btn btn-primary">Thanh Toán</a>
                                                </li>
                                                <?php
                                                        }else{
                                                            ?>
                                                <a href="{{ route('login-checkout') }}" class="btn btn-primary">Thanh
                                                    Toán</a></li>
                                                <?php
                                                            }?>
                                                @if (session::get('coupon'))
                                                    @foreach (session::get('coupon') as $key => $val)
                                                        <a href="{{ route('del-coupon', [$val['coupon_code']]) }}"
                                                            class="btn btn-primary">Không áp dụng mã</a></li>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @php
                        echo 'bạn không có sản phẩm nào trong giỏ hàng';
                    @endphp
                @endif
            </div>
        </div>

    </div>
@endsection
