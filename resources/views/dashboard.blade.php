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
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            @foreach($g as $grade)
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <h3 class="card-text text-dark">{{$grade->name}}</h3>
                                        <h4> عدد الطلاب الموجودين  {{$grade->students->count()}} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                    عدد المدرسين الموجودين في {{$grade->name}}  {{$count_teacher_in_grades}}
                                </p>
                            </div>
                        </div>
                    </div>
                  @foreach($grade->all_class_rooms as $class)
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                    <span class="text-info">
                                        <i class="fa fa-user highlight-icon" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <h3 class="card-text text-dark">{{$class->name_class}}</h3>
                                       <u> <h4> عدد الطلاب الموجودين  {{$class->students->count()}} </h4></u>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fa fa-calendar mr-1" aria-hidden="true"></i>
                                    <?php $real_count=[]?>
                                    @if (isset($count_teacher_in_class[$class->id]))
                                        
                                    
                                    @foreach ($count_teacher_in_class[$class->id] as $item )
                                    <?php $real_count[$item]="haha"?>
                                    @endforeach

                                    @endif
                                    عدد مدرسين صف  {{$class->name_class}} {{count($real_count)}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr/><hr/>
                @endforeach

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
