

<?php
include_once 'dbconfig.php';
include_once 'model/pelanggan.php';
$crud = new pelanggan($DB_con);


if(isset($_POST['nomor']))
{
	$id = $_POST['nomor'];
	$crud->delete($id);
	
}

?>