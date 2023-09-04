<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{BASE_URL."public/admin/img/user.jpg"}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Tên Admin trên ĐB</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">

            <!--Danh mục-->
            <a href="{{url('admin/loai')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Loại</a>
            <!--Sản phẩm-->
            <a href="{{url('admin/san-pham')}}" class="nav-item nav-link"><i class="fab fa-product-hunt me-2"></i></i>Sản phẩm</a>
            <a href="{{url('admin/nguoi-dung')}}" class="nav-item nav-link"><i class="fas fa-user me-2"></i>Người dùng</a>
            <a href="{{url('admin/hoa-don')}}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Hóa đơn</a>

        </div>
    </nav>
</div>
<!-- Sidebar End -->

<!-- Content Start -->
<div class="content">
