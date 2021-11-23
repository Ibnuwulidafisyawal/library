{{-- @extends('layouts.master') --}}
     
<x-app-layout>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rayon</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rayons.create') }}"> Create</a>
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
                <form action="{{ route('rayons.index') }}" method="GET" role="search">

                    <div class="input-group" >
                        <span class="input-group-btn" >
                            <button class="btn btn-info" type="submit" title="Search Rayon" style="border-radius: 0px">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="" name="search" placeholder="Search Rayon" id="search" style="height: 38px; width: 20%;">
                        <a href="{{ route('rayons.index') }}" class="">
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
            <th>Nama Rayon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rayons as $rayon)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rayon->rayon }}</td>
            <td>
                <form action="{{ route('rayons.destroy',$rayon->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('rayons.edit',$rayon->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $rayons->links() !!}
        
@endsection
</x-app-layout>