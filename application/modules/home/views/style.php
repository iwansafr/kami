<?php defined('BASEPATH') OR exit('No direct script access allowed');
$style = @$this->esg->get_config($this->esg->get_esg('templates')['public_template'].'_style')['style'];
$this->esg->extra_css();
if(!empty($style))
{
	echo $style;
}