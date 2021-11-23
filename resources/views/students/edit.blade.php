{{-- @extends('layouts.master') --}}
  
<x-app-layout>
@section('content')
    <div class="row  mx-auto" style="width: 400px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"><i class="bi bi-arrow-left-circle"></i> Back</a>
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
        
    <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')

            <div class="row mx-auto  " style="width: 400px">
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group  col-md-18 ">
                        <strong>Nis:</strong>
                       <input type="text" name="nis" class="form-control" placeholder="NIS" value="{{$student->nis}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group  col-md-18">
                        <strong>Nama:</strong>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$student->nama}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group  col-md-18">
                        <strong>Rombel:</strong>
                        <select class="form-control" name="rombel" id="rombel">
                            <option value="" hidden></option>
                            @foreach($studentGroups as $studentGroup)
                            <option value="{{$studentGroup->rombel}}" @if($student->rombel == $studentGroup->rombel)selected @endif>{{$studentGroup->rombel}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group col-md-18">
                        <strong>Rayon:</strong>
                        <select class="form-control" name="rayon" id="rayon">  
                            <option value="" hidden></option>
                            @foreach($rayons as $rayon)
                        <option value="{{$rayon->rayon}}" @if($student->rayon == $rayon->rayon)selected @endif>{{$rayon->rayon}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
<script type="text/javascript">

        $("#rombel").select2({
              placeholder: "Select a Rombel",
              allowClear: true
          });
  
          $("#rayon").select2({
              placeholder: "Select a Rayon",
              allowClear: true
          });
</script>
  
  
@endsection
</x-app-layout>