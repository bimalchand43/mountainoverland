<?php

$this->load->library('session');
$this->load->library('encrypt');
$this->load->view('admin/adminvali');

if(isset($this->session->userdata["manager"]) and $this->session->userdata["manager"] == "manager")
	   {    
	   		$this->load->library('encrypt');
	   		//$this->template->set('title','Home Pages');
      		//$this->template->load('admin/template','admin/home');	   
	   
?>

<html>
<head>
<title><?Php echo $title; ?></title>
<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/jquery-1.6.2.mina.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/check.js"></script>

<!--<script type="text/javascript" src="<?php echo base_url(); ?>res/js/jquery.min.js"></script>--> 
</head>

<body>
<div id="hdr">
<h1 align="right">MOUNTAIN OVERLAND  <BR />TRAVELS AND TOURS (P) LTD.</h1>
<div style="text-align:right;"><?php echo anchor('logout_admin','Logout'); ?></div>
</div>

<div id="adminuser">
Welcome : 
<!--<?php echo($this->session->userdata('username'));?>
<?php echo($this->session->userdata('ip_address'));?>-->
<?php echo($this->session->userdata('contactperson'));?>


</div>
<div id="content">
<table width="100%">
    <tr>
        <td width="15%" valign="top" class="lc">
         <?php
          $this->load->view('admin/menu');
            //echo $leftContent;
        ?>

        </td>
        <td width="85%" valign="top" class="rc" height="455">
         <?php
            echo $contents;
         ?>
        </td>
    </tr>
</table>
</div>
<div id="ftr">All rights reserved<sup>&copy;</sup> 2012 </div>

</body>

</html>
<?php 
}else
	   {	   		
			redirect("admin");
	   }
?>	   
