          <div class="inbox_left" style="margin-top:0px;">
                <ul>
                    <li><a href="">
                    <span class="inbox_icon" style="background:#fff;"> &nbsp; </span>All Type</a>
                    </li>
                    
                    <li class="<?php if($active_class == 'messages') echo 'active'; ?>">
                        <a href="<?=base_url()?>workRoom/message/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span>
                    	<span>Messages</span></a>
                    </li>
                    <li class="<?php if($active_class == 'payments') echo 'active'; ?>">
                        <a href="<?=base_url()?>projectPayment/projectPaymentView/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span><span>Payments</span></a></li>
                    <li class="<?php if($active_class == 'files') echo 'active'; ?>">
                    <a href="<?=base_url()?>workRoom/uploadsFilesList/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span>
                    	<span>Files</span></a>
                    </li>
                    <!--<li><a href="#"><span class="inbox_icon" style="background:#8C2100;"> &nbsp; </span><span>Terms</span></a></li>-->
                    <li class="<?php if($active_class == 'cancel') echo 'active'; ?>">
                        <a href="<?=base_url()?>cancelDispute/cancelProjectStepOne/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#904EC0;"> 
                    &nbsp; </span><span>Cancel, Refund or Dispute</span></a></li>
                    <li class="<?php if($active_class == 'milestone') echo 'active'; ?>">
                        <a href="<?=base_url()?>milestone/detail/<?=$projectID?>/<?=$receiverID?>"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span><span>Terms & Milestones</span></a>
                    </li>
<!--                    <li>
                        <a href="<?=base_url()?>project/my_jobs_c"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span>
                        <span>Work View</span></a>
                    </li>-->
                    
                </ul>
            </div>
