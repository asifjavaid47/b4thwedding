<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
		 
        <div class="clear20"></div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding0">
          
        		<?php 
										  
							foreach($freelancerProfile as $profile)
							{
					
							
		  	if($profile->image!='')
			{?>
           
           <div class="img_fix_pro"> <img src="<?=base_url()?>public/upload/profile/<?php echo $profile->image ?>" /></div>
				
			<?php } else{ ?>
          <div>
          	<img class="join_lock" src="<?=base_url();?>public/images/no-photo.png" style="margin:0;" alt="">
          </div>
          <?php } ?>
           <div class="clear10"></div>
          <!-- <a href="" class="jobdtl_rightbtn btn_edit_pro">Edit</a>
          <div class="clear20"></div>-->
          
      
          <div class="inbox_left col-lg-3 col-md-2 col-sm-4 col-xs-12" style="width:100%; border-radius:0; margin:0;">
            
                    <ul>
					 <li class="all_remove_clas active_1"><a href="<?php echo base_url(); ?>users/freelancerProfile"><span>Overview </span></a></li>
                    
                     <li class="all_remove_clas active_2"><a href="<?php echo base_url(); ?>project/my_jobs_c"><span>Job History </span></a></li>
                       
                         <li class="all_remove_clas active_3"><a href="<?php echo base_url(); ?>users/editUsersSkills"><span>Skills</span></a></li>
                         <li><a href="<?php echo base_url(); ?>users/editUsersProfile"><span>Contact Info  </span></a></li>
                    
                     <li><a href="<?php echo base_url(); ?>users/resetPassword"><span>Reset Password</span></a></li>
                     <li><a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $profile->ID; ?>"><span>Public View of Profile</span></a></li>
                      <li><a href="<?php echo base_url(); ?>portfolio"><span>Portfolio</span></a></li>
                </ul>
              
            </div>
            <div class="clear20"></div>
            <!--<a href="#" class="col-lg-3 col-md-4 col-sm-4 col-xs-4 pull-left padding0"><img class="join_lock" src="<?=base_url();?>public/images/twitter.png" style="margin:0;" alt=""></a>
            <a href="#" class="col-lg-3 col-md-4 col-sm-4 col-xs-4 pull-left"><img class="join_lock" src="<?=base_url();?>public/images/plus.png" style="margin:0;" alt=""></a>
            <a href="#" class="col-lg-3 col-md-4 col-sm-4 col-xs-4 pull-left"><img class="join_lock" src="<?=base_url();?>public/images/facebook_like.png" style="margin:0;" alt=""></a>
            
            
         <div class="clear20"></div>
        
        <div class="p-menu-section">
                                <div class="p-summary-thumb">
      <a href="#" class="col-lg-3 col-md-4 col-sm-4 col-xs-4 pull-left padding0"><img src="<?=base_url();?>public/images/no-photo_small.png" style="margin:0;" alt=""></a>
                
                <div class="clear"></div>
                </div>
                 <div style="font-size: 11px; "  class="col-lg-9 col-md-9 col-sm-4 col-xs-4 pull-left">
                    Last Sign-in: Dec 17, 2014
                </div>
                <div class="clear10"></div>
           <a href="#" class="jobdtl_rightbtn btn_edit_pro">Edit</a>

                            </div> -->   
            
            
          
          </div>
          
           <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="color:#000;">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
				
						
           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 padding0"><h2 style="margin:0; padding:0;"><?php echo $profile->fName.' '.$profile->lName;?></h2></div>
           
          <!-- <a href="#" class="jobdtl_rightbtn btn_edit_pro" style="line-height:20px; text-align:center; background:#c53d8a !important;">
           <img class="join_lock" src="<?=base_url();?>public/images/tic.png" style="margin:0;" alt=""><span>Get Verified</span></a>-->
           
         
           <div class="clear60"></div>
           
           
           
           
            
           <div class="p-summary-location adr">
            <div class="pull-left">&nbsp;&nbsp;&nbsp;<span class="country-name"><?php echo $profile->country;?></span></div>
                <div class="pull-left">&nbsp;&nbsp;|&nbsp;&nbsp;        <!--<span class="locality"><span class="city">Lahore</span>, <span class="region">Punjab</span></span>-->
        </div>
              
        
            <div class="clear10"></div>
            <div style="background:#999; height:1px; width:100%;"></div>
            <div class="clear10"></div>
            
            
            
            
            <div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 padding0">
        
        	<h2 class="p-header"><a href="#">Overview</a></h2>
		<div class="clear"></div>

		<div>
							<div class="left">Minimum Hourly Rate $<?php echo $profile->hourlyRate;?></div>
							
								<?php 
								
								}
							?>
						<!--<div style="color:grey;" class="left">&nbsp;&nbsp;|&nbsp;&nbsp;</div>
                        <img class="join_lock" src="<?=base_url();?>public/images/video.png" style="margin:0;" alt="">
                        &nbsp;&nbsp;
                        <a href="#">
                         Add Video</a>-->
									<div class="clear"></div>
		</div>

		<p style="margin: 10px 0px;" class="p-about-txt">
					<?php
					// echo substr($profile->overview,0,150);
					echo $profile->overview;

					?>
				</p>
            <div class="clear20"></div>
			
			
     
      
	  
	  		
	  
      <h2 class="p-header pull-left">Skills (<span class="totalskill"><?php echo sizeof($getUsersSkills); ?></span>)</h2>
   
     <div class="clear10"></div>
     <!--<div style="text-align: right;" class="bold">Tested</div>-->
     <div class="clear10"></div>
     			<?php 
				if(!empty($confirm_msg))
				{
					print_r($confirm_msg);
				}
				// exit();
					if(!empty($getUsersSkills))
					{
										
				foreach($getUsersSkills as $UsersSkills)
				{
								
			?>
     <div class="skillHolder">
     <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding0 pull-left">
     <div class="skill_show"><?php echo $UsersSkills->userSkill;?></div></div>
     <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding0 pull-right take_testlabel">
     
     </div>
   
     <div class="sep_skill"></div>
     </div>
    		<?php
				
				}
				}
			?>
     
          
    

    
    
    
    
    
           
           
           </div>
           	</div></div>
            
            
            
            
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding-right:0 !important;">
            
   <!--         
