@extends('layouts.client.main')

@section('content')
    <main class="main-wrapper">

        <!-- Start Cart Area  -->
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <div class="axil-product-cart-wrap">
                    <div class="product-table-heading">
                        <h4 class="title">Your Cart</h4>
                        <a href="{{url('xoa-gio-hang/clear')}}" class="cart-clear">Xóa giỏ hàng</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40">
                            <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Sản phẩm</th>
                                <th scope="col" class="product-title">Tên</th>
                                <th scope="col" class="product-price">Giá</th>
                                <th scope="col" class="product-quantity">Số lượng</th>
                                <th scope="col" class="product-subtotal">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($_SESSION['san_pham']))
                                <?php $tong = 0; $i = 0; ?>
                                @foreach($_SESSION['san_pham'] as $v)
                                    <?php
                                    $thanh_tien = $v['so_luong'] * $v['don_gia'];
                                    $tong = $tong + $thanh_tien;
                                    ?>
                                    <tr>
                                        <td class="product-remove"><a href="{{url('xoa-gio-hang/'.$i)}}" class="remove-wishlist"><i
                                                        class="fal fa-times"></i></a></td>
                                        <td class="product-thumbnail"><a href="single-product.html"><img
                                                        src="{{url("public/images/img/".$v['hinh'])}}"
                                                        alt="Digital Product"></a></td>
                                        <td class="product-title"><a href="single-product.html">{{$v['ten_sp']}}</a>
                                        </td>
                                        <td class="product-price" data-title="Price">{{number_format($v['don_gia'])}}<span
                                                    class="currency-symbol"> VNĐ</span>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{url('tru-sl/'.$v['id_sp'])}}"><i class="fas fa-minus-circle"></i></a>
                                                    <a href="" style="font-size: 20px;">{{$v['so_luong']}}</a>
                                                <a href="{{url('them-sl/'.$v['id_sp'])}}"><i class="fas fa-plus-circle"></i></a>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal">{{number_format($thanh_tien)}}<span
                                                    class="currency-symbol"> VNĐ</span>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                            @endif
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="6">Tổng tiền: @isset($tong) {{number_format($tong)}} @endif VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-update-btn-area">
                        <div class="input-group product-cupon"></div>
                        <div class="update-btn">
                            <a href="{{url("thanh-toan")}}" class="axil-btn btn-outline">Tiếp tục đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Cart Area  -->

    </main>
@endsection