<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Propsal extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('propsal_model');
		$this->load->model('setting_model');
       /* if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }*/
    }

function postbids($ID,$freelancerID="") {
	
	$data['setting'] 		= $this->setting_model->getSetting('commsion');
	$user_id =$this->session->userdata('userID');
	
	$user_id_of_project = $this->propsal_model->get_project_by_user_id($ID);

	 if($user_id==$user_id_of_project)
	 {
		 redirect(base_url() . 'project/detail_project/'.$ID.'');
	 
	 }
	 else
	 {
		$mesg = $this->propsal_model->awardUser($ID);
	
		if($mesg)
		{
			$data['awarded'] = "awarded";
		}
			$data["ID"] = $ID;
			$data['propsalprojact'] = $this->propsal_model->get_projectDetail($ID);
			$data['userAlreadyPropsal'] = $this->propsal_model->checkuserAlreadyPropsal($ID);
			$describeYourSelf    	= $this->input->post('describeYourSelf');
			if($describeYourSelf!='' && $data['userAlreadyPropsal'] =='no')
				{
					
					$user_id =$this->session->userdata('userID');
					$datasave = array(
					'describeYourSelf' 		=> $this->input->post('describeYourSelf'),
					'outlineApproch' 		=> $this->input->post('outlineApproch'),	
					'projectId' 			=> $ID,			
					'userId' 				=> $user_id,
					'myEarning' 			=> $this->input->post('myEarning'),
					'billedToClient' 		=> $this->input->post('billedToClient'),	
					'estimateDilieveryDate' => $this->input->post('estimateDilieveryDate'),
					'submitDate' 			=> date("Y-m-d H:i:s"),
									
					);
					
					$lastInsertID 			= $this->propsal_model->addPropsal($datasave);
					if($lastInsertID >0 )
					{
						if ($_FILES['fileAttachement']['name']!='')
						{
							 $this->uploadAttachment($lastInsertID);
						}
							
					}
					$data['userAlreadyPropsal'] = $this->propsal_model->checkuserAlreadyPropsal($ID);
					$data['propsals'] 		= $this->propsal_model->get_propsals($ID);
					$data['success'] 		= 'Your Proposal was Added Successfully!';
					$data["content"] 		= "propsals/propsal_view";
					$this->load->view('template/template', $data);	
					
					
				}else
				{
					$data['propsals'] 		= $this->propsal_model->get_propsals($ID);
					
					$data["content"] = "propsals/propsal_view";
					$this->load->view('template/template', $data);	
				}
	}
}
function updateView($ID)
{
			$data['setting'] 		= $this->setting_model->getSetting('commsion');
			$data["ID"] = $ID;
			$data['propsalprojact'] 	= $this->propsal_model->get_projectDetail($ID);
			$data['userAlreadyPropsal'] = $this->propsal_model->checkuserAlreadyPropsal($ID);
			$data['propsals'] 			= $this->propsal_model->get_propsals($ID);
			$data['edit']				=	'yes';
			$data["content"] 			= "propsals/propsal_view";
			$this->load->view('template/template', $data);	
	
}
function editPropsal($ID) {
			$data['setting'] 		= $this->setting_model->getSetting('commsion');
			$propsalID = $this->input->post('propsalID');
			$data["ID"] = $ID;
			$describeYourSelf    	= $this->input->post('describeYourSelf');
			
			if($describeYourSelf!='')
				{
					$user_id =$this->session->userdata('userID');
					$datasave = array(
					'describeYourSelf' 		=> $this->input->post('describeYourSelf'),
					'outlineApproch' 		=> $this->input->post('outlineApproch'),
					'projectId' 			=> $ID,			
					'myEarning' 			=> $this->input->post('myEarning'),
					'billedToClient' 		=> $this->input->post('billedToClient'),	
					'estimateDilieveryDate' => $this->input->post('estimateDilieveryDate'),
					'upDate' 				=> date("Y-m-d H:i:s"),
									
					);
					$this->propsal_model->editPropsal($datasave, array("ID = " => $propsalID));
					if($ID >0 )
					{
						if ($_FILES['fileAttachement']['name'])
						{
							
							 $this->uploadAttachment($propsalID);
							 
						}
							
					}
					$data['success'] 			= 'Your Proposal was Updated Successfully!';
				}
					$data['propsalprojact'] 	= $this->propsal_model->get_projectDetail($ID);
					$data['userAlreadyPropsal'] = $this->propsal_model->checkuserAlreadyPropsal($ID);
					$data['propsals'] 			= $this->propsal_model->get_propsals($ID);
					
					$data["content"] 			= "propsals/propsal_view";
					$this->load->view('template/template', $data);	
}

function uploadAttachment($lastInsertID) {

        $config['upload_path']   = "public/upload/propsal_upload/";
	     $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp|doc|docx|xls|txt";

        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("fileAttachement")) {

            echo $this->upload->display_errors();
        } else {

            $finfo = $this->upload->data("fileAttachement");

            $this->propsal_model->add_propsal_attachment($finfo['file_name'], $lastInsertID);
        }
    }
function deleteAttachFile() {
			$ID 			= $this->input->post('ID');
			$filpath 			= $this->input->post('filpath');
				$unlinkUrl ="public/upload/propsal_upload/".$filpath;
				if(file_exists($unlinkUrl)){
					unlink($unlinkUrl);
					$this->propsal_model->deletePropsaltFile('', $ID);
					echo 'yes';
				}
				else{
					echo $unlinkUrl." is not available";  
					 
				}
        
    }



}
?>