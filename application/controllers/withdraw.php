<?php
class Withdraw extends CI_Controller {

 public function __construct() {
        parent::__construct();
		 $this->load->model('withdraw_model');
		 $this->load->model('setting_model');
    }
	function index()
	{
			$data['setting'] 		= $this->setting_model->getSetting('commsion');	
			$data['accountInfo']	=	$this->withdraw_model->get_acount_all_info('filter');
			$data['balance']		=	$this->withdraw_model->get_balance();
			$data["content"] 	= 	"withdraw/withdraw_view";
			$this->load->view('template/template', $data);	
       
	}

	function withDraw()
	{
			if($this->input->post('withdrawAmount') !='')
			{
				$commsion 			= $this->setting_model->getSetting('commsion');	
				$data['balance']=	$this->withdraw_model->get_balance();
				$totalBalance 	= $data['balance']['amount'];
				$withDrawAmount = $this->input->post('withdrawAmount');
				$type 			= $this->input->post('withdrawMethod');
				$commsion		=  $commsion['settingValue'];
				
				$newBalance		= $totalBalance-((($withDrawAmount*$commsion)/100)+$withDrawAmount);
				$newBalance		= round($newBalance,2);
				$this->withdraw_model->add_withdraw($newBalance,$withDrawAmount,$type);
				redirect(base_url().'account/transaction');
			}
			$data['transaction'] 	= $this->payment_model->get_transaction();
			$data["content"] 		= "payment/transaction_view";
			$this->load->view('template/template', $data);	
       
	}



}