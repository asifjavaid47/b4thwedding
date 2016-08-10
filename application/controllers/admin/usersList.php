<?php
class UsersList extends CI_Controller {

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
        $this->load->model('admin/users_list_model');
		if($this->session->userdata('is_logged_in'))
		{
			
        }
		else
		{
        	$this->load->view('admin/login');	
        }
    }
 
    public function show_user_list()
	{
		$data['showUserList'] = $this->users_list_model->show_user_list();
		$data["content"] = "admin/usersListView";
		$this->load->view('admin/template/template', $data);	
	
	}
    public function getProjectOfUser($userID)
	{
		$data['getProjectOfUser'] = $this->users_list_model->getProjectOfUser($userID);
		$data["content"] = "admin/usersProjectListView";
		$this->load->view('admin/template/template', $data);	
	
	}
    public function getBidsProjectOfUser($userID)
	{
		$data['getBidsProjectOfUser'] = $this->users_list_model->getBidsProjectOfUser($userID);
		$data["content"] = "admin/usersBidsProjectListView";
		$this->load->view('admin/template/template', $data);	
	
	}
    public function delete_user(){
        
        $id = $this->uri->segment(4);
        $this->users_list_model->delete_user($id);
			$this->session->set_flashdata('msg', 'Delete user');
        redirect(base_url().'admin/show_user_list');
       
    }
    public function active(){
        
        $id = $this->uri->segment(4);
        $this->users_list_model->active($id);
		$this->session->set_flashdata('msg', 'active user');
        redirect(base_url().'admin/show_user_list');
       
    }
    public function inactive(){
        
        $id = $this->uri->segment(4);
        $this->users_list_model->inactive($id);
		$this->session->set_flashdata('msg', 'inactive user');
        redirect(base_url().'admin/show_user_list');
       
    }
    
	
	

}