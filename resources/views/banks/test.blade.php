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
                            <th>bank_name</th>
                            <th>description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $bank)
                            
                        <tr>
                            <td class="table-user">
                                1
                            </td>
                            <td>
                                {{ $bank->bank_name }}
                            </td>
                            {{ $bank->description }}
                            <td class="table-action text-center">
                                <a href="javascript: void(0);" class="action-icon"
                                data-bs-toggle="modal" data-bs-target="#standard-modal"
                                > 
                                <i
                                        class="mdi mdi-delete"></i></a>
                                <a href="javascript: void(0);" class="action-icon"
                                data-bs-toggle="modal" data-bs-target="#standard-modal"
                                > <i
                                        class="mdi mdi-pencil"></i></a>
                            </td>
                        </tr>
                                                    <!-- edit_modal_Grade -->
                                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                       <div class="modal-dialog" role="document">
                                                           <div class="modal-content">
                                                               <div class="modal-header">
                                                                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                       id="exampleModalLabel">
                                                                       rfrtt
                                                                   </h5>
                                                                   <button type="button" class="close" data-dismiss="modal"
                                                                           aria-label="Close">
                                                                       <span aria-hidden="true">&times;</span>
                                                                   </button>
                                                               </div>
                                                               <div class="modal-body">
                                                                   <!-- add_form  route('Grades.update','test')-->
                                                                   <form action="" method="post">
                                                                       {{method_field('patch')}}
                                                                       @csrf
                                                                       <div class="row">
                                                                           <div class="col">
                                                                               <label for=""
                                                                                      class="mr-sm-2">;l\'lfe'
                                                                                   :</label>
                                                                               <input id="Name" type="text" name=""class="form-control" 
                                                                                       value="" required>
                                                                               <input id="id" type="hidden" name="id" class="form-control"
                                                                                       value=""> <!-- value="{{ $Grade->id }}" -->
                                                                           </div>
                                                                           <div class="col">
                                                                               <label for="Name_en"
                                                                                      class="mr-sm-2">lrgrl
                                                                                   :</label>
                                                                               <input type="text" class="form-control"
                                                                                      value=""
                                                                                      name="" required>
                                                                           </div>
                                                                       </div>
                                                                       <div class="form-group">
                                                                           <label
                                                                               for="exampleFormControlTextarea1">pl'wf
                                                                               :</label>
                                                                           <textarea class="form-control" name=""
                                                                                     id="exampleFormControlTextarea1"
                                                                                     rows="3">
                                                                                     {{-- {{ $Grade->Notes }} --}}
                                                                                    </textarea>
                                                                       </div>
                                                                       <br><br>
                       
                                                                       <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>                                                                                                                               </div>
                                                                   </form>
                       
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                       
                                                   <!-- delete_modal_Grade -->
                                                   <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                       <div class="modal-dialog" role="document">
                                                           <div class="modal-content">
                                                               <div class="modal-header">
                                                                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                       id="exampleModalLabel">
                                                                       {{ trans('Grades_trans.delete_Grade') }}
                                                                   </h5>
                                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                </div>
                                                               <div class="modal-body">
                                                                {{-- route('Grades.destroy','test') --}}
                                                                   <form action="" method="post">
                                                                       {{method_field('Delete')}}
                                                                       @csrf
                                                                       ledfef
                                                               <input id="id" type="hidden" name="id" class="form-control"
                                                               value=""> <!-- value="{{ $Grade->id }}" -->
                                                                       <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                            hghl;kw
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    <!-- add_form  route('Grades.store')  -->
                    <form action="" method="POST">  
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for=""
                                       class="mr-sm-2">plrgt
                                    :</label>
                                <input id="Name" type="text" name="" class="form-control">
                            </div>
                            <div class="col">
                                <label for=""
                                       class="mr-sm-2">l'lrg
                                    :</label>
                                <input type="text" class="form-control" name="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                for="exampleFormControlTextarea1">l'wlr
                                :</label>
                            <textarea class="form-control" name="" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