<div class="right_box_pro">
           <div class="pull-left"> <img class="join_lock" src="<?=base_url();?>public/images/arrow-right-blue-large.png" style="margin:0;" alt="">&nbsp; <a href="#">Upload Your Profile Image</a></div>
           <div class="pull-right">+10%</div>
            <div class="pull-left"> <img class="join_lock" src="<?=base_url();?>public/images/arrow-right-blue-large.png" style="margin:0;" alt="">&nbsp; <a href="#">Upload Your Profile Image</a></div>
           <div class="pull-right">+10%</div>
            <div class="pull-left"> <img class="join_lock" src="<?=base_url();?>public/images/arrow-right-blue-large.png" style="margin:0;" alt="">&nbsp;<a href="#"> Upload Your Profile Image</a></div>
           <div class="pull-right">+10%</div>
      <div class="clear"></div>  
</div>-->
<div class="clear10"></div>

<div class="right_box_pro">
          <!-- <h4 style="margin:0; padding:0;">My Snapshot </h4>
           <div class="clear20"></div>
           
			<div><a href="#">All Categories &nbsp;<img src="<?=base_url();?>public/images/arrow-down-blue.png" style="margin:0;" alt=""></a></div>
            
			<div class="clear10"></div>
            <div class="pull-left"><a href="#">12 months</a> &nbsp;&nbsp;|&nbsp;&nbsp;</div>
            <div class="pull-left">Lifetime</div>
            <div class="clear"></div>
             <div class="sep_skill"></div>
             
             <div class="clear10"></div>-->
             
             
             <div>
		<div class="snapshot-item-title"><a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $profile->ID ?>">Jobs</a></div>
		<div class="snapshot-item-value">
			<div id="snapshot-12mo-1">
				<a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $profile->ID ?>"><?php echo $totalJobs; ?></a><br>
				<!--<a href="#">0</a><br>
				<a  href="#">0</a>-->
			</div>
			
		</div>
		<div class="snapshot-item-label">
			<div id="snapshot-label-12mo-1">
				<span>Total</span><br>
				<!--<span>Milestones</span><br>
				<span>Hours</span>-->
			</div>
			
		</div>
		<div class="clear"></div>
	</div>
    
    <div class="clear"></div>
             <div class="sep_skill"></div>
             
            <div class="clear"></div>
    
    
    <div>
		<div class="snapshot-item-title"><a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $profile->ID ?>">Reviews</a></div>
		<div class="snapshot-item-value">
			<div id="snapshot-12mo-1">
				<a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $profile->ID ?>"><?php echo $ratingCount; ?></a><br>
				<!--<a href="#">N/A</a><br>-->
			
			</div>
			
		</div>
		<!--<div class="snapshot-item-label">
			<div id="snapshot-label-12mo-1">
				<span><img src="<?=base_url();?>public/images/star.png" style="margin:0;" alt=""></span><br>
				<span style="margin-top:5px; display:block;">Recommend</span><br>
			
			</div>
			
		</div>-->
		<div class="clear"></div>
	</div>
    
      <div class="clear"></div>
             <div class="sep_skill"></div>
             
            <div class="clear"></div>
    
    <div>
		<div class="snapshot-item-title"><a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $profile->ID ?>">Clients</a></div>
		<div class="snapshot-item-value">
			<div id="snapshot-12mo-1">
				<a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $profile->ID ?>">0</a><br>
				
				
			</div>
			
		</div>
		<div class="snapshot-item-label">
			<div id="snapshot-label-12mo-1">
				<span>Total</span><br>
				
				
			</div>
			
		</div>
		<div class="clear"></div>
	</div>
    
    
     <div class="clear"></div>
             <div class="sep_skill"></div>
             
            <div class="clear"></div>
    
    <div>
