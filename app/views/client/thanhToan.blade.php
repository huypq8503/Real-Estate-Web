@extends('layouts.client.main')

@section('content')
    <main class="main-wrapper">

        <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <form action="{{url('hoa-don')}}" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="axil-checkout-billing">
                                <h4 class="title mb--40">Chi tiết đơn hàng</h4>
                                <div class="form-group">
                                    <label>Họ Tên</label>
                                    <input type="text" id="company-name" value="{{$_SESSION['nguoi_dung']->hoTen}}">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ<span>*</span></label>
                                    <input type="text" id="address2" placeholder="Nhập địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại<span>*</span></label>
                                    <input type="text" id="town" placeholder="Mời nhập số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label>Email<span>*</span></label>
                                    <input type="email" id="email" value="{{$_SESSION['nguoi_dung']->email}}"
                                           placeholder="Mời nhập địa chỉ email">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Bạn đã đặt</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $tong = 0 ?>
                                        @foreach($_SESSION['san_pham'] as $v)
                                            <?php
                                            $thanh_tien = $v['so_luong'] * $v['don_gia'];
                                            $tong = $tong + $thanh_tien;
                                            ?>
                                            <input type="hidden" name="thanh_tien" value="{{$thanh_tien}}">
                                            <input type="hidden" name="so_luong" value="{{$v['so_luong']}}">
                                            <input type="hidden" name="nguoi_dung_id" value="{{$_SESSION['nguoi_dung']->id}}">
                                            <input type="hidden" name="san_pham_id" value="{{$v['id_sp']}}">
                                            <tr class="order-product">
                                                <td>{{$v['ten_sp']}} <span class="quantity">x{{$v['so_luong']}}</span>
                                                </td>
                                                <td>{{number_format($thanh_tien)}} VNĐ</td>
                                            </tr>
                                        @endforeach
                                        <tr class="order-shipping">
                                            <td colspan="2">
                                                <div class="shipping-amount">
                                                    <span class="title">Tiền giao hàng</span>
                                                    <span class="amount">50,000 VNĐ</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" id="radio1" name="shipping" checked>
                                                    <label for="radio1">Miễn phí ship</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>Tổng tiền</td>
                                            <td class="order-total-amount">{{number_format($tong+50000)}} VNĐ</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="order-payment-method">
                                    <div class="single-payment">
                                        <div class="input-group">
                                            <input type="radio" id="radio4" name="payment" checked>
                                            <label for="radio4">Thanh toán khi nhận hàng</label>
                                        </div>
                                        <p>Bạn sẽ thanh toán khi nhận được sản phẩm của chúng tôi.</p>
                                    </div>
                                </div>
                                <button type="submit" name="dong_y" class="axil-btn btn-bg-primary checkout-btn">Đặt hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Checkout Area  -->

    </main>
@endsection