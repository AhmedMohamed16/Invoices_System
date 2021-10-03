<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        الفواتير
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
                    <h4 class="page-title">الفواتير</h4>
                </div>
                <div class="d-flex justify-content-between" style="padding-bottom: 10px">
                    <a href="invoices/create" class="btn btn-primary">اضافة فاتورة</a>
                </div>

                <table class="table table-bordered table-centered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الفاتورة</th>
                            <th>تاريخ الفاتورة</th>
                            <th>تااريخ الاستحقاق</th>
                            <th>المنتج</th>
                            <th>البنك</th>
                            <th>الخصم</th>
                            <th>نسبة الطريبة</th>
                            <th>قيمة الطريبة</th>
                            <th>الاجمالى</th>
                            <th>الحالة</th>
                            <th>الملاحظات</th>
                            <th class="text-center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($invoices as $invoice)

                            <tr>
                                @php
                                    $i++;
                                @endphp
                                <td class="table-user">
                                    {{ $i }}
                                </td>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->invoice_Date }}</td>
                                <td>{{ $invoice->Due_date }}</td>
                                <td>{{ $invoice->product }}</td>
                                <td><a
                                    href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->bank->bank_name }}</a>
                                </td>
                                <td>{{ $invoice->Discount }}</td>
                                <td>{{ $invoice->Rate_VAT }}</td>
                                <td>{{ $invoice->Value_VAT }}</td>
                                <td>{{ $invoice->Total }}</td>

                                <td>
                                    @if ($invoice->Value_Status == 1)
                                        <span class="text-success">{{ $invoice->Status }}</span>
                                    @elseif($invoice->Value_Status == 2)
                                        <span class="text-danger">{{ $invoice->Status }}</span>
                                    @else
                                        <span class="text-warning">{{ $invoice->Status }}</span>
                                    @endif

                                </td>
                                <td>{{ $invoice->note }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            العمليات
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href=" {{ route('invoices.edit', $invoice->id) }}">تعديل</a>
                                            
                                            <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                data-bs-toggle="modal" data-bs-target="#delete{{ $invoice->id }}"><i
                                                class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;حذف
                                                الفاتورة</a>

                                                 <a class="dropdown-item"
                                                href="{{ URL::route('Status_show', [$invoice->id]) }}"><i
                                                    class=" text-success fas                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           fa-money-bill"></i>&nbsp;&nbsp;تغير
                                                حالة
                                                الدفع</a>

                                            <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                data-toggle="modal" data-target="#Transfer_invoice"><i
                                                    class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;نقل الي
                                                الارشيف</a>
                                            <a class="dropdown-item" href="Print_invoice/{{ $invoice->id }}"><i
                                                    class="text-success fas fa-print"></i>&nbsp;&nbsp;طباعة
                                                الفاتورة
                                            </a>

                                        </div>
                                    </div>
                                    

                                </td>

                            </tr>


                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $invoice->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                حذف الفاتورة
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- route('Grades.destroy','test') --}}
                                            <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                هل انت متاكد من عملية الحذف ؟
                                                {{-- <!-- value="{{ $Grade->id }}" --> --}}
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-primary">حذف</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            
                        @endforeach

                    </tbody>
                </table>

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
</body>

</html>
