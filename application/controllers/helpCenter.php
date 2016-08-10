<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class HelpCenter extends CI_Controller
{
	public function __construct() {
        parent::__construct();  
    }
	public function index(){
		$data["content"] 	= 	"pages/help_center_view";
		$this->load->view('template/template', $data);
	}
	
}
?>