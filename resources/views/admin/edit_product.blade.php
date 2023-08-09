@extends('admin_layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Product
                </header>
                <?php
                $massage = session()->get('massage');
                if ($massage) {
                    echo $massage;
                    session()->put('massage', null);
                }
                ?>
                <div class="panel-body">
                    @foreach ($one_of_product as $key=>$value )


                    <div class="position-center">
                        <form action="{{ route('update-product',[$value->product_id]) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name">Name Product</label>
                                <input type="text" class="form-control" id="Name" name="name_product"
                                    placeholder="Enter name of category" value="<?=$value->product_name?>">
                            </div>
                            <div class="form-group">
                                <label for="Desc">Describe</label>
                                <textarea type="text" class="form-control" id="Desc" name="desc" placeholder="Describe"><?=$value->product_desc?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Desc">Content</label>
                                <textarea type="text" class="form-control" id="Desc" name="content" placeholder="Describe"><?=$value->content?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Name">Price Product</label>
                                <input type="text" class="form-control" id="Name" name="price" value="<?=$value->price?>"
                                    placeholder="Enter name of category">
                            </div>
                            <div class="form-group">
                                <label for="Name">Image</label>
                                <input type="file" class="form-control" id="Name" name="image"
                                    placeholder="Enter name of category">
                                  <img src="../public/uploads/products/<?= $value->image ?>" height="100" width="100" alt="">

                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control m-bot15" name="category_product">
                                    @foreach($category_product as $key=>$cate)
                                    @if ($cate->category_id == $value->product_id)
                                    <option value="<?= $cate->category_id ?>"><?= $cate->category_name ?></option>
                                    @else
                                    <option value="<?= $cate->category_id ?>"><?= $cate->category_name ?></option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select class="form-control m-bot15" name="brand_product">
                                    @foreach ($brand_product as $key=>$brand )
                                    <option value="<?= $brand->brand_id ?>"><?= $brand->brand_name ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Update Product</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
