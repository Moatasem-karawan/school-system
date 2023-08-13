@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')


    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Page Title</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->



                <div class="row">

        @foreach($my_lectures as $lecture)
                        <div class="col-xl-6" >
                            <div class="card o-visible" style="min-height: 350px ;padding: 20px;margin-bottom:50px " >
                                <div class="card-header" style="background: rgb(192,192,193)">
                                    <h5>Lecture {{$loop->iteration}}</h5>
                                </div>
                                <div class="card-block" style="padding: 10px">
                                    <h6>{{$lecture->created_at->format("y-m-d")}}</h6>
                                    <center><h6>{{$lecture->title?:"NO DESCRIPTION"}}</h6></center>
                                    <hr/>
                                    <p style="font-size: 15px">
                                        {{$lecture->description?:"NO DESCRIPTION"}}
                                    </p>
                                    <div class="row">
                                        <div class="col-6">

                                            <u> <h5>ملفات</h5></u><br>
                                            @if(isset($lecture->files)&&$lecture->files->count()>0)
                                                <ol>


                                                    @foreach($lecture->files as $file)

                                                        <li>
                                                            <u>{{$file->client_name}}</u>
                                                          <button style="margin-left: 4px"  class="btn btn-link" href="#"><li class="fa fa-download"></li></a>

                                                        </li>

                                                    @endforeach
                                                </ol>
                                            @else
                                                <div class="alert alert-danger" style="width: 50%" >لايوجد ملفات لهذه المحاضرة</div>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <u> <h5>روابط خارجية</h5></u><br>
                                            @if(isset($lecture->urls)&&$lecture->urls->count()>0)
                                                <ol>

                                                    @foreach($lecture->urls as $url)
                                                        <li>

                                                         <a class="btn btn-link"  href="{{$url->url}}"> {{$url->description}}</a><i class="fa fa-link"></i>
                                                        </li>

                                                    @endforeach
                                                </ol>
                                            @else
                                                <div class="alert alert-info" style="width: 50%" >لا يوجد روابط لهذة المحاضرة</div>

                                            @endif

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <hr/>
                            <!-- Tooltip style 1 card end -->
                        </div>


        @endforeach


    </div>
    <div class="row">
        <div class="col-xl-12" >
            <div class="card o-visible" style="min-height: 350px ;padding: 20px;margin-bottom:50px " >
                <div class="card-header" style="background: rgb(167,183,193)">
                    <center> <h5>Homework && exams </h5></center>
                </div>
                <div class="card-block" style="padding: 10px">

                    <div class="row">
                                <div class="pricing-content col-xl">
                                    <div class="pricing-table-list">
                                        <ul class="list-unstyled">
                                            <li><u> Homeworks</u></li>

                                            @foreach($home_works as $home_work)
                                                <?php $active=$home_work->assignment_delivery->where("student_id","=","1")->first()->active ?? "0";?>
                                                <li>
                                                    @if($active=="0")
                                                        <i class="fa fa-times"></i>
                                                    @else
                                                        <i class="fa fa-check"></i>
                                                    @endif



                                                    <u> <a href="{{route("insert_delivery_home_work",$home_work->id)}}"> {{$home_work->title}} </a></u></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                        <div class="pricing-content col-xl">
                            <div class="pricing-table-list">
                                <ul class="list-unstyled">
                                    <li><u> EXAMS</u></li>
                                    @foreach($exams as $exam)
                                        <li>
                                            <i class="fa fa-warning text-danger"></i>


                                            <u><a href="{{route('show_my_exams',$exam->id)}}">{{$exam->title ??"no title"}} </a></u>->({{ $exam->mark_of_this_exam->mark ??"NO MARK"}})</li>




                                        </li>
                                        @endforeach



                                </ul>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
            <hr/>
            <!-- Tooltip style 1 card end -->
        </div>
    </div>

    <!-- row closed -->
@endsection
@section('js')

@endsection
