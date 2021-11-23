<?php

namespace App\Http\Controllers;
use App\Models\Rayon;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Publisher;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class DonutChartController extends Controller
{
  public function donut()
  {
    $students = Student::select('nama',\DB::raw("COUNT('id') as count"))->groupBy('nama')->get();

    return view('dashboards.index', compact('students'));
    
  }
}
