<style>
.error{
	color:#F00;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/validationScript/stylesheets/jquery.validate.css" />
<script src="<?= base_url(); ?>public/validationScript/javascripts/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#creditCardNumber").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

				jQuery("#amount").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

                jQuery("#creditCardExpireDate").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });
				
				 jQuery("#creditCardExpireyear").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

            });

            /* ]]> */

        </script>
<div id="wrap">

   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <?php if(!empty($message)){ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $message; ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Add Credit Card Info</div>
             <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <?php
				if(sizeof($accountInfo)==0)
				{
					$creditCardNumber = '';
					$cvv 				= '';
					$creditCardExpiremonth = '';
					$creditCardExpireyear = '';
				}else
				{
					$creditCardNumber = $accountInfo['creditCardNumber'];
					$creditCardExpiremonth =  $accountInfo['creditCardExpiremonth'];
					$creditCardExpireyear =  $accountInfo['creditCardExpireyear'];
					$cvv 				=  $accountInfo['cvv'];
				}
			 ?>
            <div class="inner_project_form">
            <?php //echo form_open(base_url().'account/add_credit_card');?>
			  <form id="paymentForm" method="post" class="form-horizontal" action="<?php echo base_url(); ?>account/add_credit_card">
                    
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
					<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    		Credit Card Number
							
							</div>
				 <div class="form-group">
                      
                            <div class="col-sm-8">
                   <input type="text" name="creditCardNumber" id="ccNumber"  class="form-control frm_inpt signup_input" value="<?php echo $creditCardNumber; ?>" >
                    
					
                            </div>
                        </div>


                        
                                        
                    
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Month <select name="creditCardExpiremonth"  id="creditCardExpireDate" value="<?php echo set_value('creditCardExpiremonth'); ?>" class="frm_inpt" >
                        <option value="">Select Month</option>
                        <option value="1" <?php if($creditCardExpiremonth==1){ echo 'selected="selected"';} ?>>1</option>
                        <option value="2"  <?php if($creditCardExpiremonth==2){ echo 'selected="selected"';} ?>>2</option>
                        <option value="3"  <?php if($creditCardExpiremonth==3){ echo 'selected="selected"';} ?>>3</option>
                        <option value="4"  <?php if($creditCardExpiremonth==4){ echo 'selected="selected"';} ?>>4</option>
                        <option value="5"  <?php if($creditCardExpiremonth==5){ echo 'selected="selected"';} ?>>5</option>
                        <option value="6"  <?php if($creditCardExpiremonth==6){ echo 'selected="selected"';} ?>>6</option>
                        <option value="7"  <?php if($creditCardExpiremonth==7){ echo 'selected="selected"';} ?>>7</option>
                        <option value="8"  <?php if($creditCardExpiremonth==8){ echo 'selected="selected"';} ?>>8</option>
                        <option value="9"  <?php if($creditCardExpiremonth==9){ echo 'selected="selected"';} ?>>9</option>
                        <option value="10"  <?php if($creditCardExpiremonth==10){ echo 'selected="selected"';} ?>>10</option>
                        <option value="11"  <?php if($creditCardExpiremonth==11){ echo 'selected="selected"';} ?>>11</option>
                        <option value="12"  <?php if($creditCardExpiremonth==12){ echo 'selected="selected"';} ?>>12</option>
                        </select>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Year <select  name="creditCardExpireyear"  id="creditCardExpireyear" value="<?php echo set_value('creditCardExpireyear'); ?>" class="frm_inpt" >
                        
                        <option value="">Select Year</option>
                        
                        <option value="15" <?php if($creditCardExpireyear==15){ echo 'selected="selected"';} ?>>2015</option>
                        <option value="16" <?php if($creditCardExpireyear==16){ echo 'selected="selected"';} ?>>2016</option>
                        <option value="17" <?php if($creditCardExpireyear==17){ echo 'selected="selected"';} ?>>2017</option>
                        <option value="18" <?php if($creditCardExpireyear==18){ echo 'selected="selected"';} ?>>2018</option>
                        <option value="19" <?php if($creditCardExpireyear==19){ echo 'selected="selected"';} ?>>2019</option>
                        <option value="20" <?php if($creditCardExpireyear==20){ echo 'selected="selected"';} ?>>2020</option>
                        <option value="21" <?php if($creditCardExpireyear==21){ echo 'selected="selected"';} ?>>2021</option>
                        <option value="22" <?php if($creditCardExpireyear==22){ echo 'selected="selected"';} ?>>2022</option>
                        <option value="23" <?php if($creditCardExpireyear==23){ echo 'selected="selected"';} ?>>2023</option>
                        <option value="24" <?php if($creditCardExpireyear==24){ echo 'selected="selected"';} ?>>2024</option>
                        <option value="25" <?php if($creditCardExpireyear==25){ echo 'selected="selected"';} ?>>2025</option>
                        <option value="26" <?php if($creditCardExpireyear==26){ echo 'selected="selected"';} ?>>2026</option>
                        <option value="27" <?php if($creditCardExpireyear==27){ echo 'selected="selected"';} ?>>2027</option>
                        <option value="28" <?php if($creditCardExpireyear==28){ echo 'selected="selected"';} ?>>2028</option>
                        
                        </select>
                     </div> 

					 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Cvv
						<div class="form-group">
                           
                            <div class="col-sm-5">
                                <input type="text" class="form-control cvvNumber" name="cvv" value="<?php echo $cvv; ?>" />
                            </div>
                        </div>
						
						
                     </div>
                    <div style="clear:both;">
                    </div>
                  <input type="submit" class="inner_btn" value="Continue" />
				
                     <?php //echo form_close(); ?>
					  </form>
                    
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_project_form_txt">By clicking,you agree to  <a href="<?=base_url()?>page/independentContractorAgreement">b4thewedding User Agreement</a></div>
                    
                </div>
            </div>
            
        </div>        
    </div>
	

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/css/formValidation.css"/>
  
    <script type="text/javascript" src="<?= base_url(); ?>public/dist/js/formValidation.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>public/dist/js/framework/bootstrap.js"></script>
	
<script type="text/javascript">
$(document).ready(function() {
    $('#paymentForm')
        .formValidation({
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                cardHolder: {
                    selector: '#cardHolder',
                    validators: {
                        notEmpty: {
                            message: 'The card holder is required'
                        },
                        stringCase: {
                            message: 'The card holder must contain upper case characters only',
                            case: 'upper'
                        }
                    }
                },
                ccNumber: {
                    selector: '#ccNumber',
                    validators: {
                        notEmpty: {
                            message: 'The credit card number is required'
                        },
                        creditCard: {
                            message: 'The credit card number is not valid'
                        }
                    }
                },
                cvvNumber: {
                    selector: '.cvvNumber',
                    validators: {
                        notEmpty: {
                            message: 'The CVV number is required'
                        },
                        cvv: {
                            message: 'The value is not a valid CVV',
                            creditCardField: 'ccNumber'
                        }
                    }
                }
            }
        })
        .on('success.field.fv', function(e, data) {
            if (data.field === 'ccNumber') {
                var $icon = data.element.data('fv.icon');
                switch (data.result.type) {
                    case 'AMERICAN_EXPRESS':
                        $icon.removeClass().addClass('form-control-feedback fa fa-cc-amex');
                        break;
                    case 'DISCOVER':
                        $icon.removeClass().addClass('form-control-feedback fa fa-cc-discover');
                        break;
                    case 'MASTERCARD':
                        $icon.removeClass().addClass('form-control-feedback fa fa-cc-mastercard');
                        break;
                    case 'VISA':
                        $icon.removeClass().addClass('form-control-feedback fa fa-cc-visa');
                        break;
                    default:
                        $icon.removeClass().addClass('form-control-feedback fa fa-credit-card');
                        break;
                }
            }
        })
        .on('err.field.fv', function(e, data) {
            if (data.field === 'ccNumber') {
                var $icon = data.element.data('fv.icon');
                $icon.removeClass().addClass('form-control-feedback fa fa-times');
            }
        });
});
</script>
