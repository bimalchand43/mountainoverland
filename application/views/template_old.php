<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');

?>

<html>
<head>
<title><?Php  ?></title>
<link href="<?php echo base_url(); ?>res/css/stylePublic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>
<script type="text/javascript" src="<?=base_url()?>res/js/jqyery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>res/js/captcha.js"></script>
</head>

<body>
<div id="hdr">
<h1 align="right">Mountain Overland <BR />Travel and Tours P. Ltd.</h1>
</div>
 <?Php $image_properties = array(
          'src' => 'res/css/images/bannar.jpg',
          'alt' => 'Transpotration of Payas Travels and Tours (P) Ltd.',
          'class' => 'post_images',
          'width' => '987',
          'height'=>'300',
          'title' => '',
          'rel' => 'lightbox',
);

?>

<div id="bannar"><?php echo img($image_properties);?>
 <?php  //echo img('images/bannar.jpg');
 ?>
</div>
<div id="tmenu">

      <?php echo anchor('/','Home'); ?>
      <?php echo anchor('#','About Us'); ?>
      <?php echo anchor('main/busListDetail','Bus Rout Details'); ?>
      <?php echo anchor('#','Buy Bus Tickets'); ?>
      <a href="#">Rent a Bus</a>
      <a href="#">Contact Us</a>
      <?php echo anchor('feedback/','Feedback'); ?>
</div>

<div class="content">
   <div class="leftcontent">
      <?php
            echo $contents;
         ?>
   </div>


</div>
<div id="ftr">All rights reserved<sup>&copy;</sup> 2012 </div>

</body>

</html>