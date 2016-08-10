
			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../../neon-x/forms/main/index.html">Forms</a>
					</li>
				<li class="active">
			
							<strong>Withdraw Request</strong>
					</li>
					</ol>
			
<h2>Detail Withdraw Request</h2>
<br />
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Detail Withdraw Request
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				<?php 
					if(empty($detailTransaction))
					{
						echo 'Record Not Found';
					}else
					{
				?>
				<form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url();?>admin/withdraw/approveWithdraw/<?php echo $transactionID?>/<?=$showWithdraw[0]['userID']?>" method="post" enctype="multipart/form-data">
						
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">First Name</label>
						
						<div class="col-sm-5">
							<?php echo $showWithdraw[0]['fName']; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">First Name</label>
						
						<div class="col-sm-5">
							<?php echo $showWithdraw[0]['lName']; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Amount</label>
						
						<div class="col-sm-5">
							<?php echo $showWithdraw[0]['amount']; ?>
						</div>
					</div>
                                    <?php
                                        if($detailTransaction[0]['accountType'] == 'bank'){
                                    ?>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Account Holder Name</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['accountHolderName']; ?>
						</div>
					</div>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bank Account Number</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['bankAccountNumber']; ?>
						</div>
					</div>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bank Account Type</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['bankAccountType']; ?>
						</div>
					</div>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bank Name</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['bankName']; ?>
						</div>
					</div>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bank Country</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['bankCountry']; ?>
						</div>
					</div>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">aba Routin Number</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['abaRoutinNumber']; ?>
						</div>
					</div>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bank Address</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['bankAddress']; ?>
						</div>
					</div>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bank City</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['bankCity']; ?>
						</div>
					</div>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bank ZipCode</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['bankZipCode']; ?>
						</div>
					</div>
                                    
                                    <?php
                                        } else { 
                                    ?>
                                        <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">paypal Email</label>
						
						<div class="col-sm-5">
							<?php echo $detailTransaction[0]['paypalEmail']; ?>
						</div>
					</div>
                                    <?php
                                        }
                                        if($showWithdraw[0]['status'] == 0){
                                    ?>
                                    <input type="hidden" name="final_status" />
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
                                                    <button type="submit" class="btn btn-default" onclick="set_status(1)">Approve</button>
                                                    <button type="submit" class="btn btn-default" onclick="set_status(2)" >Decline</button>
						</div>
					</div>
                                    <?php
                                        }
                                    ?>
				</form>
				<?php } ?>
			</div>
		
		</div>
	
	</div>
</div>

<script type="text/javascript">
    function set_status(value){
        $('form input[name=final_status]').val(value);
    }
</script>
    