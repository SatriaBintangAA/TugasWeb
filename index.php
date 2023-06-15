<?php
include_once("config.php");
 
$result = mysqli_query($mysqli, "SELECT * FROM user ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Data Siswa</title>
    <style>
        .btn_edit{
            color:red;
            background: transparent;
        }
    </style>
</head>
 
<body>
    <h1>DATA SISWA</h1>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <button onclick="window.location.href='add.php'" class="btn first">Tambah data</button><br/><br/>
    
 
    <table class="tabel1" border="2" align="center" width="100%">
 
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Sekolah</th> 
        <th>Alamat</th> 
        <th>Aksi</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td><img src='foto/".$user_data['foto']."' width='100px' height='100px'></td>";   
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['sekolah']."</td>";
        echo "<td>".$user_data['alamat']."</td>";       
        echo "<td><a class='btn_edit' href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>

    
</body>
</html>