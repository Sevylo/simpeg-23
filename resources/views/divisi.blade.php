@extends('layouts/main')
@section('navbar')

<html>
<head>
  <style>
    #tbody{
      font-family: Arial, Helvetica, sans-serif;
      text-align: center;
    }

    #thead{
      background-color: #2989e6;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    

  </style>

    <title>DATA Divisi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="container-fluid">
<body class="overflow-auto">
    <h1 class="text-center text-primary fw-bolder fst-italic mt-2">Tabel Divisi</h1>
  <br>
    <div class="container text-left">
      <div class="row row-cols">
        <div class="col gx-5">
          <a class="btn btn-md btn-primary rounded-pill text-light" href="divisi/tambahdvs" role="button">Tambah Data</a>
        </div>
      </div>
    </div>
    
    <div class="container text-left">
  <div class="row float-end">
    <div class="col gx-5">
      <a class="btn btn-md btn-primary rounded-pill text-light" href="/exportpdf5" role="button">Export PDF</a>
    </div>
  </div>
</div>

    <!-- SEARCH BAR -->
    
    <form action="/divisi" method="GET">
    <input type="search" name="search" id="search" class="form-control-sm rounded-pill mt-2" placeholder="Tekan Enter...">
    </form>
    

    <div class="col-6 mt-3">
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('status') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
</div>
<table class="table table-hover table-bordered">
  <caption class="mt-1 text-primary text-center">_________________________________________________________________________________________________________________________________________________________________________________________</caption>
    <thead class="text-center text-light" id="thead">
        <tr class="text-center">
        <th>ID Divisi</th>
        <th>Nama Divisi</th>
        <th>Edit</th>
        <tr>
    </thead>

    <tbody class="text-center" id="tbody">
    @foreach($data as $row)
        <tr>
        <td class="fw-bold">{{$row->id_divisi}}</td>    
        <td>{{$row->nm_divisi}}</td>
        
<td>
    <div class="btn-group" role="group"> 
<a href="/editdvs/{{$row->id_divisi}}" class="btn btn-xs btn-success text-light">Edit</a> 
<a href="#" class="btn btn-xs btn-danger delete" data-id="{{$row->id_divisi}}">Delete</a>
</td>
</tr>
@endforeach
</tbody>
</table>
<br>

{{ $data->links()}}

<script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous">
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.3.slim.js" 
integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" 
crossorigin="anonymous">
</script> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" 
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" 
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

</body>

<!-- Error tapi berhasil muncul -->
<script> 
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>
<!--                            -->
<script>
    $('.delete').click( function(){
      var pegawaiid = $(this).attr('data-id');
      
        swal({
  title: "Yakin ingin menghapus data?",
  text: "Anda akan menghapus data pegawai dengan Id Divisi "+pegawaiid+"",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "/divisi/destroy/"+pegawaiid+""
    swal("Data Berhasil Dihapus", {
      icon: "success",
    });
  } else {
    swal("Data Tidak Jadi Dihapus");
  }
});
    });

    
</script>

</div>
</html>




@endsection