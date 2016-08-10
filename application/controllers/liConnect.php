<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	 /***********************************
	 * @author Asif Mahmood 
	   <asifmahmooduos@gmail.com>
	 ************************************/
	 
ob_start();	  	

class LiConnect extends CI_Controller {

   public function __construct(){
	    parent::__construct();
	    $this->load->library('linkedin/linkedin');  
		$this->config->load('linkedin'); 
		$this->load->model('li_model');
                $this->load->model('users_model');
    }
	
	function lilogin(){	
			
		$base_url     = $this->config->item('base_url'); 
		$api_key      = $this->config->item('api_key');
		$api_secret   = $this->config->item('api_secret');
		$callback_url = $this->config->item('callback_url');
		$scope        = $this->config->item('scope');
		
    	$config = array('api_key' => $api_key, 'api_secret' => $api_secret , 'callback_url' => $callback_url);
		$connection = new LinkedIn($config);
		
		if (isset($_REQUEST['code'])) {
			$code = $_REQUEST['code'];
			$access_token = $connection->getAccessToken($code);
			$connection->setAccessToken($access_token);
			$user = $connection->get("people/~:(id,first-name,last-name,email-address,headline,picture-url,phone-numbers,educations,skills,date-of-birth)");
			
			if($user){
				try{
					
					$userID = $user['id'];					
					//$skills = $user['skills'];
					$image  = $user['pictureUrl'];					
					$email  = isset($user['emailAddress']) ? $user['emailAddress'] : '';
						
					if($email != ''){
						// check this user is new or already existing
						$liUserEmail  = $this->li_model->isAlreadyEmail($email);							
						$liUserId     = $this->li_model->getliUserId($email);
					
						if($liUserId != $userID && $liUserEmail != $email){	
							// facebook variables 
							
							$ses_user_liSignup = array( 
								   'fName'    => $user['firstName'],
								   'lName'    => $user['lastName'],
								   'email'    => $email	);
							$this->session->set_userdata($ses_user_liSignup);
							$this->session->set_userdata('ssLiUserId',$userID);
							$this->session->set_userdata('ssLiImage',$image);
							//$this->session->set_userdata('ssLiSkills',$skills);
							redirect(base_url().'liProfile', 'refresh');		
						}
						
						else if($liUserId == $userID && $liUserEmail == $email){			
						
						 $userID = $this->li_model->getUserId($email);						 
						 $ses_user = array(
								   'userID'      => $userID,
								   'fName'       => $user['firstName'],
								   'sName'       => $user['lastName'],
								   'email'       => $email,
								   'logged_in'   => TRUE                
						   );   
						
						$this->session->set_userdata($ses_user);
                                                 $this->users_model->update_login_time($userID);
						
							redirect(base_url().'home/index', 'refresh');
						
						}
						else if($liUserId != $userID && $liUserEmail == $email){
							$data["content"] = "liRegisteration/lialert_view";					
							$this->load->view('template/template', $data);
						}
						
						
					}else{
						$data["content"] = "liRegisteration/email_error_view";					
						$this->load->view('template/template', $data);
					}
					
					
				}catch(LinkedIn $e){
					error_log($e);
					$user = NULL;
			}		
		 }
		}
		else{
		
			if (isset($_REQUEST['error'])) {
				redirect(base_url().'liConnect/error', 'refresh');
			}
			else{
				$authUrl = $connection->getLoginUrl($scope);
				header("Location: $authUrl");
			}
		}
	}
	
	public function error(){
		if ( isset($_GET['error_code'] ) && $_GET['error_code'] == 1 ) {
			echo "<p>Oops!! Something went wrong. Please try again</p>";
		}
	}
	
	function logout(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		$this->session->sess_destroy();  //session destroy
		header('Location: '.$base_url);  //redirect to the home page		
	}
	
	
	

}