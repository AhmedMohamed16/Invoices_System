<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        البنوك
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
                    <h4 class="page-title">البنوك</h4>
                </div>
                <div class="d-flex justify-content-between" style="padding-bottom: 10px">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        اضافة بنك
                    </button>
                </div>

                <table class="table table-bordered table-centered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم البنك</th>
                            <th>الوصف</th>
                            <th class="text-center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($banks as $bank)

                            <tr>
                                @php
                                    $i++;
                                @endphp
                                <td class="table-user">
                                    {{ $i }}
                                </td>
                                <td>
                                    {{ $bank->bank_name }}
                                </td>
                                <td>{{ $bank->description }}</td>
                                <td class="table-action text-center">
                                    <a href="javascript: void(0);" class="action-icon" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $bank->id }}" >
                                        <i class="mdi mdi-delete"></i></a>
                                    <a href="javascript: void(0);" class="action-icon" data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $bank->id }}" > <i class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>
                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $bank->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                تعديل البنك
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                                                </div>
                                        <div class="modal-body">
                                            <!-- add_form  route('Grades.update','test')-->
                                            <form action="{{ route('banks.update', 'test') }}" method="post" autocomplete="off">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="" class="mr-sm-2">اسم البنك
                                                            :</label>
                                                        <input id="" type="text" name="bank_name" class="form-control"
                                                            value="{{ $bank->bank_name }}" required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $bank->id }}">
                                                        {{-- <!-- value="{{ $Grade->id }}" --> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">ملاحظات
                                                        :</label>
                                                    <textarea class="form-control" name="description"                                               
                                                        id="exampleFormControlTextarea1" rows="3">{{ $bank->description }}
                                                       
                                                    </textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                                                        </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                             
                            <div class="modal fade" id="delete{{ $bank->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                حذف البنك
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- route('Grades.destroy','test') --}}
                                            <form action="{{ route('banks.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                هل انت متاكد من عملية الحذف ؟
                                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $bank->id }}">
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
            {{-- insert to database --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
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
