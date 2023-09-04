@extends('layouts.admin.main')
@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{$title = isset($title) ? $title : ""}}</h6>
            </div>
            <div class="table-responsive">
                <form action="{{url('admin/nguoi-dung/sua-nguoi-dung-post/'.$i.'/'.$load_one->id_nd)}}" method="post" id="form_ds">
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
                    <div class="form-group">
                        <label>Mã người dùng</label>
                        <input type="text" class="form-control" value="{{$load_one->id_nd}}" style="margin: 10px 0px;"
                               disabled>
                        <label>Họ tên</label>
                        <input type="text" class="form-control" style="margin: 10px 0px;"
                               placeholder="Mời nhập họ tên" value="{{$load_one->hoTen}}" name="hoTen">
                        <label>Vai trò</label>
                        <select name="vai_tro_id" id="" class="form-select mb-3" size="0" aria-label="Default select example">
                            <option value="0">Chọn vai trò</option>
                            <option value="1" {{$load_one->id == 1 ? "selected" : ""}}>Admin</option>
                            <option value="2" {{$load_one->id == 2 ? "selected" : ""}}>Client</option>
                        </select>
                    </div>
                    <div id="error_msg"></div>
                    <button type="submit" class="btn btn-outline-primary" name="dong_y">Thêm</button>
                    <a href="{{url("pages/$i/$tieuDe/$title/$table/$duong_dan")}}" class="btn btn-outline-warning">Danh sách</a>
                </form>
            </div>

        </div>
    </div>
    <!-- Recent Sales End -->
@endsection