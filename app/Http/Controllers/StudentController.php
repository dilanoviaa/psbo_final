<?php

namespace App\Http\Controllers;

use App\student;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function read()
    {
        $students = user::all();

        return view('student', compact('students'));
    }
}
