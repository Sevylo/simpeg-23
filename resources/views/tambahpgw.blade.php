@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Tambah Data Pegawai</h2>
<form action="/pegawai/store" method="post" enctype="multipart/form-data">
<!-- {{ csrf_field() }} -->
@csrf
<div class="form-group">
<label for="id_pgw">ID Pegawai</label>
<input type="text" disabled class="form-control w-50" name="id_pgw" placeholder=". . .">
            @error('id_pgw')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="nama">Nama</label>
<input type="text" class="form-control w-50" name="nama" placeholder="Masukan Nama">
            @error('nama')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="alamat">Alamat</label>
<input type="text" class="form-control w-50" name="alamat" placeholder="Masukan Alamat">
            @error('alamat')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="tmpt_lahir">Tempat Lahir</label>
<input type="text" class="form-control w-50" name="tmpt_lahir" placeholder="Masukan Tempat Lahir">
            @error('tmpt_lahir')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="tgl_lahir">Tanggal Lahir</label>
<input type="date" class="form-control w-50" name="tgl_lahir" >
            @error('tgl_lahir')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="kelamin">Jenis Kelamin</label> </br>
<label for="L">L</label> 
<input class="form-check-inline" type="radio" id="L" name="kelamin" value="L">
<label for="P">P</label>
<input class="form-check-inline" type="radio" id="P" name="kelamin" value="P">
@error('kelamin')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group"></br>
<label for="agama">Agama</label>
<input type="text" class="form-control w-50" name="agama" placeholder="Masukan Agama">
            @error('agama')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="nope">Nomer Telepon</label>
<input type="number" class="form-control w-50" name="nope" placeholder="Masukan Nomor Telephone">
            @error('nope')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="email">Email</label>
<input type="text" class="form-control w-50" name="email" placeholder="Masukan Email">
            @error('email')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="nm_divisi">Divisi</label>
<input type="text" class="form-control w-50" name="nm_divisi" placeholder="Masukan Divisi">
            @error('nm_divisi')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="id_kantor">ID Kantor</label>
<input type="number" class="form-control w-50" name="id_kantor" placeholder="Masukan ID Kantor Yang Sama Dengan ID Pegawai">
            @error('id_kantor')
                {{$messege}}
            @enderror
</div>
<div class="form-group"></br>
<label for="foto">Foto</label>
<input type="file" class="form-control w-50" name="foto">
            @error('foto')
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