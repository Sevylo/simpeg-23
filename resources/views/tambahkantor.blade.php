@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Tambah Data Kantor</h2>
<form action="/kantor/store" method="post" enctype="multipart/form-data">
<!-- {{ csrf_field() }} -->
@csrf

<!-- <div class="form-group">
<label for="id_kantor">ID Kantor</label>
<input type="text" disabled class="form-control w-50" name="id_kantor">
            @error('id_kantor')
                {{$messege}}
            @enderror
</div> -->

<br>
<div class="form-group">
<label for="id_kantor">ID Kantor</label>
<select class="select" name="id_kantor" id="id_kantor">
    <option disabled value>Pilih ID Kantor</option>
    @foreach ($pegawai as $fpr )
    <option value="{{$fpr->id_kantor}}">{{ $fpr->id_kantor }}</option>
    @endforeach
</select>
</div>


<div class="form-group"></br>
<label for="nm_wilayah">Nama Wilayah</label>
<input type="text" class="form-control w-50" name="nm_wilayah" placeholder="Masukan Nama Wilayah">
            @error('nm_wilayah')
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