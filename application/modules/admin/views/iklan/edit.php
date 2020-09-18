<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
$form->setId($id);
$form->init('edit');

$form->setTable('iklan');

$form->addInput('jalan','text');
$form->addInput('kota','text');
$form->addInput('alamat','textarea');
$form->addInput('map_image','file');

$form->addInput('latitude','text');
$form->addInput('longitude','text');

$form->setLabel('map_image','Gambar Map');
$form->setAccept('map_image','.jpeg,.jpg,.png,.gif');

$form->addInput('gallery','files');
$this->load->model('home/iklan_model');
$form->addInput('ukuran','dropdown');
$form->setOptions('ukuran',$this->iklan_model->ukuran());

$form->addInput('jenis','dropdown');
$form->setOptions('jenis',$this->iklan_model->jenis());

$form->addInput('dimensi','dropdown');
$form->setOptions('dimensi',['1'=>'Horizontal','2'=>'Vertical']);

$form->addInput('light','dropdown');
$form->setOptions('light',['1'=>'BackLight','2'=>'FrontLight']);

$form->addInput('status','dropdown');
$form->setOptions('status',['Unavailable','Available']);

$form->form();