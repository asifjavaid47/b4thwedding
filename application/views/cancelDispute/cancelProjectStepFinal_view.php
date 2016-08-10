  <div id="wrap">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Refund, Cancel or Dispute</div>
		<div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
		<?php echo $sidebar; ?>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
			<div class="container_">
			
				<h1><?php 
						if(empty($getCancelDisputeDetail)) 
						{
						if($getProjectDetail['clientAmount']>0) 
						{
				?>
			<form method="POST" action="<?php echo base_url(); ?>cancelDispute/cancelProjectStepFinal/<?=$projectID?>/<?=$receiverID?>"  enctype="multipart/form-data">
					<input type="hidden" name="projectID" value="<?=$projectID?>" />
					<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
					<h4><?php echo $getProjectDetail['title']; ?></h4>
					<span><b>Refund Amount: </b> </span><span class="getProjectDetailPrice"><?php echo $getProjectDetail['remainingAmount']; ?></span>
					<hr style="border:1px solid #000;"><br>
						
					<input type="radio" class="cancelRefndDsputeStatus" name="cancelRefndDsputeStatus" value="cancelJob" style="float:left; margin:13px 0px;"  required> <h4 style="color:#000; margin-left:30px;"> Cancel Job</h4>
					<br>
					<input type="radio" class="cancelRefndDsputeStatus" name="cancelRefndDsputeStatus" value="cancelRefund" style="float:left; margin:13px 0px;"  required> <h4 style="color:#000; margin-left:30px;"> Request a Refund</h4>
					<br>
					<input type="radio" class="cancelRefndDsputeStatus" name="cancelRefndDsputeStatus" value="cancelDispute" style="float:left; margin:13px 0px;"  required> <h4 style="color:#000; margin-left:30px;"> File Dispute - <span style="color:#999;"> The contractor will be immediately notified. Any payments will stop immediately. <a style="color: rgb(77, 154, 179);" href="<?php echo base_url(); ?>cancelDispute/cancelProjectStepOne/<?=$projectID?>/<?=$receiverID?>">Dispute Process</a></span></h4>
					<br>
					<div style="display:none;" class="cancelRefndDspute">
						 
						<p style="font-weight:bolder;">Refund Amount Requested </p>
					   <input type="text" class="value_box refundPrice" name="cancelRefndDsputeFreelancer" required>

					  
						<br><br><br>
								  <!-- 
								   <h4 style="color:#000; float:left;"> Cancellation Reason </h4> <br><br> <hr style="border:1px solid #000;">
								   <p style="font-weight:bolder;">Select the reason for the cancellation. This information is for B4Wedding only and will not be shared with your freelancer.</p>
								   <select name="cancelRefndDsputeReasion" style="width:400px; height:30px;">
										<option> - Select -</option>
										<?php 
									
										if(!empty($cancellationReasonList)) { foreach($cancellationReasonList as $cancellationReason) {?>
										
										
										<option value="<?php echo $cancellationReason['cancelReasonName']; ?>"><?php echo $cancellationReason['cancelReasonName']; ?></option>
										<?php } } ?>
								   </select>-->
					   <h4 style="color:#000;"> File Attachment </h4> 
						<p>
							<input type="file" name="fileAttachementdispute" id="fileAttachementdispute" />
						</p>
								  <br><br>
					   <h4 style="color:#000; float:left;"> Describe your request </h4> <br><br> <hr style="border:1px solid #000;">
					   <p style="font-weight:bolder;">Enter the description of what you request of the other party to resolve this issue in good faith and the refund amount (if applicable). If filing a dispute, upload necessary documentation stating your claim (if necessary).</p>
					   
			   
					   <textarea class="msg" name="cancelRefndDsputeDescribe" id="" cols="30" rows="10"></textarea>

						<input type="submit" value="Submit" class="submit" />
						<!--<input type="button" value="Cancel" class="cancel" />-->
						
					</div>
			</form>

				<?php 
						}
					
						else 
						{
							
							echo "<h2>no cancel</h2>";
						}
					}
					else 
					{
						
						// print_r($getCancelDisputeDetail);
						// exit;
							foreach($getCancelDisputeDetail as $getCancelDisputeDetail) 
							{
								$cancelRefndDsputeDescribe	=	$getCancelDisputeDetail['cancelRefndDsputeDescribe'];
								$disputeFilesimagePath		= $getCancelDisputeDetail['disputeFilesimagePath'];
								$senderReqest				=	$getCancelDisputeDetail['senderReqest'];
								$approval				=	$getCancelDisputeDetail['approval'];
								$dispute				=	$getCancelDisputeDetail['dispute'];
								$receiverRequest			=	$getCancelDisputeDetail['receiverRequest'];
								$createdDate				=	$getCancelDisputeDetail['createdDate'];
								$getProjectTitle			=	$getCancelDisputeDetail['getProjectTitle']['title'];
								$getUserInfo			=	$getCancelDisputeDetail['getUserInfo']['fName'];
								// $receiverGetUserInfo			=	$getCancelDisputeDetail['receiver_GetUserInfo']['fName'];
								echo$getUserInfo."<br>";
								
					?>
					<div class="col-lg-10 col-md-10 col-xs-12 col-sm-12"><h4 style="color:#c53d8a; font-weight:bolder;"><?php echo$getProjectTitle;?><h4></div>
					<div class="col-lg-8 col-md-6 col-xs-12 col-sm-12"><h5 style="color:#c53d8a; font-weight:bolder;">Reason Cancel Project:</h5><h6><?php echo$cancelRefndDsputeDescribe;?></h6></div>
					<div class="col-lg-8 col-md-6 col-xs-12 col-sm-12"><h5 style="color:#c53d8a; font-weight:bolder;">Cancel Dipute Date:</h5><h6><?php echo$createdDate;?></h6></div>
					<div>
					<div class="clear20"></div>
					<h5 style="color:#c53d8a; font-weight:bolder;">Files:</h5>
					<?php
							$src_file_name = $disputeFilesimagePath;
							$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
							if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
								?>
								<a target="_blank" href="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePath; ?>" target="_parent"><img src="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePath; ?>" width="170" height="150" ></a> 
								<?php
							}else if($ext == 'pdf'){
								?>
								<a href="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePath; ?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" width="170" height="150" ></a> 
								<?php
							}else if($ext == 'docx'){
								?>
								<a href="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePath; ?>" target="_new"><img src="<?=base_url()?>public/images/word.png" width="170" height="150" ></a> 
								<?php
							}else if($ext == 'xls'){
								?>
								<a href="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePath; ?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" width="170" height="150" ></a>
								<?php
							}else{
								?>
								<a href="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePath; ?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" width="170" height="150" ></a> 
								<?php
							}
					?>
	</div>
	<hr style="color:#eee;">
	
					<?php
							}
							 // print_r($senderReqest);
						 // exit;
					// if($senderReqest==$receiverID)
							if(($senderReqest == $receiverID ) && ($approval != 0 ) || ($dispute != 1 ))
							{
					?>
					 <form method="POST" action="<?php echo base_url(); ?>cancelDispute/cancelProjectApproval/<?=$projectID?>/<?=$receiverID?>">
						<input type="hidden" name="projectTitle" value="<?php echo $getProjectTitle; ?>" />
						<input type="hidden" name="projectID" value="<?=$projectID?>" />
						<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
						
						<input type="submit" value="Agree" class="btn btn-primary pull-left" />
				</form>
				<input type="button" value="File A Dispute" class="dispute btn btn-danger pull-left" />
	<!--<form   method="POST" class="dispute_area form-horizontal" action="<?php echo base_url(); ?>cancelDispute/disputeProjectApproval/<?=$projectID?>/<?=$receiverID?>" enctype="multipart/form-data">
		-->
		<form style="clear: both;display:none;" method="POST" class="dispute_area form-horizontal"  action="<?php echo base_url(); ?>cancelDispute/disputeReply/<?=$projectID?>/<?=$receiverID?>"  enctype="multipart/form-data">
					<input type="hidden" name="projectID" value="<?=$projectID?>" />
					<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
					
				<!--
					<hr style="border:1px solid #000;"><br>
					<input type="radio" class="cancelRefndDsputeStatus" name="cancelRefndDsputeStatus" value="cancelDispute" style="float:left; margin:13px 0px;"  required> <h4 style="color:#000; margin-left:30px;"> File Dispute - <span style="color:#999;"> The contractor will be immediately notified. Any payments will stop immediately. <a style="color: rgb(77, 154, 179);" href="<?php echo base_url(); ?>cancelDispute/cancelProjectStepOne/<?=$projectID?>/<?=$receiverID?>">Dispute Process</a></span></h4>
					-->
					<br>
					<div  class="cancelRefndDspute">
						 
						<!--<p style="font-weight:bolder;">Refund Amount Requested </p>
					   <input type="text" class="value_box refundPrice" name="cancelRefndDsputeFreelancer" required>-->

					  
						<br>
					   <h4 style="color:#000;"> File Attachment </h4> 
						<p style="font-size: 12px;">
							<input type="file" name="fileAttachementdispute" id="fileAttachementdispute" />
						</p>
								  
					   <h4 style="color:#000; float:left;"> Describe  </h4> <br><br> <hr style="border:1px solid #000;">
					   <p style="font-size: 12px;">Enter the description of what you request of the other party to resolve this issue in good faith and the refund amount (if applicable). If filing a dispute, upload necessary documentation stating your claim (if necessary).</p>
					   
			   	<div style="font-size: 12px;">
					   <textarea class="msg" name="cancelRefndDsputeDescribe" id="" cols="30" rows="10"></textarea>
					   </div>
				<p style="font-size: 12px;">
						<input type="Submit" value="Submit" class="dispute btn btn-danger pull-left" />
						</p>
						
					</div>
			</form>
					<?php
					
									// echo"<h1>button</h1>";
									
								}
								else {}
							
					}
				?>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
  $(".cancelRefndDsputeStatus").click(function(){
	 $('.cancelRefndDspute').show(); 
	  
  });
  
  // $('.cancelRefndDspute').hide();

// $('.cancelRefndDsputeStatus').bind('change',function(){

    // var showOrHide = ($(this).val()) ? true : false;

    // $(this).siblings('.cancelRefndDspute').toggle(showOrHide);

// })
  $(".refundPrice").keyup(function(){
    var refundPrice = $(".refundPrice").val();
    var getProjectDetailPrice = parseInt('<?php echo $getProjectDetail['remainingAmount']; ?>');

	// alert(refundPrice);
	// alert(getProjectDetailPrice);
	if(refundPrice > getProjectDetailPrice){
		alert("plz enter less then or equal price");
		$(".refundPrice").val('');
	}
	else {
	
	}
	
	// alert(getProjectDetailPrice);
  });
});
</script>
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