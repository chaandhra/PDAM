<?php

class pelanggan
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($koordinat_x,$koordinat_y,$nama_tempat,$idpelanggan,$alamat,$blok)
	{
		try
		{
			$id='';
			$stmt = $this->db->prepare("INSERT INTO kordinat_gis VALUES(:id,:koorx, :koory, :nama, :id, :alamat, :blok)");
			$stmt->bindparam(":id",$id);
			$stmt->bindparam(":koorx",$koordinat_x);
			$stmt->bindparam(":koory",$koordinat_y);
			$stmt->bindparam(":koory",$koordinat_y);
			$stmt->bindparam(":nama",$nama_tempat);
			$stmt->bindparam(":id",$idpelanggan);
			$stmt->bindparam(":alamat",$alamat);
			$stmt->bindparam(":blok",$blok);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM kordinat_gis WHERE nomor=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id,$nama)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE kecamatan SET nama=:nama
													WHERE id_kecamatan=:id ");
			$stmt->bindparam(":nama",$nama);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
		
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM kordinat_gis WHERE nomor=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	





	/* paging */
	
	public function data($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<tr>

             <td><?php echo $row['nomor']; ?></td>
	
    <td><a href="javascript:carikordinat(new google.maps.LatLng(<?php echo $row['x']; ?>,<?php echo $row['y']; ?>))"><?php echo $row['nama_tempat']; ?></a> </td>
    <td><?php echo $row['id_pelanggan']; ?>
    </td>
    <td><?php echo $row['alamat']; ?>
    </td>
	<td>
    <a href="#" class="delbutton" id="<?php echo $row['nomor']; ?>">Hapus</a>
	</td>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

		public function data2($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<tr>

             
    <td><a href="javascript:carikordinat(new google.maps.LatLng(<?php echo $row['x']; ?>,<?php echo $row['y']; ?>))"><?php echo $row['nama_tempat']; ?></a> </td>
    <td><?php echo $row['id_pelanggan']; ?>
    </td>
    <td><?php echo $row['alamat']; ?>
    </td>
	
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
