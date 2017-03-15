<?php
include_once 'dbconfig.php';
include_once 'model/kecamatan.php';
$crud = new kecamatan($DB_con);
if(isset($_POST['btn-save']))
{
	$nama = $_POST['nama'];
	$idkecamatan = '';
		
	if($crud->create($nama,$idkecamatan))
	{
		header("Location: add-kecamatan.php?inserted");
	}
	else
	{
		header("Location: add-kecamatan.php?failure");
	}
}
?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>WOW!</strong> Record was inserted successfully <meta http-equiv="refresh" content="1;url=kecamatan">

	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while inserting record !
	</div>
	</div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

 	
	 <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>First Name</td>
            <td><input type='text' name='nama' class='form-control' required></td>
        </tr>
    
        
 
        
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Create New Record
			</button>  
            <a href="kecamatan" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>