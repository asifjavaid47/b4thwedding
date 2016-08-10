<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <?php if(!empty($success)){ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $success; ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Messages</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">
            
			<?php echo $projectDetail[0]['title']; ?>
            Posted By : <?php echo $projectDetail[0]['fName']; ?>
            </div>
            
            <div class="inbox_left">
                <ul>
                </ul>
            </div>
            
            
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 padding_tb40">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middle">
                	<div class="inner_project_form">
                    <?php echo form_open_multipart(base_url().'inbox/sendMessage/'.$projectID.'/'.$receiverID.'/'.$notificationID); ?>
                     <input type="hidden" name="projectID" value="<?php echo $projectID; ?>" />
                     <input type="hidden" name="receiverID" value="<?php echo $receiverID; ?>" />
                     <input type="hidden" name="notificationID" value="<?php echo $notificationID; ?>" />
					<textarea name="message" id="" cols="80" rows="10" required></textarea>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                    <input type="file" name="fileAttachement" id="fileAttachement" />
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                    	<input type="submit" class="join_btn" value="Send" name="send_message">
               		 </div>
                   
                    <?php echo form_close(); ?> 
                    </div>
                 </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middle">
                    <ul>  
                    <?php
					if(sizeof($InboxList) >0)
					{
						
						foreach($InboxList as $inbox){ ?>
                        <li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2">
                            	<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 inbox_hdng2">
								<?php echo $inbox->message; ?>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                
                                  <a href="<?=base_url();?>public/upload/messageUpload/<?php echo $inbox->attachFiles; ?>" target="_new">
                                               <?php  echo $inbox->attachFiles; ?>
                                               </a>
                                </div>
                            </div>
                            
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0" >
								<?php echo $inbox->fName; ?> 
                             </div>
                        	<div class="inbox_middleckbox">
                            	<?php echo $inbox->sendDate; ?>
                            </div>
                        </li>
                        <?php } ?>
                      <?php } ?>  
                    </ul>
                   
                    
                    
                </div>
                
            </div>
            
            
            <div class="inbox_right">
            </div>
            
        </div>        
    </div>