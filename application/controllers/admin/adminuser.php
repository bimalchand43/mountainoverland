<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminuser extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }
	 
	 function addadminuser(){
	 
	 	$this->template->set('title','Add adminuser');
	    $this->template->load('admin/template','admin/addadminuserForm');	  
	 }
	 
	   


}


