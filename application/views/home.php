<?php echo $this->session->flashdata('message');
/*
 $content = "
<a href=\"".base_url()."\">
    <img src=\"".base_url()."res/images/biglogo.png\" width=\"642\" height=\"386\" border=\"0\" />
</a>
   ";
*/

  /*$content = "<div><img src=\"". base_url()."res/images/mountain-overland-machhap_1.png\"></div>";

            <div id=\"buttommenu\">
                <div><a href=\"".base_url()."main/packages\"><img src=\"".base_url()."res/images/packages.png\" /></a></div>
                <div><a href=\"".base_url()."main/destination\"><img src=\"". base_url()."res/images/destinations.png\" /></a></div>
                <div><img src=\"".base_url()."res/images/bookonline.png\" /></div>
                <div><a href=\"".base_url()."main/checkticket\"><img src=\"".base_url()."res/images/checkticket.png\" /></a></div>
            </div>";

echo $content;
*/

?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>res/css/layout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>res/css/style6.css" />

<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>res/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>res/js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>res/js/script.js"></script>


<script type="text/javascript">
 $(document).ready( function(){
		var buttons = { previous:$('#jslidernews3 .button-previous') ,
						next:$('#jslidernews3 .button-next') };

		var _complete = function(slider, index){
								$('#jslidernews3 .slider-description').animate({height:0});
								slider.find(".slider-description").animate({height:100})
						};							;
	 	$('#jslidernews3').lofJSidernews( { interval : 4000,
												direction		: 'opacity',
											 	easing			: 'easeOutBounce',
												duration		: 1200,
												auto		 	: true,
												mainWidth:773,
												buttons			: buttons,
												onComplete:_complete } );
	});
</script>
<!--slider starts-->
             <div id="container">



<!------------------------------------- THE CONTENT ------------------------------------------------->
<div id="jslidernews3" class="lof-slidecontent" style="width:773px; height:322px; float:left;">
	<div class="preload"><div></div></div>

            <div  class="button-previous">Previous</div>

    <!-- MAIN CONTENT -->
    <div class="main-slider-content" style="width:773px; height:322px;">
                <ul class="sliders-wrap-inner">
                    <li>
                            <img src="<?php echo base_url(); ?>res/images/mountain-overland-chitwan.png" title="Newsflash 2" >
                          <div class="slider-description">
                                <div class="description-wrapper">
                                    <div class="slider-meta"><a target="_parent" title="Chitwan - Experience the wildlife adventure." href="#Category-1">Chitwan - Wildlife Experience</a></div>
                                        <h4>Chitwan - Experience the wildlife adventure.</h4>
                            <!--
                            <p></p>
                            -->
                                </div>
                         </div>
                    </li>
                   <li>
                      <img src="<?php echo base_url(); ?>res/images/mountain-overland-kathmandu.png" title="Newsflash 1" >
                         <div class="slider-description"><div class="description-wrapper">
                           <div class="slider-meta"><a target="_parent" title="Kathmandu Valley - Experience the mediavle and ancient culture." href="#Category-2">Ancient and Mediavle Culture</a></div>
                            <h4>Kathmandu Valley - Experience the mediavle and ancient culture.</h4>
                            <!--
                            <p></p>
                            -->
                         </div></div>
                  </li>
                   <li>
                      <img src="<?php echo base_url(); ?>res/images/mountain-overland-lumbini.png" title="Newsflash 3" >
                        <div class="slider-description"><div class="description-wrapper">
                          <div class="slider-meta"><a target="_parent" title="Lumbini - Feel the devind and utter silence." href="#Category-3">Sacred Lumbini</a></div>
                            <h4>Lumbini - Feel the devind and utter silence.</h4>
                            <!--
                            <p></p>
                            -->
                     	</div></div>
                  </li>

                  <li>
                      <img src="<?php echo base_url(); ?>res/images/mountain-overland-machhap_1.png" title="Newsflash 5" >
                        <div class="slider-description"><div class="description-wrapper">
                          <div class="slider-meta"><a target="_parent" title="Pokhara - A Mixture of Trekking Paragliding, arial adventure and many more with beautiful surrounding." href="#Category-4">Beautiful Pokhara</a></div>
                            <!--
                            <p></p>
                            -->
                     	</div></div>
                    </li>

                    <li>
                      <img src="<?php echo base_url(); ?>res/images/mountain-overland-machhapuc.png" title="Newsflash 5" >
                        <div class="slider-description"><div class="description-wrapper">
                           <div class="slider-meta"><a target="_parent" title="Pokhara - A Mixture of Trekking Paragliding, arial adventure and many more with beautiful surrounding." href="#">Panaromic Pokhara </a> </div>
                           <h4>Pokhara - A Mixture of Trekking Paragliding, arial adventure and many more with beautiful surrounding.</h4>
                            <!--
                            <p></p>
                            -->
                      </div></div>
                    </li>

                    <li>
                      <img src="<?php echo base_url(); ?>res/images/mountain-overland-main.png" title="Newsflash 5" >
                        <div class="slider-description"><div class="description-wrapper">
                           <div class="slider-meta"><a target="_parent" title="Mountain Overland Pvt. Ltd." href="#">Mountain Overland Pvt. Ltd.</a></div>
                            <!--
                            <p></p>
                            -->
                      </div></div>
                    </li>
      </ul>
            </div>
 		   <!-- END MAIN CONTENT -->

    <div class="button-next">Next</div>
 </div>

<!------------------------------------- END OF THE CONTENT ------------------------------------------------->
 <p>

    </div>


<!--slider ends-->