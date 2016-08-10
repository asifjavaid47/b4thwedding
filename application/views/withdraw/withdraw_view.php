<style>
.error{
	color:#F00;
	}
</style>


<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#withdrawMethod").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });


                jQuery("#withdrawAmount").validate({

                    expression: "if (VAL) return true; else return false;",


                    //message: "Please enter a valid Email ID"

                });

              jQuery("#bankCity").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });


            });

            /* ]]> */

        </script>
        
<!--       <script>
	   	$(document).ready(function(){
			$('#withdrawAmount').change(function(){
				
				var witdraw = $('#withdrawAmount').val();
				if(witdraw<1)
				{
					$('.processingFee').html('0.00');
					$('.newBalance').html('0.00');
					$('#withdrawAmount').val('');
					return ;
				}
				var totalBalance = $('.totalBalance').html();
				var processingFee = (witdraw*10)/100;
				var newBalance = parseInt(totalBalance)-(parseInt(processingFee)+parseInt(witdraw));
				if(newBalance <0)
				{
					$('.processingFee').html('0.00');
					$('.newBalance').html('0.00');
					$('#withdrawAmount').val('');
					return ;
				}
				$('.processingFee').html(processingFee);
				$('.newBalance').html(newBalance);
				
				})
			})
	   </script>-->
        
<div id="wrap">

   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Withdraw Funds</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
                <div class="col-lg-3 pull-right" style="background:#FFF;"><p><u>Withdraw processing times</u><br /></p>
                <strong>Paypal:</strong>3-5 Business Days
                <br />
                <strong>Bank Transfer:</strong>7-10 Business Days
                </div>
            
            <div class="inner_project_form">
            <?php echo form_open(base_url().'withdraw/withDraw');?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                  	
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                            Withdrawal Method 
                            <select name="withdrawMethod"  id="withdrawMethod" value="" class="frm_inpt signup_input" >
                            	<?php 
							foreach($accountInfo as $acc)
							{?>
							<option value="<?php echo $acc->accountType;?>"><?php echo ucwords($acc->accountType);?></option>
							<?php }?>
                            </select>
                         </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                          <a href="<?=base_url()?>account">Add a Withdrawal Method</a>
                           
                         </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                          Available Balance
                         </div>
                         
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding0 inner_project_form_txt">
                         	US 
                         </div>
                         
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding0 inner_project_form_txt totalBalance">
                             $<span><?php echo $balance['amount']; ?></span>
                         </div>
                    </div>
                    
                     <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                          Withdrawal Amount
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding0 inner_project_form_txt">
                         	US 
                         </div>
                         
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding0 inner_project_form_txt">
                             <span><input type="number" placeholder="$"  name="withdrawAmount" id="withdrawAmount" value="" style="width:90%" /></span>
                         </div>
                     </div>
                    
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                        Processing Fee
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding0 inner_project_form_txt">
                         	US 
                        </div>
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding0 inner_project_form_txt processingFee">
                         	$0.00
                         </div>
                    </div>
                    <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="2" alt=""></div>
                    
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                        New Balance
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding0 inner_project_form_txt">
                         	US 
                        </div>
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding0 inner_project_form_txt newBalance">
                         	$0.00
                         </div>
                    </div>
                    
                  	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                  		<input type="submit" class="inner_btn" value="withdraw" />
                  </div>
				
                     <?php echo form_close(); ?>
                    <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_project_form_txt">By clicking, you agree to our <a href="#">Be4 The Wedding Terms of Service</a></div>-->
                   
                    
                </div>
                
            </div>
            
        </div>        
    </div>
    <input type="hidden" name="commsion" id="commsion" value="<?php echo $setting['settingValue']; ?>" /> 
 <script>
//	   	$(document).ready(function(){
//			$('#withdrawAmount').focusout(function(){
//				
//				var witdraw = parseFloat($('#withdrawAmount').val());
//				if(witdraw < 1)
//				{
//                                    $('.processingFee').html('0.00');
//                                    $('.newBalance').html('0.00');
//                                    $('#withdrawAmount').val('');
//                                    return ;
//				}
//				var totalBalance = $('.totalBalance span').html();
//				var commsion = parseFloat($('#commsion').val());
//				
//				var processingFee = (witdraw*commsion)/100;
//				
//				var total = processingFee+witdraw;
//				
//				var newBalance	= totalBalance-total;
//				if(newBalance < 0)
//				{
//                                    $('.processingFee').html('0.00');
//                                    $('.newBalance').html('0.00');
//                                    $('#withdrawAmount').val('');
//                                    return ;
//				}
//				newBalance = Number((newBalance).toFixed(2));
//				$('.processingFee').html(processingFee);
//				$('.newBalance').html(newBalance);
//				
//				})
//			})



	   	$(document).ready(function(){
			$('#withdrawAmount').focusout(function(){
                            var account_type = $('select[name=withdrawMethod]').val();
                            if(account_type == 'paypal')
                                var commsion = 0;
                            else 
                                var commsion = 25;
                                
				var witdraw = parseFloat($('#withdrawAmount').val());
				if(witdraw < 1)
				{
                                    $('.processingFee').html('0.00');
                                    $('.newBalance').html('0.00');
                                    $('#withdrawAmount').val('');
                                    return ;
				}
				var totalBalance = $('.totalBalance span').html();
//				var commsion = parseFloat($('#commsion').val());
				
				var processingFee = commsion;
				
				var total = processingFee+witdraw;
				
				var newBalance	= totalBalance-total;
				if(newBalance < 0)
				{
                                    $('.processingFee').html('0.00');
                                    $('.newBalance').html('0.00');
                                    $('#withdrawAmount').val('');
                                    return ;
				}
				newBalance = Number((newBalance).toFixed(2));
				$('.processingFee').html(processingFee);
				$('.newBalance').html(newBalance);
				
				})
			})



	   </script>