<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Project extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('projects_model');
		$this->load->model('notification_model');
        /*if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }*/
    }
public function postProject()
	 {
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
			// $skills = $this->input->post('skills');
	 
			// print_r($skills);
			// exit();
                $data['getAllSkills'] = $this->projects_model->getAllSkills();
                $data['getAllStates'] = $this->projects_model->getAllStates();
		$data['categorylist'] = $this->projects_model->getCategories();
		$data['skillList'] = $this->projects_model->getSkill();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			 
			$data["content"] = "projects/project_view";
			$this->load->view('template/template', $data);	
		}
		
		else
		{			
			
			$data['lastInsertID']=$this->projects_model->addProject();
			if($data['lastInsertID'] >0 )
			{
				if ($_FILES['fileAttachement']['name']) {
                    $this->uploadAttachment($data['lastInsertID']);
                }
			 	/*$data['success'] = 'Your Project Upload Successfully';  
				$data["content"] = "projects/project_view";
				$this->load->view('template/template', $data);*/
				$this->session->set_flashdata('success', 'Your Project was Added Successfully!');
				redirect(base_url().'project/my_jobs_c/');		
			}
			else
			{
				$data["content"] = "projects/project_view";
				$this->load->view('template/template', $data);		
			}
		}
    }
	
function all_project($catID='',$options='') {

			$data['allProjectList']=$this->projects_model->allProject($catID,$options);
			$data['categories'] = $this->projects_model->getCategories();
             $data['id'] = $catID;
			$data["content"] = "projects/all_projects_view";
			
			$this->load->view('template/template', $data);	
}
	

function my_jobs_c() {
			
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
        $filter = $this->input->post('filter');
            if($filter == 'proposals'){
                
                $data['propsals'] = $this->projects_model->get_propsalsByuser();

                $data['jobInboxList'] = array();
            } else if($filter == 'projects'){
                
                $data['propsals'] = array();

                $data['jobInboxList'] = $this->projects_model->my_jobs_c();
            } else {
                
                $data['propsals'] = $this->projects_model->get_propsalsByuser();

                $data['jobInboxList']=$this->projects_model->my_jobs_c();
            }
                        
                        $data['array_merge'] = array_merge($data['jobInboxList'] , $data['propsals']);
                        
                        $submit_date = array();
                        foreach ($data['array_merge'] as $key => $row){
                            $submit_date[$key] = $row['submitDate'];
                        }
                        array_multisort($submit_date, SORT_DESC, $data['array_merge']);
            
//                        echo "<pre>";print_r($data['array_merge']); echo "</pre>"; exit;
                        $data['filter'] = $filter;
			$data["content"] = "projects/my_jobs_view";
			
			$this->load->view('template/template', $data);	
}
function archivesJob() {
			
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
			$data['propsals'] 		= $this->projects_model->get_propsalsByuser('archive');
			//print_r($data['propsals']); exit;
			$data['jobInboxList']=$this->projects_model->my_jobs_c('archive');
			$data["content"] = "projects/archivesJob_view";
			
			$this->load->view('template/template', $data);	
}
function update_project($ID) {

        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
			if($this->input->post('title') != ''){
				
			$workType	=	$this->input->post('workType');
			if($workType=="hourly")
			{
				$fixedBudget	=	'';
				$hourlyRate		=	$this->input->post('hourlyRate');
				$hrsPerWeeks 	= 	$this->input->post('hrsPerWeeks');	
				$duration 		= 	$this->input->post('duration');	
			}else
			{
				$fixedBudget	=	$this->input->post('fixedBudget');	
				$hourlyRate		=	'';
				$hrsPerWeeks	=	'';	
				$duration		=	'';
			}
				
				// $data = array(
				// 'title' 			=> $this->input->post('title'),
				// 'description' 		=> $this->input->post('description'),
				// 'mainCategoryId' 	=> $this->input->post('mainCategoryId'),			
				// 'skills' 			=> $this->input->post('skills'),			
				// 'workType' 			=> $this->input->post('workType'),
				// 'hourlyRate' 		=> $hourlyRate,
				// 'hrsPerWeeks' 		=> $hrsPerWeeks,
				// 'fixedBudget' 		=> $fixedBudget,	
				// 'duration' 			=> $duration,
				// 'cancelProject'   	=> '0',
				// 'finishProject'  	=> '0'
								
				// );
				
					$this->projects_model->editProject($hourlyRate,$hrsPerWeeks,$fixedBudget,$duration, array("ID = " => $ID));	
					if (@$_FILES['fileAttachement']['name'])
					{
						$this->uploadAttachment($ID);
					}
					$data['categorylist'] = $this->projects_model->getCategories();
					$data['skillList'] = $this->projects_model->getSkill();
					$data['ID']      = $ID;
					$data['project']   = $this->projects_model->getProject($ID);
					
					$data['success'] = 'Your Project was Updated Successfully!';  
					$data["content"] = "projects/update_project_view";
					$this->load->view('template/template', $data);				
				
			}else{
					$data['categorylist'] = $this->projects_model->getCategories();
					$data['skillList'] = $this->projects_model->getSkill();
					$data['ID']      = $ID;
					$data['project']   = $this->projects_model->getProject($ID);
					$data["content"] = "projects/update_project_view";
					$this->load->view('template/template', $data);	
				}
	}
function uploadAttachment($lastInsertID) {

        $config['upload_path']   = "public/upload/project_uploads/";
	    $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp|doc|docx|xls|txt";

        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("fileAttachement")) {

            echo $this->upload->display_errors();
        } else {

            $finfo = $this->upload->data("fileAttachement");
            $this->projects_model->add_project_attachment($finfo['file_name'], $lastInsertID);
        }
    }

