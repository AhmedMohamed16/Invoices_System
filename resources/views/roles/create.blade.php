<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        المنتجات
    @stop

    <base href="/public">
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

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الصلاحيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                نوع مستخدم</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->

            </div>

            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <div class="form-group">
                                        <p>اسم الصلاحية :</p>
                                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- col -->
                                <div class="col-lg-4">
                                    <ul id="treeview1">
                                        <li><a href="#">الصلاحيات</a>
                                            <ul>
                                        </li>
                                        @foreach($permission as $value)
                                        <label
                                            style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ $value->name }}</label>
            
                                        @endforeach
                                        </li>
            
                                    </ul>
                                    </li>
                                    </ul>
                                </div>
                                <!-- /col -->
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">تاكيد</button>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <!-- row closed -->
            </div>
            <!-- Container closed -->
            </div>
            <!-- main-content closed -->
            
            {!! Form::close() !!}
            
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
</body>

</html>
