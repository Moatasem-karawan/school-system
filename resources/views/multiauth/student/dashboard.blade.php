<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>
@php
    if (\Illuminate\Support\Facades\App::getLocale()=="ar"){
            $worlds=["dashboard"=>"صفحة رئيسية"];
    }
    else{

        $worlds=["dashboard"=>"INDEX"];
    }

@endphp

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
preloader -->

@include('layouts.main-header')

@include('layouts.main-sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">

                    <h4 class="mb-0">{{$worlds["dashboard"]}}</h4>
                    <u><h6>{{\Illuminate\Support\Facades\Auth::guard("student")->student()->my_section->name_section}}</h6></u>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            @foreach($sub_materials as $sub_material)

            <div class="col-8 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">

                    <div class="card-body">
                        <a  href="{{route("show_lecture",$sub_material->id)}}">
                        <div class="clearfix">

                            <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{$sub_material->material->name}}</p>
                                <h4>{{$sub_material->material->name}}</h4>
                            </div>
                        </div>
                    </a>
                        <p class="text-capitalize pt-3 mb-0 mt-2 border-top" style="font-size: 15px">
                            <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>المعلم:{{$sub_material->teacher->name}}
                        <p>({{$sub_material->teacher->phone}}) Phone</p>
                        </p>
                    </div>
                    </a> </div>
            </div>

                @endforeach
        </div>
        <!-- Orders Status widgets-->

        <!--=================================
wrapper -->

        <!--=================================
footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('layouts.footer-scripts')

</body>

</html>
