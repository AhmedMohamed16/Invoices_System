<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        المنتجات
    @stop

    @include('admin.admincss')


</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.adminsidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->

                @include('admin.navbar')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <!-- end Topbar -->
                <div class="page-title-box">
                    <h4 class="page-title">المنتجات</h4>
                </div>
                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="col-sm-1 col-md-2">
                                    @can('اضافة مستخدم')
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">اضافة
                                            مستخدم</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive hoverable-table">
                                    <table class="table table-hover" id="example1" data-page-length='50'
                                        style=" text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="wd-10p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                                                <th class="wd-15p border-bottom-0">حالة المستخدم</th>
                                                <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                                                <th class="wd-10p border-bottom-0">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $user)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->Status == 'مفعل')
                                                            <span class="label text-success d-flex">
                                                                <div class="dot-label bg-success ml-1"></div>
                                                                {{ $user->Status }}
                                                            </span>
                                                        @else
                                                            <span class="label text-danger d-flex">
                                                                <div class="dot-label bg-danger ml-1"></div>
                                                                {{ $user->Status }}
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $v)
                                                                <label
                                                                    class="badge bg-success">{{ $v }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @can('تعديل مستخدم')
                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                                class="btn btn-sm btn-info" title="تعديل"><i
                                                                    class="las la-pen"></i>تعديل</a>
                                                        @endcan

                                                        @can('حذف مستخدم')
                                                            <a class="modal-effect btn btn-sm btn-danger"
                                                                data-effect="effect-scale"
                                                                data-user_id="{{ $user->id }}"
                                                                data-username="{{ $user->name }}" data-bs-toggle="modal"
                                                                href="#modaldemo8" title="حذف"><i
                                                                    class="las la-trash"></i>حذف</a>

                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                    <!-- Modal effects -->
                    <div class="modal fade" id="modaldemo8" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف المستخدم</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-hidden="true"></button>
                                </div>
                                <form action="{{ route('users.destroy', 'test') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="text" name="user_id" id="user_id" value="">
                                        <input class="form-control" name="username" id="username" type="text"
                                            readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-primary">تاكيد</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>




            </div>


            <!-- content -->

            <!-- Footer Start -->

            @include('admin.adminfooter')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    @include('admin.adminrightside')
    @include('admin.adminscript')
    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var username = button.data('username')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #username').val(username);
        })
    </script>


</body>

</html>
