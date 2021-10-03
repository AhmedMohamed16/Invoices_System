<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">
    @section('title')
         تغير حالة الدفع
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
                <!-- end Topbar -->
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
                                <h4 class="page-title">تغير حالة الدفع</h4>
                            </div>
            


            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('Status_Update', ['id' => $invoices->id]) }}" method="post" autocomplete="off">
                                {{ csrf_field() }}
                                {{-- 1 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">رقم الفاتورة</label>
                                        <input type="hidden" name="invoice_id" value="{{ $invoices->id }}">
                                        <input type="text" class="form-control" id="inputName" name="invoice_number"
                                            title="يرجي ادخال رقم الفاتورة" value="{{ $invoices->invoice_number }}" required
                                            readonly>
                                    </div>
        
                                    <div class="col">
                                        <label>تاريخ الفاتورة</label>
                                        <input class="form-control fc-datepicker" name="invoice_Date" placeholder="YYYY-MM-DD"
                                            type="text" value="{{ $invoices->invoice_Date }}" required readonly>
                                    </div>
        
                                    <div class="col">
                                        <label>تاريخ الاستحقاق</label>
                                        <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                            type="text" value="{{ $invoices->Due_date }}" required readonly>
                                    </div>
        
                                </div>
        
                                {{-- 2 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">القسم</label>
                                        <select name="Bank" class="form-control SlectBox" onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')" readonly>
                                            <!--placeholder-->
                                            <option value=" {{ $invoices->bank->id }}">
                                                {{ $invoices->bank->bank_name }}
                                            </option>
        
                                        </select>
                                    </div>
        
                                    <div class="col">
                                        <label for="inputName" class="control-label">المنتج</label>
                                        <select id="product" name="product" class="form-control" readonly>
                                            <option value="{{ $invoices->product }}"> {{ $invoices->product }}</option>
                                        </select>
                                    </div>
        
                                    <div class="col">
                                        <label for="inputName" class="control-label">مبلغ التحصيل</label>
                                        <input type="text" class="form-control" id="inputName" name="Amount_collection"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            value="{{ $invoices->Amount_collection }}" readonly>
                                    </div>
                                </div>
        
                                {{-- 3 --}}
        
                                <div class="row">
        
                                    <div class="col">
                                        <label for="inputName" class="control-label">مبلغ العمولة</label>
                                        <input type="text" class="form-control form-control-lg" id="Amount_Commission"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            value="{{ $invoices->Amount_Commission }}" required readonly>
                                    </div>
        
                                    <div class="col">
                                        <label for="inputName" class="control-label">الخصم</label>
                                        <input type="text" class="form-control form-control-lg" id="Discount" name="Discount"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            value="{{ $invoices->Discount }}" required readonly>
                                    </div>
        
                                    <div class="col">
                                        <label for="inputName" class="control-label">نسبة ضريبة القيمة المضافة</label>
                                        <select name="Rate_VAT" id="Rate_VAT" class="form-control" onchange="myFunction()" readonly>
                                            <!--placeholder-->
                                            <option value=" {{ $invoices->Rate_VAT }}">
                                                {{ $invoices->Rate_VAT }}
                                        </select>
                                    </div>
        
                                </div>
        
                                {{-- 4 --}}
        
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
                                        <input type="text" class="form-control" id="Value_VAT" name="Value_VAT"
                                            value="{{ $invoices->Value_VAT }}" readonly>
                                    </div>
        
                                    <div class="col">
                                        <label for="inputName" class="control-label">الاجمالي شامل الضريبة</label>
                                        <input type="text" class="form-control" id="Total" name="Total" readonly
                                            value="{{ $invoices->Total }}">
                                    </div>
                                </div>
        
                                {{-- 5 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleTextarea">ملاحظات</label>
                                        <textarea class="form-control" id="exampleTextarea" name="note" rows="3" readonly>
                                        {{ $invoices->note }}</textarea>
                                    </div>
                                </div><br>
        
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleTextarea">حالة الدفع</label>
                                        <select class="form-control" id="Status" name="Status" required>
                                            <option selected="true" disabled="disabled">-- حدد حالة الدفع --</option>
                                            <option value="مدفوعة">مدفوعة</option>
                                            <option value="مدفوعة جزئيا">مدفوعة جزئيا</option>
                                        </select>
                                    </div>
        
                                    <div class="col">
                                        <label>تاريخ الدفع</label>
                                        <input class="form-control fc-datepicker" name="Payment_Date" placeholder="YYYY-MM-DD"
                                            type="text" required>
                                    </div>
        
                                </div><br>
        
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">تحديث حالة الدفع</button>
                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->
        
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
        $(document).ready(function() {
            $('select[name="Bank"]').on('change', function() {
                var bankId = $(this).val();
                if (bankId) {
                    $.ajax({
                        url: "{{ URL::to('bank') }}/" + bankId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });
    </script>
    <script>
        function myFunction() {

            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

            var Amount_Commission2 = Amount_Commission - Discount;

            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                alert('يرجي ادخال مبلغ العمولة ');

            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;

                var intResults2 = parseFloat(intResults + Amount_Commission2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT").value = sumq;

                document.getElementById("Total").value = sumt;

            }

        }
    </script>

<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();

</script>



</body>

</html>
