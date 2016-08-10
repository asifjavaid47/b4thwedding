<?php
class Admin_projects extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'admin/categories';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_projects_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect(base_url().'admin');
        }
		else
			$this->load->helper('date');
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
	
	public function show_projects()
	{
		$data['show_projects'] = $this->admin_projects_model->show_projects();
		$data["content"] = "admin/projectsListView";
		$this->load->view('admin/template/template', $data);	
	
	}
	
	public function show_history(){
        $id = $this->uri->segment(4);
		$data['project_history'] = $this->admin_projects_model->show_history($id);
		/*echo '<pre>';
		print_r($data['project_history']);
		echo '</pre>';
		exit;*/
		$data["content"] = "admin/project_history_view";
		$this->load->view('admin/template/template', $data);
	}
		
	
   /**
    * Delete cat by his id
    * @return void
    */
    public function delete_projects($ID)
    {	
        $id = $this->uri->segment(4);
       $this->admin_projects_model->delete_projects($id);
       redirect(base_url().'admin/show_projects');
    }
	
    /**
    * Update item by his id
    * @return void
    */
    public function update()
    {
        //product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('cName', 'Category Name', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
			$datestring = "%Y-%m-%d";
			$time = time();
			$date = mdate($datestring, $time); 
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
                    'cName' => $this->input->post('cName'),
					'updateDate' => $date,
                );
                //if the insert has returned true then we show the flash message
                if($this->categories_model->update_category($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect(base_url().'admin/categories/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['categories'] = $this->categories_model->get_category_by_id($id);
        //load the view
        $data['main_content'] = 'admin/categories/edit';
        $this->load->view('includes/template_changed', $data);            

    }//update

    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //category id 
        $id = $this->uri->segment(4);
        $this->categories_model->delete_category($id);
        redirect(base_url().'admin/categories');
    }//edit

}