function deleteAttachFile() {

        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
                        $ID 			= $this->input->post('ID');
			$data = $this->projects_model->getProject($ID);
			$attachFiles = $data[0]['attachFiles'];
			
				$unlinkUrl ="public/upload/project_uploads/".$attachFiles;
				if(file_exists($unlinkUrl)){
					unlink($unlinkUrl);
					$this->projects_model->deleteProjectFile('', $ID);
					echo 'yes';
				}
				else{
					echo $unlinkUrl." is not available";  
					 
				}
        
    }
function myTotalEarning() {

        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
		
			$data['myTotalEarning']   	= $this->projects_model->myTotalEarning();
			 
			$data["content"] 	= "projects/detailproject_view";
			$this->load->view('template/template', $data);	
			
	}
function detail_project($ID,$notificationID='') {

			$data['ID']      	= $ID;
			if($notificationID!='')
			{
			$this->notification_model->updateNotification($notificationID);
			}
			$data['project']   	= $this->projects_model->get_project_detail($ID);
			$data['propsal'] 	= $this->projects_model->getPropsal($ID);
			$data['success'] 	= 'Your Project Update Successfully';
			 
			$data["content"] 	= "projects/detailproject_view";
			$this->load->view('template/template', $data);	
			
	}
function getskillAjax() {

			$maincatID    		= $this->input->post('ID');
			$skill   			= $this->projects_model->getskillAjax($maincatID);
			$skilldata = '';
			foreach($skill as $skillist)
			{
				$skilldata.='<option value='.$skillist['ID'].'>'.$skillist['skillName'].'</option>';
			}
			echo $skilldata;
			
			
}

	function show_projects_cat_wise($ID) {
						
						$data['show_projects_cat_wise']	= $this->projects_model->show_projects_cat_wise($ID); 
						$data["content"] = "projects/show_projects_cat_wise_view";
						$this->load->view('template/template', $data);				
				
	}
	function awarded($project_id , $user_id) 
	{
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
			$awarded = $this->projects_model->awarded($project_id , $user_id); 
			if(!$awarded)
			{
				// $data1["already"] = "<h2>Already Awarded</h2>";
				// $this->detail_project($project_id , $data);
				 redirect(base_url() . 'project/detail_project/'.$project_id.'?already=true');
			}
			else 
			{
				// $data1["awarded_success"] = "<h2>Awarded Successful</h2>";
				// $data["awarded_success"] = "<h2>Awarded Successful</h2>";
				// $this->detail_project($project_id , $data);
				redirect(base_url() . 'project/detail_project/'.$project_id.'?awarded_success=true');

			}
				
	}
	
	
	function cancel_project($project_id) 
	{
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
        $user_id = $this->session->userdata('userID');
        if($this->projects_model->cancel_project($project_id)){
            $notify_users = $this->projects_model->get_proposal_users($project_id);
            if(!empty($notify_users)){
//                print_r($notify_users); exit;
                foreach($notify_users as $notify){
                    $datanotification = array(
                    'projectID' 	=> $project_id,
                    'senderID' 		=> $user_id,
                    'receiverID' 	=> $notify['userId'],
                    'msgTypes' 		=> 'cancelProject',
                    'message' 		=> 'Client cancelled project on which you post bid.',
                    'sendDate'		=>	date("Y-m-d H:i:s")
                    );
                    $this->db->insert('tbl_notification', $datanotification);
                }
            }
            $this->session->set_flashdata('success', 'Project Cancelled Successfully!'); 
            redirect(base_url() . 'project/detail_project/'.$project_id);
        } else {
            $this->session->set_flashdata('warning', 'Project Not Cancelled! Try Again Shortly'); 
            redirect(base_url() . 'project/detail_project/'.$project_id);
        }
	
	}
	
	function clientFinishProject($project_id) 
	{
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
			$this->projects_model->clientFinishProject($project_id); 
			redirect(base_url() . 'project/detail_project/'.$project_id);
	
	}
	
	function freelancerFinishProject($project_id) 
	{
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
			$this->projects_model->freelancerFinishProject($project_id); 
			redirect(base_url() . 'project/detail_project/'.$project_id);
	
	}
	
	function saveNotes() 
	{
			
			$notes		=	$this->input->post('notes');
			$project_id	=	$this->input->post('project_id');
						
			$status = $this->projects_model->saveNotes($project_id,$notes); 
			if($status){
				echo 'saved';
			}else{
				echo 'not saved';
			}
			
	
	}
	
	function sendJobToArchive($ID) 
	{
		$this->projects_model->sendJobToArchive($ID);
		$this->session->set_flashdata('success', 'Project Send To Archieve Successfully!'); 
		redirect(base_url().'project/my_jobs_c');
	
	}
	
		function sendPropsalToArchive($propsalID) 
	{
		$this->projects_model->sendPropsalToArchive($propsalID);
		$this->session->set_flashdata('success', 'Propsal Send To Archieve Successfully!'); 
		redirect(base_url().'project/my_jobs_c');
	
	}
	
	
function approveAward($projectID,$userID) 
	{
		$this->projects_model->approveAward($projectID,$userID);
		$this->session->set_flashdata('success', 'Project Successfully award You'); 
		redirect(base_url().'project/my_jobs_c');
	
	}
function rejectAward($projectID,$userID) 
	{
		$this->projects_model->rejectAward($projectID,$userID);
		$this->session->set_flashdata('success', 'Reject Award Successfully'); 
		redirect(base_url().'project/my_jobs_c');
	
	}
function cancelAward($project_id , $user_id) 
	{
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
			$awarded = $this->projects_model->cancelAward($project_id , $user_id); 
			$this->session->set_flashdata('success', 'Award Successfully Cancel'); 
			redirect(base_url().'project/my_jobs_c');
	
	}
	


}
?>