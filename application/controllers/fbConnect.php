<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	 /***********************************
	 * @author Asif Mahmood 
	   <asifmahmooduos@gmail.com>
	 ************************************/
	 
ob_start();	  	
//include the facebook.php from libraries directory
require_once APPPATH.'libraries/facebook/facebook.php';

class FbConnect extends CI_Controller {

   public function __construct(){
	    parent::__construct();
	    //$this->load->library('session');  //Load the Session 
		$this->config->load('facebook'); //Load the facebook.php file which is located in config directory
		$this->load->model('fbci_model');
		$this->load->model('users_model');
		
		
    }
	public function index()
	{
	  
	 	$newdata = array('User'=>'',
		  'UserfbSignup'=>'',
		  'UserfbProfile'=>'',
		  'userID'   =>'',
		  'fName'  =>'',
		  'email' => '',
		  'lName' => '',
		  'logged_in' => FALSE
		  );
	  
	    $this->session->unset_userdata($newdata);
        $this->session->sess_destroy(); 
	  //$this->load->view('fbLogin/main'); //load the main.php file for view
	}
	
	function logout(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		$this->session->sess_destroy();  //session destroy
		header('Location: '.$base_url);  //redirect to the home page
		
	}
	
		function fblogin(){
			
		//$setting	=	$this->fbci_model->getSetting();
		$appID		=	'550018661800194';//$setting[0]['fbappid'];
		$secret		=	'a453237086c09e434eda84e906590c6e';//$setting[0]['fbsecret'];

		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		//get the Facebook appId and app secret from facebook.php which located in config directory for the creating the object for Facebook class
    	$facebook = new Facebook(array(
		'appId'		=>  $appID,//$this->config->item('appID'), 
		'secret'	=>  $secret//$this->config->item('appSecret'),
		));
		$user = $facebook->getUser(); // Get the facebook user id 
		
		if($user){
			try{
				$user_profile = $facebook->api('/me');  //Get the facebook user profile data
				$userID = $user_profile['id'];  // added by kamboh	 		
				$email  = isset($user_profile['email']) ? $user_profile['email'] : '';
					
				if($email != ''){
					// check this user is new or already existing
					$fbUserEmail  = $this->fbci_model->isAlreadyEmail($email);							
					$fbUserId     = $this->fbci_model->getfbUserId($email);
					if($fbUserId != $userID && $fbUserEmail != $email){	
						// facebook variables 
						
						$ses_user_fbSignup = array('UserfbSignup'=>$user_profile, 
							   'fName'    => $user_profile['first_name'],
							   'lName'    => $user_profile['last_name'],
							   'email'    => $email	);
						$this->session->set_userdata($ses_user_fbSignup);
						$this->session->set_userdata('ssFbUserId',$userID);
						redirect(base_url().'fbProfile', 'refresh');		
					}
					
					else if($fbUserId == $userID && $fbUserEmail == $email){			
					//$params = array('next' => $base_url.'login/logout');
					$userID 	    = $this->fbci_model->getUserId($email);
					 $params = $base_url.'login/logout';
					 $userStatus = '';
					 $ses_user = array('User'=>$user_profile,
							   'userID'      => $userID,
							   'fName'       => $user_profile['first_name'],
							   'sName'       => $user_profile['last_name'],
							   'email'       => $user_profile['email'],
							   'logged_in'   => TRUE                
					   );   
					
					$this->session->set_userdata($ses_user);
                                        $this->users_model->update_login_time($userID);
					
						redirect(base_url().'home/index', 'refresh');
					
					}
					else if($fbUserId != $userID && $fbUserEmail == $email){
						$data["content"] = "fbRegisteration/fbalert_view";					
						$this->load->view('template/template', $data);
					}
					
					
				}else{
					$data["content"] = "fbRegisteration/email_error_view";					
					$this->load->view('template/template', $data);
				}
				
				
			}catch(FacebookApiException $e){
				
				error_log($e);
				$user = NULL;
			}		
		 }
		
	}
	
	
	

}

/* End of file fbci.php */
/* Location: ./application/controllers/fbci.php */