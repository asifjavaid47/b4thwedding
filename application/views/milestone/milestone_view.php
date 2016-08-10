<?php
$login_user = $this->session->userdata('userID');
?>
<style>
.milestone{background:#d8d8d8; height:40px; padding:10px; margin-bottom: 10px;}
/*.values{width:1000px; padding:10px; margin-left:30px; height:50px; float:left;}*/
.col-lg-2 pull-left custom{ width:40px; background:#000;}
</style>

<div id="wrap">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">
                Terms and Milestones
            </div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
    <div class="clear20"></div>
      <?php echo $sidebar; ?>
    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 pull-left">
            <h4>Job Summary</h4>
            <?php echo $project[0]['title']; ?>
            <hr style="border:1px solid #000; clear:both;">
            <br>
            <div class="col-lg-4"><b>Client</b> : <?=@$awarded[0]['client_name']?></div>
            <div class="col-lg-5"><b>Job start date</b>  : <?=date('m-d-Y', strtotime($project[0]['startingDate']))?></div>
            <div class="col-lg-3"><b>Total amount </b> : <?php echo !empty($awarded[0]['total_amount']) ? '$'.number_format($awarded[0]['total_amount'],2) : '' ?>
            <?php if($login_user == $project[0]['userID'] && !empty($awarded[0]['total_amount'])){
            ?>
                
            <div style="clear:both;"></div>
            <a href="#" class="osxx"><img src="<?=base_url()?>public/images/icons/edit-icon.png" /></a>
            <?php
            }
            else if($awarded[0]['myEarningUpdated']  > 0 && $awarded[0]['myEarningUpdatedStatus'] == 0){
            ?>
            <a href="#" class="osxxx">Approve New Price</a>
            <span>($<?=$awarded[0]['myEarningUpdated']?> )</span>
            <?php } ?>
            </div>
            <input type="hidden" name="job_total_amount" value="<?=@$awarded[0]['total_amount']?>" />
            <input type="hidden" name="current_balance" value="" />
            <div class="clear10"></div>
            <div class="col-lg-4"><b>Freelancer </b> : <?=@$awarded[0]['freelancer_name']?></div>
            <div class="col-lg-5"><b>Job end date </b>  : <?=date('m-d-Y', strtotime($project[0]['startingDate'].' + '.@$awarded[0]['delivery_date']))?></div>
            <div class="col-lg-3"><b>Job status </b> : 
			<?php if($project[0]['runingProject']==1)
				{
					echo 'Working';
					
				}else
				{
					echo 'Complete';
				}?>
			</div>
            <!--<div class="col-lg-2">Status reports required</div>-->
            <br><br><br>
            <span class="col-lg-12 pull-left milestone">
                    <div class="col-lg-2 pull-left"> Milestone </div>
                    <div class="col-lg-2 pull-left"> Payments </div>
                    <div class="col-lg-1 pull-left">  Notes  </div>
                    <div class="col-lg-3 pull-left">  Delivery Date  </div>
                    <div class="col-lg-2 pull-left">  Amount  </div>
                    <div class="col-lg-2 pull-left"> Actions  </div>
            </span>
                <br style="clear:both;">
            <div class="values">
            <?php
            if(!empty($milestones)){
                foreach($milestones as $milestone){
            ?>
            <div id="milestone_<?=$milestone['milestoneID']?>">
            <div class="col-lg-2 pull-left m_description"><?=$milestone['milestoneDetail']?></div>
            <div class="col-lg-2 pull-left"><img src="<?=base_url();?>public/images/price.png"  /></div>
            <input type="hidden" name="m_notes" value="<?=$milestone['milestoneNotes']?>" />
            <div class="col-lg-1 pull-left"><img src="<?=base_url();?>public/images/notes.png"  /></div>
            <div class="col-lg-3 pull-left m_delivery_date"><?=date('m-d-Y', strtotime($milestone['milestoneDeliveryDate']))?></div>
            <input type="hidden" name="m_amount" value="<?=$milestone['milestoneAmount']?>" />
            <div class="col-lg-1 pull-left custom"><p >$<?=$milestone['milestoneAmount']?>.00</p></div>
            <div class="col-lg-3 pull-left" style="text-align:center;"><?php if($milestone['milestoneStatus'] == 0){ ?><a href="javascript:" onclick="editmilestone(<?=$milestone['milestoneID']?>)"> Edit |</a><?php } elseif($milestone['milestoneStatus'] == 1){ ?> Approved |<?php } ?><a href="javascript:" onclick="viewmilestone(<?=$milestone['milestoneID']?>)"> View </a><?php if($milestone['milestoneStatus'] == 0 && $milestone['edit_by'] == $login_user){ ?><a href="javascript:" onclick="deletemilestone(<?=$milestone['milestoneID']?>)">| Delete </a> <?php } elseif($milestone['milestoneStatus'] == 0 && $milestone['edit_by'] != $login_user) {?><a href="javascript:" onclick="approvemilestone(<?=$milestone['milestoneID']?>)">| Approve </a><?php } ?></div>
            </div>
                <br style="clear:both;">
            <?php
                }
            } else {
            ?>
            <div class="col-lg-12 pull-left">No Milestone Added!</div>
            <?php
            }
            ?>
            <hr style="border:1px solid #000; clear:both;">
            <button type="button" class="btn btn-default pull-left create_milestone">Create a new milestone</button>
            <div class="col-lg-5 pull-right total_milestone_amount"></div>
            <div class="clear10"></div>
            <div class="col-lg-5 pull-right total_remaining_amount"></div>
            
            <br style="clear:both;">
            <div class="col-lg-4 col-md-offset-4 centered" style="margin-top:50px;" id="add_milestone">
                <form role="form" name="milestone" id="milestone_form" method="post" action="<?=base_url();?>milestone/addmilestone/<?=$projectID?>/<?=$receiverID?>" onsubmit="return check_balance()">
        <div class="form-group">
          <label for="email"> Milestone: </label>
          <input type="text" class="form-control" required="" id="milestone_desc" name="milestone_desc" placeholder="Enter Description">
        </div>
        <div class="form-group">
          <label for="pwd"> Delivery Date: </label>
          <input type="text" data="feild" class="form-control" required="" id="delivery_date" name="delivery_date" placeholder="Select Delivery Date" style="background:url(<?=base_url();?>public/calendar/datepicker/date.png) #fff right; cursor:pointer; background-repeat:no-repeat;">
          
         
        </div>
        <div class="form-group">
          <label for="pwd"> Amount: </label>
          <input type="number" class="form-control" id="amount" name="amount" placeholder="$0.00 (Optional)">
        </div>
        <div class="form-group input-large">
          <label for="pwd"> Notes: </label>
          <textarea rows="3" class="form-control" id="notes" name="notes" placeholder="Notes (Optional)"></textarea>
        </div>
        <input type="hidden" name="projectid" value="<?=$projectID?>" />
        <input type="hidden" name="recieverid" value="<?=$receiverID?>" />
        <input type="hidden" name="milestoneid" value="" />
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
      </form>
      </div>
      <br style="clear:both;">
			<h4>Agreement Document</h4>
            <hr style="border:1px solid #000;">
            <p>Once the contractor completes the work and requests payment for a milestone, the client has 7 days to review the work and release funds from escrow. If the transaction is service related (i.e. Venue), the client and contractor must have terms of payment and terms of service included before payment is escrowed.  Alternatively, with the approval of the contractor, the client can adjust the terms of the job or file a dispute.</p>
            <br style="clear:both;">
            <?php
            if($login_user == $project[0]['userID']){
            ?>
            <button type="file" class="btn btn-default pull-left add_document">Add Document</button>
            <?php
            }
            ?>
      <br style="clear:both;">
      <br style="clear:both;">
      <?php
      if(!empty($project[0]['agreement_document'])){
      ?>
      <span> View Terms & Conditions. </span>
      <a href="<?=base_url()?>public/upload/project_uploads/agreement/<?=$project[0]['agreement_document']?>" target="new"> <?=$project[0]['agreement_document']?> </a>
      <?php
      }
      ?>
      <br style="clear:both;">
      <br style="clear:both;">
      <form name="agreement_document" method="post" enctype="multipart/form-data" action="<?=base_url()?>milestone/addagreement_document">
        <input type="file" class="btn btn-default pull-left" name="fileAttachement" value="Add Document" />
        <input type="hidden" name="projectid" value="<?=$projectID?>" />
        <input type="hidden" name="recieverid" value="<?=$receiverID?>" />
        <button type="submit" class="btn btn-success">Upload</button> 
      </form>
            <br>
    

            </div>
            
        
          <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
              
 </div>   
          </div>        
    </div>


<div style='display:none'>
                <div id="osx-modal-content2" class="popup" style="overflow:hidden">
                    <form name="amount_edit" method="post" action="<?=base_url()?>milestone/update_amount" onsubmit="return update_amount()" >
                	<div class="close"><a href="#" class="simplemodal-close">x</a></div>
                	<div class="popup_top">
                        <div class="col-lg-12 inner_hdng head_account">Update Amount</div>
                    </div>
                    <div class="popup_sep"><img src="<?=base_url();?>public/images/popup_sep.png" width="100%" alt=""></div>
                    <div class="popup_txt">Enter Amount
                        <input class="inpt" type="number" name="update_amount" placeholder="$" required="" value="<?php echo !empty($awarded[0]['total_amount']) ? $awarded[0]['total_amount'] : 0 ?>" />
                    </div>
                    <input type="hidden" name="proposal_ID" value="<?=@$awarded[0]['proposalID']?>" />
                    <input type="hidden" name="project_ID" value="<?=$projectID?>" />
                    <input type="hidden" name="reciever_ID" value="<?=$receiverID?>" />
                    <input type="submit"  name="submit" class="popup_pink_btn" value="Update"> 
                   <!-- <a href="#" class="popup_pink_btn"> Sign in</a><img class="popup_lock" src="<?=base_url();?>public/images/lock_icon.png" alt=""> -->
           </form>
                </div>
  </div>


<div style='display:none'>
                <div id="osx-modal-content3" class="popup" style="overflow:hidden">
                    <form name="amount_edit_approve" method="post" action="<?=base_url()?>milestone/update_amount_approve" >
                	<div class="close"><a href="#" class="simplemodal-close">x</a></div>
                	<div class="popup_top">
                        <div class="col-lg-12 inner_hdng head_account">Updated Amount</div>
                    </div>
                    <div class="popup_sep"><img src="<?=base_url();?>public/images/popup_sep.png" width="100%" alt=""></div>
                    <div class="popup_txt">Updated Amount
                        <input readonly="" class="inpt" type="number" placeholder="$"  name="update_amount_fix" required="" value="<?php echo !empty($awarded[0]['myEarningUpdated']) ? '$'.$awarded[0]['myEarningUpdated'] : '$0' ?>" />
                    </div>
                    <input type="hidden" name="update_amount" value="<?php echo !empty($awarded[0]['myEarningUpdated']) ? $awarded[0]['myEarningUpdated'] : 0 ?>" />
                    <input type="hidden" name="proposal_ID" value="<?=@$awarded[0]['proposalID']?>" />
                    <input type="hidden" name="project_ID" value="<?=$projectID?>" />
                    <input type="hidden" name="reciever_ID" value="<?=$receiverID?>" />
                    <input type="submit"  name="submit" class="popup_pink_btn" value="Approve"> 
                   <!-- <a href="#" class="popup_pink_btn"> Sign in</a><img class="popup_lock" src="<?=base_url();?>public/images/lock_icon.png" alt=""> -->
           </form>
                </div>
  </div>


<script type="text/javascript">
    
    $('.add_document').click(function(){
        $('form[name=agreement_document]').slideToggle("slow");
    });
    $('.create_milestone').click(function(){
        $('form[name=milestone] button[type=submit]').show();
        $('form[name=milestone] button[type=reset]').text('Cancel');
 document.getElementById("milestone_form").reset();
 //        $('form[name=milestone]').reset();
        $('#add_milestone').slideDown("slow");
        $("html, body").animate({ scrollTop:  ($(window).height() / 3) }, 1000);
        $('form[name=milestone] input[name=milestone_desc]').focus();
    });
    $('form[name=milestone] button[type=reset]').click(function(){
        $('#add_milestone').slideToggle("slow");
        $('form[name=milestone] input[name=milestoneid]').val('');
    });
    $(document).ready(function(){
        $('#add_milestone').hide();
        $('form[name=agreement_document]').hide();
  var totalPoints = 0;
        $('input[name=m_amount]').each(function(){
  $(this).each(function(){
    totalPoints += parseInt($(this).val()); //<==== a catch  in here !! read below
  });
//  alert(totalPoints);
});
    $('input[name=current_balance]').val(totalPoints);
    var job_total_amount =  $('input[name=job_total_amount]').val();
    var available_balance = (job_total_amount-totalPoints);
    $('.total_milestone_amount').html('<h4>Total: <span style="color:#009900;">$'+totalPoints+'.00<span></h4>');
    $('.total_remaining_amount').html('<h4>Remaining Balance: <span style="color:#009900;">$'+available_balance+'.00<span></h4>');
    });
    
    function editmilestone(id){
        if(id == '')
            return false;
        $('form[name=milestone] input[name=milestoneid]').val(id);
        $('form[name=milestone] button[type=submit]').show();
        var desc = $('#milestone_'+id+' .m_description' ).text();
        var amount = $('#milestone_'+id+' input[name=m_amount]' ).val();
        var notes = $('#milestone_'+id+' input[name=m_notes]' ).val();
        var ddate = $('#milestone_'+id+' .m_delivery_date' ).text();
        $('form[name=milestone] input[name=milestone_desc]').val(desc);
        $('form[name=milestone] input[name=delivery_date]').val(ddate);
        $('form[name=milestone] input[name=amount]').val(amount);
        $('form[name=milestone] textarea[name=notes]').val(notes);
        $('#add_milestone').slideDown("slow");
        $("html, body").animate({ scrollTop:  ($(window).height() / 3) }, 1000);
        $('form[name=milestone] input[name=milestone_desc]').focus();
    }
    
    function viewmilestone(id){
        if(id == '')
            return false;
        $('form[name=milestone] input[name=milestoneid]').val(id);
        var desc = $('#milestone_'+id+' .m_description' ).text();
        var amount = $('#milestone_'+id+' input[name=m_amount]' ).val();
        var notes = $('#milestone_'+id+' input[name=m_notes]' ).val();
        var ddate = $('#milestone_'+id+' .m_delivery_date' ).text();
        $('form[name=milestone] input[name=milestone_desc]').val(desc);
        $('form[name=milestone] input[name=delivery_date]').val(ddate);
        $('form[name=milestone] input[name=amount]').val(amount);
        $('form[name=milestone] textarea[name=notes]').val(notes);
        $('form[name=milestone] button[type=submit]').hide();
        $('form[name=milestone] button[type=reset]').text('Go Back');
        $('#add_milestone').slideDown("slow");
        $("html, body").animate({ scrollTop:  ($(window).height() / 3) }, 1000);
    }
    
    function approvemilestone(id){
        if(id == '')
            return false;
        var c = confirm('Are you Sure you want to approve it?');
        if(c){
            
$.ajax({
    type: "POST",
    url: '<?=base_url()?>milestone/approve',
    data: {'projectid' : <?=$projectID?>, 'recieverid' : <?=$receiverID?>, 'milestoneid' : id},
    success: function(response) {
        if(response == 'ok') {
            alert('Milestone approved Successfully!');
        } else {
            alert('Error Occurred Try Again shortly!');
        }
        location.reload();
    }
});
//        $.post('<?=base_url()?>milestone/approve',{'projectid' : <?=$projectID?>, 'recieverid' : <?=$receiverID?>, 'milestoneid' : id} , function (data, textStatus, jqXHR) {
//            console.log(data);
//			if(data == 'ok') {
//                            alert('Milestone approved Successfully!');
//			} else {
//                            alert('Error Occurred Try Again shortly!');
//                        }
//                        location.reload();
//		}, 'json');
//                return false;
            }
            return false;


    }
    function deletemilestone(id){
        if(id == '')
            return false;
        var c = confirm('Are you Sure you want to delete it?');
        if(c){
                    
$.ajax({
    type: "POST",
    url: '<?=base_url()?>milestone/delete',
    data: {'projectid' : <?=$projectID?>, 'recieverid' : <?=$receiverID?>, 'milestoneid' : id},
    success: function(response) {
        if(response == 'ok') {
            alert('Milestone deleted Successfully!');
        } else {
            alert('Error Occurred Try Again shortly!');
        }
        location.reload();
    }
});
                    
//        $.post('<?=base_url()?>milestone/delete',{'projectid' : <?=$projectID?>, 'recieverid' : <?=$receiverID?>, 'milestoneid' : id} , function (data, textStatus, jqXHR) {
//			if(data == 'ok') {
//                            alert('Milestone deleted Successfully!');
//			} else {
//                            alert('Error Occurred Try Again shortly!');
//                        }
//                        location.reload();
//		}, 'json');
//                return false;
            }
            return false;


    }
    $('form[name=milestone] input[name=amount]').focusout( function(){
        check_balance();
    });

    $('form[name=amount_edit] input[name=update_amount]').focusout( function(){
        update_amount();
    });
    
    function check_balance(){
        var value = $('form[name=milestone] input[name=amount]').val();
        if(value < 1){
            $('form[name=milestone] input[name=amount]').val('');
            return;
        }
        if(value != ''){
            var current_balance =  $('input[name=current_balance]').val();
            var job_total_amount =  $('input[name=job_total_amount]').val();
            var total_now = parseFloat(current_balance) + parseFloat(value);
            if(total_now > parseFloat(job_total_amount)){
                alert('ERROR! Total Amount Exceeded Total Project Cost!');
                return false;
            } else 
                return true;
            
        }
    }
	


    function update_amount(){
        var value = $('form[name=amount_edit] input[name=update_amount]').val();
        if(parseFloat(value) < 1){
            $('form[name=amount_edit] input[name=update_amount]').val('');
            return;
        }
        if(value != ''){
            var current_balance =  $('input[name=current_balance]').val();
            if(parseFloat(value) < parseFloat(current_balance)){
                alert('ERROR! Total Amount Belowed Released Amount!');
                return false;
            } else 
                return true;
            
        }
    }
	

    
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script>
  $(function() {
   
	$( "#delivery_date" ).datepicker({
  dateFormat: "yy-mm-dd"
});
  });
  </script>	
