<!DOCTYPE html>
<html lang="en">

    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@100..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">





    <!--datatabel-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href=" https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
    {{-- Add jquery    --}}



    <!---->


    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
    </head>
    <body>
        <div class="container-scroller d-flex">
            <!-- partial:./partials/_sidebar.html -->
            @yield('sidebar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            @yield('header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">


                    @yield('content')

                <!-- row end -->

                <!-- row end -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- base:js -->
           <!-- logout -->
        <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('js/jquery.cookie.js" type="text/javascript')}}"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{asset('js/off-canvas.js')}}"></script>
        <script src="{{asset('js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('js/template.js')}}"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
            <script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- Custom js for this page-->
        <script src="{{asset('js/dashboard.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js" integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
        <script>
            $(document).ready(function () {
                $('.nav-link[data-bs-toggle="collapse"]').on('click', function () {
                    $(this).toggleClass('active'); // ทำให้ปุ่มแสดงสถานะเปิด-ปิด
                });
            });
        </script>
        <!-- End custom js for this page-->
        @yield('scriptadd')
    </body>

</html>
