@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Tambah Data Presensi</h2>
<form action="/presensi/store" method="post" enctype="multipart/form-data">
<!-- {{ csrf_field() }} -->
@csrf
<div class="form-group">

<input type="hidden" class="form-control w-50" name="id_pgw" placeholder="Masukan Presensi">
            @error('id_presensi')
                {{$messege}}
            @enderror
</div>

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
<label for="tgl_absen">Tanggal Absen</label>
<input type="date" class="form-control w-50" name="tgl_absen">
            @error('tgl_absen')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="jmasuk">Jam Masuk</label>
<input type="time" class="form-control w-50" name="jmasuk" >
            @error('jmasuk')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="jkeluar">Jam Keluar</label>
<input type="time" class="form-control w-50" name="jkeluar">
            @error('jkeluar')
                {{$messege}}
            @enderror
</div>

<div class="form-group"></br>
<label for="st_masuk">Status Masuk</label>
<select class="select" name="st_masuk" id="st_masuk">
            <option disabled value>Pilih Status Masuk</option>
            <option value="Sudah">Sudah</option>
            <option value="Belum">Belum</option>
            <option value="Tidak">Tidak</option>
        </select>
</div>

<div class="form-group"></br>
<label for="st_keluar">Status Keluar</label>
<select class="select" name="st_keluar" id="st_keuar">
            <option disabled value>Pilih Status Keluar</option>
            <option value="Sudah">Sudah</option>
            <option value="Belum">Belum</option>
            <option value="Tidak">Tidak</option>
        </select>
</div>

<div class="form-group"></br>
<input type="hidden" class="form-control w-50" name="wkt_telat">
            @error('wkt_telat')
                {{$messege}}
            @enderror
</div>

<div class="form-group"></br>
<label for="st_kehadiran">Status Kehadiran</label>
<input type="text" class="form-control w-50" name="st_kehadiran" placeholder="Masukan Status Kehadiran">
            @error('st_kehadiran')
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