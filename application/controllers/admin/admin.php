<?php

class Admin extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{
		
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('admin/admin_model');
			$this->load->model('admin/withdraw_model');
			$data['showWithdraw'] = $this->withdraw_model->showWithdraw();
			$data["totalUsers"] = $this->Admin_model->totalUsers();
			$data["totalProject"] = $this->Admin_model->totalProject();
			$data["totalMessage"] = $this->Admin_model->totalMessage();
			$data["totalCancelDispute"] = $this->Admin_model->totalCancelDispute();
			$data["content"] = "admin/dashboard";
			$this->load->view('admin/template/template', $data);
        }
		else
		{
        	$this->load->view('admin/login');	
        }
	}
	// function dashboard()
	// {
			// if($this->session->userdata('is_logged_in'))
		// {
			// $data["content"] = "admin/dashboard";
			// $this->load->view('admin/template/template', $data);
        // }
		// else
		// {
        	// $this->load->view('admin/login');	
        // }
			
	// }
	

    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

    /**
    * check the username and the password with the database
    * @return void
    */
	function validate_credentials()
	{	

		$this->load->model('admin/admin_model');

		$user_name = $this->input->post('user_name');
		$password = $this->__encrip_password($this->input->post('password'));

		$admininfo = $this->admin_model->validate($user_name, $password);
		
		if($admininfo!='no')
		{
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true,
				'adminID'		=> $admininfo[0]['id'],
				'adminType'		=> $admininfo[0]['adminType'],
				
			);
			$this->session->set_userdata($data);
			$data["content"] = "admin/dashboard";
			$this->load->view('admin/template/template', $data);
		}
		else // incorrect username or password
		{
			$data['message_error'] = TRUE;
			$this->load->view('admin/login', $data);	
		}
	}	

    /**
    * The method just loads the signup view
    * @return void
    */

	
	function signup()
	{
		$this->load->view('admin/signup_form');	
	}
	

    /**
    * Create new user and store it in the database
    * @return void
    */	
	function addSubAdmin()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('user_name','user_name','trim|required|callback_isUserExist');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data["content"] = "admin/addSubAdmin_view";
			$this->load->view('admin/template/template', $data);	
			
		}
		
		else
		{			
			$this->load->model('admin/admin_model');
			$this->admin_model->addSubAdmin();
			redirect(base_url().'admin/showAdminList');
		}
		
	}
	
	
function updateSubAdmin($id)
	{
		$this->load->model('admin/admin_model');
		$data['adminInfo'] 		= $this->admin_model->getAdmIninfo($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['id']	= $id;
			$data["content"] = "admin/updateSubAdmin_view";
			$this->load->view('admin/template/template', $data);	
			
		}
		
		else
		{			
			$this->load->model('admin/admin_model');
			$this->admin_model->updateSubAdmin($id);
			redirect(base_url().'admin/showAdminList');
		}
		
	}
	

	
	/**
    * Destroy the session, and logout the user.
    * @return void
    */		
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'admin');
	}
	
	
	 public function showAdminList()
	{
		
			$this->load->model('admin/admin_model');
		$data['showUserList'] = $this->admin_model->showAdminList();
		$data["content"] = "admin/subAdminList_view";
		$this->load->view('admin/template/template', $data);	
	
	}
	
	  public function delete_sub_admin(){
			$this->load->model('admin/admin_model');
        $id = $this->uri->segment(4);
        $this->admin_model->delete_sub_admin($id);
			$this->session->set_flashdata('msg', 'Delete user');
        redirect(base_url().'admin/showAdminList');
       
    }
	
	
	function isUserExist($str)
		{
			$this->load->model('admin/admin_model');
		if ($this->admin_model->checkUsername($str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('isUserExist', 'The username %s already exist');            
			return false;
		}
	}
	
}