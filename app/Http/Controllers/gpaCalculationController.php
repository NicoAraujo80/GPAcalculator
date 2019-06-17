<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class gpaCalculationController extends Controller
{
    function calculateGrades(Request $request)
    {
        $grades = [];

        for ($i = 0; $i < sizeof(Session::get('classNum', [0, 1, 2, 3, 4])); $i++) {
            array_push($grades, $request->{'grade' . $i});
        }

        //saves grades in a cookie so that next time you calculate your GPA it has the grades as the preset option in the select tag
        Session::put('grades', $grades);

        $totalPoints = $this->totalPoints($request);
        $totalCredits = $this->totalCredits();

        $gpa = $totalPoints / $totalCredits;
        Session::flash('gpa', $gpa);

        return redirect()->route('index');
    }

    function totalPoints($request)
    {
        $multipliers = ['6 Block' => 1, '3 Block' => .5];
        $extraPoints = ['Honors/AP' => 1, 'Standard' => 0];
        $pointValue = ['A+' => 4.33, 'A' => 4, 'A-' => 3.67, 'B+' => 3.33, 'B' => 3, 'B-' => 2.67, 'C+' => 2.33, 'C' => 2, 'C-' => 1.67, 'D+' => 1.33, 'D' => 1, 'D-' => .67];
        $classes = Session::get('classes');
        $totalPoints = 0;

        for ($i = 0; $i < sizeof($classes); $i++) {
            $class = $classes[$i];
            $classMultiplier = $multipliers[$class['length']];
            $gradeValue = $pointValue[$request->{'grade' . $i}];
            $extraPoint = $extraPoints[$class['type']];
            $totalPoints += ($gradeValue + $extraPoint) * $classMultiplier;
        }

        return $totalPoints;
    }

    function totalCredits()
    {
        $multipliers = ['6 Block' => 1, '3 Block' => .5];
        $classes = Session::get('classes');
        $totalCredits = 0;

        for ($i = 0; $i < sizeof($classes); $i++) {
            $classCredit = $multipliers[$classes[$i]['length']];
            $totalCredits += $classCredit;
        }

        return $totalCredits;
    }

}
