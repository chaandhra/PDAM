<?php
include_once 'dbconfig.php';
include_once 'model/kecamatan.php';
$crud = new kecamatan($DB_con);
 include_once 'header.php';
$jmln = $DB_con->query('select count(*) from kecamatan')->fetchColumn(); 
  ?>

<div class="clearfix"></div>

<div class="container">
<a href="add-kecamatan" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
      <th>E - mail ID</th>

     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
		$query = "SELECT * FROM  kecamatan";       
		$records_per_page=3;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->datakecamatan($newquery);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr>
 <tr> <td colspan="5"> Jumlah Data: <span class="badge"><?php echo $jmln;?></span>
                </td>
                </tr>
</table>
   
       
</div>

<?php include_once 'footer.php'; ?>