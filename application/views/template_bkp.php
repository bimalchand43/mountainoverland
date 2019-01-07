<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');

?>




<html>
<head>
<title><?Php echo $title; ?></title>
<link href="<?php echo base_url(); ?>res/css/menu.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>
<script type="text/javascript" src="<?=base_url()?>res/js/jqyery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>res/js/captcha.js"></script>





<style type="text/css">

html{
    font:12px Arial, Helvetica, sans-serif;
    color:#333;
    padding:0;
    margin:0;
}

body{
  text-align:center;
}

#banner{
  height : 100px;
  /*border : 1px solid #00FF00;*/
}


#content{
  float : left;
  width : 750;
  /*border: 1px solid #000000;*/
}

#container{
  text-align:center;
  width : 1000px;
  margin : auto;
  border : 1px solid #000000;
}

#footer{
  clear : both;
  text-align : right;
  background-color: #0282D7;
  height : 20px;
  color : #FFFFFF;
  font-weight: bold;
  /*border : 1px solid #000000;*/
}


</style>

</head>
<body>
<div id="container">
  <div id="banner">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>res/images/mountain-overland.png" width="507" height="56" border="0" align="left"></a>
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>res/images/logo.png" width="152" height="94" border="0"  align="right"></a>
  </div>

<div id="content">
    <?php echo $contents; ?>
</div>

<div class="listmenu">
      <ul>
          <li id="pkg"><a href="<?php echo base_url(); ?>main/packages">Packages</a></li>
          <li id="dst"><a href="<?php echo base_url(); ?>main/destination">Destination</a></li>
          <li id="apps"><a href="<?php echo base_url(); ?>main/application">Application</a></li>
          <li id="abts"><a href="<?php echo base_url(); ?>main/aboutus">About Us</a></li>
          <li id="cts"><a href="<?php echo base_url(); ?>main/contactus">Contact Us</a></li>
      </ul>
      <h3> <a href="<?php echo base_url();?>main/checkticket">Check Ticket</a></h3>
      <h3> <a href="<?php echo base_url();?>main/feedback">Feedback</a></h3>
</div>
<div id="footer">
    &copy; MountainOverland.com 2012
</div>

</div>
</body>
</html>


