@extends('layouts.client.main')

@section('content')
    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area bg-color-white">
            <div class="single-product-thumb axil-section-gap pb--30 pb_sm--20">
                <div class="container">
                    <div class="row row--50">
                        <div class="col-lg-6 mb--40">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-large-thumbnail-2 single-product-thumbnail axil-product slick-layout-wrapper--15 axil-slick-arrow arrow-both-side-3">
                                        <div class="thumbnail">
                                            <img src="{{url('public/images/img/'.$load_one->hinh)}}"
                                                 alt="Product Images">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">{{$load_one->ten_sp}}</h2>
                                    <div class="price-amount price-offer-amount">
                                        <span class="price current-price">{{number_format($load_one->don_gia - (($load_one->don_gia * $load_one->giam_gia) / 100))}} VNĐ</span>
                                        <span class="offer-badge">Giảm {{$load_one->giam_gia}}%</span>
                                    </div>


                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">

                                        <!-- Start Product Action  -->
                                        <ul class="product-action action-style-two d-flex-center mb--0">
                                            <form method="POST" action="{{url("gio-hang-post")}}">
                                                <input type="hidden" name="id_sp" value="{{$load_one->id_sp}}">
                                                <input type="hidden" name="ten_sp" value="{{$load_one->ten_sp}}">
                                                <input type="hidden" name="hinh" value="{{$load_one->hinh}}">
                                                <input type="hidden" name="don_gia" value="{{$load_one->don_gia}}">
                                                <button style="height: 40px; width: 150px;font-size: 15px;"
                                                        class="btn btn-outline-primary" type="submit"
                                                        name="dong_y">Thêm vào giỏ hàng
                                                </button>
                                            </form>
                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->

            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <div class="product-desc-wrapper mb--30 mb_sm--10">
                        <h4 class="mb--60 desc-heading">Description</h4>
                        <div class="row mb--15">
                            <div class="col-lg-6 mb--30">
                                <div class="single-desc">
                                    <h5 class="title">Specifications:</h5>
                                    <p>We’ve created a full-stack structure for our working workflow processes, were
                                        from the funny the century initial all the made, have spare to negatives. But
                                        the structure was from the funny the century rather, initial
                                        all the made, have spare to negatives.</p>
                                </div>
                            </div>
                            <!-- End .col-lg-6 -->
                            <div class="col-lg-6 mb--30">
                                <div class="single-desc">
                                    <h5 class="title">Care & Maintenance:</h5>
                                    <p>Use warm water to describe us as a product team that creates amazing UI/UX
                                        experiences, by crafting top-notch user experience.</p>
                                </div>
                            </div>
                            <!-- End .col-lg-6 -->
                        </div>
                        <!-- End .row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="pro-des-features">
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="assets/images/product/product-thumb/icon-3.png" alt="icon">
                                        </div>
                                        Easy Returns
                                    </li>
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="assets/images/product/product-thumb/icon-2.png" alt="icon">
                                        </div>
                                        Quality Service
                                    </li>
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="assets/images/product/product-thumb/icon-1.png" alt="icon">
                                        </div>
                                        Original Product
                                    </li>
                                </ul>
                                <!-- End .pro-des-features -->
                            </div>
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-desc-wrapper -->
                    <div class="additional-info pb--40 pb_sm--20">
                        <h4 class="mb--60">Additional Information</h4>
                        <div class="product-additional-info">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                    <tr>
                                        <th>Stand Up</th>
                                        <td>35″L x 24″W x 37-45″H(front to back wheel)</td>
                                    </tr>
                                    <tr>
                                        <th>Folded (w/o wheels)</th>
                                        <td>32.5″L x 18.5″W x 16.5″H</td>
                                    </tr>
                                    <tr>
                                        <th>Folded (w/ wheels)</th>
                                        <td>32.5″L x 24″W x 18.5″H</td>
                                    </tr>
                                    <tr>
                                        <th>Door Pass Through</th>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <th>Frame</th>
                                        <td>Aluminum</td>
                                    </tr>
                                    <tr>
                                        <th>Weight (w/o wheels)</th>
                                        <td>20 LBS</td>
                                    </tr>
                                    <tr>
                                        <th>Weight Capacity</th>
                                        <td>60 LBS</td>
                                    </tr>
                                    <tr>
                                        <th>Width</th>
                                        <td>24″</td>
                                    </tr>
                                    <tr>
                                        <th>Handle height (ground to handle)</th>
                                        <td>37-45″</td>
                                    </tr>
                                    <tr>
                                        <th>Wheels</th>
                                        <td>Aluminum</td>
                                    </tr>
                                    <tr>
                                        <th>Size</th>
                                        <td>S, M, X, XL</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End .product-additional-info -->
                    </div>

                    <div class="reviews-wrapper">
                        <h4 class="mb--60">Reviews</h4>
                        <div class="row">
                            <div class="col-lg-6 mb--40">
                                <div class="axil-comment-area pro-desc-commnet-area">
                                    <h5 class="title">01 Review for this product</h5>
                                    <ul class="comment-list">
                                        <!-- Start Single Comment  -->
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img src="assets/images/blog/author-image-4.png"
                                                             alt="Author Images">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="Cameron Williamson">Eleanor Pena</span>
                                                                </span>
                                                            </a>
                                                            <span class="commenter-rating ratiing-four-star">
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star empty-rating"></i></a>
                                                            </span>
                                                        </h6>
                                                        <div class="comment-text">
                                                            <p>“We’ve created a full-stack structure for our working
                                                                workflow processes, were from the funny the century
                                                                initial all the made, have spare to negatives. ” </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Single Comment  -->

                                        <!-- Start Single Comment  -->
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img src="assets/images/blog/author-image-4.png"
                                                             alt="Author Images">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="Rahabi Khan">Courtney Henry</span>
                                                                </span>
                                                            </a>
                                                            <span class="commenter-rating ratiing-four-star">
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                            </span>
                                                        </h6>
                                                        <div class="comment-text">
                                                            <p>“We’ve created a full-stack structure for our working
                                                                workflow processes, were from the funny the century
                                                                initial all the made, have spare to negatives. ”</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Single Comment  -->

                                        <!-- Start Single Comment  -->
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img src="assets/images/blog/author-image-5.png"
                                                             alt="Author Images">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="Rahabi Khan">Devon Lane</span>
                                                                </span>
                                                            </a>
                                                            <span class="commenter-rating ratiing-four-star">
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                            </span>
                                                        </h6>
                                                        <div class="comment-text">
                                                            <p>“We’ve created a full-stack structure for our working
                                                                workflow processes, were from the funny the century
                                                                initial all the made, have spare to negatives. ” </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Single Comment  -->
                                    </ul>
                                </div>
                                <!-- End .axil-commnet-area -->
                            </div>
                            <!-- End .col -->
                            <div class="col-lg-6 mb--40">
                                <!-- Start Comment Respond  -->
                                <div class="comment-respond pro-des-commend-respond mt--0">
                                    <h5 class="title mb--30">Add a Review</h5>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <div class="rating-wrapper d-flex-center mb--40">
                                        Your Rating <span class="require">*</span>
                                        <div class="reating-inner ml--20">
                                            <a href="#"><i class="fal fa-star"></i></a>
                                            <a href="#"><i class="fal fa-star"></i></a>
                                            <a href="#"><i class="fal fa-star"></i></a>
                                            <a href="#"><i class="fal fa-star"></i></a>
                                            <a href="#"><i class="fal fa-star"></i></a>
                                        </div>
                                    </div>

                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Other Notes (optional)</label>
                                                    <textarea name="message" placeholder="Your Comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Name <span class="require">*</span></label>
                                                    <input id="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Email <span class="require">*</span> </label>
                                                    <input id="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <button type="submit" id="submit"
                                                            class="axil-btn btn-bg-primary w-auto">Send Message
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Comment Respond  -->
                            </div>
                            <!-- End .col -->
                        </div>
                    </div>
                    <!-- End .reviews-wrapper -->
                </div>
            </div>
            <!-- woocommerce-tabs -->

        </div>
        <!-- End Shop Area  -->

        <!-- End Axil Newsletter Area  -->
    </main>
@endsection