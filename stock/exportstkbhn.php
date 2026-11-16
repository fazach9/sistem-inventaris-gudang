<!doctype html>
<html class="no-js" lang="en">

<?php 
	include 'cek.php';
	include '../dbconnect.php';
	?>

<html>
<head>
<title>UD KARUNIA SENTOSA UTAMA</title>
<link rel="icon" 
      type="image/png" 
      href="favicon.png">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>

</head>

<body>
		<div class="container">
			<h2>Stock Bahan</h2>
			<h4>(Inventory)</h4>
				<div class="data-tables datatable-dark">
					<table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Nama Barang</th>
												<th>Jenis</th>
												<th>Merk</th>
												<th>Ukuran</th>
												<th>Stock</th>
												<th>Satuan</th>
												<th>Harga</th>
												<th>Lokasi</th>
												<th>Gambar</th>
												
												<!--<th>Opsi</th>-->
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"SELECT * from sstock_brg order by nama ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['nama'] ?></td>
													<td><?php echo $p['jenis'] ?></td>
													<td><?php echo $p['merk'] ?></td>
													<td><?php echo $p['ukuran'] ?></td>
													<td><?php echo $p['stock'] ?></td>
													<td><?php echo $p['satuan'] ?></td>
													<td>Rp. <?php echo $p['harga'] ?></td>
													<td><?php echo $p['lokasi'] ?></td>
													<td>
                                                        <img src="assets/images/<?= $p['gambar']; ?>" alt="ini gambar" width="50">
                                                    </td>

												</tr>		
												<?php 
											}
											?>
										</tbody>
										</table>
								</div>
						</div>
	
						<script>
$(document).ready(function() {
    var userName = 'Santoso';  // Ganti dengan cara dinamis untuk mendapatkan nama pengguna jika diperlukan

    $('#dataTable3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                messageBottom: 'Tertanda,\n\n' + userName
            },
            {
                extend: 'csv',
                messageBottom: '\nTertanda,\n\n\n' + userName
            },
			{
                extend: 'excel',
                customize: function (xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var lastRow = $('row', sheet).last();
                    lastRow.after(
                        '<row><c t="inlineStr"><is><t>Tertanda,</t></is></c></row>' +
                        '<row><c t="inlineStr"><is><t></t></is></c></row>' +
                        '<row><c t="inlineStr"><is><t>' + userName + '</t></is></c></row>'
                    );
                }
            },
            {
                extend: 'pdf',
                messageBottom: '\nTertanda,\n\n\n' + userName
            },
            {
                extend: 'print',
                messageBottom: '\nTertanda,\n\n\n' + userName
            }
        ]
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

	

</body>

</html>