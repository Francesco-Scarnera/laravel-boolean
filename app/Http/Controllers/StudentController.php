<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;
    public function __construct()
    {
        $this->students = config('students');
    }
    //Main page students
    public function index() {
        $students = $this->students;
        //dd( config('app.name') );
        return view('students.index', compact('students'));
    }


    //Detail Page students
    public function show($id) {

        $student = $this->searchStudent($id, $this->students);
        if( ! $student ) {
            abort('404');
        }

        return view('students.show', compact('student'));
    }
    /**
     * UTILITIES
     **/
    // check if student exists by id
    private function searchStudent($id, $array) {
        foreach( $array as $student) {
            if( $student['id'] == $id ) {
                return $student;
            } 
        }
        return false;
    }
}
