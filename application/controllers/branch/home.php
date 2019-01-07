<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

     public function index()
     {
       $this->template->set('title','Home Pages');
        $this->template->load('branch/template','branch/home');
     }


}


