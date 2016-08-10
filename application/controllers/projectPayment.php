<?php
class projectPayment extends CI_Controller {

 public function __construct() {
        parent::__construct();
		 $this->load->model('projectpayment_model');
		  $this->load->model('account_model');
    }
	function index($projectID='')
	{
		
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		
		$data['projectamount']	=	$this->projectpayment_model->getProjectAmount($data['projectID']);
		$data['clientBalance']	=	$this->projectpayment_model->get_balance();
		$data['projectInfo']	=	$this->projectpayment_model->getProjectInfo($data['projectID']);
		
		$clientAmount			=	$data['projectInfo'][0]['clientAmount'];
		$amountToAdd 			= 	$this->input->post('amount');
		$leftAmount				=	$data['projectamount'] - $clientAmount;
		
		if($amountToAdd >$data['clientBalance'] || $amountToAdd > $leftAmount)
		{
			$this->session->set_flashdata('message', 'Your Balance Is Low');
			if($amountToAdd > $leftAmount)
			{
				$this->session->set_flashdata('message', "You don't add more than ".$leftAmount."");
			}
			redirect(base_url() .'projectPayment/addProjectPayment/'.$data['projectID'].'/'.$data['receiverID'].'');
		}
			
			$transaction_id='';
			$amountForPay='';
				$transaction_id = $this->input->get('tx', TRUE); //$_GET['tx'];
				$amountForPay = $this->input->get('amt', TRUE);  //$_GET['amt'];
				/* $item_currency = $_GET['cc'];
				$status = $_GET['st']; */
			if(!empty($transaction_id))
			{
				
				//print_r('ttt'.$transaction_id);
				$userID =$this->session->userdata('userID');
			
			
				$paypal_info = array(
									'creditCardNumber' 		=> '',	
									'amount' 				=> $amountForPay,	
									'transactionID'			=> $transaction_id,
									'userID'				=> $userID,
									'type'					=> 'paypal',
									'purpose' 				=> 'Add project Fund',
									'transactionDate'		=> date('Y-m-d')
													
									);
				$this->projectpayment_model->add_paypal_payment($paypal_info,$projectID);
				
				redirect(base_url().'project/my_jobs_c');
			}
			else 
			{
					
						
				redirect(base_url().'project/my_jobs_c');
				   
			}
	}

   function AddPaymentwithBraintree()
	{
		
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		
		$data['projectamount']	=	$this->projectpayment_model->getProjectAmount($data['projectID']);
		$data['clientBalance']	=	$this->projectpayment_model->get_balance();
		$data['projectInfo']	=	$this->projectpayment_model->getProjectInfo($data['projectID']);
		
		$clientAmount			=	$data['projectInfo'][0]['clientAmount'];
		$amountToAdd 			= 	$this->input->post('amount');
		$leftAmount				=	$data['projectamount'] - $clientAmount;
	
		if($amountToAdd > $leftAmount)
		{
			$this->session->set_flashdata('message', "You don't add more than ".$leftAmount."");
			
			redirect(base_url() .'projectPayment/addProjectPayment/'.$data['projectID'].'/'.$data['receiverID'].'');
		}
		$creditCardExpiremonth 	= $this->input->post('creditCardExpiremonth');
		
		require_once 'lib/Braintree.php';
		 Braintree_Configuration::environment('sandbox');
		 Braintree_Configuration::merchantId('t4s32s7m2n3kgfdw');
		 Braintree_Configuration::publicKey('3nnnjjvkrrvt48m4');
		 Braintree_Configuration::privateKey('b132bd476788576fdf76cf484963268c');
		//Braintree_Configuration::environment('production');
		//Braintree_Configuration::merchantId('3dggw3h52qchwdkt');
		//Braintree_Configuration::publicKey('668tj9c7hwqn2vhs');
		//Braintree_Configuration::privateKey('29ff46d09ab3fb989ca244a9da6994e3');
		
		$creditCardNumber 		= $this->input->post('creditCardNumber');
		$creditCardExpiremonth 	= $this->input->post('creditCardExpiremonth');
		$creditCardExpireyear 	= $this->input->post('creditCardExpireyear');
		$amount 				= $this->input->post('amount');
		$expireDate				= $creditCardExpiremonth.'/'.$creditCardExpireyear;
		
		$result = Braintree_Transaction::sale(array(
			'amount' => $amount,
			'creditCard' => array(
			'number' => $creditCardNumber,
			'expirationDate' => $expireDate
			)
		));
		
		//4111111111111111
		if ($result->success) {
			//print_r("success!: " . $result->transaction->id);
			$this->projectpayment_model->addBraintreePaymeny($result->transaction->id,$creditCardNumber,$creditCardExpiremonth,$creditCardExpireyear,$amount,$data['projectID']);
			$data["message"]	=$amount.'Successfully Transfer Transaction id = '.$result->transaction->id;
			$this->session->set_flashdata('message', 'Fund Add Successfully');
			redirect(base_url() .'projectPayment/projectPaymentView/'.$data['projectID'].'/'.$data['receiverID'].'');
		} else if ($result->transaction) {
			print_r("Error processing transaction:");
			print_r("\n  message: " . $result->message);
			print_r("\n  code: " . $result->transaction->processorResponseCode);
			print_r("\n  text: " . $result->transaction->processorResponseText);
		} else {
			print_r("Message: " . $result->message);
			print_r("\nValidation errors: \n");
			print_r($result->errors->deepAll());
		}
       
	}
	
