<?php
include_once 'dbconfig.php';
include_once 'model/kecamatan.php';
$crud = new kecamatan($DB_con);
if(isset($_GET['delete_id']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: kecamatan");	
}

?>


<