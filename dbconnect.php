<?php 
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost","root","","inventory");

?>
<?php

$koneksi = mysqli_connect("localhost", "root", "", "inventory");
if (isset($_GET['gambar'])) {
    $sql = "SELECT * FROM sstock_brg WHERE gambar=" . $_GET['gambar'];
    $result = mysqli_query($koneksi, $sql) or die("<b>Error:</b> Ada kesalahan<br/>" . mysqli_error($koneksi));
    $row = mysqli_fetch_array($result);
    header("Content-type: " . $row["gambar"]);
    echo $row["gambar"];
}
mysqli_close($koneksi);
?>