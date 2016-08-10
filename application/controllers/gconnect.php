<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	 /***********************************
	 * @author Asif Mahmood 
	   <asifmahmooduos@gmail.com>
	 ************************************/
	 
ob_start();	  	

class Gconnect extends CI_Controller {

   public function __construct(){
	    parent::__construct();
	    $this->load->library('oauth2/OAuth2');  
		$this->config->load('oauth2'); 
		$this->load->model('g_model');
		$this->load->model('users_model');
    }
	
	public function glogin(){		

		$base_url      = $this->config->item('base_url');
		$google_id     = $this->config->item('google_id'); 
		$google_secret = $this->config->item('google_secret');
		$google_redirect = $this->config->item('google_redirect_uri'); 
		
        $provider_name = 'google';
		$provider = $this->oauth2->provider($provider_name, array(
            'id'     => $google_id,
            'secret' => $google_secret,
			'redirect_uri' => $google_redirect,
        ));
		
		if (!$this->input->get('code')) {
            $provider->authorize();
        } else {
            try {
				$code = $this->input->get('code');				
                $token = $provider->access($code);				
                $userDetails = $provider->get_user_info($token);
				
            } catch (OAuth2_Exception $e) {
                show_error('That didnt work: ' . $e);
            }
        }
		
		if ($userDetails) {
			try{
				$userID = $userDetails['uid'];					
				$image  = $userDetails['image'];					
				$email  = isset($userDetails['email']) ? $userDetails['email'] : '';
						
				if($email != ''){
					// check this user is new or already existing
					$gUserEmail  = $this->g_model->isAlreadyEmail($email);							
					$gUserId     = $this->g_model->getgUserId($email);
				
					if($gUserId != $userID && $gUserEmail != $email){							
						$ses_user_gSignup = array( 
							   'fName'    => $userDetails['first_name'],
							   'lName'    => $userDetails['last_name'],
							   'email'    => $email	);
						$this->session->set_userdata($ses_user_gSignup);
						$this->session->set_userdata('ssgUserId',$userID);
						$this->session->set_userdata('ssgImage',$image);
						redirect(base_url().'gProfile', 'refresh');		
					}
					
					else if($gUserId == $userID && $gUserEmail == $email){			
					
					 $userID = $this->g_model->getUserId($email);						 
					 $ses_user = array(
							   'userID'      => $userID,
							   'fName'       => $userDetails['first_name'],
							   'sName'       => $userDetails['last_name'],
							   'email'       => $email,
							   'logged_in'   => TRUE                
					   );   
					
					$this->session->set_userdata($ses_user);
                                        $this->users_model->update_login_time($userID);
					
						redirect(base_url().'home/index', 'refresh');
					
					}
					else if($gUserId != $userID && $gUserEmail == $email){
						$data["content"] = "gRegisteration/galert_view";					
						$this->load->view('template/template', $data);
					}
					
					
				}else{
					$data["content"] = "gRegisteration/email_error_view";					
					$this->load->view('template/template', $data);
				}
					
					
				}catch(OAuth2_Exception $e){
					error_log($e);
					$user = NULL;
			}			
		}
		else{
		
			if (isset($_REQUEST['error'])) {
				redirect(base_url().'gconnect/error', 'refresh');
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