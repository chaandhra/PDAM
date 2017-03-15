<?php


/*$koordinat_x = $_GET['koordinat_x'];
$koordinat_y = $_GET['koordinat_y'];
$nama_tempat = $_GET['nama_tempat'];
$SQL = $MySQLiconn->query("insert into kordinat_gis (x,y,nama_tempat) values($koordinat_x,$koordinat_y,'$nama_tempat')");
*/
include_once 'dbconfig.php';
include_once 'model/pelanggan.php';
$crud = new pelanggan($DB_con);

$koordinat_x = $_GET['koordinat_x'];
$koordinat_y = $_GET['koordinat_y'];
$nama_tempat = $_GET['nama_tempat'];
$idpelanggan = $_GET['idpelanggan'];
$alamat = $_GET['alamat'];
$blok = $_GET['blok'];

		
	if($crud->create($koordinat_x,$koordinat_y,$nama_tempat,$idpelanggan,$alamat,$blok))
	{
		header("Location: pelanggan");
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				<meta http-equiv='refresh' content='1;url=pelanggan'>

				</div>";

	}

?>
