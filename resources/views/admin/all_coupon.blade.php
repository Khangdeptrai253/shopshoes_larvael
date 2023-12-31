@extends('admin_layout');
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Responsive Table
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>

                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Name</th>
                            <th>code</th>
                            <th>number</th>
                            <th>function</th>
                            <th>condition</th>
                            <th style="width:30px;"></th>
                        </tr>

                    </thead>
                    <?php
                    $massage = session()->get('massage');
                    if ($massage) {
                        echo $massage;
                        session()->put('massage', null);
                    }
                    ?>
                    <tbody>
                        @foreach ($all_coupon as $key => $value)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td><?= $value->coupon_name ?></td>
                                <td><span class="text-ellipsis"><?= $value->coupon_code ?></span></td>
                                <td><span class="text-ellipsis">
                                        <?= $value->coupon_number ?>
                                    </span></td>
                                    <td><span class="text-ellipsis">
                                        <?php
                                        if ($value->coupon_number == 1) {
                                        ?>
                                                <p>giảm theo %</p>
                                            <?php
                                            } else {
                                                ?>
                                            <p>giảm tiền</p>
                                            <?php
                                            }
                                            ?>
                                    </span></td>
                                    <td><span class="text-ellipsis">
                                        <?php
                                        if ($value->coupon_number == 1) {
                                        ?>
                                                <p><?= $value->coupon_condition ?> VND</p>
                                            <?php
                                            } else {
                                                ?>
                                              <p><?= $value->coupon_condition ?>%</p>
                                            <?php
                                            }
                                            ?>
                                    </span></td>
                                <td>
                                    <a href="{{route('delete-coupon',[$value->coupon_id])}}"
                                        onclick="return confirm('Are you sure?')" class="active" ui-toggle-class=""> <i
                                            class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
