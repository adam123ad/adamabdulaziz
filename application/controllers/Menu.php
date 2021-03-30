<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	Class Menu extends CI_Controller
	{
		//untuk mengembalikan user ketika ingin masuk ke controller User tanpa login
		public function __construct(){

			parent:: __construct();
			is_logged_in(); //fungsi ini dipanggil dari folder helper
		
		}
 

		public function index(){

			$data['title'] = 'Menu Management';
			//mengambil data dari session pada controller Auth
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			//echo 'selamat datang' . $data['user']['name'];
			$data['menu'] = $this->db->get('user_menu')->result_array();

			//rule untuk menu
			$this->form_validation->set_rules('menu', 'Menu', 'required', ['required' => 'Form Pengisian Menu Tidak Boleh Kosong']);

			if ($this->form_validation->run() == false) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('menu/index', $data);
				$this->load->view('templates/footer');

			}else{
				//aksi input
				$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan! </div>');
				redirect('menu');
			}

		}

		public function update(){

			$id = $this->input->post('id');
			$menu = $this->input->post('menu');

			$data = ['id' => $id,
						'menu' => $menu
		];

			$this->db->where('id', $id);
			$this->db->update('user_menu', $data);	

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate! </div>');
				redirect('menu');

		}


		public function delete($id){
			$this->db->delete('user_menu', ['id' => $id]);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil dihapus! </div>');
			redirect('menu');

		}
		





		//untuk SUBMENU
		public function submenu(){
			$data['title'] = 'Submenu Manage';
			//mengambil data dari session pada controller Auth
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			
			$this->load->model('Menu_model'); 
			$data['subMenu'] = $this->Menu_model->getSubMenu(); //diambil dari model
			
			$data['menu'] = $this->db->get('user_menu')->result_array(); //mengambil tabel user_menu untuk dilooping di view

			//rules
			$this->form_validation->set_rules('title','Title', 'required',['required' => 'Form Title Tidak Boleh Kosong !' ]);
			$this->form_validation->set_rules('menu_id','Menu', 'required',['required' => 'Form Menu Tidak Boleh Kosong !' ]);
			$this->form_validation->set_rules('url','Url', 'required',['required' => 'Form Url Tidak Boleh Kosong !' ]);
			$this->form_validation->set_rules('icon','Icon', 'required',['required' => 'Form Icon Tidak Boleh Kosong !' ]);
		

			if ($this->form_validation->run() == false) {

				$this->load->view('templates/header', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('menu/submenu', $data);
				$this->load->view('templates/footer');		
				
			}else{

				$data = [
					'title' => $this->input->post('title'),
					'menu_id' => $this->input->post('menu_id'),
					'url' => $this->input->post('url'),
					'icon' => $this->input->post('icon'),
					'is_active' => $this->input->post('is_active')
				];

				$this->db->insert('user_sub_menu', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Submenu berhasil ditambahkan! </div>');
				redirect('menu/submenu');

			}
		}


		public function updateSubmenu(){
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$menu_id = $this->input->post('menu_id');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$is_active = $this->input->post('is_active');


			$data = [
				'id' => $id,
				'title' => $title,
				'menu_id' => $menu_id,
				'url' => $url,
				'icon' => $icon,
				'is_active' => $is_active
			];

			$this->db->where('id', $id);
			$this->db->update('user_sub_menu', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Submenu berhasil diupdate! </div>');
				redirect('menu/submenu');
		}

		public function deleteSubmenu($id){
			$this->db->delete('user_sub_menu', ['id' => $id]);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil dihapus! </div>');
			redirect('menu/submenu');
		}

	}