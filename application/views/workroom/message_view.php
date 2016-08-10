<?php
    $login_user = $this->session->userdata('userID');
?>
<div id="wrap">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Work Station
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng" style="font-size: 24px;"> <?=$project[0]['title']?>
            </div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
    <div class="clear20"></div>
    <?php
        echo $sidebar;
    ?>
    
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
          <div class="message_box">
          
          <h4 class="message" style="margin:0 !important;"> messages </h4>
          <div class="clear5"></div>
          <div style="border:solid 1px #d6d6d6; background:#f5f5f5; border-radius:5px;">
          <?php echo form_open_multipart(base_url().'workRoom/message/'.$projectID.'/'.$receiverID); ?>
        	<textarea style="border:none; border-radius:5px;" class="msg" name="message" required/></textarea>
           
            
            
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt" style="margin-left:5px;">
                    <input type="file" name="fileAttachement" id="fileAttachement" />
             </div>
           <div class="col-lg-4 col-md-12 col-sm-12 col-xs-11 padding0 pull-right">
            <input type="submit" value="Send" class="post_btn" />
            </div>
          <?php echo form_close(); ?> 
           <div class="clear"></div>
            </div> </div>
            <!--<div class="box_2 col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;">
            <div class="box_2_txt col-lg-2 col-md-2 col-sm-4">
            	<div class="box_2_txt"
                 style=" color:#000; margin-top:10px; font-size:14px; text-transform:capitalize; margin-left:10px; float:left;">sender</div>
                 </div>
                <div class="box_2_txt col-lg-7 col-md-4 col-sm-4" style=" color:#000; font-size:14px; text-transform:capitalize; float:left; margin-top:10px;">Message|Attachments</div>
                
                <div class="box_2_txt col-lg-2 col-md-3 col-sm-3" style=" color:#000; font-size:14px; text-transform:capitalize; float:left; margin-top:10px;">Date/Time</div>
            </div>-->
            
            <!--<div class="box_3">
            	<span style=" background:url(images/search.png) no-repeat; width:18px; height:18px; float:left; margin-top:10px; margin-top:10px;"></span>
                
                <div class="box_2_txt" style=" color:#ffffff; font-size:14px; float:left; line-height:40px; margin-top:"></div>
            </div>-->
            
            <div class="clear10"></div>
            
<!--            <div class="pull-left col-md-2 padding0"><img src="<?=base_url()?>/public/images/logo.png" class="img-responsive" alt="" /></div>
            
              <div class="pull-left col-md-10">
                <h5>Asif Mahmood</h5>
                  <span>sdfksdjfkl</span>
             
                  <div class="clear10"></div>
                  <div class=""><a href="#">aimage.jpg</a></div>
                <div class="sender_name" style="float:right">01-17-2015 14:40:34</div>
                  
              </div>-->
              
              
      
       
            
            
            
            <?php
            if(sizeof($messageList) > 0){
            foreach($messageList as $inbox){ ?>

            <?php
                if($login_user == $inbox->senderID){
            ?>
            <div class="box_4" style="padding:5px;">
            <?php
            } else {
            ?>
            <div class="box_5" style="padding:5px;">
            <?php
            }
            ?>
            
                <div class="pull-left col-md-2 padding0"><img style="height: 80px;width: 80px;" src="<?=base_url()?>public/upload/profile/thumbnail/<?php echo !empty($inbox->image) ? $inbox->image: 'user_profile_placeholder_64x80.jpg' ?>" class="img-responsive" alt="Profile Image" /></div>
              <div class="pull-left col-md-10">
                  <?php
                    if($login_user == $inbox->senderID){
                  ?>
                  <h6 style="font-weight: bold; color: #222;">Me</h6>
                <?php
                    } else {
                ?>
                <h5><?php echo $inbox->userName;?></h5>
                <?php
                    }
                ?>
                  <span><?=$inbox->message;?></span>
             
                  <div class="clear10"></div>
                <?php if($inbox->attachFiles!=''){
                ?>
                  <a href="<?=base_url()?>/public/upload/messageUpload/<?php echo $inbox->attachFiles; ?>" target="_new"><?php echo $inbox->attachFiles; ?></a>
                <?php } ?>
                <div class="sender_name" style="float:right"><?=date('m/d/Y h:ia' , strtotime($inbox->sendDate)); ?></div>
                  
              </div>
            		<div class="clear10"></div>
            
            
            
<!--            <div style="border-bottom:solid 1px #CCC; padding-bottom:10px;">
            	<div class="sender_name" style="margin-left:0;"><strong><?php echo $inbox->fName; ?> </strong></div>
                <div class="sender_name"><?php echo $inbox->message; ?></div>
                 <div class="sender_name">
                 	<?php if($inbox->attachFiles!='')
					{
					?>
				 		<a href="<?=base_url()?>/public/upload/messageUpload/<?php echo $inbox->attachFiles; ?>" target="_new"><?php echo $inbox->attachFiles; ?></a>
                    <?php } ?>
                 </div>
                <div class="sender_name" style="float:right"><?php echo date('m-d-Y:H-i-s',strtotime($inbox->sendDate)); ?></div>
            		<div class="clear"></div>
                </div>-->
            </div>
                <div style="margin-bottom:2px;" class="sep_people"></div>
            <?php }
            }
            ?>
          <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

 </div>
 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" id="online-box" style="box-shadow: 10px 10px 8px #888888; padding:5px; background: #fff;">
