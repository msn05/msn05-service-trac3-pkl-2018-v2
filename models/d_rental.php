<?php
class Oren
{
	private $connection;

	function __construct($conn)
	{
		$this->mysqli = $conn;
	}
	
	public function tampil ($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tbl_oren";
		if($id != null){
			$sql = " WHERE id_rental = $id";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);
			
	}

public function hapus ($id){
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM tbl_oren WHERE id_rental = '$id'") or die($db->error);
		}


	public function kode_otomatis(){

		$db = $this->mysqli->conn;

		$sql = "SELECT MAX(id_rental) as id FROM tbl_oren";
		$query = $db->query($sql) or die($db->error);
		$fetch = $query->fetch_object();
		$id = $fetch->id;

		$sql = "SELECT * FROM tbl_oren WHERE id_rental='$id'";
		$query = $db->query($sql) or die ($db->error);
		$data = $query->fetch_object();
		$kode = $data->no_order;

		$noUrut = (int) substr($kode, 3, 3)+1;
		$char = "R";
		$kodeBarang = $char . sprintf("%03s", $noUrut);
		// $noUrut++;
		return $kodeBarang;


	}

	public function tambah($id_karyawan,$id_mobil,$kustom_id,$harga,$tgl_dirental,$denda,$tgl_kembali,$total_denda,$status,$total,$alamat,$email,$tipe) {


		// print_r($this->kode_otomatis());

		$db = $this->mysqli->conn;

		$sql = "UPDATE tbl_mobil SET status=2 WHERE id_mbl = '$id_mobil'";
		$db->query($sql) or die($db->error);
		$kode = $this->kode_otomatis();

		$sql = "INSERT INTO tbl_oren SET id_mobil='$id_mobil',no_order='$kode', id_karyawan = '$id_karyawan',kustom_id='$kustom_id',tgl_dirental='$tgl_dirental',denda='$denda',tgl_kembali='$tgl_kembali',$,total_denda=$total_denda,status='$status',denda_lain='$denda_lain',total='$total',email='$email',alamat='$alamat',tipe_mobil='$tipe',harga='$harga'";


		// print_r($sql)	;
		$query=	 $db->query($sql) or die($db->error);
		return $query;

	}

	public function tampilRental(){
		$db = $this->mysqli->conn;
		
		$sql = "SELECT * FROM `tbl_oren` INNER JOIN kustom ON tbl_oren.kustom_id = kustom.kustom_id";

		$query = $db->query($sql);

		return $query;
	}

	public function dataRental(){
		$db = $this->mysqli->conn;
		$sql = "SELECT tbl_oren.no_order as order_no, users.nama as nama_karyawan, kustom.kustom_nama as nama_kustomer,tbl_oren.alamat as alamat, tbl_oren.email as email,tbl_mobil.no_polisi as no_polisi, tbl_mobil.brand as brand, tbl_oren.tipe_mobil as tipe,tbl_oren.harga as harga,tbl_mobil.harga as harga,tbl_oren.tgl_dirental as tgl_dirental,tbl_oren.tgl_kembali as tgl_kembali, tbl_oren.denda as denda,tbl_oren.tgl_dikembalikan as tgl_dikembalikan,tbl_oren.denda_lain as denda_lain, tbl_oren.total_denda as total_denda,tbl_oren.total as total,tbl_oren.status as status from tbl_oren INNER JOIN tbl_mobil on tbl_oren.id_mobil = tbl_mobil.id_mbl inner join kustom on tbl_oren.kustom_id = kustom.kustom_id inner join users ON tbl_oren.id_karyawan = users.id";

		$query = $db->query($sql);

		return $query;
	}

	public function batalkan($id){
			$db = $this->mysqli->conn;
			$sql = "UPDATE tbl_oren set status='Dibatalkan' where no_order='$id'";

			$query = $db->query($sql) or die($db->error);

			return $query;
		}

	
		public function count(){
			return $this->tampil()->num_rows;
		}
	// function 

	// function __destruct(){
	// 		$db = $this->mysqli->conn;
	// 		$db->close();
	// 	}
}

?>