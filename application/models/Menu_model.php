
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Menu_model extends CI_Model
	{

		//USER SUB MENU
		public function getSubMenu()
		{
			$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
						FROM `user_sub_menu` JOIN `user_menu`
						ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
					";

			return $this->db->query($query)->result_array();
		}

		//SURAT MASUK
		public function getInstansi()
		{
			$query = "SELECT `tb_surat_masuk`.*, `tb_instansi`.`instansi` 
						FROM `tb_surat_masuk` JOIN `tb_instansi`
						ON `tb_surat_masuk`.`instansi_id` = `tb_instansi`.`id`
					";

			return $this->db->query($query)->result_array();
		}

		

		public function getDetail($id)
		{

			$query = "SELECT * FROM `tb_surat_masuk` 
			JOIN `tb_instansi` ON `tb_instansi`.`id` = `tb_surat_masuk`.`instansi_id` 
			WHERE `tb_surat_masuk`.`id` = '$id'";

			return $this->db->query($query)->row_array();

			//join table query builder
			//$this->db->select('*');    
	      	//$this->db->from('tb_surat_masuk');
	        //$this->db->join('tb_instansi', 'tb_instansi.id = tb_surat_masuk.instansi_id');
	        //$this->db->where('tb_surat_masuk.id',$id);
	        //$query = $this->db->get();
	        //return $query->row();
		}

		//UNTUK LAPORAN
		public function getTahun(){

			$query = "SELECT YEAR(tgl_surat) AS tahun 
						FROM tb_surat_masuk GROUP BY YEAR(tgl_surat)
						ORDER BY YEAR(tgl_surat) ASC";

			return $this->db->query($query)->result_array();
		}
		
		public function filterByBulan($tahun1,$bulanawal,$bulanakhir){
			//jika tabel berelasi
			$query = "SELECT `tb_surat_masuk`.*, `tb_instansi`.`instansi`
						FROM `tb_surat_masuk` 
						JOIN `tb_instansi`
						ON `tb_surat_masuk`.`instansi_id` = `tb_instansi`.`id`
						 WHERE YEAR(tgl_surat)
						= $tahun1 and MONTH(tgl_surat)
						BETWEEN $bulanawal and $bulanakhir
						ORDER BY `tgl_surat` ASC ";

			//jika tabel tidak berelasi
			//$query = "SELECT * FROM tb_surat_masuk
						// WHERE YEAR(tgl_surat)
						//= $tahun1 and MONTH(tgl_surat)
						//BETWEEN $bulanawal and $bulanakhir
						//ORDER BY tgl_surat ASC 
						 
						//";

			return $this->db->query($query)->result_array();
		}



		//SURAT KELUAR
		public function getInstansiSuratKeluar(){

			$query = "SELECT `tb_surat_keluar`.*, `tb_instansi`.`instansi` 
						FROM `tb_surat_keluar` JOIN `tb_instansi`
						ON `tb_surat_keluar`.`instansi_id` = `tb_instansi`.`id`
					";

			return $this->db->query($query)->result_array();
		}

		public function getDetailSuratKeluar($id){

			$query = "SELECT * FROM `tb_surat_keluar` 
					JOIN `tb_instansi` ON `tb_instansi`.`id` = `tb_surat_keluar`.`instansi_id` 
					WHERE `tb_surat_keluar`.`id` = '$id'";

			return $this->db->query($query)->row_array();
		}

		//UNTUK LAPORAN
		public function getTahunSK(){

			$query = "SELECT YEAR(tgl_surat) AS tahun
						FROM tb_surat_keluar GROUP BY YEAR(tgl_surat)
						ORDER BY YEAR(tgl_surat) ASC";

			return $this->db->query($query)->result_array();
		}
		
		public function filterByBulanSK($tahun1,$bulanawal,$bulanakhir){
			//jika tabel berelasi
			$query = "SELECT `tb_surat_keluar`.*, `tb_instansi`.`instansi`
						FROM `tb_surat_keluar` 
						JOIN `tb_instansi`
						ON `tb_surat_keluar`.`instansi_id` = `tb_instansi`.`id`
						 WHERE YEAR(tgl_surat)
						= $tahun1 and MONTH(tgl_surat)
						BETWEEN $bulanawal and $bulanakhir
						ORDER BY `tgl_surat` ASC ";

			return $this->db->query($query)->result_array();
		}


		//MANAGEMENT USERS
		public function getUsers(){
			$query = "SELECT `user`.*, `user_role`.`role` 
						FROM `user` JOIN `user_role`
						ON `user`.`role_id` = `user_role`.`id`
					";

			return $this->db->query($query)->result_array();
		}
}