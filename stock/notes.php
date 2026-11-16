<!DOCTYPE html>
<html lang="en">
<head>
  <title>Notes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<?php
session_start();
include_once '../dbconnect.php';

// Mendapatkan data dari form
$konten = mysqli_real_escape_string($conn, $_POST['konten']);
$oleh = $_SESSION['user'];

// Menyimpan data ke dalam database menggunakan prepared statement
$stmt = $conn->prepare("INSERT INTO notes (contents, admin) VALUES (?, ?)");
$stmt->bind_param("ss", $konten, $oleh);
$success = $stmt->execute();
$stmt->close();

if ($success) {
    echo "<div class='alert alert-success'>
            <strong>Success!</strong> Redirecting you back in 1 second.
          </div>";
    echo "<meta http-equiv='refresh' content='1; url=index.php'/>";
} else {
    echo "<div class='alert alert-warning'>
            <strong>Failed!</strong> Redirecting you back in 1 second.
          </div>";
    echo "<meta http-equiv='refresh' content='1; url=index.php'/>";
}
?>

</body>
</html>
