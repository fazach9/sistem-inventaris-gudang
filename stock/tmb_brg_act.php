<?php 
include '../dbconnect.php';
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$ukuran=$_POST['ukuran'];
$merk=$_POST['merk'];
$satuan=$_POST['satuan'];
$stock=$_POST['stock'];
$harga=$_POST['harga'];
$lokasi=$_POST['lokasi'];
	  
// Lokasi folder untuk menyimpan gambar
$target_dir = "assets/images/";
// Nama file gambar yang diunggah
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
// Mendapatkan ekstensi file
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Cek apakah file gambar adalah file gambar yang valid
$check = getimagesize($_FILES["gambar"]["tmp_name"]);
if($check !== false) {
    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file tersebut sudah ada.";
    } else {
        // Pindahkan file ke folder asset
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars( basename( $_FILES["gambar"]["name"])). " telah diunggah.";
            
            $gambar =$_FILES["gambar"]["name"];
            // Simpan nama file ke database
            $gambar_nama = basename($_FILES["gambar"]["name"]);
            $query = mysqli_query($conn,"insert into sstock_brg values('','$nama','$jenis','$merk','$ukuran','$stock', '$satuan', '$harga', '$lokasi', '$gambar')");
            if ($query){

            echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= stock.php'/>  ";
            } else { echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= stock.php'/> ";
            }
            
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
} else {
    echo "File tersebut bukan file gambar yang valid.";
    
}
 
?>
 
  <html>
<head>
  <title>Tambah Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>