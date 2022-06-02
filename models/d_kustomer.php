<?php
class Kustomer {

	private $connection;

	function __construct($conn) {
		$this->mysqli = $conn;
	}

	public function tampil($id =null) {
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM kustom";
		if($id != null){
			$sql .= " WHERE kustom_id = $id";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function cari($id =null) {
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM kustom";
		if($id != null){
			$sql .= " WHERE kustom_id = $id";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function tambah($kode_kustom,$kustom_nama,$no_ktp,$kustom_alamat,$kustom_jk,$kustom_hp,$kustom_email){
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO kustom VALUES ('','$kode_kustom','$kustom_nama','$no_ktp','$kustom_alamat','$kustom_jk','$kustom_hp','$kustom_email')") or die ($db->error);
	}

	public function hapus ($id){
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM kustom WHERE kustom_id = '$id'") or die($db->error);
		}

		public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);
			
	}
		/*function __destruct(){
			$db = $this->mysqli->conn;
			$db->close();
		}*/
}
?>