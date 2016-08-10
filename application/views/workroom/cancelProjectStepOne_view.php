  <div id="wrap">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Refund Cancel or Dispute</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
    	      
        
      <?php echo $sidebar; ?>
			   <?php 
	$senderID =$this->session->userdata('userID');  
		// if(!empty($check))
		// {
		
		// if($check != $senderID)
		// {
		?>
			 
		
	  <!--<form method="POST" action="<?php echo base_url(); ?>workRoom/cancelProjectApproval/<?=$projectID?>/<?=$receiverID?>">
				<input type="hidden" name="projectID" value="<?=$projectID?>" />
				<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
				<input type="submit" value="Agree" class="post_btn" /> <br /><br /><br /><br />
				<input type="submit" value="File A Dispute" class="post_btn" />
			</form>-->
		<?php
		// }
	  // else {
	  ?>
	  
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left"> 
          <div class="container_">
          	<h6 style="color:#c53d8a;"> Refunds, Cancelations & Disputes</h6>
            <p>Most requests on b4thewedding end on great terms. However, there a few that require a dispute to be filed and moderated by b4thewedding.    In any event that you cannot come to an agreement or resolution with your contractor or client, you may file a dispute moderated by b4thewedding.</p>
            <br>
            <h4 style="color:#c53d8a;">Process</h4>
            <p><strong>  Member Resolution.</strong> Client or Contractor files a request for a refund or job cancellation. The other party has 3 calendar days to accept the request. Both parties can also start the dispute process through filing a request.</p>
            <br>
            <span class="diagram" style="background:url(<?=base_url()?>public/images/diagram.png) no-repeat; width:322px; height:155px; float:left;"></span>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
           
            
            <p>If the other party disagrees with the request, he or she may file a dispute. Both parties will need to provide any necessary proof such as documentation supporting their claim.  A member b4thewedding resolution team will make a decision based on evidence submitted from both parties. </p>
           <br>
           <span class="diagram" style="background:url(<?=base_url()?>public/images/diagram-2.png) no-repeat; width:322px; height:266px; float:left;"></span>
           <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
           
           <!--<p>3. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
           <br>
           <span class="diagram" style="background:url(<?=base_url()?>public/images/diagram-3.png) no-repeat; width:322px; height:250px; float:left;"></span>
           <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>-->
            <form method="POST" action="<?php echo base_url(); ?>workRoom/cancelProjectStepFinal/<?=$projectID?>/<?=$receiverID?>">
			<input type="hidden" name="projectID" value="<?=$projectID?>" />
			<input type="hidden" name="receiverID" value="<?=$receiverID?>" />
			<input type="submit" value="File a Request" class="post_btn" />
			</form>
          	
          </div>
          </div>
          	  	<?php
		// }
	 
	  ?>
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
		  
	
</div>