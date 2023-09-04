@extends('layouts.admin.main')
<!-- Recent Sales Start -->
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{$tieuDe}}</h6>
            </div>

            <!--Search Start-->
            <div>
                <form action="{{url("search/$i/$tieuDe/$title/$table/$duong_dan")}}"
                      method="GET">
                    <div class="input-group mb-3 w-75">
                        <input type="text" class="form-control w-50" name="noi_dung_tk"
                               placeholder="Mời nhập tên loại cần tìm!">
                        <select name="key_loai" size="0" id="" class="form-select w-25">
                            <option value="0" selected>Vai trò</option>
                            <option value="1">Admin</option>
                            <option value="2">Client</option>
                        </select>
                        <button type="submit" class="btn btn-outline-warning" name="tim_kiem">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <!--Search End-->

            <div class="table-responsive">
                <form action="{{url('admin/nguoi-dung/xoa-nguoi-dung/'.$i)}}" method="post" id="form_ds">

                    <input name="dong_y" id="xoa" value="Xóa" type="submit" class="btn btn-outline-danger"
                           style="float: left; margin-bottom: 10px;"
                           onclick="return confirm('Bạn không thể hoàn tác khi đồng ý!')"
                    >

                    <a class="btn btn-outline-primary" href="{{url('admin/nguoi-dung/them-nguoi-dung')}}"
                       style="float: left; margin-bottom: 10px; margin-left: 10px;">Thêm</a>
                    <table class="table text-start align-middle table-bordered table-hover mb-10">
                        <thead>
                        <tr class="text-dark">
                            <th class="text-center"><input type="checkbox" id="checkAll"></th>
                            <th scope="col">Mã Người dùng</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Vai trò</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $v)
                            <tr>
                                <td class="text-center"><input type="checkbox" class="checkItem"
                                                               value="{{$v->id}}" name="id[]"></td>
                                <td>{{$v->id_nd}}</td>
                                <td>{{$v->hoTen}}</td>
                                <td>{{$v->email}}</td>
                                <td>{{$v->ten}}</td>
                                <td>
                                    <a class="btn btn-outline-success"
                                       {{$i = isset($i) ? $i : 0}}
                                       href="{{url('admin/nguoi-dung/sua-nguoi-dung/'.$i.'/'.$v->id_nd)}}">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6">
                                <!--Pages Start-->
                                @include('lib.page.form_page')
                                <!--Pages End-->
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
