<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	 /***********************************
	 * @author Abrar Kamboh 
	   <ibrarkamboh@gmail.com>
	 ************************************/
class Page extends CI_Controller{
	 
	 public function __construct()
	 {
	  parent::__construct();
		$this->load->model('milestone_model');
	 
	 }
    function index(){
		
		redirect(base_url() . 'home', 'refresh');
    }

    public function view($page = 'home')
    {
        if ( ! file_exists('application/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
		$data["content"] = 'pages/'.$page;
		$data["class"] = $page;
		$this->load->view('template/template', $data);			

 
    }

}
?>
