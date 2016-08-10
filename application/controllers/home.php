<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	 /***********************************
	 * @author Abrar Kamboh 
	   <ibrarkamboh@gmail.com>
	 ************************************/

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('projects_model');
		//$this->load->model('hot_deals_request_model');
		//$this->load->model('asset_home_model');
		
		 $this->load->helper('url');
	}
	public function index(){
//            echo $this->session->userdata('userID'); exit;
		//$data['whatHappening']= $this->asset_home_model->whatHappening();	
		$data['categories'] = $this->projects_model->getCategories('order');
		$data['slider'] = $this->projects_model->getSliderImages();
		//$data['hotDeal']	=	$this->hot_deals_request_model->getHotDeals();
	
	

		//$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

		// $user = $this->facebook->getUser();
        
        // if ($user) {
            // try {
                // $data['user_profile'] = $this->facebook->api('/me');
            // } catch (FacebookApiException $e) {
                // $user = null;
            // }
        // }else {
            // $this->facebook->destroySession();
        // }

        // if ($user) {

            // $data['logout_url'] = site_url('home/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        // } else {
            // $data['login_url'] = $this->facebook->getLoginUrl(array(
                // 'redirect_uri' => site_url('home'), 
                // 'scope' => array("email") // permissions here
            // ));
			
			// $data["content"] = "users/signup_project_view";
			// $this->load->view('template/template', $data);
        // }
      //  $this->load->view('login',$data);
	  
	  
	$data["content"] = "home/home_view";
		$data["class"] = "home";
		$this->load->view('template/template', $data);
	}
}


?>
