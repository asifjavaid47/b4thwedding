<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
            <img src="sssss.png" alt="" />            
        </div> 
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
               
                        <?php 
				 // print_r($freelancerProfile);
										  // exit(); 
										  
							foreach($freelancerProfile as $profile2)
							{
								// print_r($profile2['user_data'][1]);
										  // exit();
							
							  foreach ( $profile2['user_data'] as $profile ) {
 
    									// echo $value[0].','; 
   
								  // }
							// $profile[0]['user_data'];
							echo $profile->fName;
						
						?>
						<div><h2><?php echo $profile->fName . $profile->lName;?></h2></div>
							<?php //echo $profile->email;?>
							<?php //echo $profile->userName;?>
							<div><?php echo $profile->country;?></div>
							<div>Minimum Hourly Rate:  <?php echo $profile->hourlyRate;?></div>
							<div><h3>Skills</h3></div> <span>Edit</span>
							<div>
							<?php 

								foreach ( $profile2['skills'] as $skills )
								{
									echo $skills[0]." ";
								}							
							
							?>
							</div>
							<?php //echo $profile->mainCategory;?>
							
						<?php
							}
							}
						?>
			
            
        </div>        
        </div>        
    </div>
