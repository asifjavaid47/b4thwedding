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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Transaction History
            </div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <div class="inner_project_form padding_tb40" style="padding-bottom:0;">
            
                
                  
                </div>
          
               <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
                <strong style="text-align:right; float:right; color:#000; font-size:16px;;">Available Balance <span style="color: #009900;">: US $<?php echo $balance['amount']; ?></span></strong>
            </div>
<!--            <div class="col-lg-12 col-md-12 col-sm-12">
                       
                            <strong style="text-align:left; float:left; color:#000; font-size:14px;">Available Balance:</strong>
                           <strong style="text-align:right; float:right; color:#000; font-size:14px;;"> US <?php echo $balance['amount']; ?>$</strong>
                        
               	 </div>-->
                 <div class="clear20"></div>
             <table class="table">
                        <thead>
                          <tr style="background:#c53d8a; color:#fff;">
                            <th>#</th>
                            <th>Date</th>
                            <th> Balance US$</th>
                            <th> Payment Method</th>
                             <th>  Payment Purpose</th>
                             <th>  Status</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $i=1; foreach($transaction as $list){ ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $list->transactionDate?></td>
                             <td>$<?php echo number_format($list->amount,2)?></td>
                              <td><?php echo ucfirst($list->type)?></td>
                               <td><?php echo ucfirst($list->purpose)?></td>
                               <td><?php if($list->status == 1) echo 'Approved'; else if($list->status == 2) echo 'Declined'; else echo 'Pending'; ?></td>
                          </tr>
                          <?php $i++; } ?>
                          
                        </tbody>
      		</table>
         </div>     
     </div> 
               
</div>