<!--		<div class="snapshot-item-title">Earnings</div>
		<div class="snapshot-item-value">
			<div id="snapshot-12mo-1">
				<a href="#">$0</a><br>
				<a href="#">$0</a><br>
				
			</div>
			
		</div>-->
		<div class="snapshot-item-label">
			<div id="snapshot-label-12mo-1">
				<span>Total</span><br>
				<span>Per Client</span><br>
				
			</div>
			
		</div>
		<div class="clear"></div>
	</div>
             
		
      <div class="clear"></div>  
</div>



<div class="clear10"></div> 

 
<div class="right_box_pro">
       <h4>Identity </h4>
       <?php 
	   	foreach($freelancerProfile as $profile)
							{
	   
	   ?>
       <div class="identity-item-first">
			<div class="identity-item-label pull-left">Username</div>
			<div class="identity-item-label pull-right"><?php echo $profile->userName;  ?></div>
			<div class="clear"></div>
		</div>
       <div class="sep_skill"></div>
       <!--<div class="identity-item-first">
			<div class="identity-item-label pull-left">Type</div>
			<div class="identity-item-label pull-right">Individual <img src="<?=base_url();?>public/images/indiv_icon.png" style="margin:0;" alt=""></div>
			<div class="clear"></div>
		</div>-->
        
       <div class="identity-item-first">
			<div class="identity-item-label pull-left">Member Since</div>
			<div class="identity-item-label pull-right"><?php echo $profile->createdDate;  ?></div>
			<div class="clear"></div>
		</div>
        <?php } ?>
         <div class="sep_skill"></div>
       <!--<div class="identity-item-first">
			<div class="identity-item-label pull-left">Elance URL</div>
			<div class="identity-item-label pull-right"><input name="" type="text" value="http://bilalahmad_live.elance.com" /></div>
			<div class="clear"></div>
		</div>-->
        
       <!--<div class="identity-item-first">
			<div class="identity-item-label pull-left">Verifications</div>
			<div class="identity-item-label pull-right">
            <a href="#" class="pull-right qutity">1</a>
            <a href="#" class="pull-right" style="margin-right:10px;"><img src="<?=base_url();?>public/images/map.png" style="margin:0;" alt=""></a>
            <a href="#" class="pull-right" style="margin-right:10px;"><img src="<?=base_url();?>public/images/telephone.png" style="margin:0;" alt=""></a>
            <a href="#" class="pull-right"style="margin-right:10px;"><img src="<?=base_url();?>public/images/dollar.png" style="margin:0;" alt=""></a>
            <a href="#" class="pull-right"style="margin-right:10px;"><img src="<?=base_url();?>public/images/verify.png" style="margin:0;" alt=""></a>
            
            </div>
			<div class="clear10"></div>
            <a class="btn-small btn-small-secondary" href="https://www.elance.com/php/widget/main/profileWidget.php"><span>Download Your Profile Widget</span></a>
            
           <div class="clear"></div>
		</div>
       
       <div class="sep_skill"></div>-->
       
   
       <div class="clear"></div>  
</div>

<div class="clear10"></div>


<!--<div class="right_box_pro">
       <h4>Identity </h4>
        <a href="#" class="jobdtl_rightbtn btn_edit_pro pull-right" style="margin-top:-30px; display:block;">Edit</a>
       
       <div>You are not currently a member of any group </div>
       <div class="clear10"></div>
       
       <a href="#">View Elance Groups</a>       
 
       
       <div class="clear"></div>  
</div>-->
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
			<b><?php echo $rat['title']; ?> </b></p>
            </div>

<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 pull-left">
        	<strong>My rating for this job</strong>
        </div>
       <div class="col-lg-4 col-md-4 col-xs-8 col-sm-8 pull-left"><h5><b>Contractor:</b> <?php echo $rat['fName']; ?></h5></div>
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
                        <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Quality of Work</div>
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
                          <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Knowledge of Subject</div>  
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
                         <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Time-Frame</div>
                         <?php if($rat['sendercomments']){ ?>
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
                         <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Response Time</div>  
                         <?php if($rat['sendercomments']){ ?>
                         <div class="col-lg-4 col-md-3 ol-xs-12 col-sm-12 pull-left padding0"><?php echo $rat['sendercomments']; ?></div>  
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
                         <div class="col-lg-3 col-md-2 ol-xs-12 col-sm-12 pull-left padding0">Professionalism</div>             	
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
           <div class="clear"></div>   
        </div>   

   	            

    <link href="<?=base_url();?>public/css/examples.css" rel="stylesheet" type="text/css"/> 
    
<script>

$(document).ready(function(){

	$('.delete').click(function(){
		
		var skillId = $(this).attr('id');
		$(this).parents('.skillHolder').fadeOut('slow');
		var totalskill = $('.totalskill').text();
		$('.totalskill').text(parseInt(totalskill)-1);
		
			//$('#ajaxResponseMess').html('<div align="center" style="margin-top:5px;"><img src="<?= base_url() ?>/public/images/ajax_loader_gray_32.gif"></div>');
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>users/deleteUserSkillAjax/",
				data: "skillId="+skillId,
				success: function(html){
					
						if(html=='yes'){
							
							
						}
				}
			});
			
		
		})
	
	
	})	
		
	
</script>
</div>