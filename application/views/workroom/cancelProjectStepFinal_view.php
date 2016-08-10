  <div id="wrap">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Refund, Cancel or Dispute</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
      <?php echo $sidebar; ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
          <div class="container_">
		  
   <form method="POST" action="<?php echo base_url(); ?>workRoom/cancelProjectStepFinal/<?=$projectID?>/<?=$receiverID?>"  enctype="multipart/form-data">
		<input type="hidden" name="projectID" value="<?=$projectID?>" />
			<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
            <hr style="border:1px solid #000;">
            <br>
			<input type="hidden" name="cancel"  value="<?php //echo$cancelRefndDsputeStatus; ?>"/>
			<?php 
			// echo '<h1>'.$msg.'</h1>';
			// echo '<h1>'.$cancelRefndDsputeStatus.'</h1>';
				// $cancel = $_GET['cancel'];
			?>
			<input type="radio" class="cancelRefndDsputeStatus" name="cancelRefndDsputeStatus" value="cancelJob" style="float:left; margin:13px 0px;"  required> <h4 style="color:#000; margin-left:30px;"> Cancel Job</h4>
            <br>
            <input type="radio" class="cancelRefndDsputeStatus" name="cancelRefndDsputeStatus" value="cancelRefund" style="float:left; margin:13px 0px;"  required> <h4 style="color:#000; margin-left:30px;"> Request a Refund</h4>
            <br>
            <input type="radio" class="cancelRefndDsputeStatus" name="cancelRefndDsputeStatus" value="cancelDispute" style="float:left; margin:13px 0px;"  required> <h4 style="color:#000; margin-left:30px;"> File Dispute - <span style="color:#999;"> The contractor will be immediately notified. Any payments will stop immediately. <a style="color: rgb(77, 154, 179);" href="<?php echo base_url(); ?>workRoom/cancelProjectStepOne/<?=$projectID?>/<?=$receiverID?>">Dispute Process</a></span></h4>
            
		   <br>
            <div style="display:none;" class="cancelRefndDspute">
            <!--<p style="font-weight:bolder;">Refund to bguess from Escrow</p>
            <input type="text" class="value_box" name="cancelRefndDsputeEscrow" value="0.0"><p style="font-size:14px; float:left; margin:3px 20px;">No Ammount released or paid</p><br><br><br><br>
            -->     
			<input type="hidden" class="value_box" name="cancelRefndDsputeEscrow" value="0">
			<input type="hidden" class="value_box" name="projectTitle" value="<?php echo $getProjectDetailPrice[0]['title']?>">
			<p style="font-weight:bolder;">Refund Amount Requested </p>
           <input type="text" class="value_box refundPrice" name="cancelRefndDsputeFreelancer" required>
		   <p class="getProjectDetailPrice" style="font-size:14px; float:left; margin:3px 20px;">
		   <?php 
		 /*   $getProjectDetailPrice = $getProjectDetailPrice[0]['billedToClient'];
			echo $getProjectDetailPrice; */
			
				// print_r($cancellationReasonList);
				// exit();
			?>
		   </p>
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
            <input type="button" value="Cancel" class="cancel" />
			
			</div>
			</form>
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
    var getProjectDetailPrice = parseInt($(".getProjectDetailPrice").text());

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