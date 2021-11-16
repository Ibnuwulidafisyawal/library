{{-- @extends('layouts.master') --}}
  
<x-app-layout>
@section('content')
    
    <div class="row  mx-auto" style="width: 400px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit publisher</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('publishers.index') }}"><i class="bi bi-arrow-left-circle"></i> Back</a>
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
        
    <form action="{{ route('publishers.update',$publisher->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        

        <div class="row mx-auto" style="width: 400px">
            <div class="col-xs-12 col-sm-12">
                <div class="form-group  col-md-18 ">
                    <strong>Penerbit</strong>
                    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="{{$publisher->penerbit}}">
                </div>
            </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
        
    </form>
@endsection

</x-app-layout>