<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
	$nama = $_POST['nama'];
	$idkecamatan = $_POST['idkecamatan'];
		
	if($crud->create($nama,$idkecamatan))
	{
		header("Location: add-data.php?inserted");
	}
	else
	{
		header("Location: add-data.php?failure");
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
    <strong>WOW!</strong> Record was inserted successfully 
    <meta http-equiv="refresh" content="1;url=blok">

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
    <?php 


                                    
                                    $sql = "SELECT * FROM kecamatan";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id = $row['id_kecamatan'];
                                    $nama=$row['nama'];
                                    $tahun.='<option value="'.$id.'">'.$nama.'</option>';}
                                ?>
                                
        <tr>
            <td>Last Name</td>
            <td><select name="idkecamatan" class="form-control"><?php echo $tahun; ?></select>
</td>
        </tr>
 
        
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Create New Record
			</button>  
            <a href="index" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>