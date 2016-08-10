<style type="text/css">
.frm_inpt_hrs{
width:50%;
height:38px;
border:1px solid #dbdbdb;
float:left;
padding:2px 5px;
margin-top:8px;
}

.hrs-wek{
  margin-left: 9px;
    margin-top: 19px;
    position: absolute;
}

.chosen-container-multi .chosen-choices li.search-choice .search-choice-close{
    background: url("<?= base_url();?>public/images/chosen-sprite@2x.png") no-repeat scroll -89px -2px rgba(0, 0, 0, 0);
    display: block;
    font-size: 1px;
    height: 15px;
    position: absolute;
    right: 3px;
    top: 2px;
    width: 12px;
}


</style>

		<script language="javascript" type="text/javascript">
		var upload_number = 4;
		function addFileInput() {
		var d = document.createElement("div");
		var file = document.createElement("input");
		var l = document.createElement("a"); 
		file.setAttribute("type", "file");
		file.setAttribute("size", "8");
		file.setAttribute("name", "fileAttachement");
		file.setAttribute("id", "fileAttachement");
	
	
		//window.alert(upload_number);
		l.setAttribute("href", "javascript:removeFileInput('f"+upload_number+"');");
		l.appendChild(document.createTextNode("Remove"));
		d.setAttribute("id", "f"+upload_number); 
		d.appendChild(file);
		
		d.appendChild(l);
		document.getElementById("moreUploads").appendChild(d);
		document.getElementById("attachments").value = upload_number;
		//document.getElementById("show").style.display="inline";
		upload_number++;
		//modified by ibrar kamboh
/*		if(upload_number==5){
		
		document.getElementById("moreUploadsLink").style.display = 'none';
		}
*/		
		//alert(upload_number);
		
		
		}
		function removeFileInput(a) 
		{ 
		var elm = document.getElementById(a); 
		document.getElementById("moreUploads").removeChild(elm); 
		upload_number = upload_number - 1; 
/*		if(upload_number<5){
		//alert(upload_number);
		document.getElementById("moreUploadsLink").style.display = 'inline';
		}
*/		
		}
		</script>
		<?php echo validation_errors(); ?>
