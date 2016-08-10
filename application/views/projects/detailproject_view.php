	<link href="<?= base_url(); ?>public/map/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="<?= base_url(); ?>public/map/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/map/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>public/map/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('.jobdetail_map').vectorMap({
		    map: 'world_en',
		    backgroundColor: '#333333',
		    color: '#ffffff',
		    hoverOpacity: 0.7,
		    selectedColor: '#666666',
		    //enableZoom: true,
		    showTooltip: true,
		    values: sample_data,
		    scaleColors: ['#C8EEFF', '#006491'],
		    normalizeFunction: 'polynomial'
		});
	});
	</script>
	<script>
$(document).ready(function() {
   $(".notes").click(function(){

 $('#notes_textarea').toggle();

});

// $('.morecontent>span').hide();

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
 <style>
 .jobdetail_map svg
 {
 	height:352px !important;
 }
 </style>   
    
<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <?php
				if(isset($_REQUEST['already']))
				{ ?>
        <div class="alert alert-info">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Warning!</strong> Already Awarded!
		</div>
                                <?php
				} 
				if(isset($_REQUEST['awarded_success']))
				{ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> Awarded Successfully!
		</div>

                                <?php
				} ?>
			
                
                
             <?php
                if($this->session->flashdata('success'))
            { ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?=$this->session->flashdata('success')?>
        </div>
            <?php
            } 
                if($this->session->flashdata('warning'))
            { ?>
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> <?=$this->session->flashdata('warning')?>!
        </div>
            <?php
            } ?>
               
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account"><?php echo $project[0]['title']; ?></div>
            <div class="inner_img"><img src="<?=base_url();?>public/images/icons/hdng_btm.png" width="100%" height="3" alt=""></div>
            
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12  padding_tb20">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_box padding0">
                	<div class="col-lg-6 col-md-2 col-sm-12 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_timeleft.png" alt=""> &nbsp; Time Left: 12d, 23h
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_post.png" alt=""> &nbsp; 
                        Posted: <?php echo date('m/d/Y h:ia',strtotime($project[0]['postDate'])); ?> 
                        </div>
                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_location.png" alt=""> &nbsp; Location: Anywhere</div>-->
                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_start.png" alt=""> &nbsp; Start: Immediately</div>-->
                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_team.png" alt=""> &nbsp; <a href="#">My Team (1)</a></div>-->
                    </div>
                    <div class="col-lg-6 col-md-2 col-sm-12 col-xs-12">
                    <?php if($project[0]['workType']!="fixedPrice")
							{?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        	<img src="<?=base_url();?>public/images/icons/icon_rate.png" alt=""> 
                        	&nbsp; Hourly Rate: <?php echo number_format($project[0]['hourlyRate'], 2, '.', ''); ?>  / hr
                        </div>
<!--                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_hours.png" alt=""> 
                        	&nbsp; <?php echo $project[0]['hrsPerWeeks']; ?> hrs per weeks
                         </div>-->
                        <?php }else{?>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        		<img src="<?=base_url();?>public/images/icons/icon_rate.png" alt=""> 
                            	&nbsp; Budget: <?php
                                if($project[0]['fixedBudget'] == 500)
                                    echo 'Less than $500';
                                else if($project[0]['fixedBudget'] == 1000)
                                    echo 'Between $500 and $1,000';
                                else if($project[0]['fixedBudget'] == 5000)
                                    echo 'Between $1,000 and $5,000';
                                else if($project[0]['fixedBudget'] == 10000)
                                    echo 'Between $5,000 and $10,000';
                                else if($project[0]['fixedBudget'] == 20000)
                                    echo 'More than $10,000';
                                else if($project[0]['fixedBudget'] == 'Not Sure')
                                    echo 'Not Sure';
                                else
                                    echo '$'.number_format($project[0]['fixedBudget'], 2);
                                ?>
                            	</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt" style="background-color:#fff;">
                    <?php $states = $project[0]['states']; 
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
<!--                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        		<img src="<?=base_url();?>public/images/icons/icon_hours.png" alt=""> 
                                &nbsp; Fixed Price Job
                            </div>-->
                            <?php } ?>
                       <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt"><img src="<?=base_url();?>public/images/icons/icon_time.png" alt=""> &nbsp; <a href="#">Work View™</a> Payment Protection</div>-->
                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_w9.png" alt=""> &nbsp; <a href="#">W9</a> Not Required</div>-->
                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt">
                        <img src="<?=base_url();?>public/images/icons/icon_invite.png" alt=""> &nbsp; <a href="#">18 invited</a> -<a href="#"> Invite More</a> </div>-->
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jobdetail_txt2">
					<div class="detailMore">
                    <?php echo $project[0]['description']; ?>
					</div>
                    <br><br><br>
                    <strong>Desired Skills </strong>
                    <br>
                    <?php $skill = $project[0]['skills']; 
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
                    <?php if( $project[0]['attachFiles']!=''){?>
                   <br><br>
                    <strong>Attach File</strong><br />
                    	<a href="<?=base_url();?>public/upload/project_uploads/<?php echo $project[0]['attachFiles']; ?>" target="_new"><?php echo $project[0]['attachFiles']; ?></a>
                    
                    <?php } ?>
                    <br><br>
                    .......................................................................................................................................................................................... 
                    
                  <div class="clear10"></div>
                  <?php if($project[0]['runingProject']!='1' && $project[0]['cancelProject']!='1') { ?>
                    <a style="color:#005cbe;"href="<?=base_url(); ?>project/update_project/<?php echo $project[0]['ID']; ?>">Edit Job Details</a> 
                    <?php } ?>
					<!--
					| 
						<a style="color:#005cbe;" href="#">Invite Freelancers</a>-->
                    </div>
                    
                </div>
            </div>
            
            
            <div class="jobdetail_right">
            	<div class="jobdetail_rightbtn">
                	<ul>
                  <?php if($project[0]['cancelProject']==0 && $project[0]['finishProject']==0){ ?>
                    	<li><a href="#">Job Actions &nbsp;<img src="<?=base_url();?>public/images/icons/down.png" alt=""></a>
                        	<ul>
                                <li>
                                    <?php
                                        $county = 0;
                                        foreach($propsal as $pro){
                                            if($pro['awarded'] == 'awarded')
                                                $county++;
                                        }
                                        if($county == 0)
										{
                                    	?>
                                    	
                                    <a href="<?=base_url();?>project/cancel_project/<?php echo $project[0]['ID']; ?>">Cancel Project</a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?=base_url();?>workRoom/cancelProjectStepOne/<?php echo $project[0]['ID']; ?>">Cancel Project</a>
                                    <?php
                                        }
                                        ?>
                                </li>
                                <?php if($project[0]['runingProject']=='1') { ?>
                                <li><a href="<?=base_url();?>feedback/addFeedback/<?php echo $project[0]['ID']; ?>">Finish Project</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                         <?php } ?>
                         <?php if($project[0]['cancelProject']==0 && $project[0]['finishProject']==0)
						 { ?>
                        <li><a href="#">Edit Job & Settings &nbsp;<img src="<?=base_url();?>public/images/icons/down.png" alt=""></a>
                        	<ul>
                             <?php if($project[0]['runingProject']!='1') { ?>
                                <li><a href="<?=base_url(); ?>project/update_project/<?php echo $project[0]['ID']; ?>">Job Details</a></li>
                               <?php } ?>
                            </ul>
                        </li>
                        <?php }else if($project[0]['cancelProject']==1)
							{
								echo "<h3>Canceled Project</h3>"; 
							}else
							{
								echo "<h3>Complete Project</h3>"; 
							}
							?>
                       <!-- <li><a href="#">Share &nbsp;<img src="<?=base_url();?>public/images/icons/down.png" alt=""></a>
                        	<ul>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Google +</a></li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
            	<!--<div class="jobdetail_map">
                </div>-->
            </div>
            
             
            
            <?php
// print_r($propsal);

// print_r($propsal[0]['idOfUser']);
// foreach($propsal as $propsallist1){
// print_r($propsallist1);
// }
// exit;
$propsallist = $propsal;
			if(empty($propsal)) { echo'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx"><h5>No Proposals Yet</h5></div>'; }
					
			else {

			 foreach($propsal as $propsallist){


			?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_border">
                <?php if($propsallist['image']!='')
					{
				?>
                <img src="<?=base_url();?>public/upload/profile/<?php echo $propsallist['image'];?>" class="pull-left" width="100px" height="100px" alt="">
                <?php }else { ?>
                    <img src="<?=base_url();?>public/upload/profile/user_profile_placeholder_64x80.jpg" class="pull-left" alt="">
                    <?php } ?>
                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 job_bx_hdng">
                    <a href="<?=base_url()?>users/freelancerPublicView/<?php echo $propsallist['userId']; ?>"> <?php echo $propsallist['fName'].' '.$propsallist['lName'];?> </a>&nbsp; 
                    
                        <!--<img src="<?=base_url();?>public/images/icons/approve_icon.png" alt=""> <img src="<?=base_url();?>public/images/icons/unfill_star.png" alt="">--> 
                    </div>                   
                    <div class="job_bx_sbbhdng">
                         <?php echo $propsallist['country'];?> | Rate: $<?php echo $propsallist['hourlyRate'];?>/hr <?php /*?>| <?php echo $propsallist->cName;?><?php */?>  |
                        <a href="#"> <?php echo $propsallist['totalJobs']; ?> jobs </a> |  
                        <a href="#"><?php if(!empty($propsallist['myTotalEarning'])) { echo '$'.$propsallist['myTotalEarning'];} else  { echo '0';} ?>  Earnings </a> |
                        <a href="<?=base_url();?>portfolio/portfolioPublic/<?php echo $propsallist['userId'];?>">Portfolio |</a> 
					 <!-- rating -->
                  <?php 
					$numberRate   	= $propsallist['rating'] ;
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
                <div class="colspanholder">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding_tb16 more">
                   <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_hdng">Lead Manager</div>-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng">
                     <?php echo date('m-d-Y h:ia',strtotime($propsallist['submitDate']));?>  
                     <!--| <img src="<?=base_url();?>public/images/icons/invite_arrow.png" alt=""> Bid ID: 65377727--></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
                        <?php echo $propsallist['describeYourSelf'];?>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt" style="display: none;">
                   <strong> Attachment--</strong><br />
                     <?php if($propsallist['filePath']!='')
					  {?>
                       <a href="<?=base_url();?>public/upload/propsal_upload/<?php echo $propsallist['filePath']; ?>" target="_new"><?php echo $propsallist['filePath']; ?></a>
					  <?php }?>
                      </div>
                </div>
               
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 padding_tb16 pull-right">
                    <a class="job_bx_btn" href="<?=base_url();?>inbox/sendMessage/<?php echo $project[0]['ID'];?>/<?php echo $propsallist['userId'];?>"> <img style="margin-top:3px;" src="<?=base_url();?>public/images/icons/email_icon.png" alt=""> </a>
                    <!--<a class="job_bx_btn" href="#"> <img src="<?=base_url();?>public/images/icons/video_icon.png" alt=""> </a>-->
                    <a class="job_bx_btn notes" href="javascript:;"> <img src="<?=base_url();?>public/images/icons/blog_icon.png" alt=""> </a>
					<div id="notes_textarea" style="display: none;" > 
                    <?php $notes = isset($propsallist['notes']) ? $propsallist['notes']: ''; ?>
					<textarea  name="notes" id="notes"  cols="30" rows="10"><?php echo $notes; ?></textarea>
					 <div style="margin-right: 87px;">
                     <a class="job_bxright_btn2" href="javascript:;" onclick="saveNotes(<?php echo $propsallist['ID'];?>)" id="save"> save </a>                    
                     </div>
                    
					</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
                    	<div class="arrow-up"> &nbsp; </div>
                        <div class="job_bx_btntxt"> <a href="<?=base_url();?>inbox/sendMessage/<?php echo $project[0]['ID'];?>/<?php echo $propsallist['userId'];?>"> Send message to this Freelance.</a> </div>
                    </div>
                </div>
                 </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_viewbox">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 job_bx_viewborder"> &nbsp; </div>
                    <?php /*?><div class="job_bx_view"> Collapse Proposal <img src="<?=base_url();?>public/images/icons/up.png" alt=""> </div><?php */?>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 job_bx_hdng2">
                    	<?php if($propsallist['billedToClient']!='')
								{
									echo "$".number_format($propsallist['billedToClient'], 2, '.', '');
								}else { ?> 
                    				Proposal Amount Not Specified  
                        		<?php } ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right padding0">
                    	<?php if(!empty($propsallist['awarded'])) { echo'<span class="job_bxright_btn2" style="cursor:default;"> '.$propsallist['awarded'].'</span>';  } ?>  
                        <?php if(!empty($propsallist['awarded'])) { ?>
                    	<?php /*?><a class="job_bxright_btn2" href="<?=base_url();?>project/awardedCancel/<?php echo $project[0]['ID']; ?>/<?php echo $propsallist['userId'];?>"> Cancel </a><?php */?>
						<?php }else if($project[0]['cancelProject']==0 && $project[0]['finishProject']==0) { ?>
                        <a class="job_bxright_btn2" href="<?=base_url();?>project/awarded/<?php echo $project[0]['ID']; ?>/<?php echo $propsallist['userId'];?>"> Select </a>
                        <?php } ?>
                        <!--<a class="job_bxright_btn" href="#"><img src="<?=base_url();?>public/images/icons/minus_icon.png" alt=""> Hide </a>-->
                    </div>
                </div>
            </div>
            
            
            <?php } } ?> <!--End Foreach -->
            
            
            
            
            
        </div>        
    </div>
    <script type="text/javascript">
		function saveNotes(val){			
			var project_id = val;
			var notes      = document.getElementById('notes').value;			
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>project/saveNotes/",
				data: "project_id="+project_id+"&notes="+notes,
				success: function(html){
					$('#save').html(html);
				}
			});
		}
	</script>
	