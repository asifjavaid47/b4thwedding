<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Feedback extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('feedback_model');
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
    }

	
function addFeedback($pid='',$uid=''){
				
				//$projectID	= 	$this->uri->segment(3);
			if($this->input->post('message')!='')
			{
				$user_id =$this->session->userdata('userID');
				$data['projectID'] 		=	$this->input->post('projectID');
				$data['receiverID'] 	=	$this->input->post('receiverID');
				$quality				=	$this->input->post('quality');
				$expertise				=	$this->input->post('expertise');
				$cost					=	$this->input->post('cost');
				$schedule				=	$this->input->post('schedule');
				$response				=	$this->input->post('response');
				$professional			=	$this->input->post('professional');
				
				$rating2				=	$quality+$expertise+$cost+$schedule+$response+$professional;
				$rating3				=	$rating2/6;
				$rating					=	round($rating3,1);
				$data = array(
					'projectID' 	=> $this->input->post('projectID'),
					'senderID' 		=> $user_id,			
					'receiverID' 	=> $this->input->post('receiverID'),
					'rating' 		=> $rating,
					'quality' 		=> $quality,
					'expertise' 	=> $expertise,
					'cost' 			=> $cost,
					'schedule' 		=> $schedule,
					'response' 		=> $response,
					'professional' 	=> $professional,
					'status' 		=> 'pending',
					'comments' 		=> $this->input->post('message'),
					'sendDate'		=> date("Y-m-d H:i:s")			
				);
				if($this->feedback_model->addFeedback($data['projectID'],$data['receiverID'],$data))
				{
					$data['success'] 		=	"Feedback successfully recorded.";
				}else
				{
					$data['error'] 		=	"You Already Send Feed Back";
				}
				$data["getawardedUserId"] 	= 	$this->feedback_model->getawardedUserId($data['projectID']);
				$data["feedbackList"] 		= $this->feedback_model->getFeedback($data['projectID']);
				$data["ratingList"] 		= $this->feedback_model->getRatingByProjet($data['projectID']);
				$data["content"] 	  = "feedback/feedback_view";			
				$this->load->view('template/template', $data);	
				
			}else
			{
			
			$data['projectID'] 		= 	$this->uri->segment(3);
			if($this->uri->segment(4)=="") {
				$data['receiverID'] 	= 	$this->feedback_model->getawardedUserId($data['projectID']);
			}
			else {
			$data['receiverID'] 	= 	$this->uri->segment(4);
			}
			
			$data["ratingList"] 	= $this->feedback_model->getRatingByProjet($data['projectID']);
			$data["feedbackList"] 	= 	$this->feedback_model->getFeedback($data['projectID']);
			$data["content"] 		= 	"feedback/feedback_view";			
			$this->load->view('template/template', $data);	
			}
}
function completeJob($projectID,$receiverID)
{
	$this->feedback_model->completeJob($projectID,$receiverID);
	redirect(base_url().'feedback/addFeedback/'.$projectID.'/'.$receiverID.'');
}
function userRating($pid='',$uid=''){
	$data["content"] 	  = "feedback/user_feedback_view";			
	$this->load->view('template/template', $data);
}


}
?>