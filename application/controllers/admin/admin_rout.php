<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_rout extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

    	public function createRout()
	{
        $this->load->model('booking_model');
		$data['query']=$this->booking_model->get_city();
		
		$this->template->set('title','Create Route');
        $this->template->load('admin/template','admin/createRout',$data);

	   //	$this->load->view('welcome_message');
	}
	function parseNewRout(){
	//echo "Hello";
	 $this->load->model('booking_model');
	 
	 $routinfo = array('rFrom' => $this->input->post('routefrom'),
							'rTo' => $this->input->post('routeto'),
							'departure_date' =>'');							
							
	$this->booking_model->save_routinfo($routinfo);
	$this->viewBusRoutDetails();
	//$this->template->set('title','Add new Route');
    //$this->template->load('admin/template','admin/createRout');
   }

   function viewBusRoutDetails(){
   	$this->load->model('booking_model');
	$data['query']=$this->booking_model->get_rootinfo();
	
	$this->template->set('title','View Route details');
    $this->template->load('admin/template','admin/routdetailList',$data);
	
   }
   function updateRoute($id){
    //echo $id;
	$data['action']=site_url('admin/admin_rout/parseupdateRoute');
	$this->load->model('booking_model');
	$data['query']=$this->booking_model->get_routeinfo($id);
	$data['query1']=$this->booking_model->get_city();
	
	
	$this->template->set('title','Edit Route');
    $this->template->load('admin/template','admin/editroute',$data);
   
   }


}


