<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rayon;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class Select2Controller extends Controller
{
    public function selectSearch(Request $request)

    {
    	$students = [];

        if ($request->has('q')) {
            $search = $request->q;
            $students = Student::select("id", "rombel")->where("rombel","LIKE","%$search%")->get();

        }
        return response()->json($students);
    }

}
