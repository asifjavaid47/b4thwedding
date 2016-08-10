<?php
class Users extends CI_Controller {

 public function __construct() {
        parent::__construct();
		$this->load->model('users_model');
		$this->load->model('projects_model');
		$this->load->model('portfolio_model');
		$this->load->helper('cookie');
	

    }
	function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('home/');
        }else{
        	$this->load->view('home/');	
        }
	}

    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

    /**
    * check the username and the password with the database
    * @return void
    */
	function validate()
	{
		$this->load->model('users_model');
		$userName    = $this->input->post('userName');
	  	$password = $this->input->post('password');	
		
	  	$result  = $this->users_model->verifyLogin($userName,$password);

		if($result !='no'){ 
			
			$active		=	$result['active'];
			if($active==0)
			{
				echo 'inactive';
				exit;
			}else
			{
				$newdata = array(
						  'userID'  => $result['ID'],
						  'fName'    => $result['fName'],
						  'lName'    => $result['lName'],
						  'email'    => $result['email'],
						  'logged_in'  => TRUE
						);
					
				$rememberme = $this->input->post('rememberme');
                                $this->users_model->update_login_time($result['ID']);
				
				if($rememberme != "rememberme")
				{
					// $this->session->sess_expiration = 900; // 3 hours
					// $this->config->set_item('sess_expire_on_close', '1');
					$this->session->set_userdata($newdata);
//					$this->session->sess_expire_on_close = TRUE;
//                                        ini_set('session.gc_maxlifetime', 36000);
				}
				else
				{
					// set_cookie($cookie);
					$cookie1 = array(
						'name'   => 'username',
						'value'  => $userName,						
						'expire' => '1209600'  //2 weeks
					);
					
					$cookie2 = array(						
						'name'   => 'password',
						'value'  => $password,
						'expire' => '1209600'  //2 weeks
					);
					

					set_cookie($cookie1);
					set_cookie($cookie2);
				
					$this->session->sess_expire_on_close = FALSE;
					// $this->config->set_item('sess_expire_on_close', '0');
					$this->session->set_userdata($newdata);
								
					/* $this->session->sess_expiration = 60*60*24*31;
					$this->session->sess_expire_on_close = FALSE;
					$this->session->set_userdata('new_expiration',1209600); //2 weeks
					$this->session->sess_update(); //force the session to update the cookie and/or database */
			
				}
				echo 'login';
			}		
		}		
		else
		{
			echo 'not match';	
		}

			
	}

	function signup($option)
	{

		if($option=="client")
		{
		$data["content"] = "users/signup_client_view";
		$this->load->view('template/template', $data);	
		}else
		{
			$data['countries'] = $this->users_model->getCountries();
			$data["content"] = "users/signup_freelancer_view";
			$this->load->view('template/template', $data);	
		}
	}
	

    /**
    * Create new user and store it in the database
    * @return void
    */	
	function create_client()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('fName', 'Name', 'trim|required');
		$this->form_validation->set_rules('lName', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('userName','userName','trim|required|callback_isUserExist');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data["content"] = "users/signup_view";
			$this->load->view('template/template', $data);	
		}
		else
		{			
				$this->load->model('Users_model');
			 	$userID = $this->Users_model->createClientUser();
				$link = '<a href='.base_url().'users/completeProfile/'.base64_encode($userID).'>Click here</a>';
				
					$this->load->library('email');
					$this->email->from('b4thewedding@gmail.con', 'Membership');
					$this->email->to($this->input->post('email'));
					$this->email->subject('Membership');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
								<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'><h3>Hi ".$this->input->post('fName')." ".$this->input->post('lName').", </h3>
								  <p><strong>Welcome to b4thewedding.com !</strong> <br />
								  
							
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
	
	/**
    * Destroy the session, and logout the user.
    * @return void
    */	



function createFreelancerUser()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('fName', 'Name', 'trim|required');
		$this->form_validation->set_rules('lName', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('userName', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data["content"] = "users/signup_project_view";
			$this->load->view('template/template', $data);	
		}
		
		else
		{			
			$this->load->model('Users_model');
			$userID = $this->Users_model->createFreelancerUser();
			 
			 
			 $link = '<a href='.base_url().'users/completeProfile/'.base64_encode($userID).'>Click here</a>';
				
					$this->load->library('email');
					$this->email->from('b4thewedding@gmail.con', 'Membership');
					$this->email->to($this->input->post('email'));
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
								<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'><h3>Hi ".$this->input->post('fName')." ".$this->input->post('lName').", </h3>
								  <p><strong>Welcome to b4thewedding.com !</strong> <br />
								  
							
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
			$this->email->subject('Membership');				
			$this->email->message($message);				
			$this->email->send();
			 
			 $data["content"] = "users/success_view";
			 $this->load->view('template/template', $data);				
			
		}
		
	}	
	function logout()
	{
                $this->users_model->update_online_status($this->session->userdata('userID') , 0);
		$this->session->sess_destroy();
			$cookie = array(
						'name'   => 'userID',
						'value'  => '',
						'expire' => '-1'
					);

		delete_cookie($cookie);
		// delete_cookie('userID');
		redirect('home/index');
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
			$this->form_validation->set_message('isUserExist', 'The username %s already exist');            
			return false;
		}
	}
	/*user profile*/
	
	
	function freelancerPublicView($id)
	{
		$this->load->model('Users_model');
		$data['getUsersSkills'] 	= $this->users_model->getUsersSkills();
		$data['freelancerProfile'] 	= $this->Users_model->freelancerPublicView($id);
			$data['freelancerView'] = 'freelancerPublicView/'.$id;
		$data['rating']				= $this->Users_model->getFreelancerRating($id);
		$data['ratingCount']        = $this->Users_model->getFreelancerRatingCount($id);
		$data['totalJobs']			= $this->Users_model->gettotalJobs();
		$data['categories'] = $this->projects_model->getCategories();
		$data["content"] = "users/freelancerPublicView";
		$this->load->view('template/template', $data);	
		
		
	} 
	
	function freelancerProfile()
	{
		if($this->session->userdata('logged_in')){
			
        
		$this->load->model('Users_model');
		$data['getUsersSkills'] 	= $this->users_model->getUsersSkills();
		$data['freelancerProfile'] 	= $this->Users_model->freelancerProfile();
		$data['myTotalEarning'] 	= $this->Users_model->myTotalEarning();
		$data['rating']				= $this->Users_model->getRating();
		$data['totalJobs']			= $this->Users_model->gettotalJobs();
		$data['categories'] = $this->projects_model->getCategories();
		$userID =$this->session->userdata('userID');
		$data['listPortfolio']		=$this->portfolio_model->getPortfolio($userID);
		$data["content"] = "users/freelancerProfile_view";
		$this->load->view('template/template', $data);	
		}else{
        	redirect('home/');
        }
		
	} 
	function clientPublicView($Id)
	{
		$this->load->model('Users_model');
		$data['clientProfile'] = $this->Users_model->clientPublicView($Id);
		$data['clientView'] = 'clientPublicView/'.$Id;
		$data['rating']				= $this->Users_model->getClientRating($Id);
		$data['ratingCount']        = $this->Users_model->getClientRatingCount($Id);
		$data['categories'] = $this->projects_model->getCategories();
		$data["content"] = "users/clientPublicView";
		$this->load->view('template/template', $data);	
		
		
	} 
	function clientProfile()
	{
		if($this->session->userdata('logged_in')){
		$this->load->model('Users_model');
		$data['clientProfile'] = $this->Users_model->clientProfile();
		// $data['clientView'] = 'clientProfile';
		$data["content"] = "users/clientProfile_view";
		$this->load->view('template/template', $data);	
		}else{
        	redirect('home/');
        }
		
	} 
	
	/*user profile*/
	
	function isUserExistAjax()
		{
			$this->load->model('Users_model');
		$userName    = $this->input->post('userName');
		if ($this->Users_model->checkUsername($userName))
		{
			echo 'not';
		}
		else
		{
			          
			echo 'yes';
		}
	}
	
		function isEmailExistAjax()
		{
			$this->load->model('Users_model');
		$email    = $this->input->post('email');
		if ($this->Users_model->isEmailExistAjax($email))
		{
			echo 'not';
		}
		else
		{
			echo 'yes';
		}
	}
