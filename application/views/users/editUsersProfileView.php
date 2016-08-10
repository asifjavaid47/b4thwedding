<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#fName").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

				jQuery("#lName").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

                jQuery("#email").validate({

                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",

                    //message: "Please enter a valid Email ID"

                });

              jQuery("#password").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

              jQuery("#password2").validate({
                    expression: "if ((VAL == jQuery('#password').val()) && VAL) return true; else return false;",

                    message: "Confirm password field doesn't match the password field"

                });          


				

            });

            /* ]]> */

        </script>
<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
			 <?php if(!empty($success)){ ?>
        	<div class="alert alert-success">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Success!</strong> <?php echo $success; ?>
			</div>
        <?php } ?>
            <div class="clear20"></div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding0">
         <h4 class="margin_padding0">Freelancer Profile </h4>
          <div class="clear20"></div>
          <div class="inbox_left col-lg-12 col-md-2 col-sm-4 col-xs-12">
                <ul>
					 <li class="all_remove_clas active_1"><a href="<?php echo base_url(); ?>users/freelancerProfile"><span>Overview </span></a></li>
                    
                     <li class="all_remove_clas active_2"><a href="<?php echo base_url(); ?>project/my_jobs_c"><span>Job History </span></a></li>
                       
                         <li class="all_remove_clas active_3"><a href="<?php echo base_url(); ?>users/editUsersSkills"><span>Skills</span></a></li>
                         <li><a href="<?php echo base_url(); ?>users/editUsersProfile"><span>Contact Info  </span></a></li>
                    
                     <li><a href="<?php echo base_url(); ?>users/resetPassword"><span>Reset Password</span></a></li>
                    <?php /*?> <li><a href="<?php echo base_url(); ?>users/freelancerPublicView/<?php echo $clientProfile[0]['ID'] ?>"><span>Public View of Profile</span></a></li><?php */?>
                      <li><a href="<?php echo base_url(); ?>portfolio"><span>Portfolio</span></a></li>
                </ul>
               
           
     
            </div>
        <?php /*?> <div class="inbox_left" style="width:100%; border-radius:0; margin:0;">
               <ul>
                    
                    <li><a href="<?php echo base_url(); ?>users/freelancerProfile"><span>Overview </span></a></li>
                    
                     <li><a href="<?php echo base_url(); ?>project/my_jobs_c"><span>Job History </span></a></li>
                       
                         <li><a href="<?php echo base_url(); ?>users/editUsersSkills"><span>Skills</span></a></li>
           </ul>
            </div>
             <div class="clear10"></div>
          <div class="inbox_left" style="width:100%; border-radius:0; margin:0;">
                <ul>
                    
                    <li><a href="<?php echo base_url(); ?>users/editUsersProfile"><span>Contact Info  </span></a></li>
                    
                     <li><a href="<?php echo base_url(); ?>users/resetPassword"><span>Reset Password </span></a></li>
                 
                       
                         <!--<li><a href="#"><span>Public View of Profile  </span></a></li>-->
                         
                          
                </ul>
            </div><?php */?>
            <div class="clear20"></div>
            
          
          </div>
        
        
         <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
		 <form action="<?=base_url();?>users/editUsersProfile" method="post" enctype="multipart/form-data">
					<?php 
						foreach($freelancerProfile as $profile)
						{
						
					?>	
			
          <h4 class="margin_padding0">Edit Profile</h4>
          <div class="clear20"></div>
          <h2 class="margin_padding02">Basic Information </h2>
          <div class="clear20"></div>
          <span class="required">*Required</span>
          <div class="clear"></div>
          <div class="pedit-title inner_project_form_txt">First Name<span class="required">*</span></div>
          <input type="text"  value="<?php echo $profile->fName;?>" name="fName" id="fName"  class="edit_pro_input col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="pedit-title inner_project_form_txt">Last Name<span class="required">*</span></div>
          <input type="text" value="<?php echo $profile->lName;?>" name="lName" id="lName"  class="edit_pro_input col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                   <div class="pedit-title inner_project_form_txt">User Name<span class="required"></span></div>
          <input type="text" value="<?php echo $profile->userName;?>" name="userName" readonly class="edit_pro_input col-lg-6 col-md-6 col-sm-12 col-xs-12" style="cursor:not-allowed; background:#f5f5f5">
                            <div class="pedit-title inner_project_form_txt">Email<span class="required">*</span></div>
          <input type="text" value="<?php echo $profile->email;?>" name="email" id="email" class="edit_pro_input col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="clear"></div>
           <div class="pedit-title inner_project_form_txt">Image<span class="required"></span></div>
           
            <input type="file"   name="image"  class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
           
          <div class="clear20"></div>
          
          <?php 
		  	if($profile->image!='')
			{?>
            <img src="<?=base_url()?>public/upload/profile/thumbnail/<?php echo $profile->image ?>" />
				
			<?php }  ?>
		 
          <div class="pedit-title"><h4>Hourly Rate (optional)</h4></div>
          
          
          
          <div>
<div style="margin-top:15px;">
<div style="width:195px;" class="left">
My hourly rate:
</div>
<div class="left">$<input type="text"  style="width: 100px" value="<?php echo $profile->hourlyRate;?>" name="hourlyRate" required> <span class="midgrey">/hr</span>
</div>
<div class="clear"></div>
</div>

</div>

<div class="clear10"></div>         
                                <div class="pedit-title inner_project_form_txt">Country<span class="required">*</span></div>
          <select name="country" class="edit_pro_input col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
          
           <?php 
							foreach($countries as $con)
							{?>
							<option value="<?php echo $con->countryName;?>" <?php if($con->countryName==$profile->country){echo 'selected="selected"';} ?>><?php echo $con->countryName;?></option>
							<?php }?>
                            </select>     
          <div class="clear10"></div>  
          <div class="pedit-title">Overview<span class="required">*</span></div>
          <div>Add a few sentences about your background, what you offer, and why clients should hire you.</div>
          
          <textarea name="overview" class="form-control_pro col-lg-6 col-md-6 col-sm-12 col-xs-12"><?php echo $profile->overview;?></textarea>
          <div class="clear"></div>
          
          <div style="text-align:left;" class="col-lg-3 col-md-6 col-sm-12 col-xs-12 padding0">
No more than 10, each separated by a comma</div>
          <div style="text-align:right;" class="col-lg-3 col-md-6 col-sm-12 col-xs-12 padding0">500</div>
          <div class="clear20"></div>
           <!-- <a href="#" class="jobdtl_rightbtn btn_edit_pro btn_edit_pro3">Save</a>
          <a href="#" class="jobdtl_rightbtn btn_edit_pro btn_edit_pro3">Cancel</a>-->
		  
          	<?php
					
						}
								
					?>
			
          	<div class="">
					<input type="submit" class="jobdtl_rightbtn btn_edit_pro btn_edit_pro3" name="update_profile" value="Update Profile" />
			</div>
				</form>
         </div>
              
        </div>        
    </div>

