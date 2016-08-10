
			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../../neon-x/forms/main/index.html">Forms</a>
					</li>
				<li class="active">
			
							<strong>Project History</strong>
					</li>
					</ol>
			
<h2>Project History</h2>
<br />
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					<b>Project History</b>
				</div>				
			</div>
			
			<div class="panel-body">
				<?php
					if(empty($project_history))
					{
						echo 'Record Not Found';
					}else
					{
				?>
				<div role="form" class="form-horizontal form-groups-bordered"  method="post" enctype="multipart/form-data">
			
						<?php 

							if($this->session->flashdata('message'))
							{
								echo $this->session->flashdata('message');
							}
					
								$projectTitle    	= $project_history[0]['projectTitle'];
								$projectDescription = $project_history[0]['projectDescription'];
								$projectRate 		= $project_history[0]['projectRate'];
								$projectBudget 		= $project_history[0]['projectBudget'];
								$projectHours 		= $project_history[0]['projectHours'];
								$projectDuration 	= $project_history[0]['projectDuration'];
								$disputeRefund 		= $project_history[0]['disputeRefund'];
								$disputeReqBy 		= $project_history[0]['disputeReqBy'];
								$disputeFreelancer 	= $project_history[0]['disputeFreelancer'];				
								$disputeReason 	    = $project_history[0]['disputeReason'];
								$disputeDate 		= $project_history[0]['disputeDate'];
								$disputeDescribe 	= $project_history[0]['disputeDescribe'];
								$disputeStatus 		= $project_history[0]['disputeStatus'];
								$disputeByAdmin 	= $project_history[0]['disputeByAdmin'];
								$disputeTo 			= $project_history[0]['disputeTo'];				
								$client 			= $project_history[0]['client'];				
								$ID 				= $project_history[0]['ID'];
								$messages 		    = $project_history[0]['messages'];
								$notification 		= $project_history[0]['notification'];
								$proposal 			= $project_history[0]['proposal'];
								$milestone 			= $project_history[0]['milestone'];
								$files				= $project_history[0]['files'];
								$feedback 			= $project_history[0]['feedback'];
							
					?>

					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Title</label>
						
						<div class="col-sm-5">
							<?php echo $projectTitle; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Description</label>
						
						<div class="col-sm-5">
							<?php echo $projectDescription; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Price</label>
						
						<div class="col-sm-5">
							<?php echo $projectBudget; ?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Hours</label>
						
						<div class="col-sm-5">
							<?php echo $projectHours; ?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Project Duration</label>
						
						<div class="col-sm-5">
							<?php echo $projectDuration; ?>
						</div>
					</div>
                    
                    <div class="panel-heading">
                        <div class="panel-title">
                           <b style="#373e4a"> Messages</b>
                        </div>				
                    </div>
                    <?php if(empty($messages)){ ?>
                     	<div class="form-group">
							<div class="col-sm-5">
								<?php echo 'Record Not Found'; ?>
                            </div>
                        </div>
                        <?php 
					}else{
						foreach($messages as $mess){
					
					?>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Message</label>
						
						<div class="col-sm-5">
							<?php echo $mess['messageText']; ?>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Date</label>
						
						<div class="col-sm-5">
							<?php echo $mess['messageDate']; ?>
						</div>
					</div>
                   <?php 
						}
					}
				   ?>
                    <div class="panel-heading">
                        <div class="panel-title">
                           <b style="#373e4a"> Notifications </b>
                        </div>				
                    </div>
                     <?php if(empty($notification)){ ?>
                     	<div class="form-group">
							<div class="col-sm-5">
								<?php echo 'Record Not Found'; ?>
                            </div>
                        </div>
                        <?php 
					}else{
						foreach($notification as $noti){
					
					?>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Notification</label>
						
						<div class="col-sm-5">
							<?php echo $noti['notificationText']; ?>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Date</label>
						
						<div class="col-sm-5">
							<?php echo $noti['notificationDate']; ?>
						</div>
					</div>
                    
                    <?php 
						}
					}
					?>
                    <div class="panel-heading">
                        <div class="panel-title">
                            <b style="#373e4a"> Proposal </b>
                        </div>				
                    </div>
                     <?php if(empty($proposal)){ ?>
                     	<div class="form-group">
							<div class="col-sm-5">
								<?php echo 'Record Not Found'; ?>
                            </div>
                        </div>
                        <?php 
					}else{
						foreach($proposal as $prop){
					
					?>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Bill to Ctient</label>
						
						<div class="col-sm-5">
							<?php echo $prop['billedToClient']; ?>
						</div>
					</div>
                   
                    <?php
						}
					}
					?>
                    <div class="panel-heading">
                        <div class="panel-title">
                            <b style="#373e4a"> Milestones </b>
                        </div>				
                    </div>
                     <?php if(empty($milestone)){ ?>
                     	<div class="form-group">
							<div class="col-sm-5">
								<?php echo 'Record Not Found'; ?>
                            </div>
                        </div>
                        <?php 
					}else{
						foreach($milestone as $mile){
					
					?>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Detail</label>
						
						<div class="col-sm-5">
							<?php echo $mile['milestoneDetail']; ?>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Notes</label>
						
						<div class="col-sm-5">
							<?php echo $mile['milestoneNotes']; ?>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Delivery Date</label>
						
						<div class="col-sm-5">
							<?php echo $mile['milestoneDeliveryDate']; ?>
						</div>
					</div>
                     <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Creation Date</label>
						
						<div class="col-sm-5">
							<?php echo $mile['milestonecreateDate']; ?>
						</div>
					</div>
                     <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Update Date</label>
						
						<div class="col-sm-5">
							<?php echo $mile['milestoneupdateDate']; ?>
						</div>
					</div>
                     <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Amount</label>
						
						<div class="col-sm-5">
							<?php echo $mile['milestoneAmount']; ?>
						</div>
					</div>
                    <?php
						}
					}
					?>
                    <div class="panel-heading">
                        <div class="panel-title">
                           <b style="#373e4a"> Files </b>
                        </div>				
                    </div>
                     <?php if(empty($files)){ ?>
                     	<div class="form-group">
							<div class="col-sm-5">
								<?php echo 'Record Not Found'; ?>
                            </div>
                        </div>
                        <?php 
					}else{
						foreach($files as $fil){
					
					?>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">File Text</label>
						
						<div class="col-sm-5">
							<?php echo $fil['uploadFileText']; ?>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">File Description</label>
						
						<div class="col-sm-5">
							<?php echo $fil['uploadFileDescription']; ?>
						</div>
					</div><div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Date</label>
						
						<div class="col-sm-5">
							<?php echo $fil['uploadFileDate']; ?>
						</div>
					</div>
                    <?php
						}
					}
					?>
                    <div class="panel-heading">
                        <div class="panel-title">
                           <b style="#373e4a"> Feedback </b>
                        </div>				
                    </div>
                     <?php if(empty($feedback)){ ?>
                     	<div class="form-group">
							<div class="col-sm-5">
								<?php echo 'Record Not Found'; ?>
                            </div>
                        </div>
                        <?php 
					}else{
						foreach($feedback as $feed){
					
					?>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Rating</label>
						
						<div class="col-sm-5">
							<?php echo $feed['feedbackRating']; ?>
						</div>
					</div><div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Quality</label>
						
						<div class="col-sm-5">
							<?php echo $feed['feedbackQuality']; ?>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Expertise</label>
						
						<div class="col-sm-5">
							<?php echo $feed['feedbackExpertise']; ?>
						</div>
					</div><div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Cost</label>
						
						<div class="col-sm-5">
							<?php echo $feed['feedbackCost']; ?>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Schedule</label>
						
						<div class="col-sm-5">
							<?php echo $feed['feedbackSchedule']; ?>
						</div>
					</div><div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Comments</label>
						
						<div class="col-sm-5">
							<?php echo $feed['feedbackComments']; ?>
						</div>
					</div>
                    <?php
						}
					}
					?>
                 
				<?php } ?>
			</div>
			</div>
		
		</div>
	
	</div>
</div>




	
	