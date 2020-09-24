<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href="{{ asset('/sb_admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/sb_admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ asset('/sb_admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    @yield('style_css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.components.admin_sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.components.admin_navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('admin.components.admin_footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/sb_admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/sb_admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/sb_admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/sb_admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/sb_admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/sb_admin/js/demo/chart-pie-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/sb_admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/sb_admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/sb_admin/js/demo/datatables-demo.js') }}"></script>

</body>

</html>