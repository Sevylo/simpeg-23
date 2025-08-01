@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Tambah Data Pekerja</h2>
<form action="/pekerja/store" method="post" enctype="multipart/form-data">
<!-- {{ csrf_field() }} -->
@csrf

<div class="form-group">
<label for="id_pekerja">ID Pekerja</label>
<input type="text" disabled class="form-control w-50" name="id_pekerja">
            @error('id_pekerja')
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
<label for="nama_pkj">Nama</label>
<input type="text" class="form-control w-50" name="nama_pkj" placeholder="Masukan Nama">
            @error('nama_pkj')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="det_pkj">Det Pekerja</label>
<input type="text" class="form-control w-50" name="det_pkj" placeholder="Masukan Det Pekerja">
            @error('det_pkj')
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