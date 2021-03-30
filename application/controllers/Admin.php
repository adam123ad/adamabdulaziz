<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	Class Admin extends CI_Controller
	{

		public function __construct(){

			parent:: __construct();
			is_logged_in();//fungsi ini dipanggil dari folder helper
			
		}

		//DASHBOARD
		public function index(){

			$data['title'] = 'Dashboard';
			//mengambil data dari session pada controller Auth
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			//echo 'selamat datang' . $data['user']['name'];
			//menghitung data yang ada dalam masing2 tabel
			$data['countUser'] = $this->db->get('user')->num_rows();
			$data['countUserMenu'] = $this->db->get('user_menu')->num_rows();
			$data['countUserSubmenu'] = $this->db->get('user_sub_menu')->num_rows();
			$data['countInstansi'] = $this->db->get('tb_instansi')->num_rows();
			$data['countSuratMasuk'] = $this->db->get('tb_surat_masuk')->num_rows();
			$data['countSuratKeluar'] = $this->db->get('tb_surat_keluar')->num_rows();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/index', $data);
			$this->load->view('templates/footer');
		}

		//INSTANSI
		public function instansi(){

			$data['title'] = 'Instansi';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['instansi'] = $this->db->get('tb_instansi')->result_array();


			//form validation
			$this->form_validation->set_rules('instansi', 'Instansi', 'required', ['required' => 'Form pengisian instansi tidak boleh kosong']);

			if ($this->form_validation->run() == false) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/instansi', $data);
				$this->load->view('templates/footer');
			}else{

				$this->db->insert('tb_instansi', ['instansi' => $this->input->post('instansi')]);
				$this->session->set_flashdata('message', 'has been added');
				redirect('admin/instansi');
			}
		}

		public function deleteInstansi($id){
			$this->db->delete('tb_instansi', ['id' => $id]);
			$this->session->set_flashdata('message','has been deleted');
			redirect('admin/instansi');

		}

		public function updateInstansi(){

			$id = $this->input->post('id');
			$instansi = $this->input->post('instansi');


			$data = ['id' => $id,
					'instansi' => $instansi];


			$this->db->where('id', $id);
			$this->db->update('tb_instansi', $data);
			$this->session->set_flashdata('message', 'data has been updated!');
				redirect('admin/instansi');

		}



		//SURAT MASUK
		public function suratMasuk(){

			$data['title'] = 'Surat Masuk';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		
			$this->load->model('Menu_model'); 
			$data['suratMasuk'] = $this->Menu_model->getInstansi();
			$data['getTahun'] = $this->Menu_model->getTahun();

			$data['instansi'] = $this->db->get('tb_instansi')->result_array();

			//form_validation
			$this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim');
			$this->form_validation->set_rules('tgl_surat','tgl_surat', 'required');
			$this->form_validation->set_rules('tgl_diterima','tgl_diterima', 'required');
			$this->form_validation->set_rules('perihal','perihal', 'required');
			$this->form_validation->set_rules('sifat','sifat', 'required');
			$this->form_validation->set_rules('instansi_id','instansi_id', 'required');


			if ($this->form_validation->run() == false) {

				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/suratmasuk', $data);
				$this->load->view('templates/footer');
			}else{

				$id = $this->input->post('id');
				$no_surat = $this->input->post('no_surat');
				$tgl_surat = $this->input->post('tgl_surat');
				$tgl_diterima = $this->input->post('tgl_diterima');
				$perihal = $this->input->post('perihal');
				$sifat = $this->input->post('sifat');
				$instansi_id = $this->input->post('instansi_id');
				$lampiran = $this->input->post('lampiran');
				
				$upload_image = $_FILES['image']['name']; //image = input yang namanya image
				if ($upload_image) {
					
					$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf'; //type gambar
					$config['max_size']     = '2048'; //max files 2mb
					$config['upload_path'] = './assets/images/suratmasuk/';


					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image')) { //image = input yang namanya image
						$new_image = $this->upload->data('file_name'); //variabel new_image utk menyimpan nama gambar saja
						$this->db->set('image', $new_image);
					}else{
						echo $this->upload->dispay_errors();
					}
				}

				$data = ['no_surat' => $no_surat,
						'tgl_surat' => $tgl_surat,
						'tgl_diterima' => $tgl_diterima,
						'perihal' => $perihal,
						'sifat' => $sifat,
						'instansi_id' => $instansi_id,
						'lampiran' => $lampiran];

				$this->db->insert('tb_surat_masuk', $data);
				$this->session->set_flashdata('message', 'has been added!');
				redirect('admin/suratmasuk');
			}
		}


		public function updateSuratMasuk(){

				$data['title'] = 'Edit Surat Masuk';
				$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			
				$this->load->model('Menu_model'); 
				$data['suratMasuk'] = $this->Menu_model->getInstansi();

				$data['instansi'] = $this->db->get('tb_instansi')->result_array();


				$id = $this->input->post('id');
				$no_surat = $this->input->post('no_surat');
				$tgl_surat = $this->input->post('tgl_surat');
				$tgl_diterima = $this->input->post('tgl_diterima');
				$perihal = $this->input->post('perihal');
				$sifat = $this->input->post('sifat');
				$instansi_id = $this->input->post('instansi_id');
				$lampiran = $this->input->post('lampiran');
				
				$upload_image = $_FILES['image']['name'];

				if ($upload_image) {
					$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf'; //type gambar
					$config['max_size']     = '2048'; //max files 2mb
					$config['upload_path'] = './assets/images/suratmasuk/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image')) {

						//kalau gambarnya diganti sebelumny hapus, kecuali gambar default
						$this->db->where('id',$id);
					    $query = $this->db->get('tb_surat_masuk');
					    $old_image = $query->row();


						if ($old_image) {
							unlink(FCPATH . 'assets/images/suratmasuk/' . $old_image->image);
						}

						//update gambar ke database
						$new_image = $this->upload->data('file_name'); //variabel new_image utk menyimpan nama gambar saja
						$this->db->set('image', $new_image); //set baru ke databse untuk diupload
						
					}else{
						echo $this->upload->dispay_errors();
					}
				}


				$data = ['id' => $id,
						'no_surat' => $no_surat,
						'tgl_surat' => $tgl_surat,
						'tgl_diterima' => $tgl_diterima,
						'perihal' => $perihal,
						'sifat' => $sifat,
						'instansi_id' => $instansi_id,
						'lampiran' => $lampiran];

				
				$this->db->where('id', $id);
				$this->db->update('tb_surat_masuk', $data);
				$this->session->set_flashdata('message', 'data has been updated!');
				redirect('admin/suratmasuk');
			}


		public function deleteSuratMasuk($id){

				//fungsi delete jika ada file gambar yang akan didelete
				$this->db->where('id',$id);
			    $query = $this->db->get('tb_surat_masuk');
			    $row = $query->row();

			    unlink("./assets/images/suratmasuk/$row->image");

			    $this->db->delete('tb_surat_masuk', ['id' => $id]);
				$this->session->set_flashdata('message', 'has been deleted!');
				redirect('admin/suratMasuk');
		
			}


		public function detailSuratMasuk($id){

			$data['title'] = 'Detail Surat Masuk';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		 	//mengambil id
			$data['getid'] = $this->db->get_where('tb_surat_masuk', ['id' => $id])->row_array();
			//load model
			$this->load->model('Menu_model'); 
			//menampilkan detail data
			$data['detailSM'] = $this->Menu_model->getDetail($id);
			//mengambil data surat masuk dan instansi
			$data['suratMasuk'] = $this->Menu_model->getInstansi();
			$data['instansi'] = $this->db->get('tb_instansi')->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/detailsuratmasuk', $data);
			$this->load->view('templates/footer');

		}

		public function download($id){
			$data = $this->db->get_where('tb_surat_masuk',['id'=>$id])->row();
			force_download('assets/images/suratmasuk/'.$data->image,NULL);

		}




		//SURAT KELUAR
		public function suratKeluar(){
			$data['title'] = 'Surat Keluar';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			
			//ambil data model untuk relasi antara tabel instansi dan surat keluar
			$this->load->model('Menu_model');
			$data['suratKeluar'] = $this->Menu_model->getInstansiSuratKeluar();
			$data['instansi'] = $this->db->get('tb_instansi')->result_array();
			$data['getTahunSK'] = $this->Menu_model->getTahunSK();


			$this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim');
			$this->form_validation->set_rules('tgl_surat','tgl_surat', 'required');
			$this->form_validation->set_rules('perihal','perihal', 'required');
			$this->form_validation->set_rules('sifat','sifat', 'required');
			$this->form_validation->set_rules('instansi_id','instansi_id', 'required');

			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/suratkeluar', $data);
				$this->load->view('templates/footer');
			}else{

				$id = $this->input->post('id');
				$no_surat = $this->input->post('no_surat');
				$tgl_surat = $this->input->post('tgl_surat');
				$perihal = $this->input->post('perihal');
				$sifat = $this->input->post('sifat');
				$instansi_id = $this->input->post('instansi_id');
				$lampiran = $this->input->post('lampiran');
				
				$upload_image = $_FILES['image']['name']; //image = input yang namanya image
				if ($upload_image) {
					
					$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf'; //type gambar
					$config['max_size']     = '2048'; //max files 2mb
					$config['upload_path'] = './assets/images/suratkeluar/';


					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image')) { //image = input yang namanya image
						$new_image = $this->upload->data('file_name'); //variabel new_image utk menyimpan nama gambar saja
						$this->db->set('image', $new_image);
					}else{
						echo $this->upload->dispay_errors();
					}
				}

				$data = ['no_surat' => $no_surat,
						'tgl_surat' => $tgl_surat,
						'perihal' => $perihal,
						'sifat' => $sifat,
						'instansi_id' => $instansi_id,
						'lampiran' => $lampiran];

				$this->db->insert('tb_surat_keluar', $data);
				$this->session->set_flashdata('message', 'has been added!');
				redirect('admin/suratkeluar');
				
			}	

		}

		public function updateSuratKeluar(){
			$data['title'] = 'Edit Surat Keluar';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			
			//ambil data model untuk relasi antara tabel instansi dan surat keluar
			$this->load->model('Menu_model');
			$data['suratKeluar'] = $this->Menu_model->getInstansiSuratKeluar();
			$data['instansi'] = $this->db->get('tb_instansi')->result_array();

			//form validation
			$this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim');
			$this->form_validation->set_rules('tgl_surat','tgl_surat', 'required');
			$this->form_validation->set_rules('perihal','perihal', 'required');
			$this->form_validation->set_rules('sifat','sifat', 'required');
			$this->form_validation->set_rules('instansi_id','instansi_id', 'required');

			$id = $this->input->post('id');
			$no_surat = $this->input->post('no_surat');
			$tgl_surat = $this->input->post('tgl_surat');
			$perihal = $this->input->post('perihal');
			$sifat = $this->input->post('sifat');
			$instansi_id = $this->input->post('instansi_id');
			$lampiran = $this->input->post('lampiran');
				
				$upload_image = $_FILES['image']['name'];

				if ($upload_image) {
					$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf'; //type gambar
					$config['max_size']     = '2048'; //max files 2mb
					$config['upload_path'] = './assets/images/suratkeluar/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image')) {

						//kalau gambarnya diganti sebelumny hapus, kecuali gambar default
						$this->db->where('id',$id);
					    $query = $this->db->get('tb_surat_keluar');
					    $old_image = $query->row();


						if ($old_image) {
							unlink(FCPATH . 'assets/images/suratkeluar/' . $old_image->image);
						}

						//update gambar ke database
						$new_image = $this->upload->data('file_name'); //variabel new_image utk menyimpan nama gambar saja
						$this->db->set('image', $new_image); //set baru ke databse untuk diupload
						
					}else{
						echo $this->upload->dispay_errors();
					}
				}


				$data = ['id' => $id,
						'no_surat' => $no_surat,
						'tgl_surat' => $tgl_surat,
						'perihal' => $perihal,
						'sifat' => $sifat,
						'instansi_id' => $instansi_id,
						'lampiran' => $lampiran];

				
				$this->db->where('id', $id);
				$this->db->update('tb_surat_keluar', $data);
				$this->session->set_flashdata('message', 'has been updated!');
				redirect('admin/suratkeluar');

		}

		public function deleteSuratKeluar($id){

				//fungsi delete jika ada file gambar yang akan didelete
				$this->db->where('id',$id);
			    $query = $this->db->get('tb_surat_keluar');
			    $row = $query->row();

			    unlink("./assets/images/suratkeluar/$row->image");

			    $this->db->delete('tb_surat_keluar', ['id' => $id]);
				$this->session->set_flashdata('message', 'has been deleted!');
				redirect('admin/suratKeluar');
		
		}

		public function detailSuratKeluar($id){

			$data['title'] = 'Detail Surat Keluar';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			//mengambil id
			$data['getidSK'] = $this->db->get_where('tb_surat_keluar', ['id' => $id])->row_array();
			//load model
			$this->load->model('Menu_model'); 
			//menampilkan detail data
			$data['detailSK'] = $this->Menu_model->getDetailSuratKeluar($id);
			//mengambil data surat masuk dan instansi
			$data['suratKeluar'] = $this->Menu_model->getInstansiSuratKeluar();
			$data['instansi'] = $this->db->get('tb_instansi')->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/detailsuratkeluar', $data);
			$this->load->view('templates/footer');
		}

		public function downloadImageSK($id){
			$data = $this->db->get_where('tb_surat_keluar',['id'=>$id])->row();
			force_download('assets/images/suratkeluar/'.$data->image,NULL);
		}



		//MANAGEMENT USERS
		public function manageUsers(){
			$data['title'] = 'Management Users';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->model('Menu_model');
			$data['users'] = $this->Menu_model->getUsers();
			//form_validation tambah
			$this->form_validation->set_rules('name','Name','required|trim');
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'Email sudah terdaftar! ' //merubah pesan error default dengan array
			]); //user.email adalah nama tabel dan field yg bernama email
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
				'matches' => 'Password tidak sama!', //jika password1 dan password2 bebeda
				'min_length' => 'Password terlalu pendek!' //jika password kurang dari 3 karakter karna min_length sudah dset diatas adalah 3
			]); 
			$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]'); //untuk mencek repeat password 1 dan 2


			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/managementusers', $data);
				$this->load->view('templates/footer');
			}else{

				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'image' => 'default.jpg', //gambar default untuk user baru
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), //untuk enkripsi passord
					'role_id' => 1, //sama dengan lever (2) yaitu member
					'is_active' => 1, //1 untuk aktif, setiap yang registrasi baru akan aktif
					'date_created' => time() //waktu registrasi
				];

				$this->db->insert('user', $data);
				$this->session->set_flashdata('message', 'has been added!');
				redirect('admin/manageUsers');
			}
			
		}

		public function updateUsers(){
			$data['title'] = 'Edit Profile';
			//mengambil data dari session pada controller Auth berdasar email yag digunakan untuk login
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('name', 'Full Name', 'required|trim', ['required' => 'Nama tidak boleh kosong ! ']);

			$name = $this->input->post('name');
				$email = $this->input->post('email');

				//cek jika ada gambar y ang akan diupload
				$upload_image = $_FILES['image']['name'];

				if ($upload_image) {
					$config['allowed_types'] = 'gif|jpg|png'; //type gambar
					$config['max_size']     = '2048'; //max files 2mb
					$config['upload_path'] = './assets/images/profile/'; //tempat penyimpanan gambar (. adalah root)

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image')) {

						//kalau gambarnya diganti sebelumny hapus, kecuali gambar default

						$old_image = $data['user']['image'];

						if ($old_image != 'default.jpg') {
							unlink(FCPATH . 'assets/images/profile/' . $old_image);
						}

						//update gambar ke database
						$new_image = $this->upload->data('file_name'); //variabel new_image utk menyimpan nama gambar saja
						$this->db->set('image', $new_image); //set baru ke databse untuk diupload
						
					}else{
						echo $this->upload->dispay_errors();
					}
				}

				$this->db->set('name', $name);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->session->set_flashdata('message', 'has been updated!');
				redirect('admin/manageUsers');
		}

		public function deleteUsers($id){

				//fungsi delete jika ada file gambar yang akan didelete
				$this->db->where('id',$id);
			    $query = $this->db->get('user');
			    $row = $query->row();

			    unlink("./assets/images/profile/$row->image");

			    $this->db->delete('user', ['id' => $id]);
				$this->session->set_flashdata('message', 'has been deleted!');
				redirect('admin/manageUsers');
		
			}



		//CHANGE PASSWORD
		public function changePassword(){

			$data['title'] = 'Change Password';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('current_password','Current Password', 'required|trim');
			$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
			$this->form_validation->set_rules('new_password2', 'Confirm new password', 'required|trim|min_length[6]|matches[new_password1]');


			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/changepassword', $data);
				$this->load->view('templates/footer');
			}else{

				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password1');

				if (!password_verify($current_password, $data['user']['password'])) {
					$this->session->set_flashdata('message', 'Wrong Current Password');
					redirect('admin/changepassword');
				}else{
					if ($current_password == $new_password) {
						$this->session->set_flashdata('message', 'New password cannot be the same as current password!');
						redirect('admin/changepassword');
					}else{
						//Password okk
						$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
						//query builder
						$this->db->set('password', $password_hash);
						$this->db->where('email',$this->session->userdata('email'));
						$this->db->update('user');
						//message
						$this->session->set_flashdata('message1', 'Password changed!');
						redirect('admin/changepassword');
					}
				}
			}
			
		}

		//CALENDER
		public function calendar(){
			$data['title'] = 'Calender';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/calender', $data);
				$this->load->view('templates/footer');

		}

		public function load(){

			
			$this->load->model('fullcalendar');
				$event_data = $this->fullcalendar->fetch_all_event();

				foreach ($event_data->result_array() as $row) {
					$data[] = array(
						'id' => $row['id'],
						'title' => $row['title'],
						'start' =>$row['start_event'],
						'end' => $row['end_event']
					);
				}

				echo json_encode($data);
		}


}