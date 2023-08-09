@extends('admin_layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Category Product
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
                        <form action="{{ route('save-cate') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name">Name Of Category</label>
                                <input type="text" class="form-control" id="Name" name="name_cat"
                                    placeholder="Enter name of category">
                            </div>
                            <div class="form-group">
                                <label for="Desc">Describe</label>
                                <textarea type="text" class="form-control" id="Desc" name="desc" placeholder="Describe"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Show</label>
                                <select class="form-control m-bot15" name="status">
                                    <option value="0">Hide</option>
                                    <option value="1">Show</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
