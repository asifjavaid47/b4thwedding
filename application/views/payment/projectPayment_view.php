<style>
.milestone{background:#d8d8d8; height:40px; padding:10px;}
{ height:200px;}
</style>
<div id="wrap">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
          <?php if($this->session->flashdata('message')){ ?>
      <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">
                Payments
            </div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
          
      <?php echo $sidebar; ?>
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-left">
           
            <h2 style="color:#000;">Escrow funding and release status</h2>
           	 <hr style="border:1px solid #000; clear:both;">
           		 <br>
            <div class="col-lg-3"><b style="font-weight:bolder; color:#000;">Client</b></div>
            <div class="col-lg-2"><b style="font-weight:bolder; color:#000;">Job start date</b> </div>
            <div class="col-lg-3"><b style="font-weight:bolder; color:#000;">Job status</b>
           
            </div>
           		 <br>
            <div class="col-lg-3"><?php echo $projectInfo[0]['lName']; ?></div>
            <div class="col-lg-2"><?php echo $projectInfo[0]['startingDate']; ?></div>
            <div class="col-lg-2">
             <?php if($projectInfo[0]['runingProject']==1)
				{
					echo 'Working';
					
				}else
				{
					echo 'Complete';
				}?>
            </div>
           		 <br>
            
            	<div class="col-lg-5 col-md-9 col-xs-12 col-sm-12 pull-right">
                <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
                <h5 style="color:#000"><strong>Contract amount:</strong><span style="color:#00B050;" class="col-lg-2 pull-right">$<?php echo number_format($projectamount,2); ?></span></h5> 
            	 
                 <h5 style="color:#000"><strong>Funded by Client:</strong> 
                 <span class="col-lg-2 pull-right">$<?php echo number_format($projectInfo[0]['clientAmount'],2); ?></span></h5>
                 <h5 style="color:#000"><strong>Release Amount:</strong>
                 <span class="col-lg-2 pull-right">$<?php echo number_format($projectInfo[0]['releaseamount'],2); ?></span></h5>
                 <h5 style="color:#000"><strong>Remaining balance:</strong>
                 <span style="color:#00B050;" class="col-lg-2 pull-right">$<?php echo number_format($projectamount-$projectInfo[0]['releaseamount'],2); ?></span>
                 </h5>
               	 </div>
            </div>
           		 <div class="clearfix"></div>
            <h4 class="" style="color:#000;">Job Summary</h4>
            <?php echo $projectInfo[0]['title']; ?>
           		 <hr style="border:1px solid #000; clear:both;">
            
            <div class="col-lg-12 pull-left">
            <?php if($this->session->userdata('userID')==$projectInfo[0]['projectuserID'])
				{
			 
             $leftAmount				=	$projectamount - $projectInfo[0]['clientAmount'];
			 if($leftAmount>0)
			 	{
			 ?>
            	<a href="<?=base_url()?>projectPayment/addProjectPayment/<?=$projectID?>/<?=$receiverID?>" class="btn btn-success btn-sm pull-right">Add Funds</a>
                <?php } ?>
                <?php } ?>
            </div>
            <div class="clear10"></div>
            <span class="col-lg-12 pull-left milestone">
            		<div class="col-lg-3 pull-left"> Milestone|Delivery date </div>
                      <div class="col-lg-3 pull-left"> Contract Amount </div>
                      <div class="col-lg-3 pull-left"> Release Amount </div>
                      <div class="col-lg-3 pull-left">  Release Escrow  </div>
            </span>
            <div class="clear10"></div>
            <?php if(!empty($milestone))
			{?>
            <?php foreach($milestone as $mileList)
				{
			?>
            <div class="values">
            		<div class="col-lg-3 pull-left">
            			
                	<p><?php echo $mileList['milestoneDeliveryDate']; ?></p>
            		</div>
            	<div class="col-lg-3 pull-left"><p>$<?php echo number_format($mileList['milestoneAmount'],2); ?></p></div>
                <div class="col-lg-3 pull-left">
                $<?php echo number_format($mileList['releaseAmount'],2); ?>
                </div>
                <?php if($this->session->userdata('userID')==$projectInfo[0]['projectuserID'])
				{
			 	?>
                <?php if($mileList['milestoneAmount'] == $mileList['releaseAmount']) 
					{?>
                    <a href="javascript:;" class="btn btn-success">Released</a>
                    <?php } else if (($projectInfo[0]['clientAmount']-$projectInfo[0]['releaseamount']) < $mileList['milestoneAmount']) {?>
					<a href="<?=base_url()?>projectPayment/addProjectPayment/<?=$projectID?>/<?=$receiverID?>" class="btn btn-success">Add Funds</a>
				<?php }else
						{ ?>
                <a href="<?=base_url()?>projectPayment/releasePayment/<?=$projectID?>/<?=$receiverID?>/<?=$mileList['milestoneAmount']?>/<?php echo $mileList['milestoneID'];?>" class="btn btn-success">Release</a>
                	<?php } ?>
                <?php }else { ?>
                <?php if($mileList['milestoneAmount'] == $mileList['releaseAmount'])
						{
					 ?>
               			<a href="javascript:;" class="btn btn-success">Released</a>
                	<?php }else
						  { ?>
                          <a href="<?=base_url()?>projectPayment/paymentRequest/<?=$projectID?>/<?=$receiverID?>" class="btn btn-success">Request Payment</a>
                          <?php } ?>
					
                <?php } ?>
            	</div>
                <hr style="border:1px solid #000; clear:both;">
                <?php } ?> <!--Foreacho loop -->
               <?php }else
			   		{
			    ?> 
                <div class="values">
            		<div class="col-lg-3 pull-left">
            		
                	<p><?php echo $projectInfo[0]['startingDate']; ?></p>
            		</div>
            	<div class="col-lg-3 pull-left"><p>$<?php echo number_format($projectamount,2); ?></p></div>
                <div class="col-lg-3 pull-left">
                $<?php echo number_format($projectInfo[0]['releaseamount'],2); ?>
                </div>
       <?php if($this->session->userdata('userID')==$projectInfo[0]['projectuserID'])
				{
					if($projectInfo[0]['clientAmount'] < $projectamount)
					{?>
						<a href="<?=base_url()?>projectPayment/addProjectPayment/<?=$projectID?>/<?=$receiverID?>" class="btn btn-success">Add Funds</a>
					<?php }else if($projectInfo[0]['releaseamount'] < $projectamount) 
					{?>
                <a href="<?=base_url()?>projectPayment/releasePayment/<?=$projectID?>/<?=$receiverID?>/<?=$projectamount?>" class="btn btn-success">Release</a>
                <?php }else
					{
				 ?>
                 	 <a href="javascript:;" class="btn btn-success">Released</a>
                   <?php } ?>
      <?php }else { 
	  				if($projectInfo[0]['releaseamount'] < $projectamount)
					{?>
						<a href="<?=base_url()?>projectPayment/paymentRequest/<?=$projectID?>/<?=$receiverID?>" class="btn btn-success">Request Payment</a>
				<?php }else
					{?>
						 <a href="javascript:;" class="btn btn-success">Released</a>
                     <?php } ?>
                
                <?php } ?>
            	</div>
                <hr style="border:1px solid #000; clear:both;">
                <?php } ?>
                 
                <p>Need to change or add more milestone? &nbsp;<a href="<?=base_url()?>milestone/detail/<?=$projectID?>/<?=$receiverID?>">Click Here</a></p>
            </div>
    </div>
     </div>