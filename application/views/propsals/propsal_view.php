<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#describeYourSelf").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

				jQuery("#outlineApproch").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });
				
            });

            /* ]]> */

        </script>
 <style>
.readonlytext
 {
 	border:none;
	
	background:none;     
	
 }
 </style>
 
 <script>
 $(document).ready(function(){
 	var showChar = 300;
    var ellipsestext = "...";
    var moretext = "<b>View More</b>";
    var lesstext = "<b>View Less</b>";
	
    $('.more , .detailMore').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ ' </span><span class="morecontent"><span style="display:none;">' + h + '</span>  <a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext); 
			$(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
 </script>
<div id="wrap">

   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <?php if(!empty($success)){ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $success; ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account"><?php echo $propsalprojact[0]['title']; ?></div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/icons/hdng_btm.png" width="100%" height="3" alt=""></div>
            
            
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12  padding_tb20">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_box padding0">
                	<div class="col-lg-6 col-md-2 col-sm-12 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url()?>public/images/icons/icon_timeleft.png" alt=""> &nbsp; Time Left: <?php echo $propsalprojact[0]['lettime']; ?></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url()?>public/images/icons/icon_post.png" alt=""> 
                        &nbsp; Posted: <?php echo date('m/d/Y h:ia',strtotime($propsalprojact[0]['postDate'])); ?> </div><!--date("D-M-Y", strtotime($propsalprojact[0]['postDate']));-->
                        
                    </div>
                    <div class="col-lg-6 col-md-2 col-sm-12 col-xs-12">
                    <?php if($propsalprojact[0]['workType']!="fixedPrice")
							{?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        	<img src="<?=base_url();?>public/images/icons/icon_rate.png" alt=""> 
                        	&nbsp; Hourly Rate: $<?php echo $propsalprojact[0]['hourlyRate']; ?>  / hr
                        </div>
<!--                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_hours.png" alt=""> 
                        	&nbsp; <?php echo $propsalprojact[0]['hrsPerWeeks']; ?> hrs per weeks
                         </div>-->
                        <?php }else{?>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        		<img src="<?=base_url();?>public/images/icons/icon_rate.png" alt=""> 
                            	&nbsp; Budget: <?php
                                if($propsalprojact[0]['fixedBudget'] == 500)
                                    echo 'Less than $500';
                                else if($propsalprojact[0]['fixedBudget'] == 1000)
                                    echo 'Between $500 and $1,000';
                                else if($propsalprojact[0]['fixedBudget'] == 5000)
                                    echo 'Between $1,000 and $5,000';
                                else if($propsalprojact[0]['fixedBudget'] == 10000)
                                    echo 'Between $5,000 and $10,000';
                                else if($propsalprojact[0]['fixedBudget'] == 20000)
                                    echo 'More than $10,000';
                                else if($propsalprojact[0]['fixedBudget'] == 'Not Sure')
                                    echo 'Not Sure';
                                else
                                    echo '$'.number_format($propsalprojact[0]['fixedBudget'], 2);
                                ?>
                            	</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt" style="background-color:#fff;">
                    <?php $states = $propsalprojact[0]['states']; 
					if(!empty($states)) { ?>
                       		<img src="<?=base_url();?>public/images/icons/globeicon.png" alt=""> 
 					<?php
                                        $i = 0;
					foreach($states as $state)
                                            {
                                            $i++;
                                            if(sizeof($states) == $i)
                                               echo $state['stateName'];
                                            else 
                                               echo $state['stateName'].', ';
                                            }
					}
					?> 
                            </div>
                            <?php } ?>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt2">
                    <span>.......................................................................................................................................................................................... <!--</span><a href="#" style="text-decoration:none; color:#005cbe;">Less Detail</a>-->
                    <div style="clear:both"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_bx">
                    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_border">
                            <img src="<?=base_url()?>public/upload/profile/user_profile_placeholder_64x80.jpg" class="pull-left" alt="">                   
                            <div class="job_bx_sbbhdng">
                            <a href="<?=base_url()?>users/clientPublicView/<?php echo $propsalprojact[0]['userID'] ?>">client Info</a>
                            <br />
                                <a href="#"><?php echo $propsalprojact[0]['totaljobpost']; ?> jobs </a> | 
                                 <?=$propsalprojact[0]['usercountry']; ?> <!--<a href="#"><img src="<?=base_url()?>public/images/icons/pk_flg.png" alt=""></a>-->
                            </div>
                        </div>
                    </div>
                    <div class="arrow-down"> &nbsp;</div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb15">
                    <div class="detailMore">
                   <?php echo $propsalprojact[0]['description']; ?>
                   </div>
                    <br><br></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <strong>Desired Skills </strong>
                    </div>
                    <br>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php 
					$skill = $propsalprojact[0]['skills']; 
					if(!empty($skill)) {
                                            $j = 0;
					foreach($skill as $sk)
					{
                                            $j++;
                                            if(sizeof($skill) == $j)
						echo $sk['skillName'];
                                            else
						echo $sk['skillName'].', ';
					}
					}
					?> 
			</div>
                    <br>
                    </div>
                    
                </div>
               <!--End Job Description-->
              
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <br><br>
            		<h3>Proposals</h3>
                 </div>
                 <?php if(sizeof($propsals)>0){ ?>
                 <?php foreach($propsals as $propsallist) { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx2">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_border">
                
                    <img src="<?=base_url()?>public/upload/profile/user_profile_placeholder_64x80.jpg" class="pull-left" alt="">
                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 job_bx_hdng"><?php echo $propsallist['fName'].' '.$propsallist['lName']; ?> &nbsp; 
                    <?php 
					if(!empty($propsallist['awarded']) && $propsalprojact[0]['awardStatus']=='pending')
					{?>
                     <a href="<?=base_url()?>project/approveAward/<?php echo $propsalprojact[0]['ID']?>/<?php echo $propsalprojact[0]['userID'] ?>" class="btn btn-success" style="color:#FFF;">Select IT</a>
                     
						<a href="<?=base_url()?>project/rejectAward/<?php echo $propsalprojact[0]['ID']?>/<?php echo $propsalprojact[0]['userID'] ?>" class="btn btn-danger" style="color:#FFF;" onclick="return confirm('Are you sure to perform this action ?');">Reject IT</a>
                       
					<?php }
					?>
                      
                    </div>                   
                    <div class="job_bx_sbbhdng">
                        <?php echo $propsallist['country'];?> |
                         Rate: $<?php echo $propsallist['hourlyRate'];?>/hr | <?php echo $propsallist['mainCategory'];?> | <?php echo $propsallist['totalJobs']; ?> jobs | $0 Earnings |
                         <!-- rating -->
              
                  <?php 
					  
						$numberRate   	= $propsallist['rating'] ;
					
					for($i=1;$i<=$numberRate;$i++){ ?>			   
						<img src="<?=base_url();?>public/images/icons/fill_star.png" />
				 	 <?php 
					
					 } ?>
					 <?php 
					  for($i=$numberRate;$i<5;$i++){ ?>					
							<img src="<?=base_url();?>public/images/icons/unfill_star.png" />
         		 	<?php } ?>
          
          <!-- rating end --> 
						
						 <?php if(!empty($propsallist['awarded'])) 
						 { echo'<span> '.$propsallist['awarded'].'</span>';} ?> 
                         
                    </div>
                </div>
             
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 padding_tb16">
             
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng"><?php  echo date('m-d-Y:H-i-s',strtotime($propsallist['submitDate'])) ;?> <!-- | <img src="<?=base_url()?>public/images/invite_arrow.png" alt="">   |   Bid ID: 65377727--></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
                    <div class="detailMore">
                       <?php echo $propsallist['describeYourSelf'];?>
                       </div>
                        <br><br>
                         
                        <!-- <a href="#">$29,589 Earnings </a>--> 
                        
                    </div>
                    
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 detail_txt3">
                
                    </div>
                    
                    
                </div>
                
            </div>
            <?php } ?> <!--End Loop-->
            <?php }else{ ?> <!--End If-->
        		No Proposals Yet!
                <?php }?>
         </div>
            
            
        <!-- Propsal Submit Area-->
        <?php $user_id =$this->session->userdata('userID');
			if($user_id !='')
			{
				if($propsalprojact[0]['finishProject']==1)
				{
					echo "<h3>Complete Project</h3>"; 
				}else if($userAlreadyPropsal=='no'){?>
            <div class="jobdtl_right">
            	<?php echo form_open_multipart(base_url().'propsal/postbids/'.$ID); ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_hdng head_account" style="font-size:18px;">Create Your Wedding Proposal
                <span class="pull-right"><img src="<?=base_url()?>public/images/wedding_proposal.png" /></span>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_text padding_tb15">Don't include contact info.
                	<br><br>Describe your relevant experience and qualifications.
                    <input type="hidden" name="projectuserid" value="<?php echo $propsalprojact[0]['userID']; ?>">
                    <input type="hidden" name="title" value="<?php echo $propsalprojact[0]['title']; ?>">
                    <textarea class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtrea"  name="describeYourSelf" id="describeYourSelf"></textarea>
                 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_right_slct">
                     <input type="file" name="fileAttachement" id="fileAttachement" />
                    Add Attachment
                    </div>
                    <div class="job_bx_text pull-right" style="font-size:10px; color:#999;">100 characters</div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_text padding_tb15">Outline your approach to the job, or ask for more info
                   <!-- <br><a class="pull-right" href="#">use formating</a>-->
                    
                    <textarea class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtrea"  name="outlineApproch" id="outlineApproch1" required></textarea>
                    
                    <div class="job_bx_text pull-right" style="font-size:10px; color:#999;">100 characters</div>
                    
                    <strong class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left padding_tb15" style="font-size:16px;">Cost & Time of Delivery</strong>
                    
                    <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" ><img src="<?=base_url()?>public/images/icons/icon_rate.png" alt=""> 
                    My Earning
                    	 <input type="number" step="any" class="srchinpt pull-right myEarning" name="myEarning" style="height:26px; width:100px;" required>
                         <span class="pull-right" style="font-size:18px;">$</span>
                    </span>
                    
                    <span class="col-lg-11 col-md-12 col-sm-12 col-xs-12 jobdtl_text3" > <strong class="pull-left">
                    Billed to Client  <br><span style="font-size:10px;">include 
                    <a href="#">B4Thewedding Fee</a></span></strong>
                        <input type="number" step="any" style="height:26px; width:100px;"  class="srchinpt pull-right billedToClient" name="billedToClient">
                         <span class="pull-right" style="font-size:20px">$</span>
                    </span>
                    
                    <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left padding_tb15" >
                    <img src="<?=base_url()?>public/images/icons/icon_start.png" alt=""> Estimated Delivery Date
                    	 <select type="text" class="col-lg-6  srchinpt pull-right" name="estimateDilieveryDate" style="height:26px;" >
                         	<option>Select One</option>
                            <option value="1day">Within 1 day</option>
                            <option value="3days">Within 3 days</option>
                            <option value="7days">Within 1 week</option>
                            <option value="14days">Within 2 weeks</option>
                            <option value="21days">Within 3 weeks</option>
                            <option value="30days">Within 1 month</option>
                            <option value="60days">Within 2 months</option>
                            <option value="90days">Within 3 months</option>
                            <option value="180days">Within 6 months</option>
                            <option value="180days">More than 6 months</option>
                         
                         
                         </select>
                    </span>
                    <div class="clear10"></div>
                    <input type="submit" name="submit" value="submit" class="jobdtl_rightbtn" />
                     <?php echo form_close(); ?>
                    
            <!--End Propsal Submit Area-->
                </div>
                </div>
               <?php } else if(!empty($edit)) { ?> <!--End If-->
                  <div class="jobdtl_right">
                                    <?php if (!empty($success)){ ?>
                                    <p class="success" style="color:green">
                                    <?php echo $success;  ?>
                                    </p>
                        <?php } ?>
            	<?php echo form_open_multipart(base_url().'propsal/editPropsal/'.$ID); ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_hdng">Update Your Proposal</div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_text padding_tb15">Don't include contact info.
                	<br><br>Describe your relevant experience and qualifications.
                    <input type="hidden" name="propsalID" value="<?php echo $userAlreadyPropsal[0]['ID'] ?>" />
                    <textarea class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtrea"  name="describeYourSelf" id="describeYourSelf1" required><?php echo $userAlreadyPropsal[0]['describeYourSelf'] ?></textarea>
                    
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_right_slct">
                    
                    
                       <?php if( $userAlreadyPropsal[0]['filePath']!=''){?>
                                     <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                                          <div class="attatechedfile"> 
                                          <a href="<?=base_url();?>public/upload/propsal_upload/<?php echo $userAlreadyPropsal[0]['filePath']; ?>" target="_new">
                                          	
                                               
                                               <?php echo $userAlreadyPropsal[0]['filePath']; ?>
                                               </a>
                                               <br /> <br /> 
                                               <div class="remove"> <a href="javascript:;" data="<?php echo $userAlreadyPropsal[0]['filePath']; ?>" id="<?php echo $userAlreadyPropsal[0]['ID']; ?>" class="propsalAttachRemove">Remove</a></div >
                                           </div>
                                            
                                      </div>
                                      <?php } ?>
                    
                    
                    
                     <input type="file" name="fileAttachement" id="fileAttachement" />
                    Add Attachment
                    </div>
                    
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_text padding_tb15">Outline your approach to the job, or ask for more info
                    
                    
                    <textarea class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtrea"  name="outlineApproch" id="outlineApproch1" required><?php echo $userAlreadyPropsal[0]['outlineApproch'] ?></textarea>
                    
                    <div class="job_bx_text pull-right" style="font-size:10px; color:#999;">100 characters</div>
                    
                    <strong class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left padding_tb15" style="font-size:16px;">Cost & Timing</strong>
                    
                    <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" ><img src="<?=base_url()?>public/images/icons/icon_rate.png" alt=""> 
                    My Earning
                    	 <input type="number" step="any" class="srchinpt pull-right myEarning" name="myEarning" value="<?php echo $userAlreadyPropsal[0]['myEarning'] ?>" style="height:26px; width:110px;" autocomplete="off" required >
                         <span class="pull-right" style="font-size:18px;">$</span>
                    </span>
                    
                    <span class="col-lg-11 col-md-12 col-sm-12 col-xs-12 jobdtl_text3" > <strong class="pull-left">
                    Billed to Client  <br><span style="font-size:10px;">include 
                    <a href="#">4wedding Fee</a></span></strong>
                    	 <input type="number" step="any" style="height:26px; width:100px;" class="srchinpt pull-right billedToClient " name="billedToClient" value="<?php echo $userAlreadyPropsal[0]['billedToClient'] ?>" >
                         <span class="pull-right" style="font-size:20px">$</span>
                    </span>
                    
                    <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left padding_tb15" >
                    <img src="<?=base_url()?>public/images/icons/icon_start.png" alt=""> Estimated Delivery Date
                    	 <select type="text" class="col-lg-6  srchinpt pull-right" name="estimateDilieveryDate" style="height:26px;" >
                         	<option>Select One</option>
                            <option value="1day" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='1day'){ echo 'selected="selected"';} ?> >Within 1 day</option>
                            <option value="3days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='3days'){ echo 'selected="selected"';} ?>>Within 3 days</option>
                            <option value="7days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='7days'){ echo 'selected="selected"';} ?>>Within 1 week</option>
                            <option value="14days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='14days'){ echo 'selected="selected"';} ?>>Within 2 weeks</option>
                            <option value="21days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='21days'){ echo 'selected="selected"';} ?>>Within 3 weeks</option>
                            <option value="30days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='30days'){ echo 'selected="selected"';} ?>>Within 1 month</option>
                            <option value="60days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='60days'){ echo 'selected="selected"';} ?>>Within 2 months</option>
                            <option value="90days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='90days'){ echo 'selected="selected"';} ?>>Within 3 months</option>
                            <option value="180days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='180days'){ echo 'selected="selected"';} ?>>Within 6 months</option>
                            <option value="360days" <?php if($userAlreadyPropsal[0]['estimateDilieveryDate']=='360days'){ echo 'selected="selected"';} ?>>More than 6 months</option>
                         
                         
                         </select>
                    </span>
                   
                    <div class="clear10"></div>
                    
                    <input type="submit" name="submit" value="submit" class="jobdtl_rightbtn" />
                     <?php echo form_close(); ?>
                    
            <!--End Propsal Submit Area-->
                </div>
                    
               
                </div>
                <?php } else {?> 
                	<div class="jobdtl_right">
                     
                                    
            	<?php echo form_open_multipart(base_url().'propsal/updateView/'.$ID); ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_hdng head_account" style="font-size:18px;">Your Proposal
                    <span class="pull-right"><img src="<?=base_url()?>public/images/wedding_proposal.png" /></span>
                </div>
                <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_hdng">Your Proposal</div>-->
                <?php if($propsalprojact[0]['cancelProject']!=1 && $propsalprojact[0]['runingProject']=='0' )
					{
				 ?>
                <input type="submit" name="submit" value="Update" class="jobdtl_rightbtn col-lg-6 col-md-12 col-sm-12 col-xs-12" />
                <?php } ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_text padding_tb15">Don't include contact info.
                	<br><br>Describe your relevant experience and qualifications.
                    
                    
                    <textarea class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtrea readonlytext"  name="describeYourSelf1" id="describeYourSelf1" readonly="readonly"><?php echo $userAlreadyPropsal[0]['describeYourSelf'] ?></textarea>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_right_slct">
                    
                    
                       <?php if( $userAlreadyPropsal[0]['filePath']!=''){?>
                                     <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                                          <div class="attatechedfile"> 
                                          <a href="<?=base_url();?>public/upload/propsal_upload/<?php echo $userAlreadyPropsal[0]['filePath']; ?>" target="_new">
                                          	
                                               
                                               <?php echo $userAlreadyPropsal[0]['filePath']; ?>
                                               </a>
                                               <br /> <br /> 
                                               
                                           </div>
                                            
                                      </div>
                                      <?php } ?>
                    
                     Attachment
                    </div>
                    <div class="job_bx_text pull-right" style="font-size:10px; color:#999;">100 characters</div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdtl_text padding_tb15">Outline your approach to the job, or ask for more info
                    
                    
                    <textarea class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtrea readonlytext"  readonly="readonly" name="outlineApproch" id="outlineApproch"><?php echo $userAlreadyPropsal[0]['outlineApproch'] ?></textarea>
                    
                    <div class="job_bx_text pull-right" style="font-size:10px; color:#999;">100 characters</div>
                    
                    <strong class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left padding_tb15" style="font-size:16px;">Cost & Timing</strong>
                    
                    <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" ><img src="<?=base_url()?>public/images/icons/icon_rate.png" alt=""> 
                    My Earning
                    	 <input type="text" class="srchinpt pull-right readonlytext myEarning" name="myEarning" readonly="readonly" value="<?php echo $userAlreadyPropsal[0]['myEarning'] ?>" style="height:26px;" >
                         <span class="pull-right" style="font-size:18px;">$</span>
                    </span>
                    
                    <span class="col-lg-11 col-md-12 col-sm-12 col-xs-12 jobdtl_text3" > <strong class="pull-left">
                    Billed to Client  <br><span style="font-size:10px;">include 
                    <a href="#">B4TheWedding Fee</a></span></strong>
                    	 <input type="text" style="height:28px; width:100px;" class="srchinpt pull-right readonlytext" name="billedToClient" value="<?php echo $userAlreadyPropsal[0]['billedToClient'] ?>" >
                         <span class="pull-right" style="font-size:18px">$</span>
                    </span>
                    
                    <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left padding_tb15" >
                    <img src="<?=base_url()?>public/images/icons/icon_start.png" alt=""> Estimated Delivery Date  
                    	
                         <?php echo $userAlreadyPropsal[0]['estimateDilieveryDate'];?>
                         
                    </span>
                    
                     <?php echo form_close(); ?>
                    <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left " >Proposal amount only displayed to the client</span>
            <!--End Propsal Submit Area-->
                </div>
                    
               
                </div>
                <?php } ?>
             <?php }else{ ?> <!--End User login if-->
             				<div class="jobdtl_right">
             				To submit Propsal Please Login
                            </div>
             		<?php } ?>
            </div>
          <input type="hidden" name="commsion" id="commsion" value="<?php echo $setting['settingValue']; ?>" />  
            
        </div>
<script>
$(function(){
	$('.propsalAttachRemove').click(function(){
	var ID = $(this).attr('id');
	var filpath = $(this).attr('data');
		$.ajax({
				type: "POST",
				url: "<?= base_url() ?>propsal/deleteAttachFile/",
				data: "ID="+ID+"&filpath="+filpath,
				success: function(html){
					//alert(html);
						if(html == 'yes'){
						
							$('.attatechedfile').hide();
						}else{
							$('#error_show').show();
						}
				}
			});
		})	;
});

	
	</script>
	
	
<script>
/* myEarning commsion calculate */
$(function(){
		
	$(".myEarning").keyup(function() {
	var myEarning = parseFloat($(".myEarning").val());
        if(myEarning > 1000000){
            $(".myEarning").val('');
            $(".billedToClient").val('');
            return alert('ERROR! Amount Exceeded Maximum Limit');
        }

	if($(".myEarning").val()==='')
		{
			
			$(".billedToClient").val('');
		}
		else {
				var commsion = $('#commsion').val();
       			 var result = (commsion/100)*myEarning ;
				result = Number((result).toFixed(2));
   				 $(".billedToClient").val(result+myEarning);
		}
});

$(".billedToClient").keyup(function() {
	
	var billedToClient = parseFloat($(".billedToClient").val());
//        alert(billedToClient);
        if(billedToClient > 1000000){
            $(".myEarning").val('');
            $(".billedToClient").val('');
            return alert('ERROR! Amount Exceeded Maximum Limit');
        }
	if($(".billedToClient").val()==='' || $(".billedToClient").val()==null)
		{
			
			$(".billedToClient").val('');
                        $(".myEarning").val('');
		}
		else {
				var commsion = parseFloat($('#commsion').val());
       			 var result = (commsion/(100+commsion))*billedToClient;
                                result = Number((result).toFixed(2));
//				alert(result);
console.log(result);
				
				var valumyEarning = billedToClient-result;
				
   				 $(".myEarning").val(valumyEarning);
		}
	
});

});
</script>