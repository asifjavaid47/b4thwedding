
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
					// print_r($cancel_dispute_detail);
					// exit;
					if(empty($cancel_dispute_detail))
					{
						echo 'Record Not Found';
					}else
					{
				?>
				<div role="form" class="form-horizontal form-groups-bordered"  method="post" enctype="multipart/form-data">
						
					<div class="form-group">
						<?php 
						/* action2="<?php echo base_url();?>admin/adminPayment/addPayment/" */
							if($this->session->flashdata('message'))
							{
								echo $this->session->flashdata('message');
							}
							// if(!empty($cat))
							// {
								// foreach($get_category_by_id as $cat)
								// {
								
			
				$cancelRefndDsputeFreelancer 	= $cancel_dispute_detail[0]['cancelRefndDsputeFreelancer'];
				$cancelRefndDsputeReasion 				= $cancel_dispute_detail[0]['cancelRefndDsputeReasion'];
				$cancelRefndDsputeStatus 		= $cancel_dispute_detail[0]['cancelRefndDsputeStatus'];
				$cancelRefndDsputeDescribe 				= $cancel_dispute_detail[0]['cancelRefndDsputeDescribe'];
				$cancelRefndDsputeDate 				= $cancel_dispute_detail[0]['cancelRefndDsputeDate'];
				$disputeByAdmin 				= $cancel_dispute_detail[0]['disputeByAdmin'];
				$doneDisputeTo 				= $cancel_dispute_detail[0]['doneDisputeTo'];
				$freelancerID 				= $cancel_dispute_detail[0]['freelancerID'];
				$clientID 				= $cancel_dispute_detail[0]['clientID'];
				// $cancelReqBy 				= $cancel_dispute_detail[0]['cancelReqBy'];
				$projectID 				= $cancel_dispute_detail[0]['ID'];
				$title 				= $cancel_dispute_detail[0]['title'];
				$description 				= $cancel_dispute_detail[0]['description'];
				$hourlyRate 				= $cancel_dispute_detail[0]['hourlyRate'];
				$fixedBudget 				= $cancel_dispute_detail[0]['fixedBudget'];
				$duration 				= $cancel_dispute_detail[0]['duration'];
				$billedToClient 				= $cancel_dispute_detail[0]['billedToClient'];
				
				
				$getclientDetail 				= $cancel_dispute_detail[0]['getclientDetail'];
				$client_fName 				= $cancel_dispute_detail[0]['getclientDetail']['fName'];
				$client_lName 				= $cancel_dispute_detail[0]['getclientDetail']['lName'];
				$client_email 				= $cancel_dispute_detail[0]['getclientDetail']['email'];
				$client_hourlyRate 				= $cancel_dispute_detail[0]['getclientDetail']['hourlyRate'];
				$client_ID				= $cancel_dispute_detail[0]['getclientDetail']['ID'];
				$freelancer_fName 				= $cancel_dispute_detail[0]['getFreelancerDetail']['fName'];
				$freelancer_lName 				= $cancel_dispute_detail[0]['getFreelancerDetail']['lName'];
				$freelancer_email 				= $cancel_dispute_detail[0]['getFreelancerDetail']['email'];
				$freelancer_hourlyRate 				= $cancel_dispute_detail[0]['getFreelancerDetail']['hourlyRate'];
				$freelancer_ID 				= $cancel_dispute_detail[0]['getFreelancerDetail']['ID'];
				
				
				$disputeFilesIDclient 				= $cancel_dispute_detail[0]['getDisputeFilesclient']['disputeFilesID'];
				$disputeFilesNameclient 				= $cancel_dispute_detail[0]['getDisputeFilesclient']['disputeFilesName'];
				$disputeFilesDescriptionclient				= $cancel_dispute_detail[0]['getDisputeFilesclient']['disputeFilesDescription'];
				$disputeFilesimagePathclient 				= $cancel_dispute_detail[0]['getDisputeFilesclient']['disputeFilesimagePath'];
				$userNameclient 				= $cancel_dispute_detail[0]['getDisputeFilesclient']['userName'];
				
				$disputeFilesIDfreelancer 				= $cancel_dispute_detail[0]['getDisputeFilesfreelancer']['disputeFilesID'];
				$disputeFilesNamefreelancer 				= $cancel_dispute_detail[0]['getDisputeFilesfreelancer']['disputeFilesName'];
				$disputeFilesDescriptionfreelancer 				= $cancel_dispute_detail[0]['getDisputeFilesfreelancer']['disputeFilesDescription'];
				$disputeFilesimagePathfreelancer 				= $cancel_dispute_detail[0]['getDisputeFilesfreelancer']['disputeFilesimagePath'];
				$userNamefreelancer 				= $cancel_dispute_detail[0]['getDisputeFilesfreelancer']['userName'];
				
				
					
				
				
				
				// print_r($fName);
			// exit;
			
	?>

	
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label"><?php echo'<h1>'. $cancelRefndDsputeStatus.'</h1>'; ?></label>
						
						
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
							<?php echo $billedToClient; ?>
						</div>
					</div>
                    
                    
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label"> Reason</label>
						
						<div class="col-sm-5">
							<?php echo $cancelRefndDsputeReasion; ?>
						</div>
					</div>
                    
                    
                 <div class="form-group">
					<div class="col-md-12 col-sm-12">
						<div class="col-md-12 col-sm-12">
						
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<h1>Client Detail</h1>
									
									<div class=""><?php echo $client_fName; ?></div>
									<div class=""><?php echo $client_lName; ?></div>
									<div class=""><?php echo $client_email; ?></div>
									<div class=""><?php echo $freelancer_hourlyRate; ?></div>
			
									<div class=""><?php echo $disputeFilesNameclient; ?></div>
									<div class=""><?php echo $disputeFilesDescriptionclient; ?></div>
									<div class="">
										<?php if(!empty($disputeFilesimagePathclient)) { ?>
<!--									
									<img style="width: 200px;" src="<?php echo base_url(); ?>public/upload/dispute/<?php echo $disputeFilesimagePathclient; ?>" alt="" />
									-->
									
									 	<?php
		$src_file_name = $disputeFilesimagePathclient;
		$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
		if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
			?>
			<a href="<?=base_url()?>workRoom/showImage/<?php echo $disputeFilesimagePathclient; ?>" target="_parent"><img src="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePathclient; ?>" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'pdf'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePathclient; ?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'docx'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePathclient; ?>" target="_new"><img src="<?=base_url()?>public/images/word.png" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'xls'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePathclient; ?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" width="170" height="150" ></a>
			<?php
		}else{
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePathclient; ?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" width="170" height="150" ></a> 
			<?php
		}
	?>
									<?php } ?>
									</div>
									
									<form action="<?php echo base_url();?>admin/adminDispute/approvalByAdmin/<?php echo $client_ID; ?>" method="post">
										<input type="hidden" name="projectID" value="<?php echo $projectID; ?>"/>
										<?php
											
											if($doneDisputeTo == $clientID )
											{
												echo"<h3>client dispute done</h3> ";
											}
												else if($doneDisputeTo == 0){
									
									?>
										<button type="submit" class="btn btn-default" >Save</button>
									<?php
											}
									?>
									
									</form>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<h1>Freelancer Detail</h1>
									
									<div class=""><?php echo $freelancer_fName; ?></div>
									<div class=""><?php echo $freelancer_lName; ?></div>
									<div class=""><?php echo $freelancer_email; ?></div>
									<div class=""><?php echo $freelancer_hourlyRate; ?></div>
									
										<div class=""><?php echo $disputeFilesNamefreelancer; ?></div>
									<div class=""><?php echo $disputeFilesDescriptionfreelancer; ?></div>
									<div class="">
										<?php if(!empty($disputeFilesimagePathfreelancer)) { ?>
									<!--	<img style="width: 200px;" src="<?php echo base_url(); ?>public/upload/dispute/<?php echo $disputeFilesimagePathfreelancer; ?>" alt="" />
									-->
									
									 	<?php
		$src_file_name = $disputeFilesimagePathfreelancer;
		$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
		if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
			?>
			<a href="<?=base_url()?>workRoom/showImage/<?php echo $disputeFilesimagePathfreelancer; ?>" target="_parent"><img src="<?=base_url()?>public/upload/dispute/<?php echo $disputeFilesimagePathfreelancer; ?>" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'pdf'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePathfreelancer; ?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'docx'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePathfreelancer; ?>" target="_new"><img src="<?=base_url()?>public/images/word.png" width="170" height="150" ></a> 
			<?php
		}else if($ext == 'xls'){
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePathfreelancer; ?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" width="170" height="150" ></a>
			<?php
		}else{
			?>
			<a href="<?=base_url()?>workRoom/download/<?php echo $disputeFilesimagePathfreelancer; ?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" width="170" height="150" ></a> 
			<?php
		}
	?>
									
									<?php } ?>
									</div>
									
									<form action="<?php echo base_url();?>admin/adminDispute/approvalByAdmin/<?php echo $freelancer_ID; ?>" method="post">
									<input type="hidden" name="projectID" value="<?php echo $projectID; ?>"/>
										<?php
											
											if($doneDisputeTo == $freelancerID )
											{
														echo"<h3>client dispute done</h3> ";
											}
											else if($doneDisputeTo == 0){
											
									
									?>
										<button type="submit" class="btn btn-default" >Save</button>
									<?php
											}
									?>
									</form>
								</div>
							</div>
									
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
					
					</div>
					</div>
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<!--<button type="submit" class="btn btn-default" >Save</button>-->
						</div>
					</div>
					<?php 
						 // } 
					// } 
					?>
				
				<?php } ?>
			</div>
			</div>
		
		</div>
	
	</div>
</div>




	
	