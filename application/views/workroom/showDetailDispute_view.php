  <div id="wrap">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">
                Cancel or Dispute
            </div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
      <?php echo $sidebar; ?>
			
			<?php 
			// print_r($getProject);
			if(!empty($getProject))
			{
				$ID = $getProject[0]['ID'];
				$title = $getProject[0]['title'];
				$description = $getProject[0]['description'];
				$postDate = $getProject[0]['postDate'];
				$duration = $getProject[0]['duration'];
				$hourlyRate = $getProject[0]['hourlyRate'];
				$hrsPerWeeks = $getProject[0]['hrsPerWeeks'];
				$attachFiles = $getProject[0]['attachFiles'];
				$skills = $getProject[0]['skills'];
				$workType = $getProject[0]['workType'];
				$fixedBudget = $getProject[0]['fixedBudget'];
				$mainCategoryId = $getProject[0]['mainCategoryId'];
				$checkApproval = $getProject[0]['checkApproval'];
				$cancelReqBy = $getProject[0]['checkApproval']['cancelReqBy'];
				$approval = $getProject[0]['checkApproval']['approval'];
				$dispute = $getProject[0]['checkApproval']['dispute'];
				$disputeTwo = $getProject[0]['checkApproval']['disputeTwo'];
				$disputeFilesimagePath = $getProject[0]['checkApproval']['disputeFilesimagePath'];
				$cancelRefndDsputeDescribe = $getProject[0]['checkApproval']['cancelRefndDsputeDescribe'];
			?>
			<div class="col-lg-5 pull-left"><h4><b style="color:#c53d8a;"><?php echo $title; ?></b> <br />  </h4></div>
			<div class="col-lg-8 pull-left"><p style="color:#000;"><?php echo'<b style="color:#c53d8a;">Describe </b><br />  '. $description; ?></p></div>
			<!--<div class="col-lg-5 pull-left"><?php echo '<b style="color:#373737;">PostDate</b>   '. $postDate; ?></div>
			<div class="col-lg-5 pull-left"><?php echo '<b style="color:#373737;">Duration</b>   '. $duration; ?></div>
			<div class="col-lg-5 pull-left"><?php echo '<b style="color:#373737;">Hourly Rate</b>   '. $hourlyRate; ?></div>
			<div class="col-lg-5 pull-left"><?php echo'<b style="color:#373737;">Hours Per Weeks</b>   '.   $hrsPerWeeks; ?></div>
			<div class="col-lg-5 pull-left"><?php echo '<b style="color:#373737;">Fixed Budget</b>   '.  $fixedBudget; ?></div>-->
			<div class="col-lg-5 pull-left">
			<!--<img src="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePath; ?>" width="170" height="150" >-->
			<?php
		$src_file_name = $disputeFilesimagePath;
		$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
		if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
			?>
			<a href="<?=base_url()?>workRoom/showImage/<?php echo $disputeFilesimagePath; ?>" target="_parent"><img src="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePath; ?>" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'pdf'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePath; ?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'docx'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePath; ?>" target="_new"><img src="<?=base_url()?>public/images/word.png" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'xls'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePath; ?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" width="170" height="150" ></a>
			<?php
		}else{
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePath; ?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" width="170" height="150" ></a> 
			<?php
		}
	?>
			
			
			</div>
			<?php
		
			
				if(($cancelReqBy == $receiverID )&&($approval == 0 ) && ($dispute ==0 ))
				{

			?>
				<div class="clear20"></div>
				<div class="col-lg-5 pull-left"></div><div class="col-lg-5 pull-left">
				 <form method="POST" action="<?php echo base_url(); ?>workRoom/cancelProjectApproval/<?=$projectID?>/<?=$receiverID?>">
					<input type="hidden" name="projectID" value="<?=$projectID?>" />
					<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
				<input type="hidden" class="value_box" name="projectTitle" value="<?php echo $title?>">
					<input type="submit" value="Agree" class="btn btn-primary pull-left" />
				</form>
				<input type="button" value="File A Dispute" class="dispute btn btn-danger pull-left" />
		
				</div>
                <div class="clear10"></div>
			<?php 	  
					
				}
			
				else if(($cancelReqBy != $receiverID )&&($approval == 0 ) && ($dispute ==0 ))
				{
					echo"<h1>approval pendding</h1>";
			?>
			<!--
			<input type="button"  style="float:left; margin-left:10px; margin-top:21px;border:none;" value="cancel" class="post_btn dispute" />
			-->
			<?php 	
				}
				else if(($cancelReqBy != $receiverID )&&($approval == 0 ) && ($dispute ==1 ))
				{
				
				if(($cancelReqBy != $receiverID )&&($approval == 0 ) && ($disputeTwo ==0 ))
				{
			?>
					<input type="button"  style="display:none;float:left; margin-left:10px; margin-top:21px;border:none;" value="File A Dispute" class="post_btn disputeTwo" />
		
				
			<div class="col-lg-5 pull-left"><h4><b style="color:#c53d8a;"><?php echo $title; ?></b> <br />  </h4></div>
			<?php 
			
				}
				
			
		// print_r($disputeShow);
		if(!empty($disputeShow));
		{
			foreach($disputeShow as $disputefiles)
			{
	  ?>
	<div style="margin-left: 230px;">
	<div class="clear20"></div>
	<!-- <div  class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['disputeFilesName']; ?></div>-->
	<div class="col-lg-12 pull-left"><p style="color:#000;"><?php echo'<b style="color:#c53d8a;">Describe </b><br />  '. $disputefiles['disputeFilesDescription']; ?></p></div>
	<!-- <p style="color:#000;"><?php echo $disputefiles['disputeFilesDescription']; ?></p>-->
	 <div  class="cnl_pro_lab col-lg-4">
		<?php
		$src_file_name = $disputefiles['disputeFilesimagePath'];
		$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
		if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
			?>
			<a href="<?=base_url()?>workRoom/showImage/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_parent"><img src="<?=base_url()?>public/upload/dispute/<?php echo $disputefiles['disputeFilesimagePath']; ?>" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'pdf'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'docx'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_new"><img src="<?=base_url()?>public/images/word.png" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'xls'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" width="170" height="150" ></a>
			<?php
		}else{
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" width="170" height="150" ></a> 
			<?php
		}
	?>
	 <!--
	 <img style="width:200px; padding-left:5px;" src="<?php echo base_url();?>public/upload/dispute/<?php echo $disputefiles['disputeFilesimagePath']; ?>" alt="" />
	 -->
	 </div>
	<!--<div  class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['userName']; ?></div>	-->
		<?php 
		
			// print_r($cancelReqBy);
		if($disputefiles['userName'] != 'client' )
		{
		?>
		<!--<div  class="cnl_pro_lab col-lg-2">Cancel</div>	-->
		
		<?php 
		
		}
		?>
	<div class="clear20"></div>
	
	</div>
	
    <div class="col-lg-12 col-md-12 alert-info" style="padding:20px;">
	  	<?php
			}	
		}
	
				
				// echo"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
				}
				else if(($cancelReqBy == $receiverID )&&($approval == 0 ) && ($dispute ==1 ))
				{
					?>
					<div class="col-lg-5 pull-left"><h4><b style="color:#c53d8a;"><?php echo $title; ?></b> <br />  </h4></div>
					
					<?php
				
					if(!empty($disputeShow));
		{
			foreach($disputeShow as $disputefiles)
			{
	  ?>
    
	<div style="margin-left: 230px;">
	<!--<div  class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['disputeFilesName']; ?></div>-->
<div class="col-lg-12 pull-left"><p style="color:#000;"><?php echo'<b style="color:#c53d8a;">Describe </b><br />  '. $disputefiles['disputeFilesDescription']; ?></p></div>
	 <div  class="cnl_pro_lab col-lg-4">
	 	<?php
		$src_file_name = $disputefiles['disputeFilesimagePath'];
		$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
		if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
			?>
			<a href="<?=base_url()?>workRoom/showImage/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_parent"><img src="<?=base_url()?>public/upload/dispute/<?php echo $disputefiles['disputeFilesimagePath']; ?>" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'pdf'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'docx'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_new"><img src="<?=base_url()?>public/images/word.png" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'xls'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" width="170" height="150" ></a>
			<?php
		}else{
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputefiles['disputeFilesimagePath']; ?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" width="170" height="150" ></a> 
			<?php
		}
	?>
	 <!--
	 <img style="width:200px; padding-left:5px;" src="<?php echo base_url();?>public/upload/dispute/<?php echo $disputefiles['disputeFilesimagePath']; ?>" alt="" />
	 -->
	 </div>
	 
	<!--<div  class="cnl_pro_lab col-lg-2"><?php echo $disputefiles['userName']; ?></div>	-->
	
	<?php 
	// print_r($cancelReqBy);
		if($disputefiles['userName'] == 'client' )
		{
		?>
		<!--<div  class="cnl_pro_lab col-lg-2">Cancel</div>-->
		
		<?php 
		
		}
		?>
		
	<div style="clear:both;"></div>
	
	</div>
	  	<?php
			}	
		}
				// echo"<h1>you disputed</h1>";
				}
				else {
					echo"<h1>approval done</h1>";
				}
			}
			// if(($cancelReqBy == $receiverID )&&($approval == 0 ) && ($dispute ==1 ))
				// {
					// echo"<h1>dispute </h1>";
				// }
				// else if(($cancelReqBy != $receiverID )&&($approval == 0 ) && ($dispute ==1 )) {
				// echo"<h1>dispute bbbb</h1>";
				// }
			?>
