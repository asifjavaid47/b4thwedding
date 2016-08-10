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
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
          <div class="container_">
		  <form method="POST" action="<?php echo base_url(); ?>workRoom/cancelProjectStepFinal/<?=$projectID?>/<?=$receiverID?>">
		  	<input type="hidden" name="projectID" value="<?=$projectID?>" />
			<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
          	<h3 style="color:#c53d8a;"> Refund Cancel or Dispute </h3>
            <h2 style="color:#000;">File a Request</h2>
            <h5 style="color:#000;">Select an Option</h5>
            <hr style="border:1px solid #000;">
            <br>
			<input type="radio" name="cancelRefndDsputeStatus" value="cancelJob" style="float:left; margin:13px 0px;" required> <h4 style="color:#000; margin-left:30px;"> Cancel Job - I want to cancel job and request a fund.</h4>
            <br>
            <input type="radio" name="cancelRefndDsputeStatus" value="cancelRefund" style="float:left; margin:13px 0px;" required> <h4 style="color:#000; margin-left:30px;"> Request Funnd - I wonly want to request a fund.</h4>
            <br>
            <input type="radio" name="cancelRefndDsputeStatus" value="cancelDispute" style="float:left; margin:13px 0px;" required> <h4 style="color:#000; margin-left:30px;"> File Dispute - <span style="color:#999;"> The freelancer will be notified. All automatic payments will stop immediately. Read more about it.</span></h4>
            
            <input type="submit" value="Submit" class="submit" />
            <input type="button" value="Cancel" class="cancel" />
			</form>
</div>
</div>
</div>
</div>