	function transaction()
	{
			$data['transaction'] 	= $this->projectpayment_model->get_transaction();
			$data['balance'] 		= $this->projectpayment_model->get_balance();
			$data["content"] 		= "payment/transaction_view";
			$this->load->view('template/template', $data);	
       
	}
	
	function projectPaymentView()
	{
		$data['receiverID'] 	= 	$this->uri->segment(4);
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['projectInfo']	=	$this->projectpayment_model->getProjectInfo($data['projectID']);
		$data['projectamount']	=	$this->projectpayment_model->getProjectAmount($data['projectID']);
		
		$data['milestone']		=	$this->projectpayment_model->getMilestone($data['projectID']);
		
		
		
		$data["active_class"] = 'payments';
		$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
		$data["content"] 		= "payment/projectPayment_view";
		$this->load->view('template/template', $data);	
	}
	
	
	function addProjectPayment()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		$data['projectInfo']	=	$this->projectpayment_model->getProjectInfo($data['projectID']);
		$data['projectamount']	=	$this->projectpayment_model->getProjectAmount($data['projectID']);
		$data['paypalInfo']		=	$this->account_model->get_acount_info('paypal');
		$data['creditcardInfo']	=	$this->account_model->get_acount_info('creditcard');
		$data['clientBalance']	=	$this->projectpayment_model->get_balance();
		$data['leftAmount']		=	$data['projectamount'] - $data['projectInfo'][0]['clientAmount'];
		$data["active_class"] = 'payments';
		$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
		$data["content"] = "payment/addProjectPayment_view";
		$this->load->view('template/template', $data);	
	}
	
	function AddPaymentPreviousAccount()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		$data['projectamount']	=	$this->projectpayment_model->getProjectAmount($data['projectID']);
		$data['clientBalance']	=	$this->projectpayment_model->get_balance();
		$data['projectInfo']	=	$this->projectpayment_model->getProjectInfo($data['projectID']);
		$clientAmount			=	$data['projectInfo'][0]['clientAmount'];
		$amountToAdd			=	$this->input->post('amountToAdd');
		$leftAmount				=	$data['projectamount'] - $clientAmount;
		
		if($amountToAdd >$data['clientBalance'] || $amountToAdd > $leftAmount)
		{
			$this->session->set_flashdata('message', 'Your Balance Is Low');
			if($amountToAdd > $leftAmount)
			{
				$this->session->set_flashdata('message', "You don't add more than ".$leftAmount."");
			}
			redirect(base_url() .'projectPayment/addProjectPayment/'.$data['projectID'].'/'.$data['receiverID'].'');
		}else
		{
		$this->projectpayment_model->AddPaymentPreviousAccount($data['projectID']);
		$this->session->set_flashdata('message', 'Fund Add Successfully');
		redirect(base_url() .'projectPayment/projectPaymentView/'.$data['projectID'].'/'.$data['receiverID'].'');
		}
	}
	
	function releasePayment()
	{
		
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		$data['amountTorelease'] 	= 	$this->uri->segment(5);
		$data['milestoneID'] 	= 	$this->uri->segment(6);
	
		$amountTorelease = 			$this->input->post('amountTorelease');
		$data['projectInfo']	=	$this->projectpayment_model->getProjectInfo($data['projectID']);
		$data['clientBalance']	=	$this->projectpayment_model->get_balance();
		$projectInfo			=   $data['projectInfo'];
		$clientAmount			=	$projectInfo[0]['clientAmount'];
		if($amountTorelease!='')
		{
			if($clientAmount < $amountTorelease)
			{
				
				$data['message'] ='Your Current Balance is Low';
		$data["active_class"] = 'payments';
		$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
				$data["content"] = "payment/releasePayment_view";
				$this->load->view('template/template', $data);	
			}else	
			{
					$this->projectpayment_model->releasePayment($data['projectID'],$data['receiverID'],$amountTorelease,$data['milestoneID']);
			redirect(base_url() .'projectPayment/projectPaymentView/'.$data['projectID'].'/'.$data['receiverID'].'');
			}
		}else
		{
		$data["active_class"] = 'payments';
		$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
		$data["content"] = "payment/releasePayment_view";
		$this->load->view('template/template', $data);	
		}


	}
	
	function paymentRequest()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		
		$description = $this->input->post('description');
		if($description !='')
		{
			$data['paymentRequest'] = $this->projectpayment_model->paymentRequest($description,$data['projectID']);
			$this->session->set_flashdata('message', 'Payment Request Successfully sent');
			redirect(base_url() .'projectPayment/projectPaymentView/'.$data['projectID'].'/'.$data['receiverID'].'');
		}
		
		
		
		$data["content"] 		= "payment/payment_request_view";
		$this->load->view('template/template', $data);	
	}
}