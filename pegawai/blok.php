<?php
include_once 'dbconfig.php';

include_once 'header.php';
$jmln = $DB_con->query('select count(*) from blok')->fetchColumn(); 
 ?>

<div class="clearfix"></div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
     <th>First Name</th>
     <th>Last Name</th>
     <th>E - mail ID</th>

     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
		$query = "SELECT blok.id , blok.namablok , kecamatan.nama FROM blok LEFT JOIN kecamatan on blok.id_kecamatan = kecamatan.id_kecamatan";       
		$records_per_page=3;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
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
   
<?php include_once 'footer.php'; ?>
</div>

