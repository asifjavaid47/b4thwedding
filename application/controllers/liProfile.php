<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	 /***********************************
	 * @author Asif Mahmood 
	   <asifmahmooduos@gmail.com>
	 ************************************/
ob_start();

class liProfile extends CI_Controller {
		
	 public function __construct()
	 {
	     parent::__construct();
		
		 $this->load->helper(array('form', 'url'));
		 $this->load->library('form_validation');
		 $this->load->model('li_model');
	}

	function index()
	{			
		$data["content"] = "liRegisteration/liProfile_view";
		$data["error"]    = " ";
		$data["errorP"]   = " ";
		$this->load->view('template/template', $data);			
	}
	
	
	public function completeProfile()
	{
		
		$this->form_validation->set_rules('fName', 'Name', 'trim|required');
		$this->form_validation->set_rules('lName', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('userName','userName','trim|required|callback_isUserExist');
		if($this->form_validation->run() == FALSE)
		{
			$data["content"] = "liRegisteration/liProfile_view";
			$this->load->view('template/template', $data);	
		}
		
		else
		{			
				$userID  = $this->li_model->create_user();
				$toEmail = $this->input->post('email');
				$link = '<a href='.base_url().'users/completeProfile/'.base64_encode($userID).'>Click here</a>';
					$this->email->from('b4wedding@gmail.com', 'Membership');
					$this->email->to($toEmail);
					$this->email->subject('Acivate Account');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#00d2a8';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
								<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'><h3>Hi ".$this->input->post('fName')." ".$this->input->post('lName').", </h3>
								  <p><strong>Welcome to b4wedding.com !</strong> <br />
								  
							
							  <strong>Activating your Account</strong><br />
									To activate your account and complete your profile, ".$link." Alternatively you can copy this link ".base_url()."users/completeProfile/".base64_encode($userID)."
							and paste it in your web browser 
							</p>
								 
							</td>
							  </tr>
							  
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>";
					$this->email->message($message);				
					$this->email->send();
				$data["content"] = "users/success_view";
				$this->load->view('template/template', $data);				
				
			}
		}
			

	function isUserExist($str)
		{
			$this->load->model('Users_model');
		if ($this->Users_model->checkUsername($str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('isUserExist', 'The username is already exist');            
			return false;
		}
	}


}
		