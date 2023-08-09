@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <form method="post" class="colorlib-form" action="{{route('add-customer')}}">
                {{ csrf_field() }}
                <h2>Đăng Ký</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname">Your Name </label>
                            <input type="text" id="fname" class="form-control" placeholder="Your Username"
                                name="username">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname">Email</label>
                            <input type="email" id="fname" class="form-control" placeholder="Enter Email"
                                name="email">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Your Password"
                                name="password">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Number Phone</label>
                            <input type="text" id="password" class="form-control" placeholder="Your Phone Number"
                                name="phone">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <div class="radio">
                                <input type="submit" class="btn btn-success" value="Tạo Tài Khoản">
                                <div class="d-flex text-center">
                                    <p style= "margin-left:275px;">Bạn đã có tài khoản ?</p>
                                    <a href="{{route('login-checkout')}}" class="text-primary">Đăng Nhập Ngay </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-detail">
                        <h2>Cart Total</h2>
                        <ul>
                            <li>
                                <span>Subtotal</span> <span>$100.00</span>
                                <ul>
                                    <li><span>1 x Product Name</span> <span>$99.00</span></li>
                                    <li><span>1 x Product Name</span> <span>$78.00</span></li>
                                </ul>
                            </li>
                            <li><span>Shipping</span> <span>$0.00</span></li>
                            <li><span>Order Total</span> <span>$180.00</span></li>
                        </ul>
                    </div>
                </div>

                <div class="w-100"></div>

                <div class="col-md-12">
                    <div class="cart-detail">
                        <h2>Payment Method</h2>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Direct Bank Tranfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Check Payment</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Paypal</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" value=""> I have read and accept the terms and
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
    </div>
@endsection
