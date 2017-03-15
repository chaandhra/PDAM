<?php include 'header.php' ;?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contoh Aplikasi Peta GIS Sederhana Dengan Google Map API</title>


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

function tandai(lokasi){
    $("#koorX").val(lokasi.lat());
    $("#koorY").val(lokasi.lng());
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
    });
}

$(document).ready(function(){
    $("#simpanpeta").click(function(){
        var koordinat_x = $("#koorX").val();
        var koordinat_y = $("#koorY").val();
        var nama_tempat = $("#namaTempat").val();	
        var idpelanggan = $("#idpelanggan").val(); 
        var alamat = $("#alamat").val(); 
        var blok = $("#blok").val();       
        $.ajax({
            url: "simpan_lokasi_baru.php",
            data: "koordinat_x="+koordinat_x+"&koordinat_y="+koordinat_y+"&nama_tempat="+nama_tempat+"&idpelanggan="+idpelanggan+"&alamat="+alamat+"&blok="+blok,
            success: function(msg){
                $("#namaTempat").val(null);
                $("#koorX").val(null);
                $("#koorY").val(null);
                $("#idpelanggan").val(null); 
                $("#alamat").val(null); 
                $("#blok").val(null);   
              
            }
        });
        $.ajax({
    url: "pelanggan",
    context: document.body,
    success: function(s,x){
        $(this).html(s);
    }
});
         
    });
});


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

<div class="panel panel-primary">
<div class="panel-heading">

</div>
<div class="panel-body">

<div id="form_lokasi" class="form-horizontal" role="form">



<div class="form-group">
<label for="tgl" class="col-sm-2 control-label">Koordinat X</label>
<div class="col-sm-4">
<input type="text" id="koorX" class="form-control" name="koordinatx" required>
</div>
</div>
<div class="form-group">
<label for="tgl" class="col-sm-2 control-label">Koordinat Y</label>
<div class="col-sm-4">
<input type="text" id="koorY" class="form-control" name="koordinaty" required>
</div>
</div>
<div class="form-group">
<label for="tgl" class="col-sm-2 control-label">Nama Pelanggan</label>
<div class="col-sm-4">
<input type="text" id="namaTempat" class="form-control" name="namatempat"required>
</div>
</div>
<div class="form-group">
<label for="tgl" class="col-sm-2 control-label">ID Pelanggan</label>
<div class="col-sm-4">
<input type="text" id="idpelanggan" class="form-control" name="idpelanggan" required>
</div>
</div>
<div class="form-group">
<label for="judul" class="col-sm-2 control-label">Alamat</label>
<div class="col-sm-8">
<textarea id="alamat" name="alamat" class="form-control" required>
 </textarea>
</div>
</div>
    <?php 
        include "dbconfig.php";
        $sql = "SELECT * FROM blok";
        $query = $DB_con->prepare($sql);
        $query->execute();
        $tahun = "";
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        $id = $row['id'];
        $nama=$row['namablok'];
        $tahun.='<option value="'.$id.'">'.$nama.'</option>';}
    ?>
<div class="form-group">
<label for="tgl" class="col-sm-2 control-label">Blok</label>
<div class="col-sm-3">
<select id="blok" name="blok" class="form-control">
   <?php echo $tahun ;?>
</select>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button id="simpanpeta"  class="btn btn-success">Simpan</button>
</div>
</div>

</div>
</div>
</div>
<!-- <div id=kordinattersimpan></div> -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".delbutton").click(function(){
         var element = $(this);
         var del_id = element.attr("id");
         var info = 'nomor=' + del_id;
         if(confirm("Anda yakin akan menghapus?"))
         {
             $.ajax({
             type: "POST",
             url : "hapus_lokasi.php",
             data: info,
             success: function(){
 $.ajax({
    url: "pelanggan",
    context: document.body,
    success: function(s,x){
        $(this).html(s);
    }
});
             }
             });    
         $(this).parents(".content").animate({ opacity: "hide" }, "slow");

            }
         return false;
         });
    })
    </script>
<div class="panel panel-primary">
<div class="panel-heading">
Data Pelanggan PDAM Tirta Medal Sumedang
</div>
<div class="panel-body">

<?php
include('dbconfig.php');
include_once 'model/pelanggan.php';
$crud = new pelanggan($DB_con);
$jmln = $DB_con->query('select count(*) from kordinat_gis')->fetchColumn(); 
?>

     <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
      <th>Nama Pelanggan</th>
      <th>ID Pelanggan</th>
      <th>Alamat</th>
     <th colspan="2" align="center">Actions</th>
     </tr>
  
    <?php


        $query = "SELECT * FROM kordinat_gis";       
        $records_per_page=3;
        $newquery = $crud->paging($query,$records_per_page);
        $crud->data($newquery);
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
