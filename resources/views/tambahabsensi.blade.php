@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Tambah Data Absensi</h2>
<form action="/absensi/store" method="post" enctype="multipart/form-data">
<!-- {{ csrf_field() }} -->
@csrf
<div class="form-group">

        <input type="hidden" class="form-control w-50" name="id_absen" >
                    @error('id_absen')
                        {{$messege}}
                    @enderror

                    <div class="form-group">
        <label for="id_pgw">ID Pegawai</label>
        <select class="select" name="id_pgw" id="id_pgw">
            <option disabled value>Pilih ID Pegawai</option>
            @foreach ($pegawai as $fpr )
            <option value="{{$fpr->id_pgw}}">{{ $fpr->id_pgw }}</option>
            @endforeach
        </select>
        </div>

        </div>
        <div class="form-group"></br>
        <label for="nama">Nama</label>
        <input type="text" class="form-control w-50" name="nama" placeholder="Masukan Nama">
                    @error('nama')
                        {{$messege}}
                    @enderror
        </div>

        <div class="form-group"></br>
        <label for="tgl_mulai">Tanggal Mulai</label>
        <input type="date" class="form-control w-50" name="tgl_mulai">
                    @error('tgl_mulai')
                        {{$messege}}
                    @enderror
        </div>

        <div class="form-group"></br>
        <label for="tgl_selesai">Tanggal Selesai</label>
        <input type="date" class="form-control w-50" name="tgl_selesai" >
                    @error('tgl_selesai')
                        {{$messege}}
                    @enderror
        </div>

        <div class="form-group"></br>
        <label for="status">Status</label>
        <select class="select" name="status" id="status">
            <option disabled value>Pilih Status </option>
            <option value="Cuti">Cuti</option>
            <option value="Ijin">Ijin</option>
            <option value="Sakit">Sakit</option>
        </select>
        </div>

        <div class="form-group"></br>
        <label for="ket">Keterangan</label>
        <input type="text" class="form-control w-50" name="ket" placeholder="Masukan Keterangan">
                    @error('ket')
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