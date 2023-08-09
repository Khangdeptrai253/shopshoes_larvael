<!DOCTYPE HTML>
<html>

<head>
    <title>Shop Shoes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link href="{{ asset('public/frontend/css/animate.css') }}" rel="stylesheet">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/icomoon.css') }}">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/ionicons.min.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/flexslider.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.default.min.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-datepicker.css') }}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{ asset('public/frontend/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/sweetalert.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-md-9">
                            <div id="colorlib-logo"><a href="{{ route('homepage') }}">Footwear</a></div>
                        </div>
                        <div class="col-sm-5 col-md-3">
                            <form action="{{ route('search') }}" method="POST" class="search-wrap">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="search" class="form-control search" placeholder="Search"
                                        name="key_word">
                                    <button class="btn btn-primary submit-search text-center" type="submit"><i
                                            class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-left menu-1">
                            <ul>
                                <li class="active"><a href="{{ route('homepage') }}">Home</a></li>
                                @foreach ($cate_product as $key => $value)
                                    <li><a
                                            href="{{ route('category', [$value->category_id]) }}"><?= $value->category_name ?></a>
                                    </li>
                                @endforeach

                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <?php
                                $customer_id = session()->get('customer_id');
                                $shipping_id = session()->get('shipping_id');

                                if($customer_id != null && $shipping_id==null){
                                ?>
                                <li><a href="{{ route('check-out') }}">Thanh Toán</a></li>
                                <?php
                                }elseif($customer_id != null && $shipping_id!=null){
                                    ?>
                                <li><a href="{{ route('payment') }}">Thanh Toán</a></li>
                                <?php
                                    }else{
                                        ?>
                                <li><a href="{{ route('login-checkout') }}">Thanh Toán</a></li>
                                <?php
                                    }
                                        ?>
                                <?php
                                $customer_id = session()->get('customer_id');
                                if($customer_id != null){
                                ?>
                                <li><a href="{{ route('logout-checkout') }}">Đăng Xuất</a></li>
                                <?php
                                }else{
                                    ?>
                                <li><a href="{{ route('login-checkout') }}">Đăng Nhập</a></li>
                                <?php
                                    }?>
                                <li class="cart"><a href="{{ url('/cart') }}"><i class="icon-shopping-cart"></i>
                                        Cart [0]</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sale">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2 text-center">
                            <div class="row">
                                <div class="owl-carousel2">
                                    <div class="item">
                                        <div class="col">
                                            <h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col">
                                            <h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="colorlib-product">
            @yield('content')
        </div>

        <div class="colorlib-partner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                        <h2>Trusted Partners</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/frontend/images/brand-1.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/frontend/images/brand-2.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/frontend/images/brand-3.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/frontend/images/brand-4.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="{{ asset('public/frontend/images/brand-5.jpg') }}" class="img-fluid"
                            alt="Free html4 bootstrap 4 template">
                    </div>
                </div>
            </div>
        </div>

        <footer id="colorlib-footer" role="contentinfo">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col footer-col colorlib-widget">
                        <h4>About Footwear</h4>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life</p>
                        <p>
                        <ul class="colorlib-social-icons">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        </ul>
                        </p>
                    </div>
                    <div class="col footer-col colorlib-widget">
                        <h4>Customer Care</h4>
                        <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Returns/Exchange</a></li>
                            <li><a href="#">Gift Voucher</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Special</a></li>
                            <li><a href="#">Customer Services</a></li>
                            <li><a href="#">Site maps</a></li>
                        </ul>
                        </p>
                    </div>
                    <div class="col footer-col colorlib-widget">
                        <h4>Information</h4>
                        <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                        </p>
                    </div>

                    <div class="col footer-col">
                        <h4>News</h4>
                        <ul class="colorlib-footer-links">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Exhibitions</a></li>
                        </ul>
                    </div>

                    <div class="col footer-col">
                        <h4>Contact Information</h4>
                        <ul class="colorlib-footer-links">
                            <li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
                            <li><a href="tel://1234567920">+ 1235 2355 98</a></li>
                            <li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                            <li><a href="#">yoursite.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copy">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>
                            <span>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </span>
                            <span class="block">Demo Images: <a href="http://unsplash.co/"
                                    target="_blank">Unsplash</a> , <a href="http://pexels.com/"
                                    target="_blank">Pexels.com</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <!-- popper -->
    <script src="{{ asset('public/frontend/js/popper.min.js') }}"></script>
    <!-- bootstrap 4.1 -->
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <!-- jQuery easing -->
    <script src="{{ asset('public/frontend/js/jquery.easing.1.3.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('public/frontend/js/jquery.waypoints.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('public/frontend/js/jquery.flexslider-min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('public/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/magnific-popup-options.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('public/frontend/js/bootstrap-datepicker.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('public/frontend/js/jquery.stellar.min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
    <script src="{{ asset('public/frontend/js/sweetalert.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();

                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('/add-cart') }}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function() {
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = '{{ url('/cart') }}';
                            });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{ url('/select-delivery') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.caculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if (matp == '' && maqh == '' && xaid == '') {
                    alert("chọn tỉnh thành để tính phí vận chuyển");
                } else {
                    $.ajax({
                        url: '{{ url('/caculate-fee') }}',
                        method: 'POST',
                        data: {
                            matp: matp,
                            maqh: maqh,
                            xaid: xaid,
                            _token: _token
                        },
                        success: function(data) {
                           location.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
