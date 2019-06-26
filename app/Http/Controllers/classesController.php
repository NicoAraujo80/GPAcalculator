<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class classesController extends Controller
{
    function postClasses(Request $request)
    {
        $classes = [];
        for ($i = 0; $i < sizeof(Session::get('classNum', [0, 1, 2, 3, 4])); $i++) {
            $class = ['name' => $request->{"className" . $i},'type' => $request->{"classType" . $i},'length' => $request->{"classLength" . $i}];
            array_push($classes, $class);
        }
        Session::put('classes', $classes);

        return redirect()->route('index');
    }

    function addClass()
    {
        $currentNumClasses = Session::get('classNum', [0, 1, 2, 3, 4]);
        array_push($currentNumClasses, sizeof($currentNumClasses));
        Session::put('classNum',$currentNumClasses);

        return redirect()->route('chooseClasses');
    }

    function removeClass()
    {
        $currentNumClasses = Session::get('classNum', [0, 1, 2, 3, 4]);
        array_pop($currentNumClasses);
        Session::put('classNum', $currentNumClasses);

        return redirect()->route('chooseClasses');
    }
}
