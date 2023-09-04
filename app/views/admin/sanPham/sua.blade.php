@extends('layouts.admin.main')

@section('content')
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">{{isset($tieuDe) ? $tieuDe : ""}}</h6>
        </div>
        <div class="table-responsive">

            <form action="{{
                url('admin/san-pham/sua-san-pham-post/'.$i.'/'.$load_one->id.'/'.$load_one->ten)}}"
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
                        <input type="text" class="form-control" value="{{$load_one->id}}" style="margin: 10px 0px;"
                               disabled>
                        <label>Tên</label>
                        <input type="text" class="form-control" value="{{$load_one->ten}}" style="margin: 10px 0px;"
                               placeholder="Mời nhập tên" name="ten">
                        <label for="formFileMultiple" class="form-label">Ảnh sản phẩm</label>
                        <input class="form-control mb-3" name="hinh" type="file" id="formFileMultiple" multiple>
                        <img width="350" height="350" src="{{BASE_URL."public/images/img/".$load_one->hinh}}"
                             class="img-fluid mb-3" alt="Responsive image"><br>
                        <label>Đơn giá</label>
                        <input type="text" class="form-control" value="{{$load_one->don_gia}}" style="margin: 10px 0px;"
                               placeholder="Mời nhập đơn giá" name="don_gia">
                        <label>Mô tả</label>
                        <textarea class="form-control mb-3v"
                                  name="mo_ta" id="" cols="30" rows="10"
                                  placeholder="Mời nhập mô tả">{{$load_one->mo_ta}}</textarea>
                        <label>Giảm giá</label>
                        <input type="text" class="form-control" value="{{$load_one->giam_gia}}" style="margin: 10px 0px;"
                               placeholder="Mời nhập giảm giá" name="giam_gia">
                        <label>Loại</label>
                        <select class="form-select" name="loai_id" size="5" aria-label="Default select example">
                            <option value="0">Chọn loại</option>
                            @foreach($all_ds_loai as $v)
                                @if($v->id == $load_one->loai_id)
                                    <option value="{{$v->id}}" selected>{{$v->ten}}</option>
                                @else
                                    <option value="{{$v->id}}">{{$v->ten}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                <div id="error_msg"></div>
                <button type="submit" class="btn btn-outline-primary" name="dong_y">Cập nhật</button>
                <a href="{{url("pages/$i/$tieuDe/$title/$table/$duong_dan")}}"
                   class="btn btn-outline-warning">Danh sách</a>
            </form>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@endsection