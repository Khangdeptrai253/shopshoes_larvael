@extends('admin_layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Coupon
                </header>
                <?php
                $massage = session()->get('massage');
                if ($massage) {
                    echo $massage;
                    session()->put('massage', null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form action="{{route('save-coupon')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name">Coupon Name</label>
                                <input type="text" class="form-control" id="Name" name="name_coupon"
                                    placeholder="Enter name of coupon">
                            </div>
                            <div class="form-group">
                                <label for="coupon_code">Coupon Code</label>
                                <textarea type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Coupon Code"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="number_coupon">Number Coupon</label>
                                <textarea type="text" class="form-control" id="number_coupon" name="number_coupon" placeholder="number"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tính Năng Mã</label>
                                <select class="form-control m-bot15" name="func">
                                    <option value="0">--Chọn--</option>
                                    <option value="1">giảm theo %</option>
                                    <option value="2">giảm theo tiền</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="coupon_code">Nhập Số Tiền Hoặc % giảm</label>
                                <textarea type="text" class="form-control" id="coupon_code" name="money_or_percent" placeholder="Coupon Code"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Thêm Mã</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
