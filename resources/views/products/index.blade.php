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
                <div class="d-flex justify-content-between" style="padding-bottom: 10px">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        اضافة منتج
                    </button>
                </div>

                <table id="example1" class="table table-bordered table-centered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المنتج</th>
                            <th>اسم البنك</th>
                            <th>ملاحظات</th>
                            <th class="text-center">العمليات</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($products as $Product)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $Product->Product_name }}</td>
                                <td>{{ $Product->bank->bank_name }}</td>
                                <td>{{ $Product->description }}</td>
                                <td class="text-center">
                                    <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $Product->id }}">تعديل</button>


                                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $Product->id }}">حذف</button>


                                </td>
                            </tr>

                            @include('products.edit')
                            @include('products.delete')
    
                        @endforeach



                        {{-- @include('invoices.delete') --}}

                    </tbody>
                </table>

            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                اضافة اسم منتج
                            </h5>
                        </div>
                        <div class="modal-body">
                            <!-- add_form  route('Grades.store')  -->
                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="mr-sm-2">اسم المنتج
                                            :</label>
                                        <input id="Name" type="text" name="Product_name" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="" class="mr-sm-2">اسم البنك
                                            :</label>
                                        <select name="bank_id" id="bank_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد البنك--</option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">الملاحظات
                                        :</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                                <br><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary">تاكيد</button>
                        </div>
                        </form>

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
</body>

</html>
