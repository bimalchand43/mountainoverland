<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class create_bus extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

    	public function add_new_bus()
	{
	    $this->load->model('booking_model');
	    $data['action']=site_url('admin/create_bus/parseNewBus');
		$data['query']=$this->booking_model->get_rootinfo();
		
        $this->template->set('title','Add new bus');
        $this->template->load('admin/template','admin/addbuses',$data);

	   //	$this->load->view('welcome_message');
	}
	
	function parseNewBus(){
	//echo "Hello";
	 $this->load->model('booking_model');
	 $data['query']=$this->booking_model->get_rootinfo();
	 $businfo = array('cmpid ' => $this->input->post('compid'),
							'busNo ' => $this->input->post('busno'),
							'root_id' =>$this->input->post('rootid'),
							'fare' =>$this->input->post('rate'),
							'totalSeat'=>35,
							'seatplan'=>"",
							'departure_time'=>$this->input->post('deptime'),
							'ampm'=>$this->input->post('ampm'));							
							
	$this->booking_model->save_businfo($businfo);
	$this->viewBusDetails();
	//$this->template->set('title','Add new bus');
    //$this->template->load('admin/template','admin/addbuses',$data);
   }
   
   function viewBusDetails(){
   	$this->load->model('booking_model');
	$data['query']=$this->booking_model->get_all_bus();
	
	$this->template->set('title','View Bus details');
    $this->template->load('admin/template','admin/busdetailList',$data);
	
   }
   function updateBuses($id){
    //echo $id;
	$data['action']=site_url('admin/create_bus/parseupdateBuses');
	$this->load->model('booking_model');
	$data['query']=$this->booking_model->get_businfo($id);
	$data['query1']=$this->booking_model->get_rootinfo();
	
	$this->template->set('title','Edit Buses');
    $this->template->load('admin/template','admin/editbuses',$data);
   
   }
   
   
   function parseupdateBuses(){
   
    echo $id= $_POST['id'];
   if(isset($_post['submit'])){
      echo $id= $_POST['id'];
   }
   $this->load->model('booking_model');
   $businfo = array('cmpid ' => $this->input->post('compid'),
							'busNo ' => $this->input->post('busno'),
							'root_id' =>$this->input->post('rootid'),
							'fare' =>$this->input->post('rate'),
							'totalSeat'=>35,
							'seatplan'=>"",
							'departure_time'=>$this->input->post('deptime'),
							'ampm'=>$this->input->post('ampm'));
   
   $this->booking_model->update_businfo($id,$businfo);
   
   $data['query']=$this->booking_model->get_all_bus();
   $this->template->set('title','View Bus details');
   $this->template->load('admin/template','admin/busdetailList',$data);
   }

}


