<?php
class Sparepart
{
	private $mysqli;

	function __construct($conn)
	{
		$this->mysqli = $conn;
	}
	public function tampil ($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tbl_sparepart";
		if($id != null){
			$sql .= " WHERE id_sp = '$id'";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function tambah($kode_sp,$nama_sp,$brand_sp,$tipe_sp,$model_sp,$tgl_dtg,$jumlah_sp,$harga,$status){
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO tbl_sparepart VALUES ('','$kode_sp','$nama_sp','$brand_sp','$tipe_sp','$model_sp','$tgl_dtg','$jumlah_sp','$harga','$status')") or die ($db->error);
	}

	public function hapus ($id){
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM tbl_sparepart WHERE id_sp = '$id'") or die($db->error);
		}

		public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);
			
	}

	
		public function count(){
			return $this->tampil()->num_rows;
		}
		// function __destruct(){
		// 	$db = $this->mysqli->conn;
		// 	$db->close();
		// }

}

?>