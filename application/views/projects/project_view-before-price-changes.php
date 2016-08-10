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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Post Your Job</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng head_account">Having the Wedding of Your Dreams Starts Here!</div>
             <?php if (!empty($success)){ ?>

<p class="success" style="color:green"><?php echo $success;  ?></p>

<?php } ?>
          	          
            <div class="inner_project_form">
            	 <form accept-charset="utf-8" method="post" action="" enctype="multipart/form-data">
				 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xs-offset-2 padding_tb39">
									  <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										Post Your Job: <input type="text" class="frm_inpt" value="" id="title" name="title" required>
									   </div>
									  <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										Describe It: <textarea class="form-control" name="description" id="description" rows="6" required></textarea>
										</div>
										
										
										  <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
									 	<div id="moreUploads"></div>
		<div id="moreUploadsLink" style="display:inline;"><a href="javascript:addFileInput();" class="popuptxt"><strong>Attach Files</strong></a></div>		  
		<input type="hidden" name="fileAttachement" id="fileAttachement" value="1" />	
									 
									 </div>
									  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
										Select the category of work  <select  class="frm_slct" name="mainCategoryId" id="category" type="text" onchange="getskillAjax(this.value);" required>
											<option value="">Select Category</option>
											<?php foreach($categorylist as $catlist){ ?>
                                            <option value="<?php echo $catlist->ID; ?>"><?php echo $catlist->cName; ?></option>
                                            <?php } ?>
										</select>
										</div>
			


			
			<!--choose dropdown start-->
			
 <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">

      <div class="side-by-side clearfix">
		<input type="hidden" name="skills" id="skills" />
          <em>Request specific skills</em>        
        
		
			<div class="demo">
				<div class="control-group">
					<label for="input-tags"></label>
					<?php 
					$allskill = '';
					//print_r($getAllSkills);
					foreach($getAllSkills as $skill){ 
							$allskill .= $skill->skillName.',';
							}
							// print_r($allskill);
								$allskill = substr_replace($allskill, "", -1);
					 ?>
					<input type="text" id="input-tags" class="input-tags demo-default" name="skills" value="<?php echo $allskill; ?>" >
				
					   
				</div>
				<script>
				var $select = $('.input-tags').selectize({
					plugins: ['remove_button'],
					persist: false,
					create: true,
					render: {
						item: function(data, escape) {
							return '<div>"' + escape(data.text) + '"</div>';
						}
					},
					onDelete: function(values) {
						//return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
					}
				
				});
			$select[0].selectize.setValue();
				
				</script>
			</div>
      </div>
      </div>
				 
	</div>			 
	<!--choose dropdown start-->				 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 col-xs-offset-2">
				  <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										Set work arrangment
									   </div>

              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt"  style="clear: both;">
                  	
                    <select type="text" name="workType" id="workType" class="frm_slct">
                    	
                    	<option value="hourly" selected="selected">hourly</option>
                        <option value="fixedPrice">Fixed Price</option>
                    </select>
                    </div>
					
					
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt hourlyRateHolder" >
                
                    <select type="text" name="hourlyRate" id="hourlyRate" class="frm_slct" required>
                    	<option value="">Select hourly rate</option>
                    	<option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                    </select>
                    </div>
					
                 <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12  padding0 inner_project_form_txt fixedBudgetHolder" style="display:none"  >
                     <select name="fixedBudget" id="fixedBudget" class="frm_slct">
					<option  value="" selected="selected">- Select budget -</option>
					<option  value="500">Less than 500$</option> 
                    <option  value="1000">Between 500$ and 1,000$</option> 
                    <option  value="5000">Between 1,000$ and 5,000$</option>
                    <option  value="10000">Between 5,000$ and 10,000$</option> 
                    <option  value="20000">More than 10,000$</option> 
                    <option  value="Not Sure">Not Sure</option> 
                    <option  value="own">Enter your own price</option> 
                    
				</select>
				</div>	
					
					<div class="hrperweek_duration_holder">					
                    	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt" style="clear: both;">
							<input type="text" name="hrsPerWeeks" id="hrsPerWeeks" class="frm_inpt_hrs">
                            <span class="hrs-wek">hrs/week</span>
				 		</div>
					
					
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt"  >
              
                    <select type="text" name="duration" id="duration" class="frm_slct">
                    	<option value="">Select duration</option>
                    	<option value="1-2 Weeks">1-2 Weeks</option>
                        <option value="2-3 Weeks">2-3 Weeks</option>
                        <option value="3-4 Weeks">3-4 Weeks</option>
                        
                    </select>
                    </div>
				</div>
					
					
					
					
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                 
					<!--<a href="#" class="join_btn"> Register </a>-->
                    <input type="submit" class="join_btn" value="Post Job">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng2">We value your privacy. <a href="#">Privacy Policy</a> &nbsp; <img alt="" src="<?=base_url()?>public/images/lock_icon.png"></div>
                </div>
                </div>
                </form>  
                      
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
						$('#skillist').empty().append(html);
						$(".chosen-select").chosen();
					$(".chosen-select").trigger("chosen:updated");
						
				}
			});
		}	
	}
  </script>
  <script>
  $("#workType").change(function(){
	 	var worktype	= $("#workType").val();
		if(worktype=='hourly')
		{
			$(".hourlyRateHolder").show();
			$("#hourlyRate").attr('required', '')
			$("#fixedBudget").removeAttr("required");
			$(".hrperweek_duration_holder").show();
			$(".fixedBudgetHolder").hide();
		}else
		{
			$(".hourlyRateHolder").hide();
			$(".hrperweek_duration_holder").hide();
			$("#hourlyRate").removeAttr("required");
			$("#fixedBudget").attr('required', '')
			$(".fixedBudgetHolder").show();
			
		}
	  })

    $("form select[name=fixedBudget]").change(function(){
        var value = $(this).val();
        if(value == 'own'){
            $(this).replaceWith('<input type="number" name="fixedBudget" id="fixedBudget" class="frm_inpt" placeholder="Enter Amount">');
            return;
        }
    })
    

  </script>