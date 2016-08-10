<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class GettStarted extends CI_Controller
{
	public function __construct() {
        parent::__construct();       
       /*if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }*/
    }
	public function index(){
		$data["content"] 	= 	"pages/gett_started_view";
		$this->load->view('template/template', $data);
	}
	
}
?>