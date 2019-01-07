<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class branch_booking extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

    

    	public function busSearch()
	{
        $this->template->set('title','Bus Search Page');
        $this->template->load('branch/template','branch/busSearch');

	   //	$this->load->view('welcome_message');
	}


    function busListDetail()
    {
        //echo "hello";
        $deptdate="";
        $this->load->helper('array');
        $this->load->model('booking_model');

        $search = array('cboFrom' => $this->input->post('cboFrom'),
							'cboTo' => $this->input->post('cboTo'),
							'dept_date' => date('Y-m-d', strtotime($this->input->post('dept_date'))));

       // print_r($search);
        $record['num_rows'] = $this->booking_model->count_all($search);

        if($record['num_rows']>0){
           $data['buseslist'] = $this->booking_model->get_all($search);
		   //print_r($data['buseslist']);
           $this->template->set('title','Bus List Page');
           $this->template->load('branch/template','branch/busList',$data);
        }
		if($record['num_rows']==0){
           //print_r($search);
           $data1['buslist'] = $this->booking_model->getRecord($search);
           $this->template->set('title','Bus List Page1');
           $this->template->load('branch/template','branch/busListDtl',$data1);
        }

    }
    function busDetails($id)
    {
      $data['sltseat']=anchor('branch/branch_booking/selectSeats','Select Seat');
      $data['title']='Bus Details';
      $data['link_back']=anchor('branch/branch_booking/busListDetail/','Back to list of Bus',array('class'=>'back'));

      $this->load->model('booking_model');
      $data['query']=$this->booking_model->view_row($id);

      $this->template->set('title','Bus List Page');
      $this->template->load('branch/template','branch/busDetails',$data);
    }



    function selectSeats(){


      $this->template->set('title','Seat select Page');
      $this->template->load('branch/template','branch/selectSeats',"");
    }
}


