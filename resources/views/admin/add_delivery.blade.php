@extends('admin_layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Delivery
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
                        <form>
                          @csrf
                            <div class="form-group">
                                <label for="">Chọn Tỉnh Thành</label>
                                <select class="form-control m-bot15 choose city" name="city" id="city">
                                    <option value="0">-----Thành Phố</option>
                                    @foreach($city as $key=>$value)
                                    <option value="<?= $value->matp ?>"><?= $value->name ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn Quận Huyện</label>
                                <select class="form-control m-bot15 choose province" name="province" id="province">
                                    <option value="">-----Quận Huyện-----</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn Xã Phường Thị Trấn</label>
                                <select class="form-control m-bot15 wards" name="wards" id="wards">
                                    <option value="">-----Xã Phường Thị Trấn-----</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Name">Thêm Phí Vận Chuyển</label>
                                <input type="text" class="form-control fee_ship" id="fee_ship" name="fee_ship"
                                    placeholder="Thêm Phí">
                            </div>
                            <div id= "load_delivery">
                            </div>
                            <button type="button" class="btn btn-info add_delivery">Submit</button>
                        </form>
                        <div id= "load_delivery">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
