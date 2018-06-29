<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function read()
    {
        $students = student::all();

        return view('student', compact('students'));
    }
}
