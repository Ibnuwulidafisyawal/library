<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rayon;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $students = Student::latest()->paginate(5);
        $students = Student::where([
            ['nama', '!=', Null],
            [function ($query) use ($request){
                if (($search = $request->search)) {
                    $query->orWhere('nama', 'LIKE','%'.$search.'%')->get();
                }    
            }]
        ])->orderBy('id','desc')->paginate(5);

        return view('students.index',compact('students'))->with('i',(request()->input('page', 1) -1) *5);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = Rayon::all();
        $studentGroups = StudentGroup::all();

        return view('students.create', compact('rayons','studentGroups', $rayons, $studentGroups));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'nis.required' => 'Nis is required !',
            'min'=> 'Nis must be filled in at least 5 characters ! ',
            'nama.required' => 'Nama is required !',
            'rombel.required' => 'Rombel is required !',
            'rayon.required' => 'Rayon is required !'   
        ];
         $request->validate([
            'nis'=>'required|min:8|max:255',
            'nama'=>'required',
            'rombel'=>'required',
            'rayon'=>'required'
        ],$messages);

        Student::create($request->all());

        return redirect()->route('students.index')->with('Success','Berhasil Menyimpan !');
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $rayons = Rayon::all();
        $studentGroups = StudentGroup::all();

        return view('students.edit',compact('student','rayons','studentGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis'=>'required',
            'nama'=>'required',
            'rombel'=>'required',
            'rayon'=>'required'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('Success','Berhasil Update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('Success','Berhasil Hapus !!');
    }

    public function search(Request $request)
    {
      
        $search = $request->search;
        
        $students = Student::table('students')->where('nama','like',"%".$search."%")->paginate();
        return view('students.index',['student' => $students]);
    }
}   
