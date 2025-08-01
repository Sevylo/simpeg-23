@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Edit Data Pegawai</h2>
<form action="/pegawai/{{$data->id_pgw}}" method="POST">
<!-- {{ csrf_field() }} -->

@method('PUT')
@csrf

<div class="form-group"></br>
<label for="nama">Nama</label>
<input type="text" class="form-control w-50" name="nama" value="{{ $data->nama}}">
            @error('nama')
                {{$message}}
            @enderror
</div>
<div class="form-group"></br>
<label for="alamat">Alamat</label>
<input type="text" class="form-control w-50" name="alamat" value="{{ $data->alamat}}">
            @error('alamat')
                {{$message}}
            @enderror
</div>
<div class="form-group"></br>
<label for="tmpt_lahir">Tempat Lahir</label>
<input type="text" class="form-control w-50" name="tmpt_lahir" value="{{ $data->tmpt_lahir}}">
            @error('tmpt_lahir')
                {{$message}}
            @enderror
</div>
<div class="form-group"></br>
<label for="tgl_lahir">Tanggal Lahir</label>
<input type="date" class="form-control w-50" name="tgl_lahir" value="{{ $data->tgl_lahir}}">
            @error('tgl_lahir')
                {{$message}}
            @enderror
</div>
<div class="form-group"></br>
<label for="kelamin" >Jenis Kelamin</label> </br>
<label for="L">L</label> 
<input class="form-check-inline" type="radio" id="L" name="jekel" value="L" @if ($data->kelamin == "L") selected @endif>
<label for="P">P</label>
<input class="form-check-inline" type="radio" id="P" name="jekel" value="P"  @if ($data->kelamin == "P") selected @endif>
@error('kelamin')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group"></br>
<label for="agama">Agama</label>
<input type="text" class="form-control w-50" name="agama" value="{{ $data->agama}}">
            @error('agama')
                {{$message}}
            @enderror
</div>
<div class="form-group"></br>
<label for="nope">Nomer Telepon</label>
<input type="text" class="form-control w-50" name="nope" value="{{ $data->nope}}">
            @error('nope')
                {{$message}}
            @enderror
</div>
<div class="form-group"></br>
<label for="email">Email</label>
<input type="text" class="form-control w-50" name="email" value="{{ $data->email}}">
            @error('email')
                {{$message}}
            @enderror
</div>
<div class="form-group"></br>
<label for="nm_divisi">Divisi</label>
<input type="text" class="form-control w-50" name="nm_divisi" value="{{ $data->nm_divisi}}">
            @error('nm_divisi')
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
<!-- 
<div class="form-group"> </br>
<label for="foto">Foto</label>
<input type="file" class="form-control w-50" name="foto" value="{{ $data->foto}}">      
</div> -->

<div class="form-group float-right"> </br>
<button class="btn btn-lg btn-secondary" type="reset">Reset</button> </br></br>
<button class="btn btn-lg btn-success" type="submit">Submit</button>
</div>
</form>
</div>

@endsection