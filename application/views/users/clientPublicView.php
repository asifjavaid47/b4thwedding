<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
		<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2 ">
        
         <h3>Client Profile</h3>

<div class="inbox_left col-lg-12 col-md-2 col-sm-4 col-xs-12">
                <ul>
					 <li class="all_remove_clas active_1"><a href="<?php echo base_url(); ?>users/freelancerProfile"><span>Overview </span></a></li>
                    
                     <li class="all_remove_clas active_2"><a href="<?php echo base_url(); ?>project/my_jobs_c"><span>Job History </span></a></li>
                       
                         <li class="all_remove_clas active_3"><a href="<?php echo base_url(); ?>users/editUsersSkills"><span>Skills</span></a></li>
                         <li><a href="<?php echo base_url(); ?>users/editUsersProfile"><span>Contact Info  </span></a></li>
                    
                     <li><a href="<?php echo base_url(); ?>users/resetPassword"><span>Reset Password</span></a></li>
                     <li><a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $clientProfile[0]['ID'] ?>"><span>Public View of Profile</span></a></li>
                      <li><a href="<?php echo base_url(); ?>portfolio"><span>Portfolio</span></a></li>
                </ul>
               
           
     
            </div>
<div class="clear10"></div>

            <!--<img src="<?=base_url()?>public/images/sssss.png" alt="" />-->            
        </div> 
		<div class="col-lg-9 col-md-10 col-sm-10 col-xs-10 ">
               
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
                         <h3 style="color:#c53d8a; margin:0;">Client<?php //echo $clientProfile[0]['fName']; ?></h3>
                         <br />
                          
                           <div class="clear5"></div>
                       <!--<a href="#" class="btn_edit_pro5">Edit</a>-->
  <br /><br />
