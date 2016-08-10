<?php
class AdminPayment extends CI_Controller {

   /**
    * author	:raza malik <eminentdeveloper69@gmail.com>
    * date		:2 janury 2015
    * @constant string
    */
    const VIEW_FOLDER = 'admin/categories';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/adminPaymentModel');

        if(!$this->session->userdata('is_logged_in')){
            redirect(base_url().'admin');
        }
		else
			$this->load->helper('date');
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
	
	public function showPaymentRequest()
	{
		$data['showPaymentRequest'] = $this->adminPaymentModel->showPaymentRequest();
		$data["content"] = "admin/showPaymentRequestView";
		$this->load->view('admin/template/template', $data);	
	
	}
	
	public function detailPaymentRequest($paymentReuestID,$message='')
	{
		$data['detailPaymentRequest'] = $this->adminPaymentModel->detailPaymentRequest($paymentReuestID);
		$data['paymentReuestID'] =$paymentReuestID;
		$data['successful_mesg']	=	$message;
		$data["content"] = "admin/detailPaymentRequestView";
		$this->load->view('admin/template/template', $data);	
	
	}
	public function addPayment($paymentReuestID)
	{
		$data['detailPaymentRequest'] = $this->adminPaymentModel->detailPaymentRequest($paymentReuestID);
		
				$detailPaymentRequest 	= $data['detailPaymentRequest'];
//                                print_r($detailPaymentRequest); exit;
				$paymentRequestID 		= $detailPaymentRequest[0]['paymentRequestID'];
				$title 					= $detailPaymentRequest[0]['title'];
				$description 			= $detailPaymentRequest[0]['description'];
				$fName 					= $detailPaymentRequest[0]['fName'];
				$myEarning 				= $detailPaymentRequest[0]['myEarning'];
				$billedToClient 		= $detailPaymentRequest[0]['billedToClient'];
				$amount 				= $detailPaymentRequest[0]['amount'];
				if($amount > $billedToClient)
				{
					$this->adminPaymentModel->addPayment($detailPaymentRequest);
					$this->session->set_flashdata('message', 'Payment Successfully Send To User');
					redirect(base_url().'admin/adminPayment/detailPaymentRequest/'.$paymentRequestID);
				}else
				{
					$this->session->set_flashdata('message', 'Insufficient Balance');
					redirect(base_url().'admin/adminPayment/detailPaymentRequest/'.$paymentRequestID);
				}
	
	}
	
   
}