{{-- @extends('layouts.master') --}}

<x-app-layout>
@section('content')
   
    <div class="row  mx-auto" style="width: 400px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('borrowings.index') }}"><i class="bi bi-arrow-left-circle"></i>  Back</a>
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
        
    <form action="{{ route('borrowings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="row mx-auto" style="width: 400px">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Peminjam</strong>
                    <select class="form-control" name="nama_peminjam" id="nama_peminjam">
                        <option value="" hidden></option>
                        @foreach($students as $student)
                        <option value="{{$student->nama}}">{{$student->nama}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul buku</strong>
                    <select class="form-control" name="judul_buku" id="judul_buku">
                        <option value="" hidden></option>
                        @foreach($books as $book)
                        <option value="{{$book->judul}}">{{$book->judul}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pinjam</strong>
                    <input type="date" name="tgl_pinjam" class="form-control" placeholder="Tanggal Pinjam">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Kembali</strong>
                    <input type="date" name="tgl_kembali" class="form-control" placeholder="Tanggal Kembali">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <input type="radio" name="ket" value="Kembali"> Kembali
                    <input type="radio" name="ket" value="Belum Kembali"> Belum Kembali
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        $('#nama_peminjam').select2({
            placeholder: 'Select a borrower name',
            allowClear: true
        });

        $('#judul_buku').select2({
            placeholder: 'Select a book title',
            allowClear: true
        });
    </script>
@endsection
</x-app-layout>