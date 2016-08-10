<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('search_model');
        $this->load->model('projects_model');
        
    }
	public function searching($catID='')
	{
			$search = $this->input->post('search');
			$searh_types = $this->input->post('searh_types');
			// print_r($search."/".$searh_types);
			// exit;
			// if($searh_types == 'jobs')
			// {
				// $data['allProjectList'] = $this->search_model->jobsSearch($search);
				// $data['jobsSearch'] = $this->search_model->jobsSearch($search);
				// $data["content"] = "search/jobsSearchView";			
				// $this->load->view('template/template', $data);	
				
			// }
			// else
			// {
				$data['selected'] = 'selected';
				$data['categories'] = $this->projects_model->getCategories();
				$data['allProjectList'] = $this->search_model->freelancersSearch($search,$catID);
				$data["content"] = "search/freelancersSearchView";			
				$this->load->view('template/template', $data);	
				
			// }
			
			
    }


}
?>