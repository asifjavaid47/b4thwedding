<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        	<?php if($this->session->flashdata('success'))
			{?>
            <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">My Archived Jobs</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inboxmiddle_hdng">
                	
                    <div class="co-lg-1 col-md-2 col-sm-3 col-xs-3 inbox_middletop">
                    	
                        <a href="<?=base_url()?>project/my_jobs_c" class="inbox_middlelink delete">View My Jobs </a>
                    </div>
                    
                </div>
            
            
            <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12">
                <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_hdng">
                	<input type="checkbox" class="lance_ckbox" name="chekbox" />
                	<select class="lance_slct" name=""><option>Select one</option></select>
                    
                    <a href="#" class="lance_icon"><img src="<?=base_url()?>public/icons/setting_icon.png" alt=""></a>
                    <a href="#" class="lance_icon"><img src="<?=base_url()?>public/images/icons/broadcast_icon.png" alt=""></a>
                    <a href="#" class="lance_icon"><img src="<?=base_url()?>public/icons/folder_icon.png" alt=""></a>
                    <a href="#" class="lance_icon"><img src="<?=base_url()?>public/icons/tag_icon.png" alt=""></a>
                    <a href="#" class="search_icon"><img src="<?=base_url()?>public/icons/seach_icon.png" alt=""></a><input type="text" class="lance_search" name="search" value="search">
                    
                </div>-->
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  padding_tb20">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_arrow padding0">
                	<ul>
                    
                    <?php foreach($propsals as $prop){
                   
				    ?>
                        <li><!--<input type="checkbox" class="lance_ckbox2" name="chekbox" /><--></-->
                        	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            <img src="<?=base_url()?>public/upload/profile/user_profile_placeholder_64x80.jpg" alt=""></div>
                        	<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 lance_txt">
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_hdng2">
                                <?php if($prop['awarded']=='awarded') 
									{?>
										<a href="<?=base_url()?>workRoom/message/<?php echo $prop['ID']; ?>/<?php echo $prop['projectUserID']; ?>"><?php echo $prop['title']; ?></a>
								<?php }else 
								{ ?>
                                <a href="<?=base_url()?>propsal/postbids/<?php echo $prop['ID']; ?>"><?php echo $prop['title']; ?></a>
                                <?php } ?>
                                </div>
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_sbbhdng">
 
                                   <a href="#"> <?php echo $prop['fName']; ?> </a> |  
                                   <a href="#"><?php echo $prop['totalPropsal']; ?> Proposals </a> |
                                   <?php if(!empty($prop['awarded']) && ($prop['paymentRequest'] !='1')) {?> 
                                   <a href="<?=base_url()?>payment/paymentRequest/<?php echo $prop['ID']; ?>">
                                    Payment Request </a> 
                                    <?php  } ?>
                                    <br>
                                    <?php if($prop['paymentRequest']=='1') {?>
                                    <a href="#" style="color:#005cbe;">You Have Submitted Payment Request on <?php echo $prop['paymentRequestDate']; ?></a>
                                    <?php }else if($prop['awarded']=='awarded') {?>
                                    <a href="#" style="color:#005cbe;">Working</a>
                                    <?php }
									else{ ?>
                                    <a href="#" style="color:#005cbe;">You Submitted Propsal on <?php echo $prop['submitDate']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                        <?php }?>
                    
                    
                   
                    <?php foreach($jobInboxList as $list){
                   
				    ?>
                        <li><!--<input type="checkbox" class="lance_ckbox2" name="chekbox" />-->
                        	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            <img src="<?=base_url()?>public/upload/profile/user_profile_placeholder_64x80.jpg" alt=""></div>
                        	<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 lance_txt">
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_hdng2">
                                <a href="<?=base_url()?><?php if($list['checkAwarded']=='awarded') { echo'workRoom/message/'.$list['ID'].'/'.$list['awardaduserID']; } else { echo'project/detail_project/'.$list['ID']; } ?>"><?php echo $list['title']; ?></a></div>
                                <?php
								if(($list['paymentRequest']!=1) && ($list['checkAwarded']=='awarded')) {?>
                                <div>
                           <a href="<?php echo base_url(); ?>payment/sendPaymentRequestToAdmin/<?php echo $list['ID']; ?>">Send Payment</a>
                                </div>
                                <?php } ?>
								 <?php if($list['paymentRequest']==1){?>
                                    <a href="#" style="color:#005cbe;">You Have Submitted Payment Request </a>
                                    <?php }?>
                                    
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_sbbhdng">
                                	  Posted: <?php echo date('m-d-Y:H-i-s',strtotime($list['postDate'])); ?>  | 
                                    <!--<a href="#"> Ends: 14d, 23h </a> |-->  
                                    <a href="#"><?php echo $list['propsalTotal']; ?> Proposals </a> |  
                                    <select class="lance_btmslct" onchange="editProject(this.value);">
                                    	<option>Action</option>
                                        <?php if($list['runingProject']!='1') { ?>
                                        <option value="<?php echo $list['ID']; ?>">Edit</option>
                                        <?php } ?>
                                    </select><br>
                                    <a href="#" style="color:#005cbe;">Your Project</a>
                                    <?php if($list['runingProject']=='1') {?>|
                                    <a href="#" style="color:#005cbe;">Working</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                        <?php }?>
                        
                        
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middleresult">
                       
                        (  <?php 
						$total1 =sizeof($propsals);
						$total2 = sizeof($jobInboxList);
						$total = $total1+$total2;
						echo $total;
						?> Result )
                        
                        </div>
                    </ul>
                </div>
                
            </div>
            
            
            <!--
			<div class="lance_right">
            	<div class="lance_rightinbox">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_rightinbox_bhdng">My Working Jobs</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt">
                        <a href="#">Action Required</a><a class="pull-right" href="#"> 0</a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt">
                        <a href="#">Messages</a><a class="pull-right" href="#"> 0</a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt">
                        <a href="#">Invites</a><a class="pull-right" href="#"> 0</a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt">
                        <a href="#">All</a><a class="pull-right" href="#"> 0</a>
                    </div>
                </div>
                
              <!--  <div class="lance_rightinbox">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lance_rightinbox_bhdng">Your Profile Completeness</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
                    	<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 lance_rightinbox_bar"><span> &nbsp; </span></div>
                        <strong class="lance_rightinbox_bartxt">50%</strong>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt2">Complete your profile so that clients can find and hire you.
                        <a href="#">More Info</a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt3"><img class="pull-left" src="<?=base_url()?>public/icons/arrow-blue.png" alt="">
                    	<strong><a href="#">Pass 2 Skill Tests</a></strong>
                    	<span>10+<img src="<?=base_url()?>public/icons/connect-icon.gif" alt=""></span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt"><a class="pull-right" href="#">View Your Profile »</a>
                    </div>
                </div>-->
                
                <!--<div class="lance_rightinbox">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 lance_rightinbox_bhdng">Open Jobs</div>
                   
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt3"><strong><a href="#">IT & Programming</a></strong></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lanceinbox_txt"><strong><a class="pull-left" href="<?=base_url()?>project/all_project">All Open Jobs »</a></strong></div>
                </div>
                
            </div>-->
            
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
	</script>