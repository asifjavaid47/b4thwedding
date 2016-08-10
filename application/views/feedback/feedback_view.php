<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
         <?php if(!empty($success)){ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $success; ?>
		</div>
        <?php } ?>
        
        <?php if(!empty($error)){ ?>
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Note!</strong><?php echo $error; ?>
		</div>
          <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Feedback</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
            
            
         <div class="inner_project_form">
            	
				<?php
					if($ratingList =='no')
					{
						$rating 		= '';
						$quality 		= ''; 
						$expertise 		= ''; 
						$cost 			= ''; 
						$schedule 		= ''; 
						$response		= '';  
						$professional	= '';  
					}else
					{
						$rating 		= round($ratingList[0]['rating']); 
						$quality 		= $ratingList[0]['quality']; 
						$expertise 		= $ratingList[0]['expertise']; 
						$cost 			= $ratingList[0]['cost']; 
						$schedule 		= $ratingList[0]['schedule']; 
						$response 		= $ratingList[0]['response']; 
						$professional 	= $ratingList[0]['professional']; 
					}
				?>
                
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middle">
                
                    <form action="<?=base_url();?>feedback/addFeedback/<?php echo $projectID;  ?>/<?php echo $receiverID; ?>" method="post">
                    <?php echo form_open_multipart(base_url().'feedback/addFeedback/'); ?>
                     <input type="hidden" name="projectID" value="<?php echo $projectID; ?>" />
                     <input type="hidden" name="receiverID" value="<?php echo $receiverID; ?>" />
					  <div class="rateit2" id="rateit92">
                           <div class="input select rating-f">
                            <select id="example-f" name="rating">
                                <option value="1" <?php if($rating==1){ echo 'selected="selected"';} ?>></option>
                                <option value="2" <?php if($rating==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php if($rating==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php if($rating==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php if($rating==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
        				</div>
      						<div class="clear20"></div>
                          <div class="rating-enable input select rating-c">
                            <div style="float:left;"><label for="example-c">Quality of Work</label></div>
                            <div style="float:right;">
                            <select id="example-c" name="quality" style="margin-right:50px;">
                                <option value=""></option>
                                <option value="1" <?php if($quality==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php if($quality==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php if($quality==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php if($quality==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php if($quality==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                         </div>
                            <div class="rating-enable input select rating-c">
                           <div style="float:left; clear:both;"> <label for="example-c1">Knowledge of Subject</label></div>
                           <div style="float:right;"> <select id="example-c1" name="expertise">
                                <option value=""></option>
                                <option value="1" <?php if($expertise==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php if($expertise==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php if($expertise==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php if($expertise==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php if($expertise==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                         </div>
                            <div class="rating-enable input select rating-c">
                          <div style="float:left; clear:both;">  <label for="example-c2">Cost</label></div>
                           <div style="float:right;"> <select id="example-c2" name="cost">
                                <option value=""></option>
                                <option value="1" <?php if($cost==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php if($cost==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php if($cost==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php if($cost==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php if($cost==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                         </div>
                            <div class="rating-enable input select rating-c">
                            <div style="float:left; clear:both;"><label for="example-c3">Time-Frame</label></div>
                           <div style="float:right;"> <select id="example-c3" name="schedule">
                                <option value=""></option>
                                <option value="1" <?php if($schedule==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php if($schedule==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php if($schedule==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php if($schedule==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php if($schedule==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                         </div>
                            <div class="rating-enable input select rating-c">
                            <div style="float:left; clear:both;"> <label for="example-c4">Response Time</label></div>
                            <div style="float:right;"><select id="example-c4" name="response">
                                <option value=""></option>
                                <option value="1" <?php if($response==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php if($response==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php if($response==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php if($response==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php if($response==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                         </div>
                         
                         <div class="rating-enable input select rating-c">
                            <div style="float:left; clear:both;"><label for="example-c4">Professionalism</label></div>
                           <div style="float:right;"> <select id="example-c4" name="professional">
                                <option value=""></option>
                                <option value="1" <?php if($professional==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php if($professional==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php if($professional==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php if($professional==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php if($professional==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                         </div>
                      
                     </div>
                     <?php
                        if($ratingList == 'no'){
                     ?>
                     <div class="clear10"></div>
					<textarea name="message" id="" cols="60" rows="5" placeholder="Please describe your experience" required></textarea>
                     <div class="clear10"></div>
					  <input type="submit" value="Send" class="join_btn">
                      
                      <input type="button" value="skip" class="join_btn" onclick="skip();">
                    <?php
                    }
                    ?>
                    
                    <?php echo form_close(); ?> 
                    <ul>  
                    <?php
					if(sizeof($feedbackList) >0)
					{
						
						foreach($feedbackList as $feedback){ ?>
                        <li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2"><?php echo $feedback->comments; ?></div>
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0" ><?php echo $feedback->fName; ?> </div>
                        	<div class="inbox_middleckbox">
                            	<?php echo date('m-d-Y:H-i-s',strtotime($feedback->sendDate)); ?>
                            </div>
                        </li>
                        <?php } ?>
                      <?php } ?>  
                    </ul>
                   
                </div>
                
            </div>
        </div>        
    </div>
    <link href="<?=base_url();?>public/css/examples.css" rel="stylesheet" type="text/css"/>
 
    <script src="<?=base_url();?>public/js/jquery_barrating.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.rating-enable').click(function () {
                $('#example-a').barrating();

                $('#example-b').barrating('show', {
                    readonly:true
                });

                $('#example-c,#example-c1, #example-c2,#example-c3,#example-c4,#example-d').barrating('show', {
                    showValues:false,
                    showSelectedRating:false
                });

                         $('#example-f').barrating({ showSelectedRating:true,readonly:true });

                $('#example-g').barrating('show', {
                    showSelectedRating:true,
                    reverse:true
                });

                $(this).addClass('deactivated');
                $('.rating-disable').removeClass('deactivated');
            });

            $('.rating-disable').click(function () {
                $('select').barrating('destroy');
                $(this).addClass('deactivated');
                $('.rating-enable').removeClass('deactivated');
            });

            $('.rating-enable').trigger('click');
        });
    </script>
    <script>
	function skip()
	{
		
	 window.location.href = '<?=base_url();?>project/my_jobs_c';
	}
	</script>