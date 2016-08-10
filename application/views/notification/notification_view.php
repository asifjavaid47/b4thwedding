<script type="text/javascript">
            $(function () {

                $('.delete').click(function (e) {

                    if ($("input:checked").length > 0) {
                       if(confirm('Do you want to Delete?'))
					   {
                        $('#act').val("delete");
                        $('#submitForm').submit();
					   }else
					   {
						   return;
					   }
                 
                    }else{
                        alert("Please Select a row");
                    }
                });


                
            });
			
			
$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.chk').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.chk').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
        </script>
        <style>
		.read
		{
			font-weight:normal !important;
			
		}
		</style>
 
<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Notifications</div>
            <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
            
            
            <div class="inbox_left">
                <ul>
                    <li class="active"><a href="<?=base_url()?>notification/getNotification"><span class="inbox_icon" style="background:#fff;"> &nbsp; </span>All Type</a></li>
                    <!--<li><a href="#"><span class="inbox_icon" style="background:#ff0000;"> &nbsp; </span><span>Action Required</span></a></li>-->
                    <li class="active">
                    <a href="<?=base_url()?>notification/getNotification/message"><span class="inbox_icon" style="background:#0A9AD1;"> &nbsp; </span>
                    <span>Messages</span></a>
                    </li>
                    <li><a href="#"><span class="inbox_icon" style="background:#89D110;"> &nbsp; </span><span>Payments</span></a></li>
                    <li>
                    <a href="<?=base_url()?>notification/getNotification/propsal"><span class="inbox_icon" style="background:#FF9615;"> &nbsp; </span>
                    <span>Jobs & Proposals</span></a>
                    </li>
                    <!--<li><a href="#"><span class="inbox_icon" style="background:#8C2100;"> &nbsp; </span><span>Terms</span></a></li>-->
                    <!--<li><a href="#"><span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span><span>Invites</span></a></li>
                    <li><a href="notification/getNotification/readStatus"><span class="inbox_icon" style="background:#2A3640;"> &nbsp; </span><span>Status</span></a></li>-->
                    <li><a href="<?=base_url()?>notification/getNotification/feedBack"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span><span>Feedback</span></a></li>
                </ul>
            </div>
            
            
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 padding_tb40">
            	
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inboxmiddle_hdng">
                	
                    <div class="col-lg-2 col-md-6 col-sm-8 col-xs-12 inbox_middletop">
                    	<!--<a href="#" class=" inbox_middlelink">Mark Unread</a>
                        <a href="#" class=" inbox_middlelink border_lr">Mark Read</a>-->
                        <a href="#" class="inbox_middlelink delete">Delete</a>
                    </div>
                    
                </div>
                
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middle">
                	<ul>
                    
			
<form method="post" id="submitForm" action="<?=base_url(); ?>notification/delete_notification">
 <?php
 foreach($notificationList as $list){ ?>
 					<?php
					$senderName	=	'';
					$url = '';
					if($list->msgTypes=="feedBack")
					{
					$senderName	= $list->userName;
					$url= "feedback/addFeedback/".$list->projectID."/".$list->senderID."";
					}else if($list->msgTypes=="paymentRequest")
					{
					$senderName	= $list->userName;
					$url= "projectPayment/projectPaymentView/".$list->projectID."/".$list->senderID."/".$list->notificationID."";
					}
					else if($list->msgTypes=="message" || $list->msgTypes=='paymentRequestToAdmin')
					{
					$senderName	= $list->userName;
					$url= "inbox/sendMessage/".$list->projectID."/".$list->senderID."/".$list->notificationID."";
					}else if($list->msgTypes=="addBalance" || $list->msgTypes=='Send_Paymnet' ||$list->msgTypes== 'Receive_project_payment')
					{
					$senderName	= "Admin B4thewedding";
					if($list->msgTypes=="Receive_project_payment")
					{
						$senderName	= $list->userName;
					}
					$url= "payment/transaction";
					}else if($list->msgTypes=='milestone')
					{
						$senderName	= $list->userName;
						$url= "milestone/detail/".$list->projectID."/".$list->senderID."";
					}
					else if($list->msgTypes=='canceldisputerefund')
					{
						$senderName	= $list->userName;
						$url= "workroom/cancelProjectStepOne/".$list->projectID."/".$list->senderID."";
					}
					else 
					{
						if(($list->msgTypes=='propsal' || $list->msgTypes=='awardedJob'))
						{
							$senderName	= $list->userName;
						}else
						{
						$senderName	= "Admin B4thewedding";
						}
						$url= "propsal/postbids/".$list->projectID."/".$list->notificationID."";
					}
					?>
                        <li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2 <?php if($list->readStatus==1){echo'read';}?>">
                            	<a href="<?=base_url()?><?php echo $url;?>"><?php echo $list->message; ?></a>
								
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            	<div class="col-lg-4 col-md-3 col-sm-3 col-xs-6 pull-left">
                            	From:<?php echo $senderName; ?>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                Job: <?php echo $list->title; ?>
                                </div>
                            </div>
                            <div class="clear10">
                            </div>
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0" >
							<?php 
							$dateformat	=$list->sendDate;	
							echo date('m-d-Y:H-i-s',strtotime($dateformat));
							
							?> 
                            
                            </div>
                            <input type="checkbox" class="inbox_middleckbox chk" name="chk[]"
                             value="<?php echo $list->notificationID; ?>" />
                             <a href="<?=base_url();?><?php echo $url;?>" class="inbox_middleview">View Detail  &nbsp;|
                             </a>
                        
                        </li>
                        <?php } ?>
                        <?php echo form_close(); ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middleresult">( <?php echo sizeof($notificationList); ?> Results)</div>
                    </ul>
                </div>
            </div>
            <div class="inbox_right">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng">My Working Jobs</div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_txt">
                	<br><a href="<?=base_url()?>project/my_jobs_c">View All Jobs</a>
                </div>
            </div>
        </div>        
    </div>