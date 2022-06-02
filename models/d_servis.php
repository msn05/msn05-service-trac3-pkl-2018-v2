<?php
class Servis
{
	private $connection;

	function __construct($conn)
	{
		$this->mysqli = $conn;
	}
	
	public function tampil ($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tbl_os";
		if($id != null){
			$sql = " WHERE id_servis = $id";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}


	public function kode_otomatis(){

		$db = $this->mysqli->conn;

		$sql = "SELECT MAX(id_servis) as id FROM tbl_os";
		$query = $db->query($sql) or die($db->error);
		$fetch = $query->fetch_object();
		$kode = $fetch->id;

		$noUrut = (int) substr($kode, 3, 3)+1;
		$char = "S";
		$kodeBarang = $char . sprintf("%03s", $noUrut);
		// $noUrut++;
		return $kodeBarang;


	}


	public function dataServis(){
		$db = $this->mysqli->conn;

		$sql = "SELECT tbl_os.id_servis as no_order, tbl_os.tgl_masuk as tgl_masuk,users.nama as karyawan,kustom.kustom_nama as kustomer,tbl_os.alamat as alamat,tbl_os.email as email,tbl_os.nama_sparepart as nama_sparepart, tbl_os.tipe_sparepart as tipe_sparepart, tbl_os.model_sparepart as model_sparepart,tbl_mekanik.nama_mnk as nama_mekanik,tbl_os.jumlah_b as jumlah_barang,tbl_os.harga_sp as harga, tbl_os.perkiraan_selesai as perkiraan_selesai,tbl_os.total_bayar as total_bayar,tbl_os.status as status from tbl_os inner JOIN tbl_mekanik on tbl_os.id_m = tbl_mekanik.id_mnk inner join kustom ON tbl_os.kustom_id = kustom.kustom_id inner join users on tbl_os.id_karyawan = users.id";

		$query = $db->query($sql) or die($db->error);

		return $query;
	}
	public function tambah($id_karyawan,$tgl_masuk,$kustom_id,$id_sparepart,$id_m,$jumlah_b,$harga_sp,$perkiraan_selesai,$status,$total,$alamat,$email,$nama_sparepart,$model_sparepart,$tipe_sparepart) {

 	$code = 'S';
    $codeLength = strlen($code);
    $randomString = '';
    for ($i = 0; $i < 6; $i++) {
        $randomString .= $code[rand(0, $codeLength - 1)];
    }

    $id = $randomString;
		$db = $this->mysqli->conn;
		$kode = $this->kode_otomatis();


		$sql = "INSERT INTO tbl_os SET id_servis='$kode', no_order='$id', tgl_masuk='$tgl_masuk', id_karyawan = '$id_karyawan',kustom_id='$kustom_id',id_sparepart='$id_sparepart',id_m='$id_m',jumlah_b='$jumlah_b',harga_sp='$harga_sp',perkiraan_selesai='$perkiraan_selesai',status='$status',total_bayar='$total',alamat='$alamat',email='$email',nama_sparepart='$nama_sparepart',model_sparepart='$model_sparepart',tipe_sparepart='$tipe_sparepart'";


		// print_r($sql)	;
	$query=	 $db->query($sql) or die($db->error);
		return $query;

	}


public function tampilServis(){
	$db = $this->mysqli->conn;
	$sql = "SELECT *,tbl_os.status as status_os FROM tbl_os INNER join tbl_mekanik ON tbl_os.id_m = tbl_mekanik.id_mnk INNER join kustom on tbl_os.kustom_id = kustom.kustom_id limit 0,10";

	$query = $db->query($sql);

	return $query;
}

	
public function batalkan($id){
			$db = $this->mysqli->conn;
			$sql = "UPDATE tbl_os set status='Dibatalkan' where no_order=''";

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