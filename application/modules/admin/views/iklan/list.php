<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();

$form->init('roll');
$form->setTable('iklan');
$form->search();

$form->setNumbering(true);
$form->addInput('id','plaintext');
$form->setLabel('id','action');
$form->setPlainText('id',[
	base_url('home/detail')=>'detail',
]);

$form->addInput('jalan','plaintext');

$form->addInput('kota','plaintext');
$form->setUrl('admin/iklan/clear_list');

$form->setEdit(true);
$form->setDelete(true);
$form->form();