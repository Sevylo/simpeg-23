@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Edit Data Finger Print</h2>
<form action="/fprint/{{$data->id_fprint}}" method="POST">
<!-- {{ csrf_field() }} -->

@method('PUT')
@csrf

<div class="form-group"></br>
<label for="id_fprint">ID Finger Print</label>
<input type="text" disabled  class="form-control w-50" name="id_fprint" value="{{ $data->id_fprint}}">
           
</div>

<div class="form-group"></br>
<label for="nama">Nama</label>
<input type="text" class="form-control w-50" name="nama" value="{{ $data->nama}}">
            @error('nama')
                {{$message}}
            @enderror
</div>

<div class="form-group"></br>
<label for="id_kantor">ID Kantor</label>
<input type="text" class="form-control w-50" name="id_kantor" value="{{ $data->id_kantor}}">
            @error('id_kantor')
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