function forgotUsername()
		{
			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		
			if($this->form_validation->run() == FALSE)
			{
				$data["content"] = "users/forgotUsername_view";
				$this->load->view('template/template', $data);	
			}else
			{
				$email    	= $this->input->post('email');
				$useInfo=$this->Users_model->forgetUserName($email);
				if ($useInfo!='not_exit')
				{
					
					$userName =  $useInfo[0]['userName'];
					$this->load->library('email');
					$this->email->from('b4wedding@gmail.con', 'b4thewedding.com Team');
					$this->email->to($email);
					$message = "your user name = ".$userName."";
					$this->email->message($message);				
					$this->email->send();
					$data["success"] = '<span style="width:200px;">Forgotten UserName Request Received
We have received your request to send you your username. In a short while you should receive an email with the username(s) associated with the email address</span>';
					$data["content"] = "users/forgotUsername_view";
					$this->load->view('template/template', $data);	
				}else
				{
					$data["success"] = "Please enter a valid email address";
					$data["content"] = "users/forgotUsername_view";
					$this->load->view('template/template', $data);	
				}
				
			}		
		}
		
function forgotPassword()
		{
			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		
			if($this->form_validation->run() == FALSE)
			{
				$data["content"] = "users/forgotPassword_view";
				$this->load->view('template/template', $data);	
			}else
			{
				
				$email    	= $this->input->post('email');
				$useInfo=$this->Users_model->forgotPassword($email);
				if ($useInfo!='not_exist')
				{
					
					$password =  $useInfo[0]['password'];
					$this->load->library('email');
					$this->email->from('b4thewedding@gmail.con', 'b4thewedding.com Team');
					$this->email->to($email);
					$message = "your password = ".$password."";
					$this->email->message($message);				
					$this->email->send();
				
					$data["success"] = '<span style="color:green;"><style>.success{ width:50%; margin:0 auto;}</style> Forgotten UserName Request Received
We have received your request to send you your username. In a short while you should receive an email with the username(s) associated with the email address</span>';
					$data["content"] = "users/forgotPassword_view";
					$this->load->view('template/template', $data);	
				}else
				{
					$data["success"] = '<span style="color:red"> Email you Enter is NOt Exist!</span>';
					$data["content"] = "users/forgotPassword_view";
					$this->load->view('template/template', $data);	
				}
				
			}		
		}
		
		
		
	function editUsersSkills()
	{
		
		$data['getUsersSkills'] = $this->users_model->getUsersSkills();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('SkillsName', 'SkillsName', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data["content"] = "users/editUsersSkillsView";
			$this->load->view('template/template', $data);	
		}
		
		else
		{			
			$this->load->model('Users_model');
			
			if($query = $this->Users_model->addUsersSkills())
			{
				$data["confirm_msg"] = "Add Sucessfull";
				$data['getUsersSkills'] = $this->users_model->getUsersSkills();
				$data["content"] = "users/editUsersSkillsView";
				$this->load->view('template/template', $data);				
			}
			else
			{
				
				$data["content"] = "users/editUsersSkillsView";
				$this->load->view('template/template', $data);		
			}
		}
		
	}
	
	function editUsersProfile()
	{
		
		$data['countries'] = $this->users_model->getCountries();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fName', 'fName', 'trim|required');
		$this->form_validation->set_rules('lName', 'lName', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('hourlyRate', 'hourlyRate', 'trim|required');
		
		$data['freelancerProfile'] = $this->users_model->freelancerProfile();
		if($this->form_validation->run() == FALSE)
		{
				
				$data["content"] = "users/editUsersProfileView";
				$this->load->view('template/template', $data);		
		}
		
		else
		{	
			 	$this->users_model->editUsersProfile();
				$userID =$this->session->userdata('userID');
				if ($_FILES['image']['name'])
					{
						$this->uploadAttachment($userID);
					}
				$data['freelancerProfile'] = $this->users_model->freelancerProfile();
				$data["success"]	=	'Your Profile Edit Successfully'; 
				$data["content"] 	= 	"users/editUsersProfileView";
				$this->load->view('template/template', $data);	
			
		}
				
				
	}
	
	
	function completeProfile($userID_enc)
	{
		$userID = base64_decode($userID_enc);
		
		$data['countries'] = $this->users_model->getCountries();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fName', 'fName', 'trim|required');
		$this->form_validation->set_rules('lName', 'lName', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('hourlyRate', 'hourlyRate', 'trim|required');
		
		
		/* if($this->form_validation->run() == FALSE)
		{
				$data['profile'] = $this->users_model->getProfileInfo($userID);
				$data['userID']	=	$userID_enc;
				// $data["content"] = "users/completeProfile_view";
				// $this->load->view('template/template', $data);	
				$this->users_model->addCompleteProfileData($userID);
				
					
					$newdata 	 = array(
					  'userID'   => $userID,
					  'fName'    => $profile[0]['fName'],
					  'lName'    => $profile[0]['lName'],
					  'email'    => $profile[0]['email'],	
					  'logged_in'  => TRUE
					);
					$this->session->set_userdata($newdata);
				print_r($newdata );
				exit;					
					 redirect(base_url().'project/my_jobs_c');
		}
		
		else
		{ */	
		
			 	//$this->users_model->addCompleteProfileData($userID);
				// if ($_FILES['image']['name'])
					// {
						// $this->uploadAttachment($userID);
					// }
					
					// $newdata 	 = array(
					  // 'userID'   => $userID,
					  // 'fName'    => $this->input->post('fName'),
					  // 'lName'    => $this->input->post('lName'),
					  // 'email'    => $this->input->post('email'),	
					  // 'logged_in'  => TRUE
					// );
					$this->users_model->activeUser($userID);
					$profile = $this->users_model->getProfileInfo($userID);
					$newdata 	 = array(
					  'userID'   => $userID,
					  'fName'    => $profile[0]['fName'],
					  'lName'    => $profile[0]['lName'],
					  'email'    => $profile[0]['email'],	
					  'logged_in'  => TRUE
					);
					// print_r($data['profile']);
				// exit;
					$this->session->set_userdata($newdata);
                                        $this->users_model->update_login_time($userID);
					redirect(base_url().'project/my_jobs_c');
			
		// }
		
		$data['userID']	=	$userID_enc;
		$data["content"] = "users/completeProfile_view";
		$this->load->view('template/template', $data);			
				
	}
	
	
	
	function uploadAttachment($lastInsertID) {
            
            $config['upload_path']   = "public/upload/profile/";
            $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp";

            $config['max_size'] = "0";
            //$config['max_width'] = "0";
            //$config['max_height'] = "0";
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 90;
            $config['height'] = 90;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("image")) {

                echo $this->upload->display_errors();
            } else {
                $finfo = $this->upload->data("image");
                $this->_createThumbnail($finfo['file_name']);
                $this->users_model->add_profile_image($finfo['file_name'], $lastInsertID);
            }
    }
	
	function deleteUserSkillAjax() 
	{
			$skillId = $this->input->post('skillId');
			$this->users_model->deleteUserSkillAjax($skillId);
			echo 'yes';
			
	}
	function resetPassword() 
	{
		$userID =$this->session->userdata('userID');
		
		$password	= $this->input->post('password');
		if($password!='')
		{
			$result = $this->users_model->gettPassword($userID);
			$userPassword	=	$result[0]['password'];
			$current1		= 	$this->input->post('current');
			$current		=	md5($current1);
			if($userPassword==$current)
			{
				$this->users_model->changePassword($userID,$current);
				$data["message"]	=	'Password Successfully Chnage';	
			}else
			{
				$data["error"]		=	"Your Current Password Do't Match";
			}
			
			
		}
		$data["content"] = "users/resetPassword_view";
		$this->load->view('template/template', $data);		
			
	}
        
        public function check_users_online_status(){
            
            $client_id = $this->input->post('client_id');
            $freelancer_id = $this->input->post('freelancer_id');
            if (!empty($client_id) && !empty($freelancer_id)) {
                $client_status = $this->users_model->user_online_status($client_id);
                $freelancer_status = $this->users_model->user_online_status($freelancer_id);
                $client_time = $this->projects_model->get_timeago(strtotime($client_status['last_login']));
                $freelancer_time = $this->projects_model->get_timeago(strtotime($freelancer_status['last_login']));
                if($client_status['is_online'] == 1 && $freelancer_status['is_online'] == 1){
                    echo 
                    " 
                     <div style='box-shadow: 10px 10px 8px #888888; padding:5px; background: #fff;' id='online-box' class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
<div class='col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left padding0'>
<h4 class='hed_people'>Online Status</h4>
</div>
<div class='clear5'></div>
<div class='sep_people'></div>

<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Client</h4>
<img src='".base_url()."public/images/online-1.png'>  <a style='color: #000;' href='".base_url()."users/clientProfile/".$client_id."'><b>".$client_status['userName']."</b></a><br>

<b style='color: #33cc00;'>Online Now</b>
</div>

<div class='clear'></div>
<div style='margin-bottom:2px;' class='sep_people'></div>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Wedding Contractor</h4>
<img src='".base_url()."public/images/online-1.png'>   <a style='color: #000;' href='".base_url()."users/freelancerProfile/".$freelancer_id."'><b>".$freelancer_status['userName']."</b></a><br>
<b style='color: #33cc00;'>Online Now</b>
</div>
<div class='clear'></div>
</div>
<div class='clear10'></div>
</div>
                    "; exit;
                    
                } else if($client_status['is_online'] == 1 && $freelancer_status['is_online'] == 0){
                    echo 
                    " 
                     <div style='box-shadow: 10px 10px 8px #888888; padding:5px; background: #fff;' id='online-box' class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
<div class='col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left padding0'>
<h4 class='hed_people'>Online Status</h4>
</div>
<div class='clear5'></div>
<div class='sep_people'></div>

<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Client</h4>
<img src='".base_url()."public/images/online-1.png'>  <a style='color: #000;' href='".base_url()."users/clientProfile/".$client_id."'><b>".$client_status['userName']."</b></a><br>

<b style='color: #33cc00;'>Online Now</b>
</div>

<div class='clear'></div>
<div style='margin-bottom:2px;' class='sep_people'></div>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Wedding Contractor</h4>
<img src='".base_url()."public/images/offline-1.png'>   <a style='color: #000;' href='".base_url()."users/freelancerProfile/".$freelancer_id."'><b>".$freelancer_status['userName']."</b></a><br>
<b>last login -</b> ".$freelancer_time."
</div>
<div class='clear'></div>
</div>
<div class='clear10'></div>
</div>
                    "; exit;
                    
                } else if($client_status['is_online'] == 0 && $freelancer_status['is_online'] == 1){
                    echo 
                    " 
                     <div style='box-shadow: 10px 10px 8px #888888; padding:5px; background: #fff;' id='online-box' class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
<div class='col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left padding0'>
<h4 class='hed_people'>Online Status</h4>
</div>
<div class='clear5'></div>
<div class='sep_people'></div>

<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Client</h4>
<img src='".base_url()."public/images/offline-1.png'>  <a style='color: #000;' href='".base_url()."users/clientProfile/".$client_id."'><b>".$client_status['userName']."</b></a><br>
<b>last login -</b> ".$client_time."
</div>

<div class='clear'></div>
<div style='margin-bottom:2px;' class='sep_people'></div>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Wedding Contractor</h4>
<img src='".base_url()."public/images/online-1.png'>   <a style='color: #000;' href='".base_url()."users/freelancerProfile/".$freelancer_id."'><b>".$freelancer_status['userName']."</b></a><br>
<b style='color: #33cc00;'>Online Now</b>
</div>
<div class='clear'></div>
</div>
<div class='clear10'></div>
</div>
                    "; exit;
                    
                } else if($client_status['is_online'] == 0 && $freelancer_status['is_online'] == 0){
                    echo 
                    " 
                     <div style='box-shadow: 10px 10px 8px #888888; padding:5px; background: #fff;' id='online-box' class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
<div class='col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left padding0'>
<h4 class='hed_people'>Online Status</h4>
</div>
<div class='clear5'></div>
<div class='sep_people'></div>

<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Client</h4>
<img src='".base_url()."public/images/offline-1.png'>  <a style='color: #000;' href='".base_url()."users/clientProfile/".$client_id."'><b>".$client_status['userName']."</b></a><br>
<b>last login -</b> ".$client_time."
</div>

<div class='clear'></div>
<div style='margin-bottom:2px;' class='sep_people'></div>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Wedding Contractor</h4>
<img src='".base_url()."public/images/offline-1.png'>   <a style='color: #000;' href='".base_url()."users/freelancerProfile/".$freelancer_id."'><b>".$freelancer_status['userName']."</b></a><br>
<b>last login -</b> ".$freelancer_time."
</div>
<div class='clear'></div>
</div>
<div class='clear10'></div>
</div>
                    "; exit;
                    
                } else{
                    echo 
                    " 
                     <div style='box-shadow: 10px 10px 8px #888888; padding:5px; background: #fff;' id='online-box' class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
<div class='col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left padding0'>
<h4 class='hed_people'>Online Status</h4>
</div>
<div class='clear5'></div>
<div class='sep_people'></div>

<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Client</h4>
<img src='".base_url()."public/images/offline-1.png'>  <a style='color: #000;' href='".base_url()."users/clientProfile/".$client_id."'><b>".$client_status['userName']."</b></a><br>
<b>last login -</b> ".$client_time."
</div>

<div class='clear'></div>
<div style='margin-bottom:2px;' class='sep_people'></div>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0'>
<h4 style='color:#222; margin-top:0;' class='padding0'>Wedding Contractor</h4>
<img src='".base_url()."public/images/offline-1.png'>   <a style='color: #000;' href='".base_url()."users/freelancerProfile/".$freelancer_id."'><b>".$freelancer_status['userName']."</b></a><br>
<b>last login -</b> ".$freelancer_time."
</div>
<div class='clear'></div>
</div>
<div class='clear10'></div>
</div>
                    "; exit;
                    
                }
            } else {
                echo 'fail'; exit;
            }
            
        }
        public function change_user_to_online(){
            
            if (($this->session->userdata('logged_in') != "")) {
                $this->users_model->update_online_status($this->session->userdata('userID') , 1);
            }
            echo 'ok'; exit;
            
        }

        public function change_user_to_offline(){
            
            if (($this->session->userdata('logged_in') != "")) {
                $this->users_model->update_online_status($this->session->userdata('userID') , 0);
            }
            echo 'ok'; exit;

            
        }
        
function _createThumbnail($filename) {

        $config['image_library']  = "gd2";

        $config['source_image']   = "public/upload/profile/" . $filename;

        $new_path                 = 'public/upload/profile/thumbnail';

        $config['new_image']      = $new_path;
  
        $config['create_thumb']   = FALSE;

        $config['maintain_ratio'] = TRUE;

        $config['width']          = 160;

        $config['height']         = 120;

        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {

            echo $this->image_lib->display_errors();
        }
        return;
  
    }
public function resendEmail(){	
	$userName    = $this->input->post('userName');
	$password = $this->input->post('password');	
	
	$result  = $this->users_model->verifyLogin($userName,$password);

	$userID  = $result['ID'];
	$fName  = $result['fName'];
	$lName  = $result['lName'];
	$email  = $result['email'];

	$link = '<a href='.base_url().'users/completeProfile/'.base64_encode($userID).'>Click here</a>';
	
		$this->load->library('email');
		$this->email->from('b4thewedding@gmail.con', 'Membership');
		$this->email->to($email);
		$this->email->subject('Membership');
		$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
				  <tr>
					<td style='padding:20px;'>
					<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
				  
				  <tr>
					<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'><h3>Hi ".$fName." ".$lName.", </h3>
					  <p><strong>Welcome to b4thewedding.com !</strong> <br />
					  
				
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
	
	echo 'send';
}

    
    
}