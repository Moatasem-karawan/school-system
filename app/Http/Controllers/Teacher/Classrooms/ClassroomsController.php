<?php

namespace App\Http\Controllers\Teacher\Classrooms;

use App\Events\test;
use App\Http\Controllers\Controller;
use App\Models\Teacher\Classroom;
use App\Models\Teacher\Grade;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    public function view(){
        $classrooms = Classroom::all();
        $Grade = Grade::all();
        return view("pages.classrooms.classrooms",compact("classrooms","Grade"));
    }

    public function add_class(Request $request){

        foreach ($request->List_Classes as $item) {
            $class=new Classroom();
            $class->name_class=["en"=>$item['name_class_en'],"ar"=>$item['name_class_ar']];
            $class->grade_id=$item['grade_id'];
            $class->save();
            $data=["n1"=>"N1","n2"=>"N2"];
            event(new test($data,$id=1));
        }
        toastr()->success("Add Success");
        return redirect()->back();
    }
    public function delete_class(Request $request){
        if(!is_null($request->items)) {
            $c = Classroom::find($request->items);
            foreach ($c as $item) {
                $item->delete();
            }
            return response()->json(["state"=>true,"items"=>$request->items]);
        }
        else{return response()->json(["state"=>false,"msg"=>"please select item"]);}


    }
}
