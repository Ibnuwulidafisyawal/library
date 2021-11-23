<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $books = Book::where([
            ['judul', '!=', Null],
            [function ($query) use ($request){
                if (($search = $request->search)) {
                    $query->orWhere('judul', 'LIKE','%'.$search.'%')->get();
                }    
            }]
        ])->orderBy('id','desc')->paginate(5);

        return view('books.index', compact('books'))->with('i',(request()->input('page',1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();

        return view('books.create', compact('publishers', $publishers));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'penerbit'=>'required'
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('succes', 'Berhasil menyimpan ! ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $publishers = Publisher::all();

        return view('books.edit',compact('book','publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required'
        ]);

        $book->update($request->all());
            return redirect()->route('books.index')->with('Succes','Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
            return redirect()->route('books.index')->with('Succes','Berhasil hapus');
    }


  
}

