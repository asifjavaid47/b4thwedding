
			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../../neon-x/forms/main/index.html">Forms</a>
					</li>
				<li class="active">
			
							<strong>Payment Request</strong>
					</li>
					</ol>
			
<h2>Detail Payment Request</h2>
<br />
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Detail Payment Request
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
					if(empty($detailPaymentRequest))
					{
						echo 'Record Not Found';
					}else
					{
				?>
				<form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url();?>admin/adminPayment/addPayment/<?php echo $detailPaymentRequest[0]['paymentRequestID']?>" method="post" enctype="multipart/form-data">
						
					<div class="form-group">
						<?php 
							if($this->session->flashdata('message'))
							{
								echo $this->session->flashdata('message');
							}
							// if(!empty($cat))
							// {
								// foreach($get_category_by_id as $cat)
								// {
								
			
				$paymentRequestID 	= $detailPaymentRequest[0]['paymentRequestID'];
				$title 				= $detailPaymentRequest[0]['title'];
				$description 		= $detailPaymentRequest[0]['description'];
				$fName 				= $detailPaymentRequest[0]['fName'];
				$myEarning 			= $detailPaymentRequest[0]['myEarning'];
//				$billedToClient 	= $detailPaymentRequest[0]['billedToClient'];
				$billedToClient 	= $detailPaymentRequest[0]['send_amount'];
				$amount 			= $detailPaymentRequest[0]['amount'];
				
			
			
	?>

	
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Title</label>
						
						<div class="col-sm-5">
							<?php echo $title; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Description</label>
						
						<div class="col-sm-5">
							<?php echo $description; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Price</label>
						
						<div class="col-sm-5">
							<?php echo $myEarning; ?>
						</div>
					</div>
                    
                    
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bill To Client</label>
						
						<div class="col-sm-5">
							<?php echo $billedToClient; ?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Client Balance</label>
						
						<div class="col-sm-5">
							<?php echo $amount; ?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Remaining Balance</label>
						
						<div class="col-sm-5">
							<?php echo $amount-$billedToClient; ?>
						</div>
					</div>
                    
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Post By</label>
						
						<div class="col-sm-5">
							<?php echo $fName; ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default" >Save</button>
						</div>
					</div>
					<?php 
						 // } 
					// } 
					?>
				</form>
				<?php } ?>
			</div>
		
		</div>
	
	</div>
</div>




	
	