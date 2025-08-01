@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Edit Data Kantor</h2>
<form action="/kantor/{{$data->id_kantor}}" method="POST">
<!-- {{ csrf_field() }} -->

@method('PUT')
@csrf

<div class="form-group"></br>
<label for="id_kantor">ID Kantor</label>
<input type="text" disabled  class="form-control w-50" name="id_kantor" value="{{ $data->id_kantor}}">    
</div>

<div class="form-group"></br>
<label for="nm_wilayah">Nama Wilayah</label>
<input type="text" class="form-control w-50" name="nm_wilayah" value="{{ $data->nm_wilayah}}">
            @error('nm_wilayah')
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