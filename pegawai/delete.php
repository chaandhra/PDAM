<?php
include_once 'dbconfig.php';


if(isset($_GET['delete_id']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: blok");	
}

?>


<