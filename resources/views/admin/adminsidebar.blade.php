<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="admin/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="admin/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item"><h5>برنامج الفواتير</h5></li>

            <li class="side-nav-item">
                <a href="{{ url('/dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> الصفحة الرئيسية </span>
                </a>

            </li>



            @can('الفواتير') 
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> الفواتير </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        @can('قائمة الفواتير')                            
                        <li>
                            <a href="{{ url('/invoices') }}">قائمة الفواتير</a>
                        </li>
                        @endcan
                        @can('الفواتير المدفوعة')                            
                        <li>
                            <a href="{{ url('/Invoice_Paid') }}">  الفواتير المدفوعة </a>
                        </li>
                        @endcan
                        @can('الفواتير الغير مدفوعة')                            
                        <li>
                            <a href="{{ url('/Invoice_unPaid') }}"> الفواتير غير مدفوعة</a>
                        </li>
                        @endcan
                        @can('الفواتير المدفوعة جزئيا')                            
                        <li>
                            <a href="{{ url('/Invoice_Partial') }}"> الفواتير المدفوعة جزئيا</a>
                        </li>
                        @endcan
                        @can('ارشيف الفواتير')                            
                        <li>
                            <a href="{{ url('/Archive') }}"> ارشيف الفواتير</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan

            
            @can('البنوك')                
            <li class="side-nav-item">
                <a href="{{ url('/banks') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> البنوك </span>
                </a>
            </li>
            @endcan
            @can('المنتجات')                
            <li class="side-nav-item">
                <a href="{{ url('/products') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> المنتجات </span>
                </a>
            </li>
            @endcan
            @can('التقارير') 
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> التقارير </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        @can('تقرير الفواتير')                            
                        <li>
                            <a href="{{ url('/invoices_report') }}">تقارير الفواتير</a>
                        </li>
                        @endcan
                        @can('تقرير العملاء')                            
                        <li>
                            <a href="{{ url('/customers_report') }}">  تقارير العملاء </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan

            @can('المستخدمين')                
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> المستخدمين </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        @can('قائمة المستخدمين', Model::class)                            
                        <li>
                            <a href="{{ url('/users') }}">قائمة المستخدمين</a>
                        </li>
                        @endcan
                        @can('صلاحيات المستخدمين', Model::class)                            
                        <li>
                            <a href="{{ url('/roles') }}">  صلاحيات المستخدمين </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>