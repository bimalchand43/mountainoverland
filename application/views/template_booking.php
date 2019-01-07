<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=windows-1252" http-equiv="Content-Type" />

<title><?Php echo $title; ?></title>
<link href="<?php echo base_url(); ?>res/css/public_booking.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>res/css/menu.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="container">
        <div class="banner">
              <div id="top-menu">
                    <div> <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>res/images/home.png" width="18" height="19" border="0"><br />Home</a></div>
                    <div> <a href="<?php echo base_url(); ?>main/contactus"><img src="<?php echo base_url(); ?>res/images/contact_us.png" width="18" height="19" border="0"><br /> Contact Us </a></div>
                    <div> <a href="<?php echo base_url(); ?>main/sitemap"><img src="<?php echo base_url(); ?>res/images/site_map.png" width="18" height="19" border="0"><br /> Sitemap </a></div>
              </div>
        <h1>Mountain Overland Tours and Travels Pokhara, Nepal</h1>
        </div>
        <div class="content">

          <?php echo $contents;


          ?>


        </div>

        <div class="footer"> All Rights Reserved, Mountain Overland Pvt. Ltd. &copy; 2012 </div>
</div>
</body>
</html>
