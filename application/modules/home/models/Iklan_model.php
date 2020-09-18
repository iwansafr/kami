<?php

class Iklan_model extends CI_Model
{
	public function status()
	{
		return ['Unavailable','Available'];
	}
	public function dimensi()
	{
		return ['1'=>'Horizontal','2'=>'Vertical'];
	}
	public function light()
	{
		return ['1'=>'BackLight','2'=>'FrontLight'];
	}
	public function ukuran()
	{
		return ['1'=>'1x2','2'=>'4x2','3'=>'4x6','4'=>'4x8','5'=>'5x10','6'=>'6x12','7'=>'8x16','8'=>'10x20'];
	}
	public function durasi()
	{
		return ['1'=>'1 Minggu','2'=>'2 Minggu','3'=>'3 Minggu','4'=>'1 Bulan','5'=>'3 Bulan','6'=>'6 Bulan','7'=>'1 Tahun'];
	}
	public function jenis()
	{
		return ['1'=>'Billboard','2'=>'Baliho','3'=>'Neon Box','4'=>'Videotron'];
	}
	public function get_list()
	{
		$form = new zea();
		$form->init('roll');
		$form->setTable('iklan');

		$where = '';
		if(!empty($_GET['kota']))
		{
			$where = ' kota LIKE "%'.$this->db->escape_like_str($_GET['kota']).'%"';
		}
		if(!empty($_GET['jalan']))
		{
			$where .= !empty($where) ? ' AND jalan LIKE "%'.$this->db->escape_like_str($_GET['jalan']).'%"' : ' jalan LIKE "%'.$this->db->escape_like_str($_GET['jalan']).'%"';
		}
		if(!empty($_GET['jenis']))
		{
			$where .= !empty($where) ? ' AND jenis = '.$this->db->escape_like_str($_GET['jenis']) : ' jenis = '.$this->db->escape_like_str($_GET['jenis']);
		}
		if(!empty($_GET['ukuran']))
		{
			$where .= !empty($where) ? ' AND ukuran = '.$this->db->escape_like_str($_GET['ukuran']) : ' ukuran = '.$this->db->escape_like_str($_GET['ukuran']);
		}

		$form->setWhere($where);
		$form->addInput('id','plaintext');
		$form->addInput('jalan','plaintext');
		$form->addInput('kota','plaintext');
		$form->addInput('map_image','plaintext');
		$form->addInput('dimensi','plaintext');
		$form->addInput('jenis','plaintext');
		$form->addInput('ukuran','plaintext');
		$form->addInput('light','plaintext');
		$form->addInput('status','plaintext');
		// $form->setLimit(2);
		return $form->getData();
	}
	public function sign_up()
	{
		$data = $_POST;
		if(!empty($data))
		{
			$output = [];
			$this->db->select('id');
			$username = $this->db->get_where('user',['username'=>$data['username']])->row_array();
			$email = $this->db->get_where('user',['email'=>$data['email']])->row_array();
			if(!empty($username))
			{
				$output[] = ['status'=>false,'alert'=>'danger','msg'=>'username sudah ada, gunakan username lain'];
			}
			if(!empty($email))
			{
				$output[] = ['status'=>false,'alert'=>'danger','msg'=>'email sudah ada, gunakan email lain'];
			}
			if(empty($output))
			{
				if(empty($data['agency']))
				{
					$this->db->select('id');
					$user_role_id = $this->db->get_where('user_role',['title'=>'member'])->row_array();
				}else{
					$this->db->select('id');
					$user_role_id = $this->db->get_where('user_role',['title'=>'agency'])->row_array();
					unset($data['agency']);
				}
				$data['user_role_id'] = !empty($user_role_id['id']) ? $user_role_id['id'] : 0 ;
				if($this->db->insert('user',$data)){
					$last_id = $this->db->insert_id();
					if(!empty($last_id)){
						$this->db->select('user.*,user_role.title AS role');
						$this->db->join('user_role','user.user_role_id=user_role.id');

						$data = $this->db->get_where('user',['user.id'=>$last_id])->row_array();
						$this->session->set_userdata(base_url().'_logged_in', $data);
						redirect(base_url('home/welcome'));
					}else{
						redirect(base_url());
					}
				}else{
					return ['status'=>false,'alert'=>'info','msg'=>'mohon maaf untuk saat ini sistem tidak bisa melakukan pendaftaran, silahkan coba beberapa saat lagi'];
				}
			}else{
				return $output;
			}
		}
	}
	public function login()
	{
		$data = $_POST;
		if(!empty($data))
		{
			$this->db->select('user.*,user_role.title AS role');
			$this->db->join('user_role','user.user_role_id=user_role.id');

			$user = $this->db->get_where('user',['username'=>$data['username']])->row_array();
			if(empty($user)){
				$user = $this->db->get_where('user',['email'=>$data['username']])->row_array();
			}
			if(empty($user)){
				$output = ['msg'=>'akun tidak dikenali','status'=>false,'alert'=>'danger'];
			}else{
				if($user['password'] == $data['password']){
					$output = ['msg'=>'login success','status'=>true,'alert'=>'success'];
					$this->session->set_userdata(base_url().'_logged_in', $data);
					// $this->esg->set_cookie($user);
					redirect(base_url('home/iklan/media'));
				}else{
					$output = ['msg'=>'password anda salah','status'=>false,'alert'=>'danger'];
				}
			}
			return $output;
		}
	}
	public function send_sewa()
	{
		if(!empty($_POST))
		{
			$data = $_POST;
			$email_config = $this->esg->get_config('email_config');
			if(!empty($email_config))
			{
				if($this->db->insert('iklan_sewa',$data)){
					$this->load->library('email');
					$config['protocol']     = $email_config['protocol'];
					$config['smtp_host']    = $email_config['smtp_host'];
					$config['smtp_port']    = $email_config['smtp_port'];
					$config['smtp_timeout'] = $email_config['smtp_timeout'];
					$config['smtp_user']    = $email_config['email'];
					$config['smtp_pass']    = $email_config['password'];
					$config['charset']      = $email_config['charset'];
					$config['newline']      = $email_config['newline'];
					$config['mailtype']     = $email_config['mailtype'];
					$config['validation']   = $email_config['validation'];

					$jenis   = $this->jenis();
					$dimensi = $this->dimensi();
					$ukuran  = $this->ukuran();
					$light   = $this->light();
					$durasi  = $this->durasi();
					$pesan   = '
					<h5>ORDER ADSBOX - ['.date('d').'/'.date('m').'/'.date('Y').']</h5>
					<table>
						<tr>
							<td>kota</td>
							<td>:'.$data['kota'].'</td>
						</tr>
						<tr>
							<td>jalan</td>
							<td>:'.$data['jl'].'</td>
						</tr>
						<tr>
							<td>jenis</td>
							<td>:'.$jenis[$data['jenis']].'</td>
						</tr>
						<tr>
							<td>ukuran</td>
							<td>:'.$ukuran[$data['ukuran']].'</td>
						</tr>
						<tr>
							<td>light</td>
							<td>:'.$light[$data['lightning']].'</td>
						</tr>
						<tr>
							<td>sisi</td>
							<td>:'.$data['sisi'].'</td>
						</tr>
						<tr>
							<td>Mulai Tayang</td>
							<td>:'.$data['start'].'</td>
						</tr>
						<tr>
							<td>selesai tayang</td>
							<td>:'.$data['end'].'</td>
						</tr>
						<tr>
							<td>durasi</td>
							<td>:'.$durasi[$data['durasi']].'</td>
						</tr>
					</table>

					<h5>Data Diri penyewa</h5>
					<table>
						<tr>
							<td>username</td>
							<td>: '.$data['username'].'</td>
						</tr>
						<tr>
							<td>email</td>
							<td>: '.$data['email'].'</td>
						</tr>
						<tr>
							<td>phone</td>
							<td>: '.$data['hp'].'</td>
						</tr>
						<tr>
							<td>level</td>
							<td>: '.$data['role'].'</td>
						</tr>
					</table>
					';


					$this->email->initialize($config);
					$this->email->from($email_config['email'], 'esoftgreat corp');
					$this->email->to('marketing@billboardku.com');
					$this->email->subject('Sewa');
					$this->email->message($pesan);
					$this->email->send();
					redirect(base_url('home/sewa_success'));
					// pr($pesan);die();
				}
			}
		}
	}
}