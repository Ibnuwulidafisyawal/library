{{-- @extends('layouts.master') --}}
     
@section('content')
<x-app-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create</a>
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
                <form action="{{ route('students.index') }}" method="GET" role="search">

                    <div class="input-group" >
                        <span class="input-group-btn" >
                            <button class="btn btn-info" type="submit" title="Search student" style="border-radius: 0px">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="" name="search" placeholder="Search student" id="search" style="height: 38px; width: 20%;">
                        <a href="{{ route('students.index') }}" class="">
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
            <th>Nis</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students ?? '' as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->rombel }}</td>
            <td>{{ $student->rayon }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                    
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
</form>
    
    {!! $students ?? ''->links() !!}
@endsection
</x-app-layout>