<br />

                          <h4 style="color:#c53d8a; margin:0;"> About</h4>
  <br />
                          <?php echo $clientProfile[0]['overview']; ?>
                           <div class="clear5"></div>

                         
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
								<?php  echo $clientProfile[0]['createdDate']; ?>
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
            <!--<div class="snapshot-bar-header">Lifetime Data</div>-->
            </div>
          </div> 
        </div>        
       
       

			 <?php
                if(!empty($rating)){
                foreach($rating as $rat)
                                {
                                    $rating 		= $rat['rating'];
                                    $quality 		= $rat['quality'];
                                    $expertise 		= $rat['expertise'];
                                    $cost 			= $rat['cost'];
                                    $schedule 		= $rat['schedule'];
                                    $response 		= $rat['response'];
                                    $professional 	= $rat['professional'];
              ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container custom">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 pull-left">      
                <p class="inner_txt" style="color:#c53d8a;">        	
                <b><?php echo $rat['title']; ?></b></p>
                </div>
    
    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 pull-left">
                <strong>My rating for this job</strong>
            </div>
           <div class="col-lg-4 col-md-4 col-xs-8 col-sm-8 pull-left"><h5><b>Contractor</b>: <?php echo $rat['fName']; ?></h5></div>
        <div class="clear15"></div>
        <div class="rateit2" id="rateit92">
        <div class="col-lg-3 col-md-3 col-xs-6 col-sm-6 pull-left">
        <strong class="pull-right"><?php echo $rating; ?></strong>
                               <div class="input select rating-f">
                                <!-- rating -->
                                      <?php 
                                        $numberRate   	= $rating ;
                                        for($i=1;$i<=$numberRate;$i++)
                                        { ?>			   
                                            <img src="<?=base_url();?>public/images/icons/fill_star.png" />
                                         <?php 
                                         } 
                                          $floatValue	= number_format($numberRate,1);
                                          $pointValue	=	explode('.',$floatValue);
                                          $pointValue	=	$pointValue[1];
                                          
                                          if ($pointValue>=5)
                                          { ?>						
                                            <img src="<?=base_url();?>public/images/icons/half.png" /> 	
                                            <?php $numberRate++; 
                                          } 
                                          for($i=$numberRate;$i<5;$i++)
                                          { ?>					
                                                <img src="<?=base_url();?>public/images/icons/unfill_star.png" />
                                        <?php } ?>
                              <!-- rating end --> 	
                            </div>           
                        
                
        </div>
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 pull-left">
            <span><?php echo date('m-d-Y:H-i-s',strtotime($rat['sendDate'])); ?> &nbsp; | $<?php if($rat['amount']){ echo $rat['amount']; }else{ echo '0'; }  ?> &nbsp; | &nbsp; <?php echo $rat['cName'] ?> &nbsp; | &nbsp; <?php if($rat['finishProject'] == 1){ ?>completed<?php }elseif($rat['cancelProject'] == 1){ ?>cancelled<?php } ?>  &nbsp;  | &nbsp; <a href="<?=base_url();?>propsal/postbids/9">Job Details</a> </span>
        </div>
        <br>
        <div class="clear20"></div>
        <div class="col-lg-12 col-md-12 ol-xs-12 col-sm-12 pull-left">
            <div class="rating-enable input select rating-c padding0 col-lg-2 col-md-2 ol-xs-12 col-sm-12">
                                <div class="pull-left padding0" >
                                <!-- rating -->
                                      <?php 
                                        $numberRate   	= $quality ;
                                        for($i=1;$i<=$numberRate;$i++)
                                        { ?>			   
                                            <img src="<?=base_url();?>public/images/icons/squar.png" />
                                         <?php 
                                         }                                       
                                          for($i=$numberRate;$i<5;$i++)
                                          { ?>					
                                                <img src="<?=base_url();?>public/images/icons/un_squar.png" />
                                        <?php } ?>
                              <!-- rating end --> 
                                </div>
                               
                             </div>   
                            <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Quality</div>
                            <div class="col-lg-4 col-md-3 ol-xs-12 col-sm-12 pull-left padding0"><b>Feedback Comments:</b></div>
                             
                             
                             
                             
                             
                                    
        </div>
        <div class="clear5"></div>
        <div class="col-lg-12 col-md-12 ol-xs-12 col-sm-12 pull-left">
            <div class="rating-enable input select rating-c col-lg-2 col-md-2 ol-xs-12 col-sm-12 padding0">
                                <div class="pull-left">
                                <!-- rating -->
                                      <?php 
                                        $numberRate   	= $expertise ;
                                        for($i=1;$i<=$numberRate;$i++)
                                        { ?>			   
                                            <img src="<?=base_url();?>public/images/icons/squar.png" />
                                         <?php 
                                         }                                       
                                          for($i=$numberRate;$i<5;$i++)
                                          { ?>					
                                                <img src="<?=base_url();?>public/images/icons/un_squar.png" />
                                        <?php } ?>
                              <!-- rating end -->                                 
                                </div>
                             </div>  
                              <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Expertise</div>  
                            <div class="col-lg-4 col-md-3 ol-xs-12 col-sm-12 pull-left padding0"><?php echo $rat['comments']; ?></div>    	
        </div>
        <div class="clear5"></div>
       <div class="col-lg-12 col-md-12 ol-xs-12 col-sm-12 pull-left">
            <div class="rating-enable input select rating-c col-lg-2 col-md-2 ol-xs-12 col-sm-12 padding0">
                                <div class="pull-left">
                                <!-- rating -->
                                      <?php 
                                        $numberRate   	= $cost ;
                                        for($i=1;$i<=$numberRate;$i++)
                                        { ?>			   
                                            <img src="<?=base_url();?>public/images/icons/squar.png" />
                                         <?php 
                                         }                                       
                                          for($i=$numberRate;$i<5;$i++)
                                          { ?>					
                                                <img src="<?=base_url();?>public/images/icons/un_squar.png" />
                                        <?php } ?>
                              <!-- rating end --> 
                                </div>                           
                             </div>  
                              <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Cost</div>                   	
                                    
        </div>
        
        <div class="clear5"></div>
        <div class="col-lg-12 col-md-12 ol-xs-12 col-sm-12 pull-left">
            <div class="rating-enable input select rating-c col-lg-2 col-md-2 ol-xs-12 col-sm-12 padding0">
                                <div class="pull-left">
                                <!-- rating -->
                                      <?php 
                                        $numberRate   	= $schedule ;
                                        for($i=1;$i<=$numberRate;$i++)
                                        { ?>			   
                                            <img src="<?=base_url();?>public/images/icons/squar.png" />
                                         <?php 
                                         }                                       
                                          for($i=$numberRate;$i<5;$i++)
                                          { ?>					
                                                <img src="<?=base_url();?>public/images/icons/un_squar.png" />
                                        <?php } ?>
                              <!-- rating end --> 
                               
                                </div>
                                
                             </div>
                             <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Schedule</div>
                              <?php if($rat['receivercomments']){ ?>
                             <div class="col-lg-4 col-md-3 ol-xs-12 col-sm-12 pull-left padding0"><b>Contractor Feedback Comments for Client:</b></div> 
                             <?php } ?>   
                            
        </div>        	
        </div>
    
        <div class="clear5"></div>
        <div class="col-lg-12 col-md-12 ol-xs-12 col-sm-12 pull-left">
            <div class="rating-enable input select rating-c col-lg-2 col-md-2 ol-xs-12 col-sm-12 padding0">
                                <div class="pull-left">
                                <!-- rating -->
                                      <?php 
                                        $numberRate   	= $response ;
                                        for($i=1;$i<=$numberRate;$i++)
                                        { ?>			   
                                            <img src="<?=base_url();?>public/images/icons/squar.png" />
                                         <?php 
                                         }                                       
                                          for($i=$numberRate;$i<5;$i++)
                                          { ?>					
                                                <img src="<?=base_url();?>public/images/icons/un_squar.png" />
                                        <?php } ?>
                              <!-- rating end --> 
                               
                                </div>
                                
                             </div> 
                             <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Response</div>  
                             <?php if($rat['receivercomments']){ ?>
                             <div class="col-lg-4 col-md-3 ol-xs-12 col-sm-12 pull-left padding0"><?php echo $rat['receivercomments']; ?></div>  
                             <?php } ?>       	
        </div>
       
    
        <div class="clear5"></div>
        <div class="col-lg-12 col-md-12 ol-xs-12 col-sm-12 pull-left">
            <div class="rating-enable input select rating-c col-lg-2 col-md-2 ol-xs-12 col-sm-12 padding0">
                                <div class="pull-left">
                                <!-- rating -->
                                      <?php 
                                        $numberRate   	= $professional ;
                                        for($i=1;$i<=$numberRate;$i++)
                                        { ?>			   
                                            <img src="<?=base_url();?>public/images/icons/squar.png" />
                                         <?php 
                                         }                                       
                                          for($i=$numberRate;$i<5;$i++)
                                          { ?>					
                                                <img src="<?=base_url();?>public/images/icons/un_squar.png" />
                                        <?php } ?>
                              <!-- rating end --> 
                              
                                </div>
                               
                             </div> 
                             <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Professional</div>             	
        </div>
    
        <div class="clear5"></div>   
         </div>
         
         <hr class="clear5" style="border-bottom:1px solid grey;" />
        </div>
        <?php 
                                }
                }
        ?>   
        </div>      
    </div>
