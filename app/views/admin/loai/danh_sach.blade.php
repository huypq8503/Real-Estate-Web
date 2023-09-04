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
                    <div class="input-group mb-3 w-50">
                        <input type="text" class="form-control" name="noi_dung_tk"
                               placeholder="Mời nhập tên loại cần tìm!">
                        <button type="submit" class="btn btn-outline-warning" name="tim_kiem">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <!--Search End-->

            <div class="table-responsive">
                <form action="{{url('admin/loai/xoa-loai/'.$i)}}" method="post" id="form_ds">

                    <input name="dong_y" id="xoa" value="Xóa" type="submit" class="btn btn-outline-danger"
                           style="float: left; margin-bottom: 10px;"
                           onclick="return confirm('Bạn không thể hoàn tác khi đồng ý!')"
                    >

                    <a class="btn btn-outline-primary" href="{{url('admin/loai/them-loai')}}"
                       style="float: left; margin-bottom: 10px; margin-left: 10px;">Thêm</a>
                    <table class="table text-start align-middle table-bordered table-hover mb-10">
                        <thead>
                        <tr class="text-dark">
                            <th class="text-center"><input type="checkbox" id="checkAll"></th>
                            <th scope="col">Mã loại</th>
                            <th scope="col">Tên loại</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $v)
                        <tr>
                            <td class="text-center"><input type="checkbox" class="checkItem"
                                                           value="{{$v->id}}" name="id[]"></td>
                            <td>{{$v->id}}</td>
                            <td>{{$v->ten}}</td>
                            <td>
                                <a class="btn btn-outline-success"
                                   {{$i = isset($i) ? $i : 0}}
                                   href="{{url('admin/loai/sua-loai/'.$i.'/'.$v->id)}}">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
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
