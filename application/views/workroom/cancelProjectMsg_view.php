  <div id="wrap">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Cancel or Dispute</div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
          <div class="inbox_left" style="margin-top:0px;">
                <ul>
                    <li class="active"><a href="">
                    <span class="inbox_icon" style="background:#fff;"> &nbsp; </span>All Type</a>
                    </li>
                    
                    <li class="active">
                    <a href="<?=base_url()?>workRoom/message/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#0A9AD1;"> &nbsp; </span>
                    	<span>Messages</span></a>
                    </li>
                    <li><a href="<?=base_url()?>projectPayment/projectPaymentView/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#89D110;"> &nbsp; </span><span>Payments</span></a></li>
                    <li>
                    <a href="<?=base_url()?>workRoom/uploadsFilesList/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#FF9615;"> &nbsp; </span>
                    	<span>Files</span></a>
                    </li>
                    <!--<li><a href="#"><span class="inbox_icon" style="background:#8C2100;"> &nbsp; </span><span>Terms</span></a></li>-->
                    <li><a href="<?=base_url()?>workRoom/cancelProjectStepOne/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#F5DE00;"> 
                    &nbsp; </span><span>Dispute,Cancel or Refund</span></a></li>
                    <li><a href="<?=base_url()?>milestone/detail/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#2A3640;"> &nbsp; </span><span>Terms & Milestones</span></a>
                    </li>
                    
                </ul>
            </div>
   
	  <?php 
		if(!empty($getProject))
		{
			$ID = $getProject[0]['ID'];
			$title = $getProject[0]['title'];
			$description = $getProject[0]['description'];
			$postDate = date('m-d-Y:H-i-s',strtotime($getProject[0]['postDate']));
			$duration = $getProject[0]['duration'];
			$hourlyRate = $getProject[0]['hourlyRate'];
			$hrsPerWeeks = $getProject[0]['hrsPerWeeks'];
			$attachFiles = $getProject[0]['attachFiles'];
			$skills = $getProject[0]['skills'];
			$workType = $getProject[0]['workType'];
			$fixedBudget = $getProject[0]['fixedBudget'];
			$mainCategoryId = $getProject[0]['mainCategoryId'];
			
		?>
		
		<div><h3><?php echo'<b>Title</b> <br />  ' .$title; ?></h3></div>
		<div><p><?php echo'<b>Description </b><br />  '. $description; ?></p></div>
		<div><?php echo '<b>PostDate</b>   '. $postDate; ?></div>
		<div><?php echo '<b>Duration</b>   '. $duration; ?></div>
		<div><?php echo '<b>Hourly Rate</b>   '. $hourlyRate; ?></div>
		<div><?php echo'<b>Hours Per Weeks</b>   '.   $hrsPerWeeks; ?></div>
		<div><?php echo '<b>Fixed Budget</b>   '.  $fixedBudget; ?></div>
		
			<?php 
		}
		
		?>
		
				   <?php 
				   
				   $senderID =$this->session->userdata('userID');
			   
				   	if(!empty($check))
					{
				   // print_r($check);
		if($check != $senderID)
		{
		
		
		?>
			
		 

	
		<?php
		}
		  else {
	  
	  }
		}
	  else {
	  
	  }
	  ?>
		 <!-- <h1>approval 1Status</h1>
		   <form method="POST" action="<?php echo base_url(); ?>workRoom/cancelProjectApproval/<?=$projectID?>/<?=$receiverID?>">
				<input type="hidden" name="projectID" value="<?=$projectID?>" />
				<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
				<input type="submit" value="Agree" class="post_btn" /> <br /><br /><br /><br />
				<input type="submit" value="File A Dispute" class="post_btn" />
			</form>-->
				   <?php 
				   
				   
				 // $disputeapprovalOk2='';
				 // $approvalOk='';
				   	// if(($approvalOk < 1) && ($disputeapprovalOk < 1))
					   // if($disputeapprovalOk < 1) 
 if((!empty($disputeapprovalOk2) < 1 ) && ($disputeapprovalOk > 0)) {				 
				 if($approvalOk < 1)
					{
		
				
		
		
		?>
			
		
	
		<?php
		
		 echo'<input type="button" value="File A Dispute" class="post_btn dispute" />';
		}
	  else {
	  
	  echo"<h1>Approval Done</h1>";
	  
	  }
	  
	  
	  
	 
		// print_r($disputeShow);
		if(!empty($disputeShow));
		{
			foreach($disputeShow as $disputefiles)
			{
	  ?>

	 <div style="margin-top:10px;">
	<div style="clear:both;"></div>
	 <div class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['disputeFilesName']; ?></div>
	 <div class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['disputeFilesDescription']; ?></div>
	 <div class="cnl_pro_lab col-lg-3"><img style="width:200px;" src="<?php echo base_url();?>public/upload/dispute/<?php echo $disputefiles['disputeFilesimagePath']; ?>" alt="" /></div>
<div  class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['userName']; ?></div>	
	<div style="clear:both;"></div>
	
	</div>
	  	<?php
			}	
		}
		}
	    else {
			if(!empty($disputeShow));
		{
			foreach($disputeShow as $disputefiles)
			{
	  ?>

	 <div style="margin-top:10px;">
	<div style="clear:both;"></div>
	 <div class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['disputeFilesName']; ?></div>
	 <div class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['disputeFilesDescription']; ?></div>
	 <div class="cnl_pro_lab col-lg-3"><img style="width:200px;" src="<?php echo base_url();?>public/upload/dispute/<?php echo $disputefiles['disputeFilesimagePath']; ?>" alt="" /></div>
<div  class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['userName']; ?></div>	
	<div style="clear:both;"></div>
	
	</div>
	  	<?php
			}	
		}
	  }
	  
	  ?>
	  
	  <?php
	  // print_r($disputeapprovalOk2);
	  // if($disputeapprovalOk2 == '1')  
	  // {
	  ?>
			
	
	<?php
	// } 
	?>
	   <form method="POST" action="<?php echo base_url(); ?>workRoom/disputeProjectApproval/<?=$projectID?>/<?=$receiverID?>" enctype="multipart/form-data">
				<input type="hidden" name="projectID" value="<?=$projectID?>" />
				<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
				<input type="hidden" name="disputeTwo" value="1" />
			
			
			          <div style="clear: both;display:none;" class="dispute_area col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left">
          <div class="message_box">
          <br>
		  <div class="col-lg-2"><h4 class="message"> Name </h4></div>
		  <input type="text" name="disputeFilesName" class=""/>
		  <div class="clear5"></div>
          <div class="col-lg-2"><h4 class="message"> messages </h4></div>
			
        	<textarea class="msg" style="margin:0px;" name="disputeFilesDescription" required/></textarea>
			<div class="clear"></div>
            <div class="col-lg-2"><h4 class="message">Attachment</h4>
</div>
			<span class="plus_icon"></span>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                    <input type="file" name="fileAttachementdispute" id="fileAttachementdispute" />
             </div>
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
            <input type="submit" value="Submit" class="post_btn" />
            </div>
        
            </div>
          
      
      
          <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>







 </div>
			
			
			
				
			</form>

			
		</div>
</div>
</div>
</div></div>

<script type="text/javascript">
$(function(){
$('.dispute').click(function(){

$('.dispute_area').toggle();
});



});
</script>