@extends('layouts.admin.main')
<!-- Recent Sales Start -->
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{$title = isset($title) ? $title : ""}}</h6>
            </div>

            <!--Search Start-->
            <div>
                <form action="{{url("search/$i/$tieuDe/$title/$table/$duong_dan")}}"
                      method="GET">
                    <div class="input-group mb-3 w-75">
                        <input type="text" class="form-control w-50" name="noi_dung_tk"
                               placeholder="Mời nhập tên loại cần tìm!">
                        <select name="key_loai" size="2" id="" class="form-select w-25">
                            <option value="0" selected>Tất cả loại</option>
                            @foreach($all_ds_loai as $v)
                                <option value="{{$v->id}}">{{$v->ten}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-warning" name="tim_kiem">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <!--Search End-->

            <div class="table-responsive">
                <form action="{{url('admin/san-pham/xoa-san-pham/'.$i)}}" method="post" id="form_ds">

                    <input name="dong_y" id="xoa" value="Xóa" type="submit" class="btn btn-outline-danger"
                           style="float: left; margin-bottom: 10px;"
                           onclick="return confirm('Bạn không thể hoàn tác khi đồng ý!')"
                    >

                    <a class="btn btn-outline-primary" href="{{url('admin/san-pham/them-san-pham')}}"
                       style="float: left; margin-bottom: 10px; margin-left: 10px;">Thêm</a>
                    <table class="table text-start align-middle table-bordered table-hover mb-10">
                        <thead>
                        <tr class="text-dark">
                            <th class="text-center"><input type="checkbox" id="checkAll"></th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Lượt xem</th>
                            <th scope="col">Giảm giá</th>
                            <th scope="col">Loại</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $v)
                            <tr>
                                <td class="text-center"><input type="checkbox" class="checkItem"
                                                               value="{{$v->id_sp}}" name="id[]"></td>
                                <td>{{$v->id_sp}}</td>
                                <td>{{$v->ten_sp}}</td>
                                <td><img width="100" height="100"
                                         src="{{BASE_URL."public/images/img/".$v->hinh}}" alt=""></td>
                                <td>{{number_format($v->don_gia)}} VNĐ</td>
                                <td>{{$v->mo_ta}}</td>
                                <td>{{$v->luot_xem}}</td>
                                <td>{{$v->giam_gia}}</td>
                                <td>{{$v->ten}}</td>
                                <td>
                                    <a class="btn btn-outline-success"
                                       {{$i = isset($i) ? $i : 0}}
                                       href="{{url('admin/san-pham/sua-san-pham/'.$i.'/'.$v->id_sp)}}">Sửa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
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
