{{-- @extends('layouts.master') --}}

<x-app-layout>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Peminjam</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('borrowings.create') }}"> Create</a>
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
                <form action="{{ route('borrowings.index') }}" method="GET" role="search">

                    <div class="input-group" >
                        <span class="input-group-btn" >
                            <button class="btn btn-info" type="submit" title="Search borrowings" style="border-radius: 0px">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="" name="search" placeholder="Search borrowings" id="search" style="height: 38px; width: 20%;">
                        <a href="{{ route('borrowings.index') }}" class="">
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
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($borrowings as $borrowing)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $borrowing->nama_peminjam }}</td>
            <td>{{ $borrowing->judul_buku }}</td>
            <td>{{ $borrowing->tgl_pinjam }}</td>
            <td>{{ $borrowing->tgl_kembali }}</td>
            <td>{{ $borrowing->ket }}</td>
            <td>
                <form action="{{ route('borrowings.destroy',$borrowing->id) }}"  method="POST">
                    
           
                    <a class="btn btn-primary" href="{{ route('borrowings.edit',$borrowing->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $borrowings->links() !!}
        
@endsection
</x-app-layout>