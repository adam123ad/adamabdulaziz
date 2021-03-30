<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	Class Laporan extends CI_Controller
	{
		public function __construct(){

			parent:: __construct();
			$this->load->model('Menu_model');
			
		}

		public function index(){
			//session login
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
			//mengambil data dari form input pada view
			$tahun1 = $this->input->post('tahun1');
			$bulanawal = $this->input->post('bulanawal');
			$bulanakhir = $this->input->post('bulanakhir');

			$data['title'] = 'Laporan Surat Masuk';
			$data['subtitle'] = 'Dari Bulan '. $bulanawal. ', Sampai Bulan '.$bulanakhir.' Tahun '.$tahun1;
			
			//memanggil fungsi di model
			$this->load->model('Menu_model');
			$data['dataFilter'] = $this->Menu_model->filterByBulan($tahun1,$bulanawal,$bulanakhir);
			$data['getTahun'] = $this->Menu_model->getTahun();

			$this->load->view('laporan/index', $data);
		}

		public function cetakSuratKeluar(){

			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
			//mengambil data dai form input pada view
			$tahun1 = $this->input->post('tahun1');
			$bulanawal = $this->input->post('bulanawal');
			$bulanakhir = $this->input->post('bulanakhir');

			$data['title'] = 'Laporan Surat Keluar';
			$data['subtitle'] = 'Dari Bulan '. $bulanawal. ', Sampai Bulan '.$bulanakhir.' Tahun '.$tahun1;

			//memanggil fungsi di model
			$this->load->model('Menu_model');
			$data['dataFilterSK'] = $this->Menu_model->filterByBulanSK($tahun1,$bulanawal,$bulanakhir);
			$data['getTahunSK'] = $this->Menu_model->getTahunSK();

			$this->load->view('laporan/lapsuratkeluar', $data);	
		}
	}