<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <?php if(!empty($success)){ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $success; ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Update Your Job</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng head_account">Having the Wedding of Your Dreams Starts Here!</div>

            <div class="inner_project_form">
            	<?php echo form_open_multipart(base_url().'project/update_project/'.$ID); ?>
				 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xs-offset-2 padding_tb39">
									  <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										Post Your Job: <input type="text" class="frm_inpt" id="title" name="title" value="<?php echo $project[0]['title']; ?>" required>
									   </div>
									  <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										Describe It: <textarea class="form-control" name="description" rows="6"><?php echo $project[0]['description']; ?></textarea>
										</div>
										
										
										  <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
									 	<div id="moreUploads"></div>
                                      
		<div id="moreUploadsLink" style="display:inline;"><a href="javascript:addFileInput();" class="popuptxt"><strong>Attach Files</strong></a></div>		  
		<input type="hidden" name="fileAttachement" id="fileAttachement" value="1" />	
									 </div>
                                     <?php if( $project[0]['attachFiles']!=''){?>
                                     <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                                          <div class="attatechedfile"> 
                                          <a href="<?=base_url();?>public/upload/project_uploads/<?php echo $project[0]['attachFiles']; ?>" target="_new">
                                          	<!--<div class="attachicon" style="float:left">
                                            	<img src="<?= base_url()?>/public/images/icons/pdf.png" />
                                            </div>-->
                                               
                                               <?php echo $project[0]['attachFiles']; ?>
                                               </a>
                                               <div class="remove"> <a href="javascript:removeattachfile( <?php echo $project[0]['ID']?>)">Remove</a></div >
                                           </div>
                                            
                                      </div>
                                      <?php } ?>
									  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
										Select the category of work  <select required="" class="frm_slct" name="mainCategoryId" id="category" type="text" onchange="getskillAjax(this.value);">
											<option value="">Select Category</option>
											<?php foreach($categorylist as $catlist){ 
											$catid = $catlist->ID;
											?>
                                            <option value="<?php echo $catid; ?>" <?php if($project[0]['mainCategoryId'] == $catid){ ?> selected="selected"<?php } ?>>
                                            <?php echo $catlist->cName; ?></option>
                                            <?php } ?>
										</select>
										</div>
			


			
			<!--choose dropdown start-->

<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">

      <div class="side-by-side clearfix">

          <em>Request specific skills</em>     
          <input type="hidden" name="skills22" id="skills" value="<?php //echo $project[0]['skills']; ?>" />   
       
	  
	   
		  		<div class="demo">
				<div class="control-group">
					<label for="input-tags"></label>
					<?php 
							$allskill = '';
					
							$skills = $project[0]['skillslist']; 
							foreach($skills as $skill)
							{ 
								$allskill .= $skill['skillName'].',';
							}
							$allskill = substr_replace($allskill, "", -1); 
					 ?>
					<input type="text" id="input-tags" class="input-tags demo-default" name="skills" value="<?php echo $allskill; ?>" >
				
					   
				</div>
				<script>
				var $select = $('.input-tags').selectize({
					plugins: ['remove_button'],
					persist: false,
					create: true,
                                        maxOptions: 10,
					render: {
						item: function(data, escape) {
							return '<div>"' + escape(data.text) + '"</div>';
						}
					},
					onDelete: function(values) {
						//return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
					}
				
				});
			//$select[0].selectize.setValue();
				
				</script>
			</div>
        </div>
      </div>

                        

<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">

      <div class="side-by-side clearfix">

          <em>City, State, Country ex. Chicago, illinois, USA</em>     
          <input type="hidden" name="states22" id="states" value="<?php //echo $project[0]['skills']; ?>" />   
       
	  
	   
		  		<div class="state-demo">
				<div class="control-group">
					<label for="input-tags"></label>
					<?php 
							$allstates = '';
					
							$states = $project[0]['stateslist']; 
							foreach($states as $state)
							{ 
								$allstates .= $state['stateName'].',';
							}
							$allstates = substr_replace($allstates, "", -1); 
					 ?>
					<input type="text" id="input-tags2" class="input-tags2 demo-default" name="states" value="<?php echo $allstates; ?>" >
				
					   
				</div>
				<script>
				var $select = $('.input-tags2').selectize({
					plugins: ['remove_button'],
					persist: false,
					create: true,
                                        maxOptions: 10,
					render: {
						item: function(data, escape) {
							return '<div>"' + escape(data.text) + '"</div>';
						}
					},
					onDelete: function(values) {
						//return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
					}
				
				});
			//$select[0].selectize.setValue();
				
				</script>
			</div>
        </div>
      </div>

                        
                        
	</div>			 
	<!--choose dropdown start-->				 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 col-xs-offset-2">
				  <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										Set work arrangment
									   </div>

              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                  	
                  <input type="hidden" name="workType" value="fixedPrice" />
                  <select name="fixedBudget" id="fixedBudget" class="frm_slct" required="">
					<option  value="" selected="selected">- Select budget -</option>
                    <option  value="500" <?php if($project[0]['fixedBudget']==500){ echo 'selected="selected"';}?>>Less than 500$</option>
                    <option  value="1000" <?php if($project[0]['fixedBudget']==1000){ echo 'selected="selected"';}?>>Between 500$ and 1,000$</option> 
                    <option  value="5000" <?php if($project[0]['fixedBudget']==5000){ echo 'selected="selected"';}?>>Between 1,000$ and 5,000$</option>
                    <option  value="10000" <?php if($project[0]['fixedBudget']==10000){ echo 'selected="selected"';}?>>Between 5,000$ and 10,000$</option> 
                    <option  value="20000" <?php if($project[0]['fixedBudget']==20000){ echo 'selected="selected"';}?>>More than 10,000$</option> 
                    <option  value="Not Sure" <?php if($project[0]['fixedBudget']=='Not Sure'){ echo 'selected="selected"';}?>>Not Sure</option> 
                    <option  value="own">Enter your own price</option>
                    
				</select>
                    </div>
					
					
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt hourlyRateHolder" style="display:none" >
                		
                     <select type="text" name="hourlyRate" id="hourlyRate" class="frm_slct">
                    	<option value="">Select hourly rate</option>
                    	<option value="10" <?php if($project[0]['hourlyRate']==10){ echo 'selected="selected"';}?>>10</option>
                        <option value="15" <?php if($project[0]['hourlyRate']==15){ echo 'selected="selected"';}?>>15</option>
                        <option value="20" <?php if($project[0]['hourlyRate']==20){ echo 'selected="selected"';}?>>20</option>
                        <option value="25" <?php if($project[0]['hourlyRate']==25){ echo 'selected="selected"';}?>>25</option>
                        <option value="30" <?php if($project[0]['hourlyRate']==30){ echo 'selected="selected"';}?>>30</option>
                        <option value="35" <?php if($project[0]['hourlyRate']==35){ echo 'selected="selected"';}?>>35</option>
                    </select>
                    </div>
                    
		<div class="hourlyRateHolder">		
		<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt" style="clear: both; margin-left:13px; display: none;">
				<input type="text" name="hrsPerWeeks" value="<?php echo $project[0]['hrsPerWeeks']; ?>" id="hrsPerWeeks" class="frm_inpt_hrs"><span class="hrs-wek">hrs/week</span>
		</div>
					
					
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt" style="display:none" >
              			<select type="text" name="duration" id="duration" class="frm_slct">
                    	<option value="">Select duration</option>
                    	<option value="1-2 Weeks" <?php if($project[0]['duration']=='1-2 Weeks'){ echo 'selected="selected"';}?>>1-2 Weeks</option>
                        <option value="2-3 Weeks" <?php if($project[0]['duration']=='2-3 Weeks'){ echo 'selected="selected"';}?>>2-3 Weeks</option>
                        <option value="3-4 Weeks" <?php if($project[0]['duration']=='3-4 Weeks'){ echo 'selected="selected"';}?>>3-4 Weeks</option>
                        
                    </select>
                   	
                    </div>
		</div>	<!--End hourlyRateHolder Div -->			
					
					
					
                  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                    	<input type="submit" class="join_btn" value="Update Job">
                	</div>
                    </div>
                	<?php echo form_close(); ?>      
              </div>
        </div>        
    </div>
	
	

  <script type="text/javascript">
   // $(document).ready(function(){
// $(".chosen-select").chosen({

     // disable_search_threshold: 10

// }).change(function(event){

     // if(event.target == this){
		// var skill = $(this).val();
       // $('#skills').val(skill)
     // }

// });
// });
  </script>
     <script>
function removeattachfile(ID){	
	$('#error_show').hide();			
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>project/deleteAttachFile/",
				data: "ID="+ID,
				success: function(html){
					//alert(html);
						if(html == 'yes'){
						
							$('.attatechedfile').hide();
						}else{
							$('#error_show').show();
						}
				}
			});
		
	}
	
	
	</script>
 <script>
  	function getskillAjax(ID){	

		if(ID == ''){
			return false;
		}else{
			//$('#ajaxResponseMess').html('<div align="center" style="margin-top:5px;"><img src="<?= base_url() ?>/public/images/ajax_loader_gray_32.gif"></div>');
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>project/getskillAjax/",
				data: "ID="+ID,
				success: function(html){
					//$('select#skillist').val(html);
						$('#skillList').empty().append(html);
						//$(".chosen-select").chosen();
					//$(".chosen-select").trigger("chosen:updated");
						
				}
			});
		}	
	}
  </script>
  
  
  
   <script>
  $(document).ready(function(){
	  	var worktype	="<?php echo $project[0]['workType']; ?>"
		if(worktype=='hourly')
		{
			$(".hourlyRateHolder").show();
			$("#hourlyRate").attr('required', '')
			$("#fixedBudget").removeAttr("required");
			$(".fixedBudgetHolder").hide();
		}else
		{
			$(".hourlyRateHolder").hide();
			$(".fixedBudgetHolder").show();
			$("#hourlyRate").removeAttr("required");
			$("#fixedBudget").attr('required', '')
			
			
		}
	  
	  })
   
  $("#workType").change(function(){
	 	var worktype	= $("#workType").val();
		if(worktype=='hourly')
		{
			$(".hourlyRateHolder").show();
			$("#hourlyRate").attr('required', '')
			$("#fixedBudget").removeAttr("required");
			$(".fixedBudgetHolder").hide();
		}else
		{
			$(".hourlyRateHolder").hide();
			$(".fixedBudgetHolder").show();
			$("#hourlyRate").removeAttr("required");
			$("#fixedBudget").attr('required', '')
			
			
		}
	  })
    $("form select[name=fixedBudget]").change(function(){
        var value = $(this).val();
        if(value == 'own'){
            $(this).replaceWith('<input type="number" required="" name="fixedBudget" id="fixedBudget" class="frm_inpt" placeholder="$">');
            return;
        }
    })
    
    function change_amount_custom(value){
        if(value != ''){
            $('form select[name=fixedBudget]').replaceWith('<input type="number" name="fixedBudget" required="" id="fixedBudget" value="'+value+'" class="frm_inpt" placeholder="$">');
            return;
        }
    }
    $(document).ready(function(){
            <?php
                if($project[0]['fixedBudget'] != 500 && $project[0]['fixedBudget'] != 1000 && $project[0]['fixedBudget'] != 5000 && $project[0]['fixedBudget'] != 10000 && $project[0]['fixedBudget'] != 20000 && $project[0]['fixedBudget'] != 'Not Sure'){
            ?>
                 change_amount_custom(<?=$project[0]['fixedBudget']?>);
            <?php
            }
            ?>
    });
  
  </script>
  