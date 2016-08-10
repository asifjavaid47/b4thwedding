<?php 

if ($this->session->userdata('is_logged_in')){
$this->load->view("admin/template/header"); 
$this->load->view("admin/template/side_bar"); 
$this->load->view($content);
$this->load->view("admin/template/footer"); 
}
else{
//$this->load->view("admin/template/header"); 
}

 
?>