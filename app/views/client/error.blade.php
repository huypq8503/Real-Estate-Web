@extends('layouts.client.main')

@section('content')
    <section class="error-page onepage-screen-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <span class="title-highlighter highlighter-secondary"> <i class="fal fa-exclamation-circle"></i> Aaaa! ôi hỏng mất rồi.</span>
                        <h1 class="title">Trang không tồn tại</h1>
                        <p>Có vẻ như chúng tôi không tìm thấy những gì bạn đã tìm kiếm. Trang bạn đang tìm kiếm không tồn tại, tải không đúng cách.</p>
                        <a href="{{url('')}}" class="axil-btn btn-bg-secondary right-icon">Quay về trang chủ <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                        <img src="{{url('public/client/assets/images/others/404.png')}}" alt="404">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection