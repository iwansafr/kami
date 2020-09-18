<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('iklan_model');
		$this->load->helper('content');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
	}

	public function json_list()
	{
		$data    = $this->iklan_model->get_list();
		$status  = $this->iklan_model->status();
		$jenis  = $this->iklan_model->jenis();
		$ukuran  = $this->iklan_model->ukuran();
		$dimensi = $this->iklan_model->dimensi();
		$light   = $this->iklan_model->light();
		$output = ['data'=>$data['data'],'status'=>$status,'dimensi'=>$dimensi,'light'=>$light,'ukuran'=>$ukuran,'jenis'=>$jenis,'q'=>$this->db->last_query()];
		echo json_encode($output);
	}
	public function json_kota()
	{
		$data = $this->db->query('SELECT kota FROM iklan GROUP BY kota ORDER BY kota ASC LIMIT 6')->result_array();
		if(!empty($data))
		{
			$output = [];
			foreach ($data as $key => $value) 
			{
				$output[] = $value['kota'];
			}
			echo json_encode($output);
		}
	}

	public function json_jalan($jalan = '')
	{
		$data = $this->db->query('SELECT jalan FROM iklan WHERE jalan LIKE ? GROUP BY jalan ORDER BY jalan ASC LIMIT 6',"%{$jalan}%")->result_array();
		if(!empty($data))
		{
			$output = [];
			foreach ($data as $key => $value) 
			{
				$output[] = $value['jalan'];
			}
			echo json_encode($output);
		}
	}

	public function index()
	{
		$this->esg->add_css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		$this->esg->add_js(['https://code.jquery.com/ui/1.12.1/jquery-ui.js',base_url('templates/iklanku/js/home.js')]);


		$data    = $this->iklan_model->get_list();
		$status  = $this->iklan_model->status();
		$ukuran  = $this->iklan_model->ukuran();
		$jenis  = $this->iklan_model->jenis();
		$dimensi = $this->iklan_model->dimensi();
		$light   = $this->iklan_model->light();

		$this->load->view('index',['data'=>$data,'ukuran'=>$ukuran,'jenis'=>$jenis,'status'=>$status,'dimensi'=>$dimensi,'light'=>$light,'full'=>1]);
	}
	public function media()
	{
		$this->load->view('index');
	}
}