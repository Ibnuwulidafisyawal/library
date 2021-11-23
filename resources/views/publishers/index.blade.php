{{-- @extends('layouts.master') --}}
     
<x-app-layout>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Penerbit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('publishers.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div>   
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('publishers.index') }}" method="GET" role="search">

                    <div class="input-group" >
                        <span class="input-group-btn" >
                            <button class="btn btn-info" type="submit" title="Search Publisher" style="border-radius: 0px">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="" name="search" placeholder="Search Publisher" id="search" style="height: 38px; width: 20%;">
                        <a href="{{ route('publishers.index') }}" class="">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page" style="border-radius: 0px">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Penerbit</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($publishers as $publisher)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $publisher->penerbit }}</td>
            <td>
                <form action="{{ route('publishers.destroy',$publisher->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('publishers.edit',$publisher->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $publishers  ->links() !!}
        
@endsection
</x-app-layout>