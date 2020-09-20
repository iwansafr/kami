<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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

  public function menu()
  {
    $this->load->view('index');
  }

  public function kategori()
  {
    $this->esg->add_js(base_url('assets/produk/kategori.js'));
    $this->load->view('index');
  }
  public function kategori_search($title = '')
  {
    if (!empty($title)) {
      $this->db->like('title', $title);
      $this->db->limit(12, 0);
      $data = $this->db->get('produk_kat')->result_array();
    } else {
      $data = $this->db->get('produk_kat')->result_array();
    }
    if (!empty($data)) {
      echo json_encode(['data' => $data, 'query' => $this->db->last_query()]);
    }
  }
  public function kategori_update($id = 0)
  {
    $output = ['status' => 0, 'data' => []];
    if (!empty($id) && $id > 0) {
      $data = file_get_contents("php://input");
      if (!empty($data)) {
        $data = json_decode($data, 1);
        if (!empty($data['title'])) {
          if ($this->db->update('produk_kat', ['title' => $data['title']], ['id' => $id])) {
            $output = ['status' => 1, 'data' => ['id' => $id, 'title' => $data['title']]];
          }
        }
      }
    }
    echo json_encode($output);
  }
  public function kategori_delete($id = 0)
  {
    $output = ['status' => 0, 'msg' => 'Data Gagal dihapus'];
    if (!empty($id) && $id > 0) {
      if ($this->db->delete('produk_kat', ['id' => $id])) {
        $output = ['status' => 1, 'msg' => 'Data Berhasil dihapus'];
      }
    }
    echo json_encode($output);
  }
  public function kategori_add()
  {
    $data = file_get_contents("php://input");
    if (!empty($data)) {
      $data = json_decode($data, 1);
      if (!empty($data['title'])) {
        if ($this->db->insert('produk_kat', ['title' => $data['title']])) {
          $output = ['status' => true, 'msg' => 'data berhasil disimpan', 'data' => $this->db->get_where('produk_kat', ['id' => $this->db->insert_id()])->result_array()];
        } else {
          $output = ['status' => false, 'msg' => 'data gagal disimpan', 'data' => []];
        }
        echo json_encode($output);
      }
    }
  }

  public function add()
  {
    $data = file_get_contents("php://input");
    if (!empty($data)) {
      $data = json_decode($data, 1);
      if (!empty($data['title'])) {
        if ($this->db->insert('produk', $data)) {
          $output = ['status' => true, 'msg' => 'data berhasil disimpan', 'data' => $this->db->get_where('produk', ['id' => $this->db->insert_id()])->result_array()];
        } else {
          $output = ['status' => false, 'msg' => 'data gagal disimpan', 'data' => []];
        }
        echo json_encode($output);
      }
    }
  }

  public function kategori_list()
  {
    $this->db->select('*');
    $this->db->limit(12, 0);
    $data = $this->db->get('produk_kat')->result_array();
    echo json_encode(['data' => $data]);
  }
  public function list()
  {
    $this->db->select('*');
    $this->db->limit(12, 0);
    $data = $this->db->get('produk')->result_array();
    echo json_encode(['data' => $data]);
  }

  public function index()
  {
    $this->esg->add_js(base_url('assets/produk/produk.js'));
    $this->load->view('index');
  }
}
