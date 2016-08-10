<?php
class FrontEndManagement extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/frontendmanagement_model');

        if(!($this->session->userdata('is_logged_in'))){
            redirect(base_url().'admin');
        }else
            $this->load->helper('date');
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */

    	
	public function addMainSliderImages()
	{
		$id = $this->uri->segment(4);
		// print_r($id);
		// exit();	
		$this->load->library('form_validation');
			$this->form_validation->set_rules('cName', 'cName', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			
		if(empty($id))
		{
		
			if($this->form_validation->run() == FALSE)
			{
					$data["content"] = "admin/addfrontSliderView";
					$this->load->view('admin/template/template', $data);						
			}
			
			else
			{
							
				if($this->frontendmanagement_model->addMainSliderImages())
				{	
					$data["successful_mesg"] = "Image Inserted Successfully!";
					$data["content"] = "admin/addfrontSliderView";
					$this->load->view('admin/template/template', $data);					
				}
				else
				{
						 $data['duplicat_mesg'] = "Image already Exists";
						$data["content"] = "admin/addfrontSliderView";
						$this->load->view('admin/template/template', $data);		
				}
			}
		}
		else
		{		
			if($this->form_validation->run() == FALSE)
			{
					$data['cat'] = $this->frontendmanagement_model->get_mainSliderImages_by_id($id);
					$data["content"] = "admin/addfrontSliderView";
					$this->load->view('admin/template/template', $data);						
			}
			
			else
			{	
				$query = $this->frontendmanagement_model->update_mainSliderImages($id);
				if($query)
				{	$data['cat'] = $this->frontendmanagement_model->get_mainSliderImages_by_id($id);
					$data["successful_mesg"] = "Image update successfully";
					$data["content"] = "admin/addfrontSliderView";
					$this->load->view('admin/template/template', $data);					
				}
				else
				{
						$data['cat'] = $this->categories_model->get_mainSliderImages_by_id($id);
						$data['duplicat_mesg'] = "error";
						$data["content"] = "admin/addfrontSliderView";
						$this->load->view('admin/template/template', $data);		
				}
			}			
		
		
		}
	
	}
	
	public function showMainSliderImages()
    { 
		$data['showMainSliderImages'] = $this->frontendmanagement_model->showMainSliderImages();
		$data["content"] = "admin/mainSliderView";
		$this->load->view('admin/template/template', $data);	

    }
	 public function deleteMainSliderImages($ID)
    {	
        $id = $this->uri->segment(4);
		$this->frontendmanagement_model->deleteMainSliderImages($id);
		redirect(base_url().'admin/showMainSliderImages');
    }
	

   

}