<div class="clear20"></div>
<form method="POST" class="form-horizontal" action="<?php echo base_url(); ?>workRoom/disputeProjectApproval/<?=$projectID?>/<?=$receiverID?>" enctype="multipart/form-data">
				<input type="hidden" name="projectID" value="<?=$projectID?>" />
				<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
			<input type="hidden" class="value_box" name="projectTitle" value="<?php echo $title?>">
			
            
          
            		
	<div style="clear: both;display:none;" class="dispute_area col-lg-6 col-md-6 col-sm-12 col-xs-12 padding_tb40">
          <center><div class="message_box">
          <br>
		  <h5 class="message"> Name </h5><br />
		  <input type="text" name="disputeFilesName" class="form-control"/>
		  <div class="clear20"></div>
          <h5 class="message"> messages </h5><br />
			
        	<textarea class="msg" style="margin:0px;" name="disputeFilesDescription" required/></textarea>
			<div class="clear20"></div>
            <h5 class="message">Attachment</h5></div>
			<span class="plus_icon"></span>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                    <input type="file" name="fileAttachementdispute" id="fileAttachementdispute" />
             </div>
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
            <input type="submit" value="Submit" class="post_btn" />
            </div>
        
            </div>
	 <div class="clear20"></div>  <div class="clear20"></div> 

 </form>
   <form method="POST" action="<?php echo base_url(); ?>workRoom/disputeProjectApproval/<?=$projectID?>/<?=$receiverID?>" enctype="multipart/form-data">
				<input type="hidden" name="projectID" value="<?=$projectID?>" />
				<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
				<input type="hidden" name="disputeTwo" value="1" />
					
	<div style="clear: both;display:none;" class="dispute_areaTwo col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-left">
          <div class="message_box">
          <br>
		  <h5 class="message"> Name </h5><br />
		  <input type="text" name="disputeFilesName" class="form-control"/>
		  <div class="clear20"></div>
          <h5 class="message"> messages </h5></div>
			
        	<textarea class="msg" style="margin:0px;" name="disputeFilesDescription" required/></textarea>
			<div class="clear20"></div>
            <h5 class="message">Attachment</h5>
			<span class="plus_icon"></span>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                    <input type="file" name="fileAttachementdispute" id="fileAttachementdispute" />
             </div>
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
            <input type="submit" value="Submit" class="post_btn" />
            </div>
        
            </div>
            </div> <div class="clear20"></div>  <div class="clear20"></div> 
	</div>
 </form>
		</div></div>
</div>
</div>
</div></div>

<script type="text/javascript">
$(function(){
$('.dispute').click(function(){

$('.dispute_area').toggle();
});

$('.disputeTwo').click(function(){

$('.dispute_areaTwo').toggle();
});



});
</script>