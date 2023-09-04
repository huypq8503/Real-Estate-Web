@extends('layouts.client.main')

@section('content')
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <h1 class="title">Tất cả sản phẩm</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            <div class="bradcrumb-thumb">
                                <img src="{{url('public/client/assets/images/product/product-45.png')}}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-shop-top">
                            <form action="{{url('')}}" method="GET">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="category-select">
                                            <!-- Start Single Select  -->
                                            <select name="loai" class="single-select">
                                                <option selected value="0">Loại</option>
                                                @foreach($all_ds_loai as $v)
                                                    <option value="{{$v->id}}">{{$v->ten}}</option>
                                                @endforeach
                                            </select>
                                            <!-- End Single Select  -->

                                            <!-- Start Single Select  -->
                                            <select name="gia" class="single-select">
                                                <option value="0" selected>Giá</option>
                                                <option value="1">0 - 1,000,000</option>
                                                <option value="2">1,000,000 - 10,000,000</option>
                                                <option value="3">10,000,000 - 20,000,000</option>
                                                <option value="4"> > 20,000,000</option>
                                            </select>
                                            <!-- End Single Select  -->
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div style="float: right;clear: both; width: 150px;">
                                            <button style="height: 50px; font-size: 15px;" type="submit"
                                                    class="btn btn-outline-primary">Lọc sản phẩm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Sản phẩm-->
                <div class="row row--15">
                    @if($all)
                        @foreach($all as $v)
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="axil-product product-style-one has-color-pick mt--40">
                                    <div class="thumbnail">
                                        <a href="{{url('chi-tiet-san-pham/'.$v->id_sp)}}">
                                            <img style="height: 250px;" src="{{url('public/images/img/'.$v->hinh)}}"
                                                 alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">{{$v->giam_gia}}% OFF</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                                class="far fa-heart"></i></a></li>
                                                <li class="select-option">
                                                    <form method="POST" action="{{url("gio-hang-post")}}">
                                                        <input type="hidden" name="id_sp" value="{{$v->id_sp}}">
                                                        <input type="hidden" name="ten_sp" value="{{$v->ten_sp}}">
                                                        <input type="hidden" name="hinh" value="{{$v->hinh}}">
                                                        <input type="hidden" name="don_gia" value="{{$v->don_gia}}">
                                                        <button style="height: 40px; width: 150px;font-size: 15px;"
                                                                class="btn btn-outline-primary" type="submit"
                                                                name="dong_y">Thêm vào giỏ hàng
                                                        </button>
                                                    </form>
                                                </li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                                         data-bs-target="#quick-view-modal"><i
                                                                class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">{{$v->ten}}</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">{{number_format($v->don_gia - (($v->don_gia*$v->giam_gia) / 100))}} VNĐ</span>
                                                <span class="price old-price">{{number_format($giamGia = ($v->don_gia*$v->giam_gia) / 100)}} VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- End Single Product  -->
                </div>
                <div class="text-center pt--30">
                    <!--Pages Start-->
                    @include('lib.page.form_page')
                    <!--Pages End-->
                </div>

            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->
    </main>
@endsection