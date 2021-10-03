        <!-- bundle -->
        <script src="admin/assets/js/vendor.min.js"></script>
        <script src="admin/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="admin/assets/js/vendor/apexcharts.min.js"></script>
        <script src="admin/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="admin/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="admin/assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>

                @if(Session::has('Add'))
                toastr.options =
                {
                        "closeButton" : true,
                        "progressBar" : true,
                        "positionClass": "toast-top-left",
                }
                toastr.success("{{ session('Add') }}");
                @endif
              
                @if(Session::has('delete'))
                toastr.options =
                {
                        "closeButton" : true,
                        "progressBar" : true,
                        "positionClass": "toast-top-left",

                }
                toastr.error("{{ session('delete') }}");
                @endif
              
                @if(Session::has('edit'))
                toastr.options =
                {
                        "closeButton" : true,
                        "progressBar" : true,
                        "positionClass": "toast-top-left",

                }
                toastr.info("{{ session('edit') }}");
                @endif
              
              </script>
              