<html>
<head>
    <title>Tambah Data</title>
</head>
 
<body>
    <a href="index.php">Balik ke awal </a>
    <br/><br/>
    <form action="add.php" method="post" name="form1" enctype="multipart/form-data">
    <link rel="stylesheet" type="text/css" href="addstyle.css"> 
        <table width="25%" border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Sekolah</td>
                <td><input type="text" name="sekolah"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td><input required type="file" name="foto"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    <br>
    
    <?php
 
   
    if(isset($_POST['Submit'])) {
        $folder = './foto/';
        $foto = $_FILES['foto']['name'];
        $source = $_FILES['foto']['tmp_name'];
        move_uploaded_file($source, $folder . $foto);

        $nama = $_POST['nama'];
        $sekolah = $_POST['sekolah'];
        $alamat = $_POST['alamat'];

       
        include_once("config.php");
                
        $result = mysqli_query($mysqli, "INSERT INTO user(nama,sekolah,alamat,foto) VALUES('$nama','$sekolah','$alamat','$foto')");
        
    
        if ($result) {
            echo "Data berhasil ditambahkan";
            echo "<a href='index.php'>Lihat</a>";
        } else {
            echo "Data gagal ditambahkan";
            echo "<a href='add.php'>Kembali</a>";
        }
    }
    ?>
</body>
</html>