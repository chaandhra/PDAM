<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$nama = $_POST['namablok'];
	$idkecamatan = $_POST['idkecamatan'];
	
	if($crud->update($id,$nama,$idkecamatan))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <meta http-equiv='refresh' content='1;url=blok'>

				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>First Name</td>
            <td><input type='text' name='namablok' class='form-control' value="<?php echo $namablok; ?>" required></td>
        </tr>
  <?php 


                                    
                                    $sql = "SELECT * FROM kecamatan";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id = $row['id_kecamatan'];
                                    $namakec=$row['nama'];
                                    $tahun.='<option value="'.$id.'">'.$namakec.'</option>';}
                                ?>
        <tr>
            <td>Last Name</td>
            <td><select name="idkecamatan" class="form-control">
            <option value="<?php $id_kecamatan ;?>"><?php echo $nama ;?></option>
            <?php echo $tahun; ?></td>
        </tr>
 
       
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update this Record
				</button>
                <a href="blok" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>