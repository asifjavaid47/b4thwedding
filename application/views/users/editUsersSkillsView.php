<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    
        </div> 
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
			<div><h2>Skills</h2></div>
			<?php 
				if(!empty($confirm_msg))
				{
					print_r($confirm_msg);
				}
				// exit();
				if(!empty($getUsersSkills))
				{					
				foreach($getUsersSkills as $UsersSkills)
				{
								
			?>
			
				<div class="skillHolder">
     <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding0 pull-left">
     <div class="skill_show"><?php echo $UsersSkills->userSkill;?></div></div>
     
   
     <div class="sep_skill"></div>
     </div>
			
				
			<?php
				
				}
				}
			?>
			<div class="clear20"></div>
			<div class="addSkill">
				<form action="<?=base_url();?>users/editUsersSkills" method="post">
					<input type="text" name="SkillsName" required/>
					<input type="submit" value="Add Skills" />
                    <a href="<?=base_url()?>users/freelancerProfile">
                    <input type="button" value="View Profile" />
                    </a>
				</form>
                
			</div>
			
            
        </div>        
        </div>        
    </div>
