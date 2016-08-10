<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Inbox</div>
            <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
            
            
            <div class="inbox_left">
                <ul>
                    <li class="active"><a href="#"><span class="inbox_icon" style="background:#fff;"> &nbsp; </span>All Type</a></li>
                    <li><a href="#"><span class="inbox_icon" style="background:#ff0000;"> &nbsp; </span><span>Action Required</span></a></li>
                    <li><a href="#"><span class="inbox_icon" style="background:#0A9AD1;"> &nbsp; </span><span>Messages</span></a></li>
                    <li><a href="#"><span class="inbox_icon" style="background:#89D110;"> &nbsp; </span><span>Payments</span></a></li>
                    <li><a href="#"><span class="inbox_icon" style="background:#FF9615;"> &nbsp; </span><span>Jobs & Proposals</span></a></li>
                    <li><a href="#"><span class="inbox_icon" style="background:#8C2100;"> &nbsp; </span><span>Terms</span></a></li>
                    <li><a href="#"><span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span><span>Invites</span></a></li>
                    <li><a href="#"><span class="inbox_icon" style="background:#2A3640;"> &nbsp; </span><span>Status</span></a></li>
                    <li><a href="#"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span><span>Feedback</span></a></li>
                </ul>
            </div>
            
            
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 padding_tb40">
            	
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inboxmiddle_hdng">
                	<select class="inboxmiddle_slct" name=""><option>Select one</option></select>
                    <input type="checkbox" class="inbox_middleckbox" name="chekbox" />
                    <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 inbox_middletop">
                    	<a href="#" class=" inbox_middlelink">Mark Unread</a>
                        <a href="#" class=" inbox_middlelink border_lr">Mark Read</a>
                        <a href="#" class=" inbox_middlelink">Delete</a>
                    </div>
                    
                </div>
                
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middle">
                	<ul>
                    <?php
			//print_r($jobInboxList);

 foreach($jobInboxList as $job){ ?>
                        <li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2"><?php echo $job['title']; ?></div>
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0" ><?php echo $job['description']; ?> </div>
                        	<input type="checkbox" class="inbox_middleckbox" name="chekbox" /><a href="<?=base_url(); ?>project/detail_project/<?php echo $job['ID']; ?>" class="inbox_middleview">View Detail  &nbsp;|</a>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_txt2">
                                <span>From</span><a href="#"><?php
					
								  foreach ( $job['skills'] as $key => $value ) {
 
    									echo $value[0].','; 
   
								  }
								
								?>Islamabad</a><span>Job</span><a href="#">Adobe Illustrator</a>
                            </div>
                        </li>
                        <?php } ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middleresult">( 1 Result )</div>
                    </ul>
                   
                    
                    
                </div>
                
            </div>
            
            
            <div class="inbox_right">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng">My Working Jobs</div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_txt">Lorem ipsum dolor sit amet consectetur adipiscing elit
                	<br><a href="#">View More</a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_txt">Lorem ipsum dolor sit amet dipiscing elit
                	<br><a href="#">View More</a>
                </div>
            </div>
            
        </div>        
    </div>