<?php
class payment extends CI_Controller {

 public function __construct() {
        parent::__construct();
		 $this->load->model('payment_model');
		 $this->load->model('account_model');
    }
	function index()
	{
			$data['paypalInfo']=$this->account_model->get_acount_info('paypal');
			$data['creditcardInfo']=$this->account_model->get_acount_info('creditcard');
			
			$data["content"] = "payment/payment_view";
			$this->load->view('template/template', $data);	
       
	}

   function AddPaymentwithBraintree()
	{
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
		// print_r($result);
		// exit();
		//4111111111111111
		if ($result->success) {
			//print_r("success!: " . $result->transaction->id);
			$this->payment_model->addBraintreePaymeny($result->transaction->id,$creditCardNumber,$creditCardExpiremonth,$creditCardExpireyear,$amount);
			$data["message"]	=$amount.'Successfully Transfer Transaction id = '.$result->transaction->id;
			redirect(base_url() .'account/transaction');
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
			$data['transaction'] 	= $this->payment_model->get_transaction();
			$data['balance'] 		= $this->payment_model->get_balance();
			$data["content"] 		= "payment/transaction_view";
			$this->load->view('template/template', $data);	
       
	}
	function paymentRequest($projectID)
	{
		
		$description = $this->input->post('description');
		if($description !='')
		{
			$data['paymentRequest'] = $this->payment_model->paymentRequest($description,$projectID);
		}
		$data["content"] 		= "payment/payment_request_view";
		$this->load->view('template/template', $data);	
	}
	
	
	function sendPaymentRequestToAdmin($projectID)
	{
		
		$data['freeLancerInfo'] =  $this->payment_model->getFreeLancerInfo($projectID);
		
		$amount = $this->input->post('amount');
		if($amount !='')
		{
			$data['sendPaymentRequestToAdmin'] = $this->payment_model->sendPaymentRequestToAdmin($projectID);
		}
		$data["content"] 		= "payment/sendPaymentRequestToAdmin_view";
		$this->load->view('template/template', $data);	
	}



}