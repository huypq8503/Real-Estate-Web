@extends('layouts.admin.main')
@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{$title = isset($title) ? $title : ""}}</h6>
            </div>
            <div class="table-responsive">
                <form action="{{url('admin/san-pham/them-san-pham-post')}}"
                      method="post" id="form_ds" enctype="multipart/form-data">
                    @isset($_SESSION['errors'])
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($_SESSION['errors'] as $v)
                                    <li><strong>{{$v}}</strong></li>
                                @endforeach
                                @unset($_SESSION['errors'])
                            </ul>
                        </div>
                    @endisset
                    <div class="form-group mb-3">
                        <label>Mã sản phẩm</label>
                        <input type="text" class="form-control mb-3" style="margin: 10px 0px;"
                               disabled>
                        <label>Tên</label>
                        <input type="text" class="form-control mb-3" style="margin: 10px 0px;"
                               placeholder="Mời nhập tên" name="ten">
                        <label for="formFileMultiple" class="form-label">Ảnh sản phẩm</label>
                        <input class="form-control mb-3" name="hinh" type="file" id="formFileMultiple" multiple>
                        <label>Đơn giá</label>
                        <input type="text" class="form-control mb-3" style="margin: 10px 0px;"
                               placeholder="Mời nhập đơn giá" name="don_gia">
                        <label>Mô tả</label>
                        <textarea class="form-control mb-3" name="mo_ta" id="" cols="30" rows="10"
                                  placeholder="Mời nhập mô tả"></textarea>
                        <label>Giảm giá</label>
                        <input type="text" class="form-control mb-3" style="margin: 10px 0px;"
                               placeholder="Mời nhập giảm giá" name="giam_gia">
                        <label>Loại</label>
                        <select class="form-select" name="loai_id" size="5" aria-label="Default select example">
                            <option selected value="0">Chọn loại</option>
                            @foreach($all_ds_loai as $v)
                            <option value="{{$v->id}}">{{$v->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="dong_y">Thêm</button>
                    <a href="{{url('admin/san-pham')}}" class="btn btn-outline-warning">Danh sách</a>
                </form>
            </div>

        </div>
    </div>
    <!-- Recent Sales End -->
@endsection