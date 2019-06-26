<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pagesController extends Controller
{   
    //Retrives index view 
    function getIndex() {
        $grades = ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-', 'F'];
        $classes = Session::get('classes');
        $currentGrades = Session::get('grades', null);
        $gpa = Session::get('gpa', null);

        return view('index')->withClasses($classes)->withGrades($grades)->withCurrentGrades($currentGrades)->withGpa($gpa);
    }

    
    function getChooseClasses()
    {
        $classNum = Session::get('classNum', [0, 1, 2, 3, 4]);
        $classTypes = ['Standard', 'Honors/AP'];
        $classLengths = ['6 Block', '3 Block'];
        $classes = Session::get('classes', null);

        return view('index')->withClassTypes($classTypes)->withClassLengths($classLengths)->withClassNum($classNum)->withClasses($classes);
    }
}
