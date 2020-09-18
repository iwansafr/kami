<?php

$form = new zea();

$form->init('param');
$form->setTable('config');
$form->setParamName('email_config');
$form->addInput('email','text');
$form->setType('email','email');
$form->addInput('password','text');
$form->setType('password','password');

/*
$config['protocol']     = 'smtp';
$config['smtp_host']    = 'ssl://smtp.googlemail.com';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '7';
$config['smtp_user']    = 'esoftgreat@gmail.com';
$config['smtp_pass']    = "";
$config['charset']      = 'utf-8';
$config['newline']      = "\r\n";
$config['mailtype']     = 'html'; // or html
$config['validation']   = TRUE; // bool whether to validate email or not
*/

$form->addInput('protocol','text');
$form->addInput('smtp_host','text');
$form->addInput('smtp_port','text');
$form->addInput('smtp_timeout','text');
$form->addInput('charset','text');
$form->addInput('newline','text');
$form->addInput('mailtype','text');
$form->addInput('validation','text');

$form->form();