<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        تفاصيل الفاتورة
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
                    <h4 class="page-title">تفاصيل الفاتورة</h4>
                </div>
                <div class="d-flex justify-content-between" style="padding-bottom: 10px">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        اضافة منتج
                    </button>
                </div>

                <div class="col-xl-12">
                    <!-- div -->
                    <div class="card mg-b-20" id="tabs-style2">
                        <div class="card-body">
                            <div class="text-wrap">
                                <div class="example">
                                    <div class="panel panel-primary tabs-style-2">
                                        <div class=" tab-menu-heading">
                                            <div class="tabs-menu1">
                                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                                    <li class="nav-item">
                                                        <a href="#tab4" data-bs-toggle="tab" aria-expanded="false"
                                                            class="nav-link rounded-0 active">
                                                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">معلومات الفاتورة</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#tab5" data-bs-toggle="tab" aria-expanded="true"
                                                            class="nav-link rounded-0">
                                                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">حالات الدفع</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#tab6" data-bs-toggle="tab" aria-expanded="false"
                                                            class="nav-link rounded-0">
                                                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">المرفقات</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body main-content-body-right border">
                                            <div class="tab-content">


                                                <div class="tab-pane active" id="tab4">
                                                    <div class="table-responsive mt-15">

                                                        <table class="table table-striped" style="text-align:center">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">رقم الفاتورة</th>
                                                                    <td>{{ $invoices->invoice_number }}</td>
                                                                    <th scope="row">تاريخ الاصدار</th>
                                                                    <td>{{ $invoices->invoice_Date }}</td>
                                                                    <th scope="row">تاريخ الاستحقاق</th>
                                                                    <td>{{ $invoices->Due_date }}</td>
                                                                    <th scope="row">القسم</th>
                                                                    <td>{{ $invoices->Bank->bank_name }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope="row">المنتج</th>
                                                                    <td>{{ $invoices->product }}</td>
                                                                    <th scope="row">مبلغ التحصيل</th>
                                                                    <td>{{ $invoices->Amount_collection }}</td>
                                                                    <th scope="row">مبلغ العمولة</th>
                                                                    <td>{{ $invoices->Amount_Commission }}</td>
                                                                    <th scope="row">الخصم</th>
                                                                    <td>{{ $invoices->Discount }}</td>
                                                                </tr>


                                                                <tr>
                                                                    <th scope="row">نسبة الضريبة</th>
                                                                    <td>{{ $invoices->Rate_VAT }}</td>
                                                                    <th scope="row">قيمة الضريبة</th>
                                                                    <td>{{ $invoices->Value_VAT }}</td>
                                                                    <th scope="row">الاجمالي مع الضريبة</th>
                                                                    <td>{{ $invoices->Total }}</td>
                                                                    <th scope="row">الحالة الحالية</th>

                                                                    @if ($invoices->Value_Status == 1)
                                                                        <td><span
                                                                                class="badge bg-success rounded-pill">{{ $invoices->Status }}</span>
                                                                        </td>
                                                                    @elseif($invoices->Value_Status ==2)
                                                                        <td><span
                                                                                class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                                        </td>
                                                                    @else
                                                                        <td><span
                                                                                class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                                        </td>
                                                                    @endif
                                                                </tr>

                                                                <tr>
                                                                    <th scope="row">ملاحظات</th>
                                                                    <td>{{ $invoices->note }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab5">
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0 table-hover"
                                                            style="text-align:center">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>رقم الفاتورة</th>
                                                                    <th>نوع المنتج</th>
                                                                    <th>البنك</th>
                                                                    <th>حالة الدفع</th>
                                                                    <th>تاريخ الدفع </th>
                                                                    <th>ملاحظات</th>
                                                                    <th>تاريخ الاضافة </th>
                                                                    <th>المستخدم</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($details as $x)
                                                                    <?php $i++; ?>
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $x->invoice_number }}</td>
                                                                        <td>{{ $x->product }}</td>
                                                                        <td>{{ $invoices->Bank->bank_name }}</td>
                                                                        @if ($x->Value_Status == 1)
                                                                            <td><span
                                                                                    class="badge bg-success rounded-pill">{{ $x->Status }}</span>
                                                                            </td>
                                                                        @elseif($x->Value_Status ==2)
                                                                            <td><span
                                                                                    class="badge bg-danger rounded-pill">{{ $x->Status }}</span>
                                                                            </td>
                                                                        @else
                                                                            <td><span
                                                                                    class="badge bg-warning rounded-pill">{{ $x->Status }}</span>
                                                                            </td>
                                                                        @endif
                                                                        <td>{{ $x->Payment_Date }}</td>
                                                                        <td>{{ $x->note }}</td>
                                                                        <td>{{ $x->created_at }}</td>
                                                                        <td>{{ $x->user }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>


                                                <div class="tab-pane" id="tab6">
                                                    <!--المرفقات-->
                                                    <div class="card card-statistics">
                                                        <div class="card-body">
                                                            <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg ,
                                                                png </p>
                                                            <h5 class="card-title">اضافة مرفقات</h5>
                                                            <form method="post"
                                                                action="{{ url('/InvoiceAttachments') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="custom-file">

                                                                    <input type="file" class="custom-file-input"
                                                                        id="customFile" name="file_name" required>

                                                                    <input type="hidden" id="customFile"
                                                                        name="invoice_number"
                                                                        value="{{ $invoices->invoice_number }}">

                                                                    <input type="hidden" id="invoice_id"
                                                                        name="invoice_id"
                                                                        value="{{ $invoices->id }}">

                                                                    <label class="custom-file-label"
                                                                        for="customFile">حدد
                                                                        المرفق</label>
                                                                </div><br><br>
                                                                <button type="submit" class="btn btn-primary btn-sm "
                                                                    name="uploadedFile">تاكيد</button>
                                                            </form>
                                                        </div>
                                                        <br>

                                                        <div class="table-responsive mt-15">
                                                            <table
                                                                class="table center-aligned-table mb-0 table table-hover"
                                                                style="text-align:center">
                                                                <thead>
                                                                    <tr class="text-dark">
                                                                        <th scope="col">م</th>
                                                                        <th scope="col">اسم الملف</th>
                                                                        <th scope="col">قام بالاضافة</th>
                                                                        <th scope="col">تاريخ الاضافة</th>
                                                                        <th scope="col">العمليات</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 0; ?>
                                                                    @foreach ($attachments as $attachment)
                                                                        <?php $i++; ?>
                                                                        <tr>
                                                                            <td>{{ $i }}</td>
                                                                            <td>{{ $attachment->file_name }}</td>
                                                                            <td>{{ $attachment->Created_by }}</td>
                                                                            <td>{{ $attachment->created_at }}</td>
                                                                            <td colspan="2">

                                                                                <a class="btn btn-outline-success btn-sm"
                                                                                    href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                                    role="button"><i
                                                                                        class="fas fa-eye"></i>&nbsp;
                                                                                    عرض</a>

                                                                                <a class="btn btn-outline-info btn-sm"
                                                                                    href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                                    role="button"><i
                                                                                        class="fas fa-download"></i>&nbsp;
                                                                                    تحميل</a>

                                                                                <a href="javascript: void(0);"
                                                                                    class="btn btn-outline-danger btn-sm"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#delete{{ $attachment->id }}"
                                                                                    data-bs-file_name="{{ $attachment->file_name }}"
                                                                                    data-bs-invoice_number="{{ $attachment->invoice_number }}"
                                                                                    data-bs-id_file="{{ $attachment->id }}">
                                                                                    <i class="mdi mdi-delete"></i>
                                                                                    حذف</a>

                                                                            </td>
                                                                        </tr>

                                                                        <div class="modal fade"
                                                                            id="delete{{ $attachment->id }}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                            class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            حذف البنك
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-hidden="true"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        {{-- route('Grades.destroy','test') --}}
                                                                                        <form
                                                                                            action="{{ route('delete_file', 'test') }}"
                                                                                            method="post">
                                                                                            {{ method_field('Delete') }}
                                                                                            @csrf
                                                                                            هل انت متاكد من عملية حذف
                                                                                            المرفق ؟
                                                                                            <input type="text"
                                                                                                name="id_file"
                                                                                                id="id_file"
                                                                                                value="{{ $attachment->id }}">
                                                                                            <input type="text"
                                                                                                name="file_name"
                                                                                                id="file_name"
                                                                                                value="{{ $attachment->file_name }}">
                                                                                            <input type="text"
                                                                                                name="invoice_number"
                                                                                                id="invoice_number"
                                                                                                value="{{ $attachment->invoice_number }}">
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                    class="btn btn-light"
                                                                                                    data-bs-dismiss="modal">اغلاق</button>
                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary">حذف</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </tbody>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /div -->
                </div>


            </div>


            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
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
            </div> --}}

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
    >

</body>

</html>
