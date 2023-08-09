@extends('admin_layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Product
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
                        <form action="{{ route('save-product') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name">Name Product</label>
                                <input type="text" class="form-control" id="Name" name="name_product"
                                    placeholder="Enter name of category">
                            </div>
                            <div class="form-group">
                                <label for="Desc">Describe</label>
                                <textarea type="text" class="form-control" id="Desc" name="desc" placeholder="Describe"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Desc">Content</label>
                                <textarea type="text" class="form-control" id="Desc" name="content" placeholder="Describe"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Name">Price Product</label>
                                <input type="text" class="form-control" id="Name" name="price"
                                    placeholder="Enter name of category">
                            </div>
                            <div class="form-group">
                                <label for="Name">Image</label>
                                <input type="file" class="form-control" id="Name" name="image"
                                    placeholder="Enter name of category">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control m-bot15" name="status">
                                    <option value="0">Hide</option>
                                    <option value="1">Show</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control m-bot15" name="category">
                                    @foreach ( $cate_product as $key=>$cate )
                                    <option value="<?= $cate->category_id ?>"><?= $cate->category_name ?></option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select class="form-control m-bot15" name="brand">
                                    @foreach ( $brand_product as $key=>$brand )
                                    <option value="<?= $brand->brand_id ?>"><?= $brand->brand_name ?></option>
                                    @endforeach


                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thêm Sản Phẩm</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
