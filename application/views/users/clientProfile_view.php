<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
        
         <h3>Client Profile</h3>
<a href="<?php echo base_url(); ?>users/clientProfile" class="view_label">Overview </a>
<div class="clear10"></div>
<a href="<?php echo base_url(); ?>users/clientPublicView/<?php echo $clientProfile[0]['ID'] ?>" class="view_label">Public View of Profile </a>
            <!--<img src="<?=base_url()?>public/images/sssss.png" alt="" />-->            
        </div> 
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
               
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="clear20"></div>
   <div class="pull-left col-lg-2 col-md-2 col-sm-10 col-xs-10 ">
			<?php 
                if($clientProfile[0]['image']!='')
			{?>
            <div class="img_fix_pro">
           <img src="<?=base_url()?>public/upload/profile/<?php echo $clientProfile[0]['image'] ?>" />
			</div>
			<?php } else{ ?>
					<img src="<?= base_url(); ?>public/images/no-photo_small.jpg" width="64" height="80" alt="">
          <?php } ?>
                       
                       <div class="clear5"></div>
                       <!--<a href="#" class="btn_edit_pro5">Edit</a>-->
                       </div>
                       
                       <div class="pull-left col-lg-7 col-md-7 col-sm-10 col-xs-10 ">
                         <h3 style="color:#c53d8a; margin:0;"><?php echo $clientProfile[0]['fName']; ?></h3>
                         <br />
                          
                           <div class="clear5"></div>
                       <!--<a href="#" class="btn_edit_pro5">Edit</a>-->
  <br /><br />
<br />

                          <h4 style="color:#c53d8a; margin:0;"> About</h4>
  <br />
                          <?php echo $clientProfile[0]['overview']; ?>
                           <div class="clear5"></div>
                       <a href="<?=base_url()?>users/editUsersProfile" class="btn_edit_pro5">Edit</a>

                         
            </div>
            
            
            
            
            <div class="pull-right col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                         <h3 style="color:#c53d8a; margin:0;">Identity </h3>
                         <div class="clear20"></div>
                         <div class="pull-left col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align:left; padding:0;">Location</div>
                         <div class="pull-left col-lg-8 col-md-8 col-sm-12 col-xs-12">
                         <div style="float:left;">
 								<?php echo $clientProfile[0]['country']; ?><br> 
     <div class="clear5"></div>
                      <!-- <a href="#" class="btn_edit_pro5">Edit</a><br />-->

     <div class="clear5"></div>
                      <!-- <a href="#" class="btn_edit_pro5">Edit</a>-->

</div>



                         
                         </div>
                         <div class="clear20"></div>
             <div style="padding-top:5px; padding-bottom:5px; border-top:solid 1px #CCC; border-bottom:								 						solid 1px #CCC; display:block;">
							<div class="pull-left">
                            	Member Since
                            </div>
							<div class="pull-right">
								<?php  echo date('m-d-Y',strtotime($clientProfile[0]['createdDate'])); ?>
                            </div>
						<div class="clear"></div>
			</div>
                    <div class="clear20"></div>
                         <div style="padding-top:0px; padding-bottom:5px; display:block;">
<!--<div class="pull-left">Last Sign-in</div>
<div class="pull-right">Dec 30, 2014 </div>-->
						<div class="clear"></div>
					</div>
                         
            	</div>
            
            <div class="clear10"></div>

<h2 class="p-header pull-left">My Job Posts and Ratings </h2>
            <!--<a href="#" class="privacyLink">Change privacy settings</a>-->
             <div class="clear"></div>
            <div class="snapshot-bar-buyer-c">
            <div style="width: 150px;" class="snapshot-bar-buyer-item">
            <div class="snapshot-bar-value"><?php  echo $clientProfile[0]['totalPrjects']; ?></div>
            <div class="snapshot-bar-label">Jobs Posted</div>
            <div class="clear"></div>
            </div>
            <div style="width: 150px" class="snapshot-bar-buyer-item snapshot-bar-item-separator">
            <div class="snapshot-bar-value"><?php  echo $clientProfile[0]['totalAwarded']; ?></div>
            <div class="snapshot-bar-label">Jobs Awarded</div>
            <div class="clear"></div>
            <!--<div class="snapshot-bar-value">0%</div>
            <div class="snapshot-bar-label">Award Ratio</div>-->
            <div class="clear"></div>
            </div>
            <!--<div style="width: 170px" class="snapshot-bar-buyer-item snapshot-bar-item-separator">
            <div class="snapshot-bar-value">0</div>
            <div class="snapshot-bar-label">Feedback Given</div>
            <div class="clear"></div>
            <div class="snapshot-bar-value">0</div>
            <div class="snapshot-bar-label">Feedback Received</div>
            <div class="clear"></div>
            </div>-->
            <!--<div class="snapshot-bar-buyer-item snapshot-bar-item-separator">
            <div style="width: 80px;" class="snapshot-bar-value">$0</div>
            <div style="margin-left: 90px" class="snapshot-bar-label">Purchased</div>
            <div class="clear"></div>
            </div>-->
            <div class="clear"></div>
            <div class="snapshot-bar-header">Lifetime Data</div>
            </div>
          </div> 
        </div>        
        </div>        
    </div>
