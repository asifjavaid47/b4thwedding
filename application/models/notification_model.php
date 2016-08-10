<?php
class Notification_model extends CI_Model {

public function getNotification($filter)
{   

		$userID =$this->session->userdata('userID');
		$where = array(

            'tbl_notification.receiverID = ' => $userID
        );
		$where2 = array(

            'tbl_notification.msgTypes = ' => $filter
        );

	$this->db->select('tbl_notification.*,tbl_users.userName,tbl_project_posts.title');
	$this->db->from('tbl_notification'); 
	$this->db->join('tbl_project_posts', ' tbl_project_posts.ID=tbl_notification.projectID');
	$this->db->join('tbl_users', ' tbl_users.ID=tbl_notification.senderID','LEFT');
	$this->db->where($where);
	if($filter!='')
	{
		if($filter=='propsal')
		{
			$this->db->where("(tbl_notification.msgTypes='propsal' OR tbl_notification.msgTypes='addproject')", NULL, FALSE);
		}else
		{
		$this->db->where($where2);
		}
	}
	$this->db->order_by('notificationID','DESC');
	$this->db->order_by('readStatus','ASC');
	$query = $this->db->get();
	return $query->result();
	
}
public function delete_notification($id) {
	
	
	$where = array(
				'notificationID' 			=> $id
				
			);
		
		
			$this->db->where($where);
   			$this->db->delete('tbl_notification'); 
	
			return true;
		
	}
	
	
public function getUnreadNotification()
	{  
	
	$userID =$this->session->userdata('userID'); 
	$where = array(

            'tbl_notification.receiverID = ' => $userID,
			'tbl_notification.readStatus = ' => '0'
        ); 
	
	$this->db->select('tbl_notification.*');
	$this->db->from('tbl_notification'); 
	$this->db->where($where);
	$query = $this->db->get();
	return $query->num_rows();
	
	}
	
	
	public function updateNotification($notificationID)
	{  
	
			$this->db->where(array("notificationID" => $notificationID));
			$this->db->set('readStatus', '1');
            $this->db->update('tbl_notification');
	
	}

	
}
	
