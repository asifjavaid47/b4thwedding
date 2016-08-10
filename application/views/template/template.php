<?php 

if ($this->session->userdata('logged_in')){
	
$this->load->view("template/header_menu_view"); 
}
else{
$this->load->view("template/header_view"); 
}

$this->load->view($content);
$this->load->view("template/footer_view");  
?>