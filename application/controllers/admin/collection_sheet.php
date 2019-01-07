<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collection_sheet extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }


	function collection_from_branch(){
	   $data['title']="Branch wise Total Sales ";
	   $this->load->model('collection_model');
       $yearly="";
       $monthly="";
       $daily="";
       $date_from="";
       $date_to="";

       if(isset($_POST['submit'])){
        extract($_POST);
        //echo $yearly;
        //echo $monthly;
        //echo $daily;
        //$intv_date_from =date('Y-m-d', strtotime($date_from));
        //$intv_date_to =date('Y-m-d', strtotime($date_to));
            if($date_from != "")
		 		$intv_date_from =date('Y-m-d', strtotime($date_from));
			else
				$intv_date_from = $date_from;

		 	if($date_to != "")
		 		$intv_date_to =date('Y-m-d', strtotime($date_to));
			else
				$intv_date_to =$date_to;

        //echo $intv_date_from;
        //echo $intv_date_to;
        $data['query']=$this->collection_model->salesrept_branch_wise($yearly,$monthly,$intv_date_from,$intv_date_to);
	   //print_r($data['query']);die();
       $data['yr']=$yearly;
       $data['mnth']= $monthly;
       $data['dly']= $daily;
       $data['dt_from']=$date_from;
	   $data['dt_to']=$date_to;

       }else{
        $data['yr']=$yearly;
        $data['mnth']= $monthly;
        $data['dly']= $daily;
        $data['dt_from']=$date_from;
	    $data['dt_to']=$date_to;
       }


       $data['action']=site_url('admin/collection_sheet/collection_from_branch');
	   $this->template->set('title','sales report');
	   $this->template->load('admin/template','admin/collection_brwiseSalRpt',$data);

	}

    function collection_branch_print($p1="",$p2="",$p3=""){
      $data['title']="Branch wise Total Sales ";
	   $this->load->model('collection_model');
       if($p3 == ""){
         $date_from = $p1;
         $date_to = $p2;
         $yearly="";
         $monthly = "";
       }else{
          if($p2 == 0){
           $monthly="";
         }else{
           $monthly =$p2;
         }
         $date_from = "";
         $date_to = "";
         $yearly=$p1;
       }

        //echo $date_from;
        //echo $date_to;
        //echo "Hello";
            if($date_from != "")
		 		$intv_date_from =date('Y-m-d', strtotime($date_from));
			else
				$intv_date_from = $date_from;

		 	if($date_to != "")
		 		$intv_date_to =date('Y-m-d', strtotime($date_to));
			else
				$intv_date_to =$date_to;

       //echo $intv_date_from;
       //echo $intv_date_to;
       $data['query']=$this->collection_model->salesrept_branch_wise($yearly,$monthly,$intv_date_from,$intv_date_to);
	   //print_r($data['query']);die();

       $this->load->view('admin/print_collt_brRpt',$data);

    }

    function collection_from_agency(){
       $data['title']="Agency wise Total Sales ";
	   $this->load->model('collection_model');
       $yearly="";
       $monthly="";
       $daily="";
       $date_from="";
       $date_to="";

       if(isset($_POST['submit'])){
        extract($_POST);
        //echo $yearly;
        //echo $monthly;
        //echo $daily;
        //$intv_date_from =date('Y-m-d', strtotime($date_from));
        //$intv_date_to =date('Y-m-d', strtotime($date_to));
            if($date_from != "")
		 		$intv_date_from =date('Y-m-d', strtotime($date_from));
			else
				$intv_date_from = $date_from;

		 	if($date_to != "")
		 		$intv_date_to =date('Y-m-d', strtotime($date_to));
			else
				$intv_date_to =$date_to;

        //echo $intv_date_from;
        //echo $intv_date_to;
        $data['query']=$this->collection_model->salesrept_agency_wise($yearly,$monthly,$intv_date_from,$intv_date_to);
	   //print_r($data['query']);die();
       $data['yr']=$yearly;
       $data['mnth']= $monthly;
       $data['dly']= $daily;
       $data['dt_from']=$date_from;
	   $data['dt_to']=$date_to;

       }else{
        $data['yr']=$yearly;
        $data['mnth']= $monthly;
        $data['dly']= $daily;
        $data['dt_from']=$date_from;
	    $data['dt_to']=$date_to;
       }


       $data['action']=site_url('admin/collection_sheet/collection_from_agency');
	   $this->template->set('title','sales report');
	   $this->template->load('admin/template','admin/collection_agwiseSalRpt',$data);
	}

    function collection_agency_print($p1="",$p2="",$p3=""){
      $data['title']="Agency wise Total Sales ";
	   $this->load->model('collection_model');
       if($p3 == ""){
         $date_from = $p1;
         $date_to = $p2;
         $yearly="";
         $monthly = "";
       }else{
          if($p2 == 0){
           $monthly="";
         }else{
           $monthly =$p2;
         }
         $date_from = "";
         $date_to = "";
         $yearly=$p1;
       }

        //echo $date_from;
        //echo $date_to;
        //echo "Hello";
            if($date_from != "")
		 		$intv_date_from =date('Y-m-d', strtotime($date_from));
			else
				$intv_date_from = $date_from;

		 	if($date_to != "")
		 		$intv_date_to =date('Y-m-d', strtotime($date_to));
			else
				$intv_date_to =$date_to;

       //echo $intv_date_from;
       //echo $intv_date_to;
       $data['query']=$this->collection_model->salesrept_agency_wise($yearly,$monthly,$intv_date_from,$intv_date_to);
	   //print_r($data['query']);die();

       $this->load->view('admin/print_collt_agRpt',$data);
    }

}
?>
