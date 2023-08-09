@extends('admin_layout')
@section('content');
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Category Product
                </header>
                <?php
                $massage = session()->get('massage');
                if ($massage) {
                    echo $massage;
                    session()->put('massage', null);
                }
                ?>
                <div class="panel-body">
                    @foreach ($one_of_brand as $key=>$value )


                    <div class="position-center">
                        <form action="{{ route('update-brand',[$value->brand_id]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name">Name Of Brand</label>
                                <input type="text" class="form-control" id="Name" name="name_brand"
                                    placeholder="Enter name of category" value="<?= $value->brand_name ?>">
                            </div>
                            <div class="form-group">
                                <label for="Desc">Describe</label>
                                <textarea type="text" class="form-control" id="Desc" name="desc" placeholder="Describe"><?= $value->brand_desc ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">edit brand</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
