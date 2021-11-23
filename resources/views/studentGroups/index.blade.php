{{-- @extends('layouts.master') --}}
     
<x-app-layout>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rombel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('studentGroups.create') }}"> Create</a>
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
                <form action="{{ route('studentGroups.index') }}" method="GET" role="search">

                    <div class="input-group" >
                        <span class="input-group-btn" >
                            <button class="btn btn-info" type="submit" title="Search Rombel" style="border-radius: 0px">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="" name="search" placeholder="Search Rombel" id="search" style="height: 38px; width: 20%;">
                        <a href="{{ route('studentGroups.index') }}" class="">
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
            <th>Nama Rombel</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($studentGroups as $studentGroup)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $studentGroup->rombel }}</td>
            <td>
                <form action="{{ route('studentGroups.destroy',$studentGroup->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('studentGroups.edit',$studentGroup->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $studentGroups->links() !!}
        
@endsection
</x-app-layout>