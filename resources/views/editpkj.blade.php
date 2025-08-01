@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Edit Data Pekerja</h2>
<form action="/pekerja/{{$data->id_pkj}}" method="POST">
<!-- {{ csrf_field() }} -->

@method('PUT')
@csrf

<div class="form-group"></br>
<label for="id_pkj">ID Pekerja</label>
<input type="text" disabled  class="form-control w-50" name="id_pkj" value="{{ $data->id_pkj}}">    
</div>

<div class="form-group"></br>
<label for="nama">Nama</label>
<input type="text" class="form-control w-50" name="nama" value="{{ $data->nama_pkj}}">
            @error('nama')
                {{$message}}
            @enderror
</div>

<div class="form-group"></br>
<label for="det_pkj">Det Pekerja</label>
<input type="text" class="form-control w-50" name="det_pkj" value="{{ $data->det_pkj}}">
            @error('det_pkj')
                {{$message}}
            @enderror
</div>

<div class="form-group float-right"> </br>
<button class="btn btn-lg btn-secondary" type="reset">Reset</button> </br></br>
<button class="btn btn-lg btn-success" type="submit">Submit</button>
</div>
</form>
</div>

@endsection