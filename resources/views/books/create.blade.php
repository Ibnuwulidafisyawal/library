{{-- @extends('layouts.master') --}}

<x-app-layout>
@section('content')

    <div class="row  mx-auto" style="width: 400px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"><i class="bi bi-arrow-left-circle"></i> Back</a>
            </div>
        </div>
    </div>
<br>  
    @if (count($errors) > 0)
    <div class="alert alert-danger row mx-auto" style="width: 34%">
        <button type="button" class="btn-close  p-3 ms-10 px-2 " data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

     
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
    <div class="row mx-auto" style="width: 400px">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group  col-md-18 ">
                <strong>Judul</strong>
                <input type="text" name="judul" class="form-control" placeholder="Judul" autofocus value="{{old('judul')}}">
            </div>
        </div>
        
            <div class="col-xs-12 col-sm-12">
                <div class="form-group  col-md-18 ">
                    <strong>Penulis</strong>
                    <input type="text" name="penulis" class="form-control" placeholder="Penulis" autofocus value="{{old('penulis')}}">
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group col-md-18">
                    <strong>Penerbit</strong>
                    <select class="form-control" name="penerbit">
                    <option value="" hidden></option>
                    @foreach($publishers as $publisher)
                    <option value="{{$publisher->penerbit}}">{{$publisher->penerbit}}</option>
                    @endforeach
                </select>
                </div>
            </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
     
</form>
@endsection
</x-app-layout>