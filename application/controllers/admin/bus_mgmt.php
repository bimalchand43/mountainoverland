<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bus_mgmt extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

	
	
	function dbmgmt(){
	   $this->load->model('busmgmt_model');
	    $this->load->helper('array');
	   
	   $data['query_time']=$this->busmgmt_model->get_dept_time();
	   $data['query_busno']=$this->busmgmt_model->get_bus_no();
	   $data['query_route']=$this->busmgmt_model->get_routinfo();
	   
	   
	   
	   if(isset($_POST['submit'])){
	  
            $search = array('dept_date' => date('Y-m-d', strtotime($this->input->post('dept_date'))),
							'ttime' => $this->input->post('ttime'),
							'ampm' => $this->input->post('ampm'),
							'troute' => $this->input->post('troute'),
							'tbusno' => $this->input->post('tbusno'));
	   $data['query']=$this->busmgmt_model->busSearch($search);   
	   }
	   $data['action']=site_url('admin/bus_mgmt/dbmgmt');
	   $this->template->set('title','Daily Bus Management');
	   $this->template->load('admin/template','admin/dailybusmgmt',$data);

	}

    function chalani($bus_no,$root_id,$dept_time,$dept_date ){
        $this->load->model('busmgmt_model');

        $this->load->helper('array');

        $search = array('bus_no' => $bus_no,
                        'root_id' =>$root_id,
                        'dept_time' => $dept_time,
                        'dept_date' => $dept_date
                        );
        $data['query'] = $this->busmgmt_model->getChalani($search);
        $data['query1'] = $this->busmgmt_model->cancel_log($search);   
	  //  $this->template->set('title','Chalani');
 	    $this->load->view('admin/chalaniSheet',$data);
    }




}	
