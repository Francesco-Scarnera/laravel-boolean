<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;
    private $genders;
    public function __construct()
    {
        $this->students = config('students.students');
        $this->genders = config('students.genders');
    }
    //Main page students
    public function index() {
        $data = [
            'students' => $this->students,
            'genders' => $this->genders
        ];
        
        //dd( config('app.name') );
        return view('students.index', $data);
    }


    //Detail Page students
    public function show($slug) {

        $student = $this->searchStudent($slug, $this->students);
        if( ! $student ) {
            abort('404');
        }

        return view('students.show', compact('student'));
    }
    /**
     * UTILITIES
     **/
    // check if student exists by id
    private function searchStudent($slug, $array) {
        foreach( $array as $student) {
            if( $student['slug'] == $slug ) {
                return $student;
            } 
        }
        return false;
    }
}
