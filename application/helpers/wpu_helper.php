<?php

	function is_logged_in(){ //cek apakah sudah login apa blom, cek roleny apaa dan bisa aksess apa aja
		//pada helper ini tidak bisa menggukaan $this karna bukan termasuk keladam metode MVCnya ci dengan kata lain helper ini adalah orang asing untuk MVC. maka dari itu kita akan membuat instance CI baru. sebagai berikut

		$ci = get_instance(); //untuk memanggil library CI di dalam fungsi ini. variabelny boleh apa saja, tapi disini kita membuat nama variabelnya $ci

		if (!$ci->session->userdata('email')) {
			redirect('auth');
		}else{
			$role_id = $ci->session->userdata('role_id');
			$menu = $ci->uri->segment(1); //segment ini digunakan untuk mengenali controller yang akan di akses langsung di url

			//lalu query tabel menu berdasar nama menu diatas untuk mendapatkan menu_id. karna yang dbutuhkan adalah idny, untuk dcocokan dengan tabel acces

			$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array(); //row_array dgunakan untuk mengembil 1 baris dari tabel
			$menu_id = $queryMenu['id']; //pada tahap ini kita sudah dapat id nya

			//cek role tabel menu dengan tabel acces menu untuk mencocokan
			$userAccess = $ci->db->get_where('user_access_menu', [
				'role_id' => $role_id, 
				'menu_id' => $menu_id
			]);
			//cek $userAccess . num_rows() untuk menghitung jumlah baris. jika < 1, berarti baris dibawah 1 yaitu 0.
			if ($userAccess->num_rows() < 1 ) { 
				redirect('auth/blocked');
			}
		}	
	}

	function check_access($role_id, $menu_id){

		$ci = get_instance();

		//mencari semua data dari tabel ini yang role_id berapa menu_idny berapa . maksudnya apasaja yang bisa diakses admin dan member

		$result = $ci->db->get_where('user_access_menu', ['role_id' => $role_id,'menu_id' => $menu_id]); 
		//$ci->db->where('role_id', $role_id);
		//$ci->db->where('menu_id', $menu_id);
		//$result = $ci->db->get('user_access_menu');

		if ($result->num_rows() > 0 ) {
			return "checked='checked'";
		}
	}