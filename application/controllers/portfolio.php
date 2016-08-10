<?php
class Portfolio extends CI_Controller {

 public function __construct() {
        parent::__construct();
		 $this->load->model('portfolio_model');
		 $this->load->helper('download');
    }
	function index()
	{
		$userID =$this->session->userdata('userID');
		$data['listPortfolio']=$this->portfolio_model->getPortfolio($userID);
						
		$data["content"] = "portfolio/portfolio_view";
		$this->load->view('template/template', $data);	
			
	}
	
	function addPortfolio()
	{
			
		if($this->input->post('title')!='')
		{
			$userID =$this->session->userdata('userID');
			$data= array(
			'portfolioTitle' 		=>$this->input->post('title'),
			'portfolioDescription' 	=>$this->input->post('portfolioDescription'),
			'date' 					=>date('Y-m-d'),
			'userID' 				=>$userID
			
			);
		$lastInsertID = $this->portfolio_model->addPortfolio($data);
		if ($_FILES['fileAttachement']['name'])
					{
						$this->uploadportfolioAttachment($lastInsertID);
					}
			redirect(base_url().'portfolio');
		}else
		{
		
		$data["content"] = "portfolio/addportfolio_view";
		$this->load->view('template/template', $data);
		}
						
		
			
	}
	
	
	function deletePortfolio() 
	{
			foreach ($_POST['chk'] as $chk) {
			$this->portfolio_model->deletePortfolio($chk);
			}
			redirect(base_url().'portfolio');
	
	}
	
	
	function uploadportfolioAttachment($lastInsertID) {

        $config['upload_path']   = "public/upload/portfolio/";
	    $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp|doc|docx|xls|txt";

        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("fileAttachement")) {

            echo $this->upload->display_errors();
        } else {

            $finfo = $this->upload->data("fileAttachement");
            $this->portfolio_model->uploadportfolioAttachment($finfo['file_name'], $lastInsertID);
        }
    }
	
	function portfolioPublic($id)
	{
			
		$data['listPortfolio']=$this->portfolio_model->getPortfolio($id);
						
		$data["content"] = "portfolio/portfolio_public_view";
		$this->load->view('template/template', $data);	
			
	}
	
	function download($file)
	{
			
		$data = file_get_contents(base_url()."public/upload/portfolio/".$file); // Read the file's contents			
		force_download($file, $data); 	
			
	}
	function showImage($file)
	{
			
		$data = base_url()."public/upload/portfolio/".$file;		
		echo '<img src="'.$data.'">';	
			
	}


  
}