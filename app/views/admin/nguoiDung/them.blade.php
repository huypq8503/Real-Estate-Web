@extends('layouts.admin.main')
@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{$title = isset($title) ? $title : ""}}</h6>
            </div>
            <div class="table-responsive">
                <form action="{{url('admin/nguoi-dung/them-nguoi-dung-post')}}" method="post" id="form_ds">
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
                        <input type="text" class="form-control" style="margin: 10px 0px;"
                               disabled>
                        <label>Họ tên</label>
                        <input type="text" class="form-control" style="margin: 10px 0px;"
                               placeholder="Mời nhập họ tên" name="hoTen">
                        <label>Email</label>
                        <input type="text" class="form-control" style="margin: 10px 0px;"
                               placeholder="Mời nhập email" name="email">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" style="margin: 10px 0px;"
                               placeholder="Mời nhập mật khẩu" name="matKhau">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" style="margin: 10px 0px;"
                               placeholder="Mời nhập lại mật khẩu" name="nhapLaiMatKhau">
                        <label>Vai trò</label>
                        <select name="vai_tro_id" id="" class="form-select mb-3" size="0" aria-label="Default select example">
                            <option value="0">Chọn vai trò</option>
                            <option value="1">Admin</option>
                            <option value="2">Client</option>
                        </select>
                    </div>
                    <div id="error_msg"></div>
                    <button type="submit" class="btn btn-outline-primary" name="dong_y">Thêm</button>
                    <a href="{{url('admin/nguoi-dung')}}" class="btn btn-outline-warning">Danh sách</a>
                </form>
            </div>

        </div>
    </div>
    <!-- Recent Sales End -->
@endsection