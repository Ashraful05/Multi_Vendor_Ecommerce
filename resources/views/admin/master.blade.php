<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/admin-assets') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('/admin-assets') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/admin-assets') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->

    <link rel="stylesheet" href="{{ asset('/admin-assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('/admin-assets') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets') }}/js/select.dataTables.min.css">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/admin-assets') }}/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="{{ asset('/admin-assets') }}/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/admin-assets') }}/images/favicon.png" />
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/datatables.bootstrap4.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.includes.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include("admin.includes.sidebar")
        <!-- partial -->
        <div class="main-panel">
            @yield('body')
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
           @include('admin.includes.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->

<script src="{{ asset('/admin-assets') }}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('/admin-assets') }}/vendors/chart.js/Chart.min.js"></script>
{{--<script src="{{ asset('/admin-assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>--}}
<script src="{{ asset('/admin-assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('/admin-assets') }}/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('/admin-assets') }}/js/off-canvas.js"></script>
<script src="{{ asset('/admin-assets') }}/js/hoverable-collapse.js"></script>
<script src="{{ asset('/admin-assets') }}/js/template.js"></script>
<script src="{{ asset('/admin-assets') }}/js/settings.js"></script>
<script src="{{ asset('/admin-assets') }}/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('/admin-assets') }}/js/dashboard.js"></script>
<script src="{{ asset('/admin-assets') }}/js/Chart.roundedBarCharts.js"></script>


<!-- End custom js for this page-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('/admin-assets/js/custom.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
{{--<script>--}}
{{--        $(document).on("click", "#confirmDelete", function(e){--}}
{{--            e.preventDefault();--}}
{{--            var link = $(this).attr("href");--}}
{{--            swal({--}}
{{--                title: "Are you Want to delete?",--}}
{{--                text: "Once Delete, This will be Permanently Delete!",--}}
{{--                icon: "warning",--}}
{{--                buttons: true,--}}
{{--                dangerMode: true,--}}
{{--            })--}}
{{--                .then((willDelete) => {--}}
{{--                    if (willDelete) {--}}
{{--                        window.location.href = link;--}}
{{--                    } else {--}}
{{--                        swal("Safe Data!");--}}
{{--                    }--}}
{{--                });--}}
{{--        });--}}
{{--</script>--}}
</body>

</html>

