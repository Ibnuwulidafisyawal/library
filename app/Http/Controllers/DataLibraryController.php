<?php

namespace App\Http\Controllers;
use App\Models\Rayon;
use Illuminate\Http\Request;

class DataLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.index');
        // $rayons = Rayon::latest()->paginate(5);
        // return view('dashboards.index', compact('rayons'))->with('i', (request()->input('page', 1) -1) *5);
        // $rayons = Rayon::withCount(['rayon'])->get();
        // return view('dashboards.index', compact('rayons'));
    }
    public function rayon()
    {
    return $this->hasMany(Rayon::class);
    }
   
}
