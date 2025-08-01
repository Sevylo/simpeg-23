@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Tambah Data Pendidikan</h2>
<form action="/pendidikan/store" method="post" enctype="multipart/form-data">
<!-- {{ csrf_field() }} -->
@csrf

<div class="form-group">
<label for="id_pdk">ID Pendidikan</label>
<input type="text" disabled class="form-control w-50" name="id_pdk">
            @error('id_pdk')
                {{$messege}}
            @enderror
</div>
<br>

<div class="form-group">
<label for="id_pgw">ID Pegawai</label>
<select class="select" name="id_pgw" id="id_pgw">
    <option disabled value>Pilih ID Pegawai</option>
    @foreach ($pegawai as $fpr )
    <option value="{{$fpr->id_pgw}}">{{ $fpr->id_pgw }}</option>
    @endforeach
</select>
</div>

<div class="form-group"></br>
<label for="t_pdk">T Pendidikan</label>
<input type="text" class="form-control w-50" name="t_pdk" placeholder="Masukan T Pendidikan">
            @error('t_pdk')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="d_pdk">D Pendidikan</label>
<input type="text" class="form-control w-50" name="d_pdk" placeholder="Masukan D Pendidikan">
            @error('d_pdk') 
                {{$messege}}
            @enderror 
</div>

</div>

<div class="form-group float-right"> </br>
<button class="btn btn-lg btn-secondary" type="reset">Reset</button> </br></br>
<button class="btn btn-lg btn-success" type="submit">Submit</button>
</div>
</form>
</div>

@endsection