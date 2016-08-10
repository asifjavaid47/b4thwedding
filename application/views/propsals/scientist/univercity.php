<?php

/**
 * Template Name: univercity
 */
 ?>

<html lang="en-GB">

<head>
<?php get_header(); ?>
    
    
  <div class="clearfix"></div>
            
            
            
           
            
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 about_banner">
             <div class="wrap about_banner_label">
             University
             </div>
             
             </div>
             <div class="clear40"></div>
            
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
             <div class="wrap">
             
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 padding0 border_right">
             
            
            
             
            
             <?php $cat_id =array(5);//the certain category ID
       
       
       $count=1;
$latest_cat_post = new WP_Query( array('posts_per_page' => 6, 'category__in' => $cat_id));
if( $latest_cat_post->have_posts() ) : 
    while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
?>
              <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 padding0">
             <div class="col-lg-12 col-md-11 col-sm-12 col-xs-12 padding0"><?php  the_post_thumbnail(array(600,400), array('class' => 'responsive'));?></div>
            
             
             
             <div class="clear"></div>
             
             <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 padding0">
             
           
   
          <strong class="feed_small_heading"><?php  the_title(); ?></strong><br>
   <span class="feed_small"><?php  $content = get_the_excerpt();
                       echo substr($content, 0, 1000);?>
<div class="clear"></div>
<a href="#" class="btn_more col-lg-4 col-md-4 col-sm-2 col-xs-3">MORE</a>
             
             </span>
             </div>
              <div class="clear20"></div>
              </div>
              
                     <?php
    
  
    
    
    
	}
	

            
             $count++;
            
            endwhile; endif;
			
 wpex_pagination(); 

			
			?>
             </div>
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
             
      <div class="news_feed_small" style="margin-top:0;">Featured News Feed</div>
      
       
           
    <?php $cat_id =array(1,2,3,4,5,6,7,8);
       
       
       $count=1;
$latest_cat_post = new WP_Query( array('posts_per_page' => 3, 'category__in' => $cat_id));
if( $latest_cat_post->have_posts() ) : 
    while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  
?>
      
              
              
          
             <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
           <span class="date_label">  <?php the_time('F j, Y'); ?> at  <?php the_time('g:i a'); ?> by </span><span class="date_label_by"> | </span><span class="date_label">  <?php the_author() ?> </span>
           <br>
             
   <strong class="feed_right"><?php  $content = get_the_excerpt();
                       echo substr($content, 0, 130);
                       ?></strong>

             
            
             </div>
              <div class="clear20"></div>
              <?php
    
  
    
    
    
	
	

            
             $count++;
            
            endwhile; endif;?>
      
      
      <div class="clear20"></div>

      
      
      
      
      
       
       <div class="clear20"></div>
       <div class="sep_right"></div>
       <div class="clear10"></div>
       
 <div class="news_feed_small" style="margin-top:0;">Archives</div>
      
         <?php $cat_id =array(1,2,3,4,5,6,7,8);
       
       
       $count=1;
$latest_cat_post = new WP_Query( array('posts_per_page' => 3, 'category__in' => $cat_id));
if( $latest_cat_post->have_posts() ) : 
    while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  
?>
      
              
              
          
             <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
           <span class="date_label">  <?php the_time('F j, Y'); ?> at  <?php the_time('g:i a'); ?> by </span><span class="date_label_by"> | </span><span class="date_label">  <?php the_author() ?> </span>
           <br>
             
   <strong class="feed_right"<p><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a><p></strong>

             
            
             </div>
              <div class="clear20"></div>
              <?php
    
  

            
             $count++;
            
            endwhile; endif;?>
 
 
 
 
 
 
 
 
 
 

                 <div class="clear20"></div>
       <div class="sep_right"></div>
       <div class="clear10"></div>
       
 <div class="news_feed_small" style="margin-top:0;">Follow Us</div>
      
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 social_icon"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" width="32" height="32" alt="">&nbsp; &nbsp; Follow Us On Facebook</div>
<div class="clear20"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 social_icon"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" width="32" height="32" alt="">&nbsp; &nbsp; Follow Us On Twitter</div>
            <div class="clear20"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 social_icon"><img src="<?php bloginfo('template_directory'); ?>/images/youtube.png" width="32" height="32" alt="">&nbsp; &nbsp; Watch Us on Youtube</div>
            <div class="clear20"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 social_icon"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" width="32" height="32" alt="">&nbsp; &nbsp; Rss Feed</div>
       
       
         <div class="clear20"></div>
       <div class="sep_right"></div>
       
       
     
             </div>
       
             

 
 
 
  
 </div>
       
       
       
       
       
   
       
       
       
       
       
       
         
             
             
             </div>
          
             
          <?php get_footer();?>
             
             
             
                
            
            
            
            <!--  JS  -->
<script type='text/javascript' src='js/script.js'></script>
            
</body>
</html>
