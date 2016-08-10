
<?php

/**
 * Template Name: home
 */

  get_header();
  


?>
<html lang="en-GB">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<!-- ************************************************************************ !-->
        <!-- *****                                                              ***** !-->
        <!-- *****       ¤ Designed and Developed by  LEADconcept               ***** !-->
        <!-- *****               http://www.leadconcept.com                     ***** !-->
        <!-- *****                                                              ***** !-->
        <!-- ************************************************************************ !-->

<!-- CSS  -->
<script>
    // You can also use "$(window).load(function() {"
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        maxwidth: 800,
        speed: 800
      });

    });
  </script>
    
    
    <script type="text/javascript">
		$(document).ready(function(){
			$('#slider2').tinycarousel();	
		});
		
	</script>

    <script>
        jQuery(document).ready(function ($) {
            //Reference http://www.jssor.com/development/slider-with-slideshow.html
            //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html

            var _SlideshowTransitions = [
            //Swing Outside in Stairs
            {$Duration: 1200, $Delay: 20, $Cols: 8, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $FlyDirection: 9, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $ScaleHorizontal: 0.2, $ScaleVertical: 0.1, $Outside: true, $Round: { $Left: 1.3, $Top: 2.5} }

            //Dodge Dance Outside out Stairs
            , { $Duration: 1500, $Delay: 20, $Cols: 8, $Rows: 4, $Clip: 15, $During: { $Left: [0.1, 0.9], $Top: [0.1, 0.9] }, $SlideOut: true, $FlyDirection: 9, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Clip: $JssorEasing$.$EaseOutQuad }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.3, $Outside: true, $Round: { $Left: 0.8, $Top: 2.5} }

            //Dodge Pet Outside in Stairs
            , { $Duration: 1500, $Delay: 20, $Cols: 8, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $FlyDirection: 9, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $ScaleHorizontal: 0.2, $ScaleVertical: 0.1, $Outside: true, $Round: { $Left: 0.8, $Top: 2.5} }

            //Dodge Dance Outside in Random
            , { $Duration: 1500, $Delay: 20, $Cols: 8, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $FlyDirection: 9, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Clip: $JssorEasing$.$EaseOutQuad }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.3, $Outside: true, $Round: { $Left: 0.8, $Top: 2.5} }

            //Flutter out Wind
            , { $Duration: 1800, $Delay: 30, $Cols: 10, $Rows: 5, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $SlideOut: true, $FlyDirection: 5, $Reverse: true, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 2050, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseOutWave, $Clip: $JssorEasing$.$EaseInOutQuad }, $ScaleHorizontal: 1, $ScaleVertical: 0.2, $Outside: true, $Round: { $Top: 1.3} }

            //Collapse Stairs
            , { $Duration: 1200, $Delay: 30, $Cols: 8, $Rows: 4, $Clip: 15, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 2049, $Easing: $JssorEasing$.$EaseOutQuad }

            //Collapse Random
            , { $Duration: 1000, $Delay: 80, $Cols: 8, $Rows: 4, $Clip: 15, $SlideOut: true, $Easing: $JssorEasing$.$EaseOutQuad }

            //Vertical Chess Stripe
            , { $Duration: 1000, $Cols: 12, $FlyDirection: 8, $Formation: $JssorSlideshowFormations$.$FormationStraight, $ChessMode: { $Column: 12} }

            //Extrude out Stripe
            , { $Duration: 1000, $Delay: 40, $Cols: 12, $SlideOut: true, $FlyDirection: 2, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInOutExpo, $Opacity: $JssorEasing$.$EaseInOutQuad }, $ScaleHorizontal: 0.2, $Opacity: 2, $Outside: true, $Round: { $Top: 0.5} }

            //Dominoes Stripe
            , { $Duration: 2000, $Delay: 60, $Cols: 15, $SlideOut: true, $FlyDirection: 8, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: $JssorEasing$.$EaseOutJump, $Round: { $Top: 1.5} }
            ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2                                //[Required] 0 Never, 1 Mouse Over, 2 Always
                }
            };

            var jssor_slider2 = new $JssorSlider$("slider2_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$SetScaleWidth(Math.min(parentWidth, 1024));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>scientist University</title>
</head>

<body>
		    	
             
            
            <div class="clearfix"></div>
            
            <div class="banner">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner_slider padding0">
                	
                    <div class="bnr_img col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
                        <div class="bs-example">
                            <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                
                              
                                
                               <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item">
                                        <img src="<?php bloginfo('template_directory'); ?>/images/banner1.png" class="img-responsive" alt="">
                                         <div class="bnr_txt">
                                         <div class="carousel-caption">
                                      <div class="bnr_txt_hdng">Lorem Ipsum Dolor Lorem Ipsum
                                      <br>
<span>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</span>
                                      </div>
                                          </div>
                                         </div>
                                  </div>
                                    <div class="item">
                                        <img src="<?php bloginfo('template_directory'); ?>/images/banner2.jpg" class="img-responsive" alt="">
                                        <div class="bnr_txt">
                                         <div class="carousel-caption">
                                            <div class="bnr_txt_hdng">Lorem Ipsum Dolor Lorem Ipsum
                                      <br>
<span>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</span>
                                      </div>
                                       
                                          </div>
                                         </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?php bloginfo('template_directory'); ?>/images/banner3.jpg" class="img-responsive" alt="">
                                        <div class="bnr_txt">
                                         <div class="carousel-caption">
                                           <div class="bnr_txt_hdng">Lorem Ipsum Dolor Lorem Ipsum
                                      <br>
<span>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</span>
                                      </div>
                                          </div>
                                         </div>
                                    </div>
                                    
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clear40"></div>
            
            
            
            
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
             <div class="wrap">
             
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 padding0 border_right">
             <div>
             <img src="<?php bloginfo('template_directory'); ?>/images/week_pic.png" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 img-responsive padding_left0" alt="">
             <div class="pic_week"></div>
             <div class="pic_week_label">picture of the week</div>
             </div>
            
             <div class="clear"></div>
             <div class="news_feed">News Feed</div>
             

             
             
             
             
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
                           
  <?php $cat_id =array(2,3,4);
       
       
       $count=1;
$latest_cat_post = new WP_Query( array('posts_per_page' => 3, 'category__in' => $cat_id));
if( $latest_cat_post->have_posts() ) : 
    while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
?>
      
              
              
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding0"> <?php  the_post_thumbnail(array(139,117), array('class' => 'responsive'));?></div>
             <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
             <span class="date_label"> Aprial 19 </span><span class="date_label_by"> | By </span><span class="date_label"> Eve Garner </span>
             <br>
             <strong class="feed_small_heading"><?php  the_title(); ?></strong><br>
   <span class="feed_small"><?php  $content = get_the_excerpt();
                       echo substr($content, 0, 350);
 ?>
<div class="clear"></div>
<a href="#" class="btn_more col-lg-2 col-md-2 col-sm-2 col-xs-3">MORE</a>
             
             </span>
             </div>
              <div class="clear20"></div>
              <?php
    
  
    
    
    
	}
	

            
             $count++;
            
            endwhile; endif;?>
             </div>
              
