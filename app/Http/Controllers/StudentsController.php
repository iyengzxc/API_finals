<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //show all students
    public function index(){
        $student = Students::all();
        return response($student);
    }

    //show specific student
    public function show($id){
        $student = Students::find($id);
        return response($student);
    }

    //the input student
    public function store(Request $request)
    {
        $student=new Students();
        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->created_ata = $request->created_ata;

        $student->save();
        return response([
            "message"=>"Students added in database!!"
        ]);
    }

    //update speific student
    public function update(Request $request)
    {
        $student = Students::find($request->id);

        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->created_ata = $request->created_ata;

        $student->update();
        return response([
            "message"=>"Updated Succesfully"
        ]);
    }


    //delete specific student
    public function delete($id){
        $user = Students::find($id);
        if ($user == null){
            return response([
                "message"=>"Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Deleted succesfully!"
            ],200);
        }
    }
}
