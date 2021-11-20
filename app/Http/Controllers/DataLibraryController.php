<?php

namespace App\Http\Controllers;
use App\Models\Rayon;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Publisher;
use App\Models\Student;
use App\Models\StudentGroup;
// use Illuminate\Http\Request;

class DataLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::count();
        $borrowings = Borrowing::count();
        $publishers = Publisher::count();
        $rayons = Rayon::count();
        $students = Student::count();
        $studentGroups = StudentGroup::count();
        

        return view('dashboards.index',compact('rayons','borrowings','publishers','books','students','studentGroups'));
    }
   
}
