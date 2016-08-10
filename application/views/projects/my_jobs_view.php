<?php
    $user_id = $this->session->userdata('userID');
?>
<style>
.dropdown-menu > li > a
{
	padding:0 !important;
}
</style>
<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        	<?php if($this->session->flashdata('success'))
			{?>
            <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">My Wedding Jobs</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <div style="padding:22px; padding-left:7px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inboxmiddle_hdng" style="background:none repeat scroll 0 0 #eee;">
                	
                    <div class="co-lg-2 col-md-2 col-sm-3 col-xs-3 styled-select">
                        <select name="filteration" class="selectpicker" style="width:104px;">
                            <option value="all" <?php if(@$filter == 'all'){ echo 'selected="selected"';}?>>All</option>
                            <option value="in-progress" <?php if(@$filter == 'in-progress'){ echo 'selected="selected"';}?>>In Progress</option>
                            <option value="proposals" <?php if(@$filter == 'proposals'){ echo 'selected="selected"';}?>>Proposals </option>
                            <option value="projects" <?php if(@$filter == 'projects'){ echo 'selected="selected"';}?>>Projects</option>
                            <option value="completed" <?php if(@$filter == 'completed'){ echo 'selected="selected"';}?>>Completed</option>
                            <option value="archived" <?php if(@$filter == 'archived'){ echo 'selected="selected"';}?>>Archived</option>
                        </select>
                        <form method="post" name="search_filteration" action="<?=base_url()?>project/my_jobs_c">
                            <input type="hidden" name="filter">
                            
                        </form>
                        <!--<a href="<?=base_url()?>project/archivesJob" class="inbox_middlelink delete">View Archived Jobs </a>-->
                    </div>
                    
                </div>
                
                </div>
            <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12">
               
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  padding_tb20">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_arrow padding0" style="box-shadow: 5px 5px 5px #b3b3b3" id="pagination-content">
                    <ul class="even-odd-myjobs">
                    <?php if(!empty($array_merge))
						{?>
                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">My Propsal</div>-->
                     <?php $i=0; foreach($array_merge as $prop){
					
					  if ($i % 2 == 0)
					  {
						$bg = 'background: #fff';
					  }
					  else /* odd   */
					  {
						$bg = 'background: #eee';
					  }
					  $i++;
                            if($user_id != $prop['projectUserID']){
                   
				    ?>
                    <li style="<?php echo $bg; ?>" class="my_proposals even-odd-myjobs-li">
                        	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                    
                            <?php if(!empty($prop['projectuserimage']))
                                {
                            ?>
                                <img src="<?=base_url()?>public/upload/profile/thumbnail/<?php echo $prop['projectuserimage']; ?>" alt="Profile Image" width="70px" height="80px">
                            <?php }else{ ?>
                                <img src="<?=base_url()?>public/upload/profile/user_profile_placeholder_64x80.jpg" alt="">
                            <?php } ?>	
                                </div>
                        	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 lance_txt">
                            	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 lance_hdng2">
                                <?php if(($prop['awarded']=='awarded' || $prop['awarded']=='completed') && $prop['awardStatus']!='pending') 
									{?>
										&nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>workRoom/message/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>"><?php echo $prop['title']; ?></a>
								<?php }else 
								{ ?>
                                &nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>propsal/postbids/<?php echo $prop['ID']; ?>"><?php echo $prop['title']; ?></a>
                                <?php } ?>
                                </div>
                                
                            	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 lance_sbbhdng pull-left">
 								<div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 pull-left">
                                   <a href="#"> <?php echo $prop['fName']; ?> </a>
                                   <?php 
                                   if($prop['awarded']!='completed')
								   {?>
                                   |  
                                   <a href="#"><?php echo $prop['totalPropsal']; ?> Proposals </a>
                                   <?php } ?>
                                    <?php if(@$prop['awarded']=='awarded'){ ?>
                                   <span>| Started on <?=date('m/d/Y' , strtotime(@$prop['awardedDate'])); ?></span>
                                    <?php } else if(@$prop['awarded']=='completed'){ ?>
                                   <span>| Completed on <?=date('m/d/Y' , strtotime($prop['completedDate'])); ?></span>
                                    <?php } ?>
                                   
                                    <br>
                                    <?php if($prop['awarded']=='awarded')
									{
                                  		if($prop['paymentRequest']=='1') {?>
                                    <a href="#" style="color:#c53d8a;">You Have Submitted Payment Request on <?php echo $prop['paymentRequestDate']; ?></a> <br />
                                     <?php } ?>
                                    
                                    <?php 
										if($prop['awardStatus']=='pending')
										{ ?>
                                        <a href="<?=base_url()?>propsal/postbids/<?php echo $prop['ID']; ?>" style="color:#c53d8a;">Approval Pending</a>
											
										<?php }else
                                        {?>
                                       		<a href="#" style="color:#c53d8a;">Working</a>
                                        <?php }?>
									
                                    <?php }else if($prop['awarded']=='completed')
									{
										echo 'Completed';
										if($prop['feedback']!=1)
											{?> |
											<a href="<?=base_url()?>feedback/addFeedback/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>">Add feed back</a>
										<?php }if($prop['feedback']==1)
										 			{?> |
                                                    <a href="<?=base_url()?>feedback/addFeedback/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>">View your feed back</a>
														
													<?php }
									}
									else{ ?>
                                    <a href="#" style="color:#c53d8a;">You Submitted Propsal on <?php echo $prop['submitDate']; ?></a>
                                    <?php } ?>
                                    
                                    </div>
                                    
                                    <div class="dropdown col-lg-2 col-md-2 pull-left">
                                    	<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Action
        <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        <?php if($prop['awarded']=='awarded' && $prop['awardStatus']!='pending') {?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>workRoom/message/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>">Message</a>
                                        </li>
                                        
                                        <li role="presentation" style="padding:10px;"><a role="menuitem" tabindex="-1" href="<?=base_url()?>projectPayment/projectPaymentView/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>">Payment</a></li>
                                        
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url()?>milestone/detail/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>">Terms & Milestones</a></li>
                                        
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url()?>workRoom/cancelProjectStepOne/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>">Cancel, Refund or Dispute</a></li>
                                         <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url()?>workRoom/uploadsFilesList/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>">Files</a></li>
                                         
                                         <li role="presentation">
                                         <a role="menuitem" tabindex="-1" href="<?=base_url()?>feedback/completeJob/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>" onclick="return confirm('are you sure want to mark as complete?');">Complete</a></li>
                                          <?php }else
										  	{
										   ?>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>propsal/postbids/<?php echo $prop['ID']; ?>">View Job</a>
                                        </li>
                                        <?php  if($prop['archive']!=1  && $prop['awarded'] =='completed')
									   { ?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>project/sendPropsalToArchive/<?php echo $prop['propsalID']; ?>">Archive Job</a>
                                        </li>
                                        <?php } ?>
                                       
                                         <?php } ?>
                                        </ul>
                                     </div>
                                    
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </li>
                        <div style="clear:both;"></div>
                        
                        <?php } else {
                            ?>
                         
                        <li  style="<?php echo $bg; ?>" class="my_own_jobs even-odd-myjobs-li">
                        	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            
                             <?php if(!empty($prop['projectuserimage']))
							 	{
							  ?>
                             <img src="<?=base_url()?>public/upload/profile/thumbnail/<?php echo $prop['projectuserimage']; ?>" alt="Profile Image" width="70px" height="80px">
                             <?php }else{ ?>
							   <img src="<?=base_url()?>public/upload/profile/user_profile_placeholder_64x80.jpg" alt="">
                             	 <?php } ?>	
                            </div>
                        	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 lance_txt">
                            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 lance_hdng2">
                                &nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>
								<?php if($prop['checkAwarded']=='awarded' && $prop['awardStatus']!='pending') 
								{ echo'workRoom/message/'.$prop['ID'].'/'.$prop['awardaduserID']; 
								} else { echo'project/detail_project/'.$prop['ID']; } ?>">
								<?php echo $prop['title']; ?></a>
                                </div>
                                
                                    
                            	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 lance_sbbhdng pull-left">
                                <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12 pull-left">
                                <?php if($prop['runingProject']=='1') {
										if($prop['awardStatus']=='pending')
										{ ?>
                                        <a href="#" style="color:#c53d8a;">Pending</a>
											
										<?php }else
                                        {?>
                                       		<a href="#" style="color:#c53d8a;">Working</a>
                                        <?php }?>
                                		 | 
                                <a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $prop['awardaduserID']; ?>"><?php echo $prop['awardaduserName']; ?> </a>
                                <?php }else if($prop['runingProject']=='2') {?>
                                Complete | <a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $prop['awardaduserID']; ?>"><?php echo $prop['awardaduserName']; ?> </a>
                                <?php }else if($prop['cancelProject']=='1')
									{
										echo ' Cancled Project ';
									}
								else
								{ ?>
                                	  <strong>Posted:</strong> <?php echo $prop['postDate']; ?> | 
                                    <a href="#"> <?php echo $prop['propsalTotal']; ?> Proposals </a> <br />
                                    Hiring Open 
                                   <?php } ?>
                                    <?php if(@$prop['awarded']=='awarded'){ ?>
                                   <span>| Started on <?=date('m/d/Y' , strtotime(@$prop['awardedDate'])); ?></span>
                                    <?php } else if(@$prop['awarded']=='completed')
									{ ?>
                                   <span>| Completed on <?=date('m/d/Y' , strtotime($prop['completedDate'])); ?>
                                   </span>
                                   
                                   <?php if($prop['feedback']!=1)
											{?> <br />
											<a href="<?=base_url()?>feedback/addFeedback/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>">Add feed back</a>
										 <?php }else if($prop['feedback']==1)
										 			{?><br>
                                                    <a href="<?=base_url()?>feedback/addFeedback/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>">View your feed back</a>
													
													<?php }
                                   
                                     } ?>
                                    
                                    
                                    
                                    
                                    <a href="#" style="color:#c53d8a;">| Your Project </a>
                                    <?php if($prop['awardStatus']=='pending')
									{?>
                                    Approval Pending
										<a href="<?=base_url()?>project/cancelAward/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>" style="color:#c53d8a;" onclick="return confirm('Are you sure to perform this action ?');">| Select Another Contractor </a>
									<?php }?>
                                    
                                    
                                </div>
                                 
                                <div class="dropdown col-lg-2 col-md-2 pull-left">
                                    	<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Action
        <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" style="margin-left:100px;" role="menu" aria-labelledby="menu1">
                                        <?php if($prop['runingProject']=='1' && $prop['awardStatus']!='pending') {?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>propsal/postbids/<?php echo $prop['ID']; ?>">View Job</a>
                                        </li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>workRoom/message/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>">Message</a>
                                        </li>
                                        
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url()?>projectPayment/projectPaymentView/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>">Payment</a></li>
                                        
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url()?>milestone/detail/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>">Terms & Milestones</a></li>
                                        
                                        <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?=base_url()?>workRoom/cancelProjectStepOne/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>">
                                       Cancel, Refund or Dispute </a>
                                        </li>
                                         <li role="presentation">
                                         <a role="menuitem" tabindex="-1" href="<?=base_url()?>workRoom/uploadsFilesList/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>">Files</a></li>
                                         
                                          <li role="presentation">
                                         <a role="menuitem" tabindex="-1" href="<?=base_url()?>feedback/completeJob/<?php echo $prop['ID']; ?>/<?php echo $prop['awardaduserID']; ?>" onclick="return confirm('are you sure want to mark as complete?');">Complete</a></li>
                                         
                                          <?php }else if($prop['runingProject']=='2')
										  	{?>
											 <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>propsal/postbids/<?php echo $prop['ID']; ?>">
                                        View Job</a>
                                        </li>
                                       <?php  if($prop['archive']!=1)
									   { ?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>project/sendJobToArchive/<?php echo $prop['ID']; ?>">Archive Job</a>
                                        </li>
                                        <?php } ?>
											<?php }else
											{
                                             if($prop['cancelProject'] == 1 && $prop['archive']!=1){
										   ?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>project/sendJobToArchive/<?php echo $prop['ID']; ?>">Archive Job</a>
                                        </li>
                                          <?php } ?>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" 
                                        href="<?=base_url()?>propsal/postbids/<?php echo $prop['ID']; ?>">View Job</a>
                                        </li>
                                     
                                         <?php } ?>
                                        </ul>
                                     </div>
                               
                            </div>
                                    </div>
                            <div style="clear:both;"></div>
                        </li>
                        <div style="clear:both;"></div>
                       
                        
                        
                     <?php }
                            }
                        }
                    ?>
                    

                        
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middleresult" style="padding-right:10px !important; padding-bottom:10px !important; font-weight:bold;
                        font-size:16px;">
                       
                        (  <?php 
						$total1 =sizeof($propsals);
						$total2 = sizeof($jobInboxList);
						$total = $total1+$total2;
						echo $total;
						?> Total Results )
                        
                        </div>
                    </ul>
                </div>
                <div style="clear:both;" class="clear10"></div>
                <div id="smart-paginator" class="col-lg-9 pull-right col-md-12 col-sm-12 col-xs-12" > </div>
                
            </div>
            
            
            
            
        </div>        
    </div>
    <script>
	 function editProject(id)
	 {
		 if(id=='')
		 {
		 	return false;
		 }
		window.location.href= "<?= base_url() ?>project/update_project/"+id; 
	 }
         $('select[name=filteration]').change(function() {
            var value = $(this).val();
            if(value == '')
                return false;
            $('form[name=search_filteration] input[name=filter]').val(value);
            $('form[name=search_filteration]').submit();
         });
         
         $(document).ready(function (){
            var total_projects = $( "li.even-odd-myjobs-li" ).length;
            if(total_projects > 0){
                $('#smart-paginator').smartpaginator({ totalrecords: total_projects, recordsperpage: 8,controlsalways: false,datacontainer: 'pagination-content',dataelement: 'li.even-odd-myjobs-li', initval:0 , next: '>', prev: '<', first: '<<', last: '>>',display: 'single',length: 3, theme: 'purpol'

            });
     } else {
            $('#smart-paginator').css("display", "none");
     }

         });
         
	</script>