@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Tambah Data Finger Print</h2>
<form action="/fprint/store" method="post" enctype="multipart/form-data">
<!-- {{ csrf_field() }} -->
@csrf

<div class="form-group">
<label for="id_fprint">ID Finger Print</label>
<input type="text" disabled class="form-control w-50" name="id_fprint" placeholder=". . .">
            @error('id_fprint')
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
<label for="nama">Nama</label>
<input type="text" class="form-control w-50" name="nama" placeholder="Masukan Nama">
            @error('nama')
                {{$messege}}
            @enderror
</div>

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
<label for="scan_1">Scan 1</label>
<input type="file" class="form-control w-50" name="scan_1">
            @error('scan_1')
                {{$messege}}
            @enderror
</div>

<div class="form-group"></br>
<label for="scan_2">Scan 2</label>
<input type="file" class="form-control w-50" name="scan_2">
            @error('scan_2')
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