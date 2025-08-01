@extends('layouts/main')
@section('navbar')

<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h2 class="fw-bolder text-primary">Form Tambah Data Divisi</h2>
<form action="/divisi/store" method="post" enctype="multipart/form-data">
<!-- {{ csrf_field() }} -->
@csrf
<br>
<div class="form-group">
<label for="id_divisi">ID Divisi</label>
<input type="text" disabled class="form-control w-50" name="id_divisi">
            @error('id_divisi')
                {{$messege}}
            @enderror
</div>


<div class="form-group"></br>
<label for="nm_divisi">Nama Divisi</label>
<select class="select" name="nm_divisi" id="nm_divisi">
    <option disabled value>Pilih Nama Divisi</option>
    @foreach ($pegawai as $fpr )
    <option value="{{$fpr->nm_divisi}}">{{ $fpr->nm_divisi }}</option>
    @endforeach
</select>
</div>

</div>

<div class="form-group float-right"> </br>
<button class="btn btn-lg btn-secondary" type="reset">Reset</button> </br></br>
<button class="btn btn-lg btn-success" type="submit">Submit</button>
</div>
</form>
</div>

@endsection