<?php
include_once 'dbconfig.php';
include_once 'header.php';

$jmln = $DB_con->query('select count(*) from checker')->fetchColumn(); 
if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM checker WHERE id = '$_GET[id]'");
echo '<script type="text/javascript">

       
        window.location = "userlist";
  
</script>';

}

?>

<div class="container">





      <div class="row">
 

            <br>

        <div class="table-responsive">
       
                             
                            
                            <a href="user" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
                             
        <form class="navbar-form navbar-right" role="search" action="userlist" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                            <a href="userlist" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                            </form>

            <table class='table table-bordered table-responsive'>
    
                <tr>
                
                       
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Action</th>

                </tr>

                <tr>
                    <?php
                     ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                      $query = "SELECT *
                        from checker
                             where username like '%$cari%' or nama like '%$cari%' ";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->user($newquery);


                        } else {
                        $query = "SELECT * from checker order by id asc";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->user($newquery);
                        }
                     ?>
             
                    <td colspan="3" align="center">
                        <div class="pagination-wrap">
                        <?php $crud->paginglink($query,$records_per_page); ?>
                        </div>
                    </td>
                </tr>
                <tr> <td colspan="3"> Jumlah Data: <span class="badge"><?php echo $jmln;?></span>
                </td>
                </tr>
            </table>
        </div>


       </hr>

           
                    <br>

       
    
<?php include_once 'footer.php'; ?>
                            