<div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left padding0">
  <h4 class="hed_people">Online Status</h4>
</div>
<!--<div  class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
<a href="#"><img src="<?=base_url()?>public/images/add_icon.png" class="pull-right" width="16" height="16" alt=""></a></div>-->
<div class="clear5"></div>
<div class="sep_people"></div>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0">
 <h4 class="padding0" style="color:#222; margin-top:0;">Client</h4>
     <?php if($awarded['client_is_online'] == 1){?><img alt="" class="" src="<?=base_url()?>public/images/online-1.png"> <?php }else { ?> <img alt="" class="" src="<?=base_url()?>public/images/offline-1.png"> <?php } ?> <a href="<?=base_url()?>users/clientProfile/<?=$awarded['client_id']?>" style="color: #000;"><b><?=$awarded['client_name']?></b></a><br />

<?php
if($awarded['client_is_online'] == 1){
?>
<b style="color: #33cc00;">Online Now</b>
<?php
} else if(!empty($awarded['client_last_login'])){
?>
<b>last login -:</b> <?=$awarded['client_last_login']?>
<?php
}
?>
</div>
<!--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-left padding0"><a href="#"><img src="<?=base_url()?>public/images/people_arroe.png" class="pull-right" alt=""></a></div>-->



<div class="clear"></div>
<div class="sep_people" style="margin-bottom:2px;"></div>
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0">
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left padding0">
 <h4 class="padding0" style="color:#222; margin-top:0;">Wedding Contractor</h4>
     <?php if($awarded['freelancer_is_online'] == 1){?><img alt="" class="" src="<?=base_url()?>public/images/online-1.png"> <?php }else { ?> <img alt="" class="" src="<?=base_url()?>public/images/offline-1.png"> <?php } ?>  <a href="<?=base_url()?>users/freelancerProfile/<?=$awarded['freelancer_id']?>" style="color: #000;"><b><?=$awarded['freelancer_name']?></b></a><br />

<?php
if($awarded['freelancer_is_online'] == 1){
?>
<b style="color: #33cc00;">Online Now</b>
<?php
} else if(!empty($awarded['freelancer_last_login'])){
?>
<b>last login -</b> <?=$awarded['freelancer_last_login']?>
<?php
}
?>
</div>
<!--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-left padding0"><a href="#"><img src="<?=base_url()?>public/images/people_arroe.png" class="pull-right" alt=""></a></div>-->
<div class="clear"></div>
</div>
<div class="clear10"></div>
</div>

</div>
 
 
 
    
          </div>        
    </div>


<script type="text/javascript">
    $(document).ready(function() {
    setInterval("users_online_status()",10000);
});

    function users_online_status(){
        
        $.ajax({
        type: 'post',
        data: {'client_id' : <?=$awarded['client_id']?> , 'freelancer_id' : <?=$awarded['freelancer_id']?>},
        async: false,
        url: '<?=base_url()?>users/check_users_online_status',
        success: function(response) {
            if(response != 'fail') {
                $('#online-box').replaceWith(response);
            } else {
                return;
            }
        }

        });

        
    }
</script>
