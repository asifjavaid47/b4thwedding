<?php
class Paypal extends CI_Controller {

 public function __construct() {
        parent::__construct();
		if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
		 $this->load->model('payment_model');
		
    }
	function index()
	{
			$user_id =$this->session->userdata('userID');
			$datasave = array(
			'creditCardNumber' 		=>$this->input->post('creditCardNumber'),
			'creditCardExpiremonth' =>$this->input->post('creditCardExpiremonth'),
			'creditCardExpireyear' 	=>$this->input->post('creditCardExpireyear'),
			'cvv' 					=>$this->input->post('cvv'),
			'amount' 				=>$this->input->post('amount'),
			'fName' 				=>$this->input->post('fName'),
			'lName' 				=>$this->input->post('lName'),
			'userID' 				=>$user_id
			);
			$data["info"] =$datasave;
			$data["content"] = "vendor/paypal/rest-api-sdk-php/sample/payments/CreatePayment";
			$this->load->view('template/template', $data);	
       
	}
	
	
	function add_paypal_payment()
	{
		session_start();
			$savedata = $_SESSION['payinfo'];
			$this->payment_model->add_paypal_payment($savedata);
			$this->session->set_userdata('payinfo', '');
			unset($_SESSION['payinfo']); 
			redirect(base_url().'payment/transaction');
			
       
	}



}