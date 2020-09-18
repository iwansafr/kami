<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('iklan_model');
		$this->load->helper('content');
		$this->load->library('esg');
	}
	public function index()
	{
		$this->home_model->home();
		$this->load->view('index');
	}

	public function list()
	{
		$this->esg->add_js(base_url('templates/iklanku/js/home.js'));
		$this->load->view('index');
	}

	public function detail($id = 0)
	{
		$this->esg->add_css(base_url('templates/iklanku/css/detail.css'));
		$this->db->where('id', $id);
		$this->db->set('views', 'views+1', FALSE);
		$this->db->update('iklan');
		$data = $this->db->query('SELECT * FROM iklan WHERE id = ? ',$id)->row_array();
		$status  = $this->iklan_model->status();
		$ukuran  = $this->iklan_model->ukuran();
		$dimensi = $this->iklan_model->dimensi();
		$light   = $this->iklan_model->light();
		$this->load->view('index',['data'=>$data,'status'=>$status,'dimensi'=>$dimensi,'light'=>$light,'ukuran'=>$ukuran]);
	}
	public function sewa($id=0)
	{
		$this->iklan_model->send_sewa();
		$id = !empty($id) ? intval($id) : 0;
		$data = $this->db->get_where('iklan',['id'=>$id])->row_array();
		$status  = $this->iklan_model->status();
		$ukuran  = $this->iklan_model->ukuran();
		$jenis  = $this->iklan_model->jenis();
		$dimensi = $this->iklan_model->dimensi();
		$light   = $this->iklan_model->light();
		$durasi = $this->iklan_model->durasi();
		$this->esg->add_js(base_url('templates/iklanku/js/sewa.js'));
		$this->load->view('index',['data'=>$data,'status'=>$status,'dimensi'=>$dimensi,'light'=>$light,'ukuran'=>$ukuran,'jenis'=>$jenis,'durasi'=>$durasi]);
	}

	public function welcome()
	{
		$this->load->view('index');
	}

	public function login()
	{
		$output = $this->iklan_model->login();
		if(empty($_SESSION[base_url().'_logged_in']['username'])){
			$this->load->view('index',['output'=>$output]);
		}else{
			redirect(base_url('home/iklan/media'));
		}
	}

	public function logout()
	{
		$this->esg->delete_cookie();
		redirect(base_url('home/login'));
	}
	public function sign_up()
	{
		$this->esg->add_js(base_url('templates/iklanku/js/sign_up.js'));
		$this->load->view('index',['data'=>$this->iklan_model->sign_up()]);
	}

	public function user_exist($username = '')
	{
		$output = ['msg'=>'Username tidak boleh kosong','alert'=>'danger','status'=>false];
		if(!empty($username))
		{
			$exist = $this->db->get_where('user',['username'=>$username])->row_array();
			if(!empty($exist))
			{
				$output = ['msg'=>'Username sudah ada, gunakan username lain','alert'=>'danger','status'=>false,'data'=>$exist];
			}else{
				$output = ['msg'=>'','alert'=>'success','status'=>true];
			}
		}
		echo json_encode($output);
	}

	public function email_exist($email = '')
	{
		$output = ['msg'=>'email tidak boleh kosong','alert'=>'danger','status'=>false];
		if(!empty($email))
		{
			$exist = $this->db->get_where('user',['email'=>$email])->row_array();
			if(!empty($exist))
			{
				$output = ['msg'=>'email sudah ada, gunakan email lain','alert'=>'danger','status'=>false,'data'=>$exist];
			}else{
				$output = ['msg'=>'','alert'=>'success','status'=>true];
			}
		}
		echo json_encode($output);
	}

	public function e()
	{
		$this->load->view('error');
	}
	public function sewa_success()
	{
		$this->load->view('index');
	}
}