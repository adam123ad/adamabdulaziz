<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	Class Auth extends CI_Controller
	{
		//kondisi default dengan foem_validation
		public function __construct(){
			parent:: __construct();
			$this->load->library('form_validation');
		}

		public function index(){ //untuk halaman login

			if ($this->session->userdata('email')) {
				redirect('admin');
			} //ketika sudah login, user tidak bisa kembali ke halaman login menggunakan url. harus dengan toombol logout

			//rule untuk halaman login
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');

			if ($this->form_validation->run() == false) { 
			//jika validasi salah/tidak lolos
				$data['title'] = 'WPU Login'; //judul pada title
				// $this->load->view('templates/auth_header');
				$this->load->view('auth/login',$data); //$data untuk memanggil title
				// $this->load->view('templates/auth_header');
			}else{ 
			// jika validasi lolos
				$this->_login(); //memanggil fungsi _login pada controller auth ini
				//fungsi login ini bersifat private
			}

		}

		private function _login(){

			//mengambil data yang diinputkan ada form login
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			//mengambil data untuk login dari database/ mencocokan data yg diinput dengan yg ada di database
			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			//usernya yg diinput ada didatabase
			if ($user) {
				//cek lagi apakan usernya aktif
				if ($user['is_active'] == 1) {
					//cek password
					if (password_verify($password, $user['password'])) { //cek apakah pass yg diinput sama dengan yg didatabse 
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						]; //untuk cek session saat login/level login
						//lalu simpan kedalam session untuk diambil controller User 
						$this->session->set_userdata($data);
						if ($user['role_id'] == 1) { //cek role apakah admin atau user biasa
							$this->session->set_flashdata('message', 'Successful!');
							redirect('admin');
						}else{
							redirect('auth');
						}
						
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password! </div>');
						redirect('auth');
					}
				}else{
					//jika usernya tidak aktif/selain 1
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated! </div>');
					redirect('auth');
				}
			}else{
				//tidak ada usernnya di databse
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your email is not registered! </div>'); //untuk memberi pesan error ketika data tidak berhasil diiinputkan ke database dengan memanggil $this->session->flashdata('message'); pada halaman view
				redirect('auth');
			}
		}

		

		public function logout(){

			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');

			//pesan berhasil logout
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out! </div>'); 
			redirect('auth');

		}

		public function blocked(){

			$this->load->view('auth/blocked');

		}
	}