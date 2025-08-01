@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Edit Data Pendidikan</h2>
<form action="/pendidikan/{{$data->id_pdk}}" method="POST">
<!-- {{ csrf_field() }} -->

@method('PUT')
@csrf

<div class="form-group"></br>
<label for="id_pdk">ID Pendidikan</label>
<input type="text" disabled  class="form-control w-50" name="id_pdk" value="{{ $data->id_pdk}}">    
</div>

<div class="form-group"></br>
<label for="t_pdk">T Pendidikan</label>
<input type="text" class="form-control w-50" name="t_pdk" value="{{ $data->t_pdk}}">
            @error('t_pdk')
                {{$message}}
            @enderror
</div>

<div class="form-group"></br>
<label for="d_pdk">D Pendidikan</label>
<input type="text" class="form-control w-50" name="d_pdk" value="{{ $data->d_pdk}}">
            @error('d_pdk')
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