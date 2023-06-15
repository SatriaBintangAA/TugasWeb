<?php
include_once("config.php");
 
if(isset($_POST['update']))
{	
   
    $id = $_POST['id'];
    $folder = './foto/';
    $foto = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];
    move_uploaded_file($source, $folder . $foto);

    $nama = $_POST['nama'];
    $sekolah = $_POST['sekolah'];
    $alamat = $_POST['alamat'];

        
    $result = mysqli_query($mysqli, "UPDATE user SET nama='$nama', sekolah='$sekolah', alamat='$alamat', foto='$foto' WHERE id=$id");

    if ($result) {
        echo "Data berhasil ditambahkan";
        echo "<a href='index.php'>Lihat</a>";
    } else {
        echo "Data gagal ditambahkan";
        echo "<a href='add.php'>Kembali</a>";
    }
    
    header("Location: index.php");
}
?>
<?php

$id = $_GET['id'];
 

$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $foto = $user_data['foto'];
    $nama = $user_data['nama'];
    $sekolah = $user_data['sekolah'];
    $alamat = $user_data['alamat'];
}
?>
<html>
<head>	
    <title>Edit data siswa</title>
</head>
 
<body>
    <link rel="stylesheet" type="text/css" href="addstyle.css"> 
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" name="form1" action="edit.php" enctype="multipart/form-data">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Sekolah</td>
                <td><input type="text" name="sekolah" value=<?php echo $sekolah;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td><input required type="file" name="foto" value=<?php echo $foto;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>

