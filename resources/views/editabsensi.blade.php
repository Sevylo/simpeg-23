@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Edit Data Absensi</h2>
<form action="/absensi/{{$data->id_absen}}" method="POST">
<!-- {{ csrf_field() }} -->

@method('PUT')
@csrf

<div class="form-group"></br>
<label for="id_pkj">ID Absensi</label>
<input type="text" disabled  class="form-control w-50" name="id_pkj" value="{{ $data->id_absen}}">    
</div>

<div class="form-group"></br>
<label for="nama">Nama</label>
<input type="text" class="form-control w-50" name="nama" value="{{ $data->nama}}">
            @error('nama')
                {{$message}}
            @enderror
</div>

<div class="form-group"></br>
<label for="tgl_mulai">Tangal Mulai</label>
<input type="date" class="form-control w-50" name="tgl_mulai" value="{{ $data->tgl_mulai}}">
            @error('tgl_mulai')
                {{$message}}
            @enderror
</div>

<div class="form-group"></br>
<label for="tgl_selesai">Tangal Selesai</label>
<input type="date" class="form-control w-50" name="tgl_selesai" value="{{ $data->tgl_selesai}}">
            @error('tgl_selesai')
                {{$message}}
            @enderror
</div>


<div class="form-group"></br>
<label for="status">Status</label>
<select class="select" name="status" id="status">
            
            <option value="Cuti"{{$data->status =="Cuti" ? 'selected' : ''}}>Cuti</option>
            <option value="Ijin"{{$data->status =="Ijin" ? 'selected' : ''}}>Ijin</option>
            <option value="Sakit"{{$data->status =="Sakit" ? 'selected' : ''}}>Sakit</option>
        </select>
</div>

<div class="form-group"></br>
<label for="ket">Keterangan</label>
<input type="text" class="form-control w-50" name="ket" value="{{ $data->ket}}">
            @error('ket')
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