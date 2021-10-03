<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    {{-- <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style> --}}

    @section('title')
        طباعة الفاتورة
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
                    <h4 class="page-title">طباعة الفاتورة</h4>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card " id="print">
                            <div class="card-body">

                                <!-- Invoice Logo-->
                                <div class="clearfix">
                                    <div class="float-start mb-3">
                                        <img src="assets/images/logo-light.png" alt="" height="18">
                                    </div>
                                    <div class="float-right">
                                        <h4 class="m-0 d-print-none">فاتورة تحصيل</h4>
                                    </div>
                                </div>

  

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table mt-4">
                                                <thead>
                                                    <th>المنتج</th>
                                                    <th>قيمة الخصم</th>
                                                    <th>قيمة الضريبة</th>
                                                    <th >الاجمالى</th>
                                                </tr></thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <p>{{ $invoices->product  }}</p> <br>
                                                    </td>
                                                    <td>{{ number_format($invoices->Discount, 2) }}</td>
                                                    @php
                                                    $total = $invoices->Amount_collection + $invoices->Amount_Commission ;
                                                    @endphp            
                                                    <td>{{ $invoices->Value_VAT  }}</td>
                                                    @php
                                                    $total = $invoices->Amount_collection + $invoices->Amount_Commission ;
                                                    @endphp            

                                                    <td>
                                                        
                                                        {{ number_format($total, 2)  }}                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>مبلغ التحصيل</b> <br>
                                                        {{ number_format($invoices->Amount_collection, 2)  }}
                                                    </td>
                                                    <td>
                                                        <b>نسبة الضريبة </b> <br>
                                                        ({{ $invoices->Rate_VAT }})
                                                    </td>
                                                    <td>
                                                        <b>الاجمالي شامل الضريبة </b> <br>
                                                        {{ number_format($invoices->Total, 2) }}
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>مبلغ العمولة</b> <br>
                                                        {{ number_format($invoices->Amount_Commission, 2)  }}
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->



                                <div class="d-print-none mt-4">
                                    <div class="float-right">
                                        <button  id="print_Button" onclick="printDiv()" class="btn btn-primary "><i class="mdi mdi-printer"></i> طباعة</button>
                                    </div>
                                </div>   
                                <!-- end buttons -->

                            </div> <!-- end card-body-->
                        </div> <!-- end card -->
                    </div> <!-- end col-->
                </div>
            

            </div>

            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                اضافة اسم بنك
                            </h5>
                        </div>
                        <div class="modal-body">
                            <!-- add_form  route('Grades.store')  -->
                            <form action="{{ route('banks.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="mr-sm-2">الاسم
                                            :</label>
                                        <input id="Name" type="text" name="bank_name" class="form-control">
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
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

</body>

</html>
