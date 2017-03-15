<?php include 'header.php' ;?>





<script type="text/javascript">
var peta;
var koorAwal = new google.maps.LatLng(-6.82065, 107.94512);
function peta_awal(){

    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.SATELLITE 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}






function carikordinat(lokasi){
    var settingpeta = {
        zoom: 18,
        center: lokasi,
        mapTypeId: google.maps.MapTypeId.SATELLITE
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
    });
    google.maps.event.addListener(tanda, 'click', function() {
      infowindow.open(peta,tanda);
    });
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}



</script>

</head>
<div class="container">
<body onLoad="peta_awal()">


<!-- <div id=kordinattersimpan></div> -->

<div class="panel panel-primary">
<div class="panel-heading">
Data Pelanggan PDAM Tirta Medal Sumedang
</div>
<div class="panel-body">

<?php
include('pegawai/dbconfig.php');
include_once 'pegawai/model/pelanggan.php';
$crud = new pelanggan($DB_con);
?>
<center>
                            <form  role="search" action="home" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Masukan Nama Pelanggan atau ID pelanggan" name="cari">
                            </div>
                            <a href="index" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> Refresh </button></a>
                          
                 </form>
                 </center>


 <?php
                    ini_set("display_errors",0);
   

                        if (isset($_POST['cari'])) : ?>
            <div class="table-responsive"> 
             <table class="table">
  
                <tr>
                
                 
                    <th>Nama Pelanggan</th> 
                    <th>ID Pelanggan</th>
                    <th>Alamat</th>
                 
            
                </tr>

                <tr>
                    <?php   
                     $cari=$_POST['cari'];
                     $query = "SELECT * FROM kordinat_gis where nama_tempat like'%$cari%' or id_pelanggan like'%$cari%'";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->data2($newquery);


                        ?>
                        <tr>
        <td colspan="7" align="center">
        Klik Pada Nama pelanggan Untuk melihat lokasi !
            <div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
            </div>
        </td>
    </tr>
    </table>
    </div>

    <?php else : ?>
                       
                  <center>Data Pelanggan PDAM</center>

                <?php endif; ?>


</div>
</div>


<div class="panel panel-primary">
<div class="panel-heading">
Lokasi - Pelanggan PDAM Tirta Medal Sumedang - 
<button onclick="javascript:carikordinat(koorAwal);" class="btn btn-success">Kantor PDAM</button>
</div>
<div class="panel-body">
<div id="kanvaspeta" style=" margin:0px auto; width:90%; height:400px; float:center; padding:1px;"></div>
</div>
</div>
<?php include "footer.php";?>
</body>
</html>
