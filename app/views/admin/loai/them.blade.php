@extends('layouts.admin.main')
@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{$title = isset($title) ? $title : ""}}</h6>
            </div>
            <div class="table-responsive">
                <form action="{{url('admin/loai/them-loai-post')}}" method="post" id="form_ds">
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
                        <label>Mã loại</label>
                        <input type="text" class="form-control" style="margin: 10px 0px;"
                               disabled>
                        <label>Loại</label>
                        <input type="text" class="form-control" style="margin: 10px 0px;"
                               placeholder="Mời nhập loại" name="ten">
                    </div>
                    <div id="error_msg"></div>
                    <button type="submit" class="btn btn-outline-primary" name="dong_y">Thêm</button>
                    <a href="{{url('admin/loai')}}" class="btn btn-outline-warning">Danh sách</a>
                </form>
            </div>

        </div>
    </div>
    <!-- Recent Sales End -->
@endsection