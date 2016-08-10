<?php
class Account extends CI_Controller {

 public function __construct() {
        parent::__construct();
		 $this->load->model('account_model');
		 $this->load->model('payment_model');
		 $this->load->model('users_model');
		 if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url(). 'home', 'refresh');
        }
    }
	function index()
	{		$userID =$this->session->userdata('userID');
			$profile 			= 	$this->users_model->getProfileInfo($userID);
			$userCountry		=	$profile[0]['country'];
			$data['userCountry']				=	$userCountry;
			$data["content"] 	= "account/account_info_view";
			$this->load->view('template/template', $data);	
       
	}

   function add_credit_card()
	{
		if($this->input->post('creditCardNumber')!='')
		{
			$user_id =$this->session->userdata('userID');
			$datasave = array(
			'creditCardNumber' 		=>$this->input->post('creditCardNumber'),
			'creditCardExpiremonth' =>$this->input->post('creditCardExpiremonth'),
			'creditCardExpireyear' 	=>$this->input->post('creditCardExpireyear'),
			'accountType' 			=>'creditcard',
			'userID' 				=>$user_id
			);
			$this->account_model->save_creditcard_info($datasave);
			$data['message'] ='Your Credit Card Info Add Successfully';
		}
		$data['accountInfo']=$this->account_model->get_acount_info('creditcard');
		$data["content"] = "account/add_credit_card_view";
		$this->load->view('template/template', $data);	
       
	}
	
	
	function add_paypal()
	{
		if($this->input->post('creditCardNumber')!='')
		{
			$user_id =$this->session->userdata('userID');
			$datasave = array(
			'creditCardNumber' 		=>$this->input->post('creditCardNumber'),
			'creditCardExpiremonth' =>$this->input->post('creditCardExpiremonth'),
			'creditCardExpireyear' 	=>$this->input->post('creditCardExpireyear'),
			'fName' 				=>$this->input->post('fName'),
			'lName' 				=>$this->input->post('lName'),
			'cvv' 					=>$this->input->post('cvv'),
			'accountType' 			=>'paypal',
			'userID' 				=>$user_id
			);
			$this->account_model->savepaypal_info($datasave);
		$data['message'] ='Your Paypal Info Add Successfully';
		}
		$data['accountInfo']=$this->account_model->get_acount_info('paypal');
		$data["content"] = "account/add_paypal_view";
		$this->load->view('template/template', $data);	
       
	}
	
	
	function transaction()
	{
			$data['transaction'] 	= $this->payment_model->get_transaction();
			$data['balance'] 		= $this->payment_model->get_balance();
			$data["content"] 		= "payment/transaction_view";
			$this->load->view('template/template', $data);	
       
	}	
	function add_bank_detail()
	{
			if($this->input->post('bankAccountType')!='')
			{
				
			$user_id =$this->session->userdata('userID');
			$datasave 				= array(
			'bankAccountType' 		=>$this->input->post('bankAccountType'),
			'bankName' 				=>$this->input->post('bankName'),
			'bankCountry' 			=>$this->input->post('bankCountry'),
			'bankName' 				=>$this->input->post('bankName'),
			'abaRoutinNumber' 		=>$this->input->post('abaRoutinNumber'),
			'bankAddress' 			=>$this->input->post('bankAddress'),
			'bankAddress2' 			=>$this->input->post('bankAddress2'),
			'bankCity' 				=>$this->input->post('bankCity'),
			'bankState' 			=>$this->input->post('bankState'),
			'bankZipCode' 			=>$this->input->post('bankZipCode'),
			'destinationCurrency' 	=>$this->input->post('destinationCurrency'),
			'accountHolderName' 	=>$this->input->post('accountHolderName'),
			'IBAN' 					=>$this->input->post('IBAN'),
			'accountType' 			=>'bank',
			'userID' 				=>$user_id
			);
				
			$this->account_model->save_bank_detail($datasave);
			$data['message'] ='Your Bank Info Add Successfully';		
			}
			$data['countries'] 		= $this->account_model->getCountries();
			$data['bankInfo']		=$this->account_model->get_acount_info("bank");
			$data["content"] 		= "account/add_bank_detail_view";
			$this->load->view('template/template', $data);	
       
	}



}