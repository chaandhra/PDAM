
<?php
ini_set("display_errors",0);
include'header.php';
include'dbconfig.php';

if (isset($_GET['id'])) {

	$query2=$DB_con->query("select * from checker where id='$_GET[id]'");
	$data2  = $query2->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container">


<?php if (isset($_GET['id'])):?>
<form class="form-horizontal" role="form" action="user.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> 
</div>
<div class="panel-body">


<input type="hidden" name="id" value="<?php echo $data2['id'];?>">

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="nama"
value="<?php echo $data2['nama'];?>" >
</div>
</div>


<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Username</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="username"
value="<?php echo $data2['username'];?>" >
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Password</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="password"
 >
</div>
</div>



<div class="panel-footer">

<button type="submit" class="btn btn-success" name="edit">Update</button>
<button type="cancel" class="btn btn-danger">Batal</button>
<?php else :?>
<form class="form-horizontal" role="form" action="user.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="pelajaran.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">Nama</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="nama"
placeholder="masukan Username" >
</div>
</div>

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">username</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="username"
placeholder="masukan Username" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">password</label>
<div class="col-sm-4">
<input type="password" class="form-control"  name="password"
placeholder="password"  >
</div>
</div>



</div>
</div>
<div class="panel-footer">

<button type="submit" class="btn btn-success" name="simpan">Simpan</button>
<button type="cancel" class="btn btn-danger">Batal</button>
<?php endif; ?>
</div>
</div>
</form>

<?php
ini_set("display_errors",0);



                if (isset($_POST['simpan'])) {
    $newpass=md5($_POST['password']);
      
                    $sql = "INSERT INTO checker VALUES ('','$_POST[username]','$newpass','$_POST[nama]')";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "userlist";
  
</script>';


                       
                        }
                            else {

                           if (isset($_POST['edit'])) {
                        $id=$_GET['id'];
$newpass=md5($_POST['password']);
                            $sql = "update checker set  nama='$_POST[nama]',username='$_POST[username]', password='$newpass' where id='$_POST[id]'";
                            $DB_con->exec($sql);


                                                 
echo '<script type="text/javascript">

        alert("Berhasil diedit")
        window.location = "userlist";
  
</script>';
                     


}
}

       
?>