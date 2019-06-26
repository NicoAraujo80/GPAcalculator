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

        Session::put('grades', $grades); //saves grades in a cookie to save as preset option in the select tag in the next calculation

        //variables with different functions to clean up code
        $totalPoints = $this->totalPoints($request);
        $totalCredits = $this->totalCredits();

        $gpa = $totalPoints / $totalCredits;
        Session::flash('gpa', $gpa); //flashes gpa so that it stays for one screen

        return redirect()->route('index');
    }


    //Gets total number of points within for all classes
    function totalPoints($request)
    {
        $multipliers = ['6 Block' => 1, '3 Block' => .5]; //This is so that 3 block classes get half the total points
        $extraPoints = ['Honors/AP' => 1, 'Standard' => 0]; //Includes weighted points from honers and ap classes
        $pointValue = ['A+' => 4.33, 'A' => 4, 'A-' => 3.67, 'B+' => 3.33, 'B' => 3, 'B-' => 2.67, 'C+' => 2.33, 'C' => 2, 'C-' => 1.67, 'D+' => 1.33, 'D' => 1, 'D-' => .67]; //array that helps trade letter to point value in for loop
        $classes = Session::get('classes');
        $totalPoints = 0; //Initialize total points variable

        for ($i = 0; $i < sizeof($classes); $i++) {
            $class = $classes[$i]; //gets current class that the for loop is evaluating
            $classMultiplier = $multipliers[$class['length']]; //gets correct multiplyer for the classes length
            $gradeValue = $pointValue[$request->{'grade' . $i}]; //gets point value from array using letters from request
            $extraPoint = $extraPoints[$class['type']]; //gets the extra point if class is honors or ap using array
            $totalPoints += ($gradeValue + $extraPoint) * $classMultiplier; //adds class gpa to total point value
        }

        return $totalPoints;
    }

    //Same as total number of points except with credits
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
