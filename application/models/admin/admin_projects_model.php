<?php
class Admin_projects_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

   

 /**
    * show category
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function show_projects()
    {	
	//$this->db->where('delete', ' ');
	$this->db->select('*');
	$query = $this->db->get('tbl_project_posts');
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return false;
		 }
	}
	
	
	function show_history($id)
	{	
		$query = "SELECT
					tbl_project_posts.title as projectTitle,
					tbl_project_posts.description as projectDescription,					
					tbl_project_posts.hourlyRate as projectRate,
					tbl_project_posts.fixedBudget as projectBudget,
					tbl_project_posts.hrsPerWeeks as projectHours,
					tbl_project_posts.duration as projectDuration,					               
                                       
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeEscrow as disputeRefund,
					tbl_wr_cancelrefnddsputeproject.cancelReqBy as disputeReqBy,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeFreelancer as disputeFreelancer,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeReasion as disputeReason,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeDate as disputeDate,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeDescribe as disputeDescribe,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeStatus as disputeStatus,
					tbl_wr_cancelrefnddsputeproject.disputeByAdmin as disputeByAdmin,
					tbl_wr_cancelrefnddsputeproject.doneDisputeTo as disputeTo,
                    
					tbl_project_posts.ID,
					tbl_project_posts.userID as client
					FROM
					tbl_project_posts                   
                    LEFT JOIN tbl_wr_cancelrefnddsputeproject ON tbl_project_posts.ID = tbl_wr_cancelrefnddsputeproject.projectID					
					WHERE
					tbl_project_posts.ID = '".$id."'
					";
		$res = $this->db->query($query);
		 if($res->num_rows > 0)
		 {
			 	$rows = $res->result_array();
						   				$data = array(
												"projectTitle"            => $rows[0]['projectTitle'],
												"projectDescription"      => $rows[0]['projectDescription'],	
												"projectRate"             => $rows[0]['projectRate'],
												"projectBudget"           => $rows[0]['projectBudget'],
												"projectHours"            => $rows[0]['projectHours'],
												"projectDuration"         => $rows[0]['projectDuration'],
												"disputeRefund"           => $rows[0]['disputeRefund'],
												"disputeReqBy"   	      => $rows[0]['disputeReqBy'],
												"disputeFreelancer"   	  => $rows[0]['disputeFreelancer'],
												"disputeReason"           => $rows[0]['disputeReason'],
												"disputeDate"             => $rows[0]['disputeDate'],
												"disputeDescribe"         => $rows[0]['disputeDescribe'],
												"disputeStatus"           => $rows[0]['disputeStatus'],
												"disputeByAdmin"          => $rows[0]['disputeByAdmin'],
												"disputeTo"               => $rows[0]['disputeTo'],
												"client"                  => $rows[0]['client'],
												"ID"                      => $rows[0]['ID'],
												"messages"                => $this->project_messages($rows[0]['ID']),
												"notification"            => $this->project_notifications($rows[0]['ID']),
												"proposal"                => $this->project_proposal($rows[0]['ID']),
												"milestone"               => $this->project_milestone($rows[0]['ID']),
												"files"                   => $this->project_files($rows[0]['ID']),
												"feedback"                => $this->project_feedback($rows[0]['ID'])
																														
											); 				                
										 
										$jobdata[] = $data; 
								
					
					return $jobdata;
		 }
		 else
		 {
			return false;
		 }
	}
	function project_messages($id){
		$where = array(
            'projectID = ' => $id
        );
		$this->db->select('tbl_messages.message as messageText, tbl_messages.sendDate as messageDate');
		$this->db->from('tbl_messages');
		$this->db->where($where);
		$query = $this->db->get();
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return array();
		 }
	}
	function project_notifications($id){
		$where = array(
            'projectID = ' => $id
        );
		$this->db->select('tbl_notification.message as notificationText, tbl_notification.sendDate as notificationDate');
		$this->db->from('tbl_notification');
		$this->db->where($where);
		$query = $this->db->get();
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return array();
		 }
	}
	function project_proposal($id){
		$where = array(
            'projectId = ' => $id
        );
		$this->db->select('tbl_proposal.userId as freelancer, tbl_proposal.billedToClient');
		$this->db->from('tbl_proposal');
		$this->db->where($where);
		$query = $this->db->get();
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return array();
		 }
	}
	function project_milestone($id){
		$where = array(
            'projectID = ' => $id
        );
		$this->db->select('tbl_wr_projects_milestone.milestoneDetail as milestoneDetail,
						   tbl_wr_projects_milestone.milestoneNotes as milestoneNotes,
                           tbl_wr_projects_milestone.milestoneDeliveryDate as milestoneDeliveryDate,
					       tbl_wr_projects_milestone.milestonecreateDate as milestonecreateDate,                    
					       tbl_wr_projects_milestone.milestoneupdateDate as milestoneupdateDate,
					       tbl_wr_projects_milestone.milestoneAmount as milestoneAmount,
					       tbl_wr_projects_milestone.releaseAmount as milestoneReleaseAmount');
		$this->db->from('tbl_wr_projects_milestone');
		$this->db->where($where);
		$query = $this->db->get();
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return array();
		 }
	}
	function project_files($id){
		$where = array(
            'projectID = ' => $id
        );
		$this->db->select(' tbl_wr_uploading_files.wrUploadFileTitle as uploadFileText,
							tbl_wr_uploading_files.wrUploadFileDescription as uploadFileDescription,
                    		tbl_wr_uploading_files.date as uploadFileDate');
		$this->db->from('tbl_wr_uploading_files');
		$this->db->where($where);
		$query = $this->db->get();
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return array();
		 }
	}
	function project_feedback($id){
		$where = array(
            'projectID = ' => $id
        );
		$this->db->select(' tbl_feedback.rating as feedbackRating,                    
							tbl_feedback.quality as feedbackQuality,
							tbl_feedback.expertise as feedbackExpertise,
							tbl_feedback.cost as feedbackCost,
							tbl_feedback.schedule as feedbackSchedule,
							tbl_feedback.comments as feedbackComments');
		$this->db->from('tbl_feedback');
		$this->db->where($where);
		$query = $this->db->get();
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return array();
		 }
	}

    /**
    * Delete category
    * @param int $id - category id
    * @return boolean
    */
	function delete_projects($id){
		
		// $this->db->where('ID', $id);
		// $this->db->delete('tbl_project_posts'); 
		$this->db->delete('tbl_project_posts', array('ID' => $id));
		$this->db->delete('tbl_proposal', array('projectId' => $id));
	}
 
}
?>