<!--             
   
          -->
               
             
             
             
             
             <!--             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding0"><img src="<?php bloginfo('template_directory'); ?>/images/feed_pic1.png" class="img-responsive" alt=""></div>
             
             
             <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
             <span class="date_label"> Aprial 19 </span><span class="date_label_by"> | By </span><span class="date_label"> Eve Garner </span>
             <br>
   
          <strong class="feed_small_heading">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum</strong><br>
   <span class="feed_small">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum>Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolo
Lorem Ipsum Dolo
<div class="clear"></div>
<a href="#" class="btn_more col-lg-2 col-md-2 col-sm-2 col-xs-3">MORE</a>
             
             </span>
             </div>
             
              </div>-->
              
              
              <div class="clear20"></div>
             
<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding0"><img src="<?php bloginfo('template_directory'); ?>/images/feed_pic2.png" class="img-responsive" alt=""></div>
             
             
             <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
             <span class="date_label"> Aprial 19 </span><span class="date_label_by"> | By </span><span class="date_label"> Eve Garner </span>
             <br>
   
          <strong class="feed_small_heading">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum</strong><br>
   <span class="feed_small">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum>Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolo
Lorem Ipsum Dolo
<div class="clear"></div>
<a href="#" class="btn_more col-lg-2 col-md-2 col-sm-2 col-xs-3">MORE</a>
             
             </span>
             </div>
             
              </div>   -->
              
              
                            <div class="clear20"></div>
             
<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0">
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding0"><img src="<?php bloginfo('template_directory'); ?>/images/feed_pic3.png" class="img-responsive" alt=""></div>
             
             
             <div class="col-lg-10 col-md-10 col-sm-100 col-xs-10">
             <span class="date_label"> Aprial 19 </span><span class="date_label_by"> | By </span><span class="date_label"> Eve Garner </span>
             <br>
   
          <strong class="feed_small_heading">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum</strong><br>
   <span class="feed_small">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum>Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum Dolor Ipsum
Lorem Ipsum Dolo
Lorem Ipsum Dolo
<div class="clear"></div>
<a href="#" class="btn_more col-lg-2 col-md-2 col-sm-2 col-xs-3">MORE</a>
             
             </span>
             </div>
             
              </div> -->
 </div>
       
       
       
       
       
     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
             
      <div class="news_feed_small" style="margin-top:0;">Featured News Feed</div>
      
       <span class="date_label"> Aprial 19 </span><span class="date_label_by"> | </span><span class="date_label"> 1447:AM </span>
             <br>
   
       <strong class="feed_right">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum
          Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum sfd.Dolor Lorem Ipsum Ipsum.
          </strong>
      
      <div class="clear20"></div>
      <span class="date_label"> Aprial 19 </span><span class="date_label_by"> | </span><span class="date_label"> 1447:AM </span>
             <br>
   
       <strong class="feed_right">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum
          Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum sfd.Dolor Lorem Ipsum Ipsum.
          </strong>
             <div class="clear20"></div>
      <span class="date_label"> Aprial 19 </span><span class="date_label_by"> | </span><span class="date_label"> 1447:AM </span>
             <br>
   
       <strong class="feed_right">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum
          Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Ipsum sfd.Dolor Lorem Ipsum Ipsum.
          </strong>
       
       
       
       <div class="clear20"></div>
       <div class="sep_right"></div>
       <div class="clear10"></div>
       
 <div class="news_feed_small" style="margin-top:0;">Archives</div>
      
       <span class="date_label"> Aprial 19 </span><span class="date_label_by"> | </span><span class="date_label"> 1447:AM </span>
             <br>
   
       <strong class="feed_right">December 2014<br>
January 2015<br>
December 2014</strong>

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
       
       
       
       
       
       
       
         
             
             
            
            
             
           <?php get_footer();?>
             
             
             
                
            
            
            
            <!--  JS  -->
<script type='text/javascript' src='js/script.js'></script>
            
</body>
</html>
