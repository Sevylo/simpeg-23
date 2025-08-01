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

<h1 class="text-center mb-2" id="title">Tabel Kantor</h1>

<table id="customers">
  <tr>
        <th>ID Kantor</th> 
        <th>Nama Wilayah</th>
        <th>Tanggal Dibuat</th>
  </tr>
  
@foreach ($data as $row)
<tr>
        <td class="fw-bold">{{$row->id_kantor}}</td>
        <td >{{$row->nm_wilayah}}</td>
        <td>{{ date('j \\ F Y',strtotime($row->created_at))}}</td>
  </tr>
@endforeach

</table>

</body>
</html>