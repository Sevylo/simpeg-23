@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Edit Data Presensi</h2>
<form action="/presensi/{{$data->id_presensi}}" method="POST">
<!-- {{ csrf_field() }} -->

@method('PUT')
@csrf

<div class="form-group"></br>
<label for="id_pkj">ID Presensi</label>
<input type="text" disabled  class="form-control w-50" name="id_pkj" value="{{ $data->id_presensi}}">    
</div>

<div class="form-group"></br>
<label for="tgl_absen">Tangal Absen</label>
<input type="date" class="form-control w-50" name="tgl_absen" value="{{ $data->tgl_absen}}">
            @error('tgl_absen')
                {{$message}}
            @enderror
</div>

<div class="form-group"></br>
<label for="jmasuk">Jam Masuk</label>
<input type="time" class="form-control w-50" name="jmasuk" value="{{ $data->jmasuk}}">
            @error('jmasuk')
                {{$message}}
            @enderror
</div>

<div class="form-group"></br>
<label for="jkeluar">Jam Keluar</label>
<input type="time" class="form-control w-50" name="jkeluar" value="{{ $data->jkeluar}}">
            @error('jkeluar')
                {{$message}}
            @enderror
</div>

<div class="form-group"></br>
<label for="st_masuk">Status Masuk</label>
<select class="select" name="st_masuk" id="st_masuk">
            
            <option value="Sudah"{{$data->st_masuk =="Sudah" ? 'selected' : ''}}>Sudah</option>
            <option value="Belum"{{$data->st_masuk =="Belum" ? 'selected' : ''}}>Belum</option>
            <option value="Tidak"{{$data->st_masuk =="Tidak" ? 'selected' : ''}}>Tidak</option>
        </select>
</div>

<div class="form-group"></br>
<label for="st_keluar">Status Keluar</label>
<select class="select" name="st_keluar" id="st_keluar">
            
            <option value="Sudah"{{$data->st_keluar =="Sudah" ? 'selected' : ''}}>Sudah</option>
            <option value="Belum"{{$data->st_keluar =="Belum" ? 'selected' : ''}}>Belum</option>
            <option value="Tidak"{{$data->st_keluar =="Tidak" ? 'selected' : ''}}>Tidak</option>
        </select>
</div>

<div class="form-group"></br>
<label for="st_kehadiran">Status Kehadiran</label>
<input type="text" class="form-control w-50" name="st_kehadiran" value="{{ $data->st_kehadiran}}">
            @error('st_kehadiran')
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