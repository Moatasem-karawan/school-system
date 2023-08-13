<div class="container-fluid">
    @php
        if (\Illuminate\Support\Facades\App::getLocale()=="ar"){
                $worlds=["grades"=>"المراحل الدراسية","class_rooms"=>"جميع الصفوف","rooms"=>"ادرارة الصفوف","sections"=>"ادراة الاقسام","parents"=>"اولياء الامور","students"=>"الطلاب","add_student"=>"اضافة طالب جديد","push_students"=>"ترقية الطلاب"];
        }
        else{

            $worlds=["grades"=>"Grades","class_rooms"=>"Class Rooms","rooms"=>"Rooms","sections"=>"Sections","parents"=>"Parents","students"=>"Students","add_student"=>"Add New Student","push_students"=>"Push up Students"];
        }
    @endphp
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text"> {{\Illuminate\Support\Facades\Auth::guard("student")->Student()->name}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{url("/")}}">صفحة الرئيسية</a> </li>

                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">Materials</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('add_material')}}">Add material</a> </li>
                            <li> <a href="{{route('get_materials')}}">List materials</a> </li>
                            <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">zoom lecture</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('show_zoom_lecture')}}">Zoom</a> </li>
                            <li> <a href="register.html">List Teachers</a> </li>
                            <li> <a href="lockscreen.html">Lock screen</a> </li>
                        </ul>
                    </li>

                    <!-- menu item Authentication-->

                    <!-- menu item maps-->
                    <li>
                        <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                            <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Left Sidebar End-->

        <!--=================================
