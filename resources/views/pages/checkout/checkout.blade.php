@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-lg-6" style="background: #EEEEEE	">
            <form>
                {{ csrf_field() }}
                <h2></h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control m-bot15 choose city" name="city" id="city">
                                <option value="0">-----Thành Phố----</option>
                                @foreach ($city as $key => $value)
                                    <option value="<?= $value->matp ?>"><?= $value->name ?></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control m-bot15 choose province" name="province" id="province">
                                <option value="">-----Quận Huyện-----</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <select class="form-control m-bot15 wards" name="wards" id="wards">
                            <option value="">-----Xã Phường Thị Trấn-----</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="password" class="form-control" placeholder="Nhập số nhà, đường "
                                name="home_address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nhập Họ và Tên</label>
                            <input type="text" name="shipping_name" class="form-control" placeholder="Họ và tên">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nhập số điện thoại</label>
                            <input type="text" name="shipping_phone" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nhập Email</label>
                            <input type="email" name="shipping_email" class="form-control" placeholder="Email khách hàng">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Lưu ý khi gửi hàng</label>
                        <textarea class="form-control" name="note" id="" cols="30" rows="10"
                            value="Lưu ý cho người gửi hàng"></textarea>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success" value="Gửi">
                </div>
                <div class="col-sm-3">
                    <input type="button" value="Tính Phí Ship" class="btn btn-primary caculate_delivery">
                </div>
            </form>
        </div>
        <div class="col-lg-6">
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
                                        class="form-control input-number text-center" value="<?= $value['product_qty'] ?>"
                                        min="1" max="100">
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
                                <div class="col-sm-6">
                                    <form action="{{ route('check-coupon') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="row form-group">
                                            <div class="col-sm-9">
                                                <input type="text" name="enter_code" class="form-control input-number"
                                                    placeholder="Your Coupon Number...">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                            </div>

                                        </div>
                                    </form>

                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="total">
                                        <div class="sub">
                                            <p><span>total:</span>
                                                <span><?= number_format($total, 0,',','.') ?></span>
                                            </p>
                                            @php
                                                $fee_ship = 0;
                                            @endphp
                                            @if (Session::get('feeship'))
                                                <div class="d-flex">
                                                    <a href="{{route('delete-feeship')}}"><i class="fa fa-window-close-o" aria-hidden="true"></i></a>
                                                    <p><span>phí ship</span>
                                                        <span><?= $fee_ship = sprintf(Session::get('feeship')) ?>
                                                            VND </span>
                                                    </p>
                                                </div>
                                            @endif
                                            @if (session::get('coupon'))
                                                @foreach (session::get('coupon') as $key => $value)
                                                    @if ($value['coupon_func'] == 2)
                                                        <p><span>Giảm:</span> <span><?= $value['coupon_condition'] ?>
                                                                VND </span></p>
                                                        <p><span>Tiền Sau Khi Giảm:</span>
                                                            <span><?= $total_after = number_format($total - $value['coupon_condition']) ?>
                                                                VND </span>
                                                        </p>
                                                        <p><span>Tổng:</span>
                                                            <span><?= number_format(($total_after + $fee_ship),0,',','.') ?>
                                                                VND </span>
                                                        </p>
                                                    @else
                                                        <p><span>Giảm:</span> <span><?= $value['coupon_condition'] ?> %
                                                            </span></p>
                                                        <p><span>TIền Sau Khi Giảm</span>
                                                            <span><?=  $total_after  = number_format((float)$total - ($total * $value['coupon_condition']) / 100) ?>
                                                                VND </span>
                                                        </p>
                                                        <p><span>Tổng:</span>
                                                            <span><?= number_format(($total_after + $fee_ship),2);  ?>
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
@endsection
