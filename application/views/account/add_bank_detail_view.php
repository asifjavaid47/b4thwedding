<style>
.error{
	color:#F00;
	}
</style>


<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#bankName").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

				jQuery("#abaRoutinNumber").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

                jQuery("#bankAddress").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

                jQuery("#bankAddress2").validate({

                    expression: "if (VAL) return true; else return false;",


                    //message: "Please enter a valid Email ID"

                });

              jQuery("#bankCity").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

              jQuery("#bankCountry").validate({
                    expression: "if (VAL) return true; else return false;",
                });
				          
				jQuery("#abaRoutinNumber").validate({
                    expression: "if (VAL) return true; else return false;",
                });  
				
				jQuery("#bankState").validate({
                    expression: "if (VAL) return true; else return false;",
                });
				
				jQuery("#bankZipCode").validate({
                    expression: "if (VAL) return true; else return false;",
                });
				
				jQuery("#destinationCurrency").validate({
                    expression: "if (VAL) return true; else return false;",
                });
				
				jQuery("#accountHolderName").validate({
                    expression: "if (VAL) return true; else return false;",
                });
				
				jQuery("#IBAN").validate({
                    expression: "if (VAL) return true; else return false;",
                });


				

            });

            /* ]]> */

        </script>
        
         <?php
				if(sizeof($bankInfo)==0)
				{
					$bankAccountType		= '';
					$bankName 				= '';
					$bankCountry 			= '';
					$abaRoutinNumber		= '';
					$bankAddress 			= '';
					$bankAddress2 			= '';
					$bankCity 				= '';
					$bankState 				= '';
					$bankZipCode 			= '';
					$destinationCurrency 	= '';
					$accountHolderName 		= '';
					$bankAccountNumber 		= '';
				}else
				{
					$bankAccountType 		= $bankInfo['bankAccountType'];
					$bankName 				= $bankInfo['bankName'];
					$bankCountry 			= $bankInfo['bankCountry'];
					$abaRoutinNumber 		= $bankInfo['abaRoutinNumber'];
					$bankAddress 			= $bankInfo['bankAddress'];
					$bankAddress2 			= $bankInfo['bankAddress2'];
					$bankCity 				= $bankInfo['bankCity'];
					$bankState 				= $bankInfo['bankState'];
					$bankZipCode 			= $bankInfo['bankZipCode'];
					$destinationCurrency 	= $bankInfo['destinationCurrency'];
					$accountHolderName 		= $bankInfo['accountHolderName'];
					$bankAccountNumber 		= $bankInfo['bankAccountNumber'];
					
				}
				
			 ?>
        
<div id="wrap">

   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <?php if(!empty($message)){ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $message; ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Add Bank Account</div>
            <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
            
            <div class="inner_project_form">
            <?php echo form_open(base_url().'account/add_bank_detail');?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank Account Type <select name="bankAccountType" id="bankAccountType" class="frm_inpt signup_input" value="" >
                        <option value="CHECKING">CHECKING</option>
						<option value="SAVINGS">SAVINGS</option>
                        </select>
                    </div>
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank Name <input type="text" name="bankName"  id="bankName" value="<?php echo $bankName; ?>" class="frm_inpt signup_input" >
                     </div>
                  	
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank Country 
                         <select name="bankCountry" id="bankCountry" class="frm_inpt signup_input">
                         <?php 
							foreach($countries as $con)
							{?>
							<option value="<?php echo $con->countryName;?>" <?php if($con->countryName==$bankCountry){echo 'selected="selected"';} ?>><?php echo $con->countryName;?></option>
							<?php }?>
                            </select>     
                        
                       
                     </div>
                     
                     
                     
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank Address <input type="text" name="bankAddress"  id="bankAddress" value="<?php echo $bankAddress; ?>" class="frm_inpt signup_input" >
                     </div>
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Account Holder Name <input type="text" name="accountHolderName"  id="accountHolderName" value="<?php echo $accountHolderName; ?>" class="frm_inpt signup_input" >
                     </div>
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Account Holder Address <input type="text" name="bankAddress2"  id="bankAddress2" value="<?php echo $bankAddress2; ?>" class="frm_inpt signup_input" >
                     </div>
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank City <input type="text" name="bankCity"  id="bankCity" value="<?php echo $bankCity; ?>" class="frm_inpt signup_input" >
                     </div>
                  	
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank State
                        <input type="text" name="bankState"  id="bankState" value="<?php echo $bankState; ?>" class="frm_inpt signup_input" >
                       	
                     </div>
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank Swift Code <input type="text" name="bankZipCode"  id="bankZipCode" value="<?php echo $bankZipCode; ?>" class="frm_inpt signup_input" >
                     </div>
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank Account Number <input type="text" name="bankAccountNumber"  id="bankAccountNumber" value="<?php echo $bankAccountNumber; ?>" class="frm_inpt signup_input" >
                     </div>
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Bank Routing Number <input type="text" name="abaRoutinNumber"  id="abaRoutinNumber" value="<?php echo $abaRoutinNumber; ?>" class="frm_inpt signup_input" >
                     </div>
                     
                     
                     
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Destination Currency 
                        <input type="text" name="destinationCurrency"  id="destinationCurrency" value="US Dollar" class="frm_inpt signup_input" readonly  style="cursor:not-allowed; background:#f5f5f5">
                        
                     </div>
                     
                     
                     
                     
                  	<div class="clear10"></div>
                  <input type="submit" class="inner_btn" value="Continue" />
				
                     <?php echo form_close(); ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_project_form_txt">By clicking,you agree to  <a href="<?=base_url()?>page/independentContractorAgreement">b4thewedding User Agreement</a></div>
                   
                    
                </div>
            </div>
            
        </div>        
    </div>
 