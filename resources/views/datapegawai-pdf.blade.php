<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #2989e6;
  color: white;
  font-family: Arial, Helvetica, sans-serif;

}

#customers td {

    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    padding-right: 12px;
    padding-top: 12px;
    padding-bottom: 12px;
    
}

#title{
  color: #2989e6;
  font-size: xx-large;
  font-family: Arial, Helvetica, sans-serif;
  font-stretch: semi-expanded;
  margin-bottom: 5px;
}

</style>
</head>
<body>

<h1 class="text-center mb-2" id="title">Tabel Pegawai</h1>

<table id="customers">
  <tr>
        <th>ID Pegawai</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tanggal Lahir</th> 
        <th>Nomer HP</th>
        <th>Email</th>
        <th>Divisi</th>
        <th>ID Kantor</th>
        
  </tr>
  
@foreach ($data as $row)
<tr>
        <td>{{$row->id_pgw}}</td>
        <td>{{$row->nama}}</td>
        <td>{{$row->alamat}}</td>
        <td>{{ date('j \\ F Y',strtotime($row->tgl_lahir))}}</td>
        <td>{{$row->nope}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->nm_divisi}}</td>
        <td>{{$row->id_kantor}}</td>
  </tr>
@endforeach

</table>

</body>
</html>