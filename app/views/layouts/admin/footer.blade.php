<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div style="text-align: center">
                &copy; <a href="https://www.facebook.com/Phamduc2003xxx">phamduc1823</a> All Right Reserved.
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
</div>
<!-- Content End -->


<!-- Back to Top -->
<!--<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>-->
</div>
<script type="text/javascript">
    //Chọn checkbox để xóa
    $(document).ready(function () {
        $("#checkAll").click(function () {
            if ($(this).is(":checked")) {
                $(".checkItem").prop('checked', true);
            } else {
                $(".checkItem").prop('checked', false);
            }
        });
    });
</script>

<!--Sweet-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.6.1/dist/sweetalert2.all.min.js"></script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{BASE_URL.'public/admin/lib/chart/chart.min.js'}}"></script>
<script src="{{BASE_URL.'public/admin/lib/easing/easing.min.js'}}"></script>
<script src="{{BASE_URL.'public/admin/lib/waypoints/waypoints.min.js'}}"></script>
<script src="{{BASE_URL.'public/admin/lib/owlcarousel/owl.carousel.min.js'}}"></script>
<script src="{{BASE_URL.'public/admin/lib/tempusdominus/js/moment.min.js'}}"></script>
<script src="{{BASE_URL.'public/admin/lib/tempusdominus/js/moment-timezone.min.js'}}"></script>
<script src="{{BASE_URL.'public/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'}}"></script>

<!-- Template Javascript -->
<script src="{{BASE_URL.'public/admin/js/main.js'}}"></script>

</body>

</html>