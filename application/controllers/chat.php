<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Chat extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('chat_model');
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
    }

	
function message($freelancer_id) 
{				
			$user_id =$this->session->userdata('userID');
			$data['allProjectList']=$this->chat_model->message($freelancer_id,$user_id);
			$data["content"] = "chat/chat_view";
			
			$this->load->view('template/template', $data);	
}



}
?>