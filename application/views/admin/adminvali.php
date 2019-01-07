<?php

//$this->load->library('session');
//$this->load->library('encrypt');


//echo($this->session->userdata('manager'));
$manager=$this->session->userdata('manager');
$mansap=$this->session->userdata('mansap');
if((!isset($manager)) and (!isset($mansap))){
  redirect('admin');
}


?>