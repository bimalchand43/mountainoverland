<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_report extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

	function totalSalesReport(){
       
	   $data['title']="Total Sales ";
	   $this->load->model('report_model');
	   $salesbill="";
	   $nameonticket="";
	   $chkdate="";
	   $date_from="";
	   $date_to="";
	   $dt_from="";
	   $dt_to="";
	   $tbusno="";
	   $tbusnos="";
	   $troute="";
	   $troutes="";
	   $dept_date="";
	   $single="";
	  
	   if(isset($_POST["submit"])){
	     extract($_POST);
	   }
	   
	   
		if($single == "S"){
		  $data['query']=$this->report_model->salesrept($salesbill,$nameonticket,$tbusnos,$troutes);
	    }
		
		if($single == "M"){
			if($date_from != "") 
		 		$intv_date_from =date('Y-m-d', strtotime($date_from));
			else 
				$intv_date_from = $date_from;
				
		 	if($date_to != "")
		 		$intv_date_to =date('Y-m-d', strtotime($date_to));
			else
				$intv_date_to =$date_to;	
		 	
	       $data['query']=$this->report_model->salesreptmultiple($intv_date_from,$intv_date_to,$chkdate,$tbusno,$troute);
	    }
	   
	   $data['query_busno']=$this->report_model->get_bus_no();
	   $data['query_route']=$this->report_model->get_routinfo(); 
	   
	   
	   $data['salebill']=$salesbill; 
	   $data['salename']=$nameonticket;
	   $data['chekissu']=$chkdate;
	   $data['dt_from']=$date_from;
	   $data['dt_to']=$date_to;
	   $data['busnum']=$tbusno;
	   $data['busnums']=$tbusnos;
	   $data['troot']=$troute;
	   $data['troots']=$troutes;
	    
	   $data['action']=site_url('admin/sales_report/totalSalesReport');
	   $this->template->set('title','sales report');
	   $this->template->load('admin/template','admin/tSalesRpt',$data);
	}

    function periodicSalesReport($p1="",$p2="",$p3=""){

	   //echo "priodic sales report";
	  $this->load->model('report_model');
	  $data["para1"]=$p1;
	  $data["para2"]=$p2;
	  $data["para3"]=$p3;

	   if($p1=="period"){
	   		$data['query']=$this->report_model->periodicsalesrept();

	   }

	    if($p1=="yearly"){
	    	$data['query_yearly']=$this->report_model->salesyearlyrept($p2);
	   		$data['year']=$p2;
			//print_r($data['query_yearly']);
	   }

	   if($p1 == "monthly"){

			 $month=$this->convertMonthToNum($p3);
			 $data['query_monthly']=$this->report_model->salesMonthlyrept($p2,$month);
			 //print_r($data['query_monthly']);
	   }

	   if($p1 == "daily"){

			 //$month=$this->convertMonthToNum($p3);
			 $data['query_daily']=$this->report_model->salesDailyRept($p2);
			// print_r($data['query_daily']);
	   }

       if($p1 == "datewise"){
            $dfrom = strtotime($_POST["dfrom"]);
            $dto = strtotime($_POST["dto"]);
            $stdate = date('Y-m-d',$dfrom);
            $enddate = date('Y-m-d',$dto);
            $data["stdate"] = $stdate;
            $data["enddate"] = $enddate;
            $data['query_monthly'] = $this->report_model->salesDatewiseRept($stdate,$enddate);
       }

	   $this->template->set('title','Perodic sales report');
	   $this->template->load('admin/template','admin/prdSalRpt',$data);

	}

	function yearlyReport($year){
	   $this->load->model('report_model');

	   //echo $year; die();
	   $data['query']=$this->report_model->salesyearlyrept($year);
	   $data['year']=$year;
	   //print_r($data['query']); die();

	   $this->template->set('title','Perodic sales report');
	   $this->template->load('admin/template','admin/yearlySalRpt',$data);
	}

	function convertMonthToNum($month){
	  //echo $month; die();
	  switch($month)
             {
                case "January":  $mon=1;
                                 break;
                case "February": $mon=2;
                                 break;
                case "March":    $mon=3;
                                 break;
                case "April":    $mon=4;
                                 break;
                case "May":      $mon=5;
                                 break;
                case "June":     $mon=6;
                                 break;
                case "July":     $mon=7;
                                 break;
                case "August":   $mon=8;
                                 break;
                case "September":$mon=9;
                                 break;
                case "October":  $mon=10;
                                 break;
                case "November": $mon=11;
                                 break;
                case "December": $mon=12;
                                 break;
             }
	  return $mon;
	}

	function total_sales_by_branch(){
	   $data['title']="Branch wise Total Sales ";
	   $this->load->model('report_model');

       $data['query']=$this->report_model->salesrept_branch_wise();
	   //print_r($data['query']);die();

	   $this->template->set('title','sales report');
	   $this->template->load('admin/template','admin/branchwiseSalesRpt',$data);

	}
	function total_sales_by_agency($compid="",$brid=""){
	   $data['title']="Agency wise Total Sales ";
	   $this->load->model('report_model');

       $data['query']=$this->report_model->salesrept_agency_wise($compid,$brid);
	   //print_r($data['query']);

	   $this->template->set('title','sales report');
	   $this->template->load('admin/template','admin/agencywiseSalesRpt',$data);

	}
    function allsalesrpt_by_branch($branch_id,$paid){

	   $this->load->model('report_model');
	   $data['query']=$this->report_model->allsalesrpt_by_branch($branch_id,$paid);
	   $data['billno']=$branch_id;
       $data['sid']=0;
       $data['all']=1;
	   $data['paid']=$paid;
	   $this->template->set('title','All Sales Report by Branch');
	   $this->template->load('admin/template','admin/allslrpt_branch',$data);
	}
    function salesrpt_by_branch($branch_id,$paid){
        $this->load->model('report_model');
	   $data['query']=$this->report_model->salesrpt_by_branch($branch_id,$paid);
	   $data['billno']=$branch_id;
       $data['sid']=0;
       $data['all']=0;
	   $data['paid']=$paid;
	   $this->template->set('title','Sales Report by Branch');
	   $this->template->load('admin/template','admin/allslrpt_branch',$data);
    }
    function allsalesrpt_by_branch_pay($paid,$branch_id,$sid){

	   $this->load->model('report_model');
	   $data['query']=$this->report_model->allsalesrpt_by_branch($branch_id,$paid);
	   $data['billno']=$branch_id;
       $data['sid']=$sid;
       $data['all']=1;
	   $data['paid']=$paid;
	   $this->template->set('title','All Sales Report by Branch');
	   $this->template->load('admin/template','admin/allslrpt_branch',$data);
	}
    function salesrpt_by_branch_pay($paid,$branch_id,$sid){
        $this->load->model('report_model');
	   $data['query']=$this->report_model->salesrpt_by_branch($branch_id,$paid);
	   $data['billno']=$branch_id;
       $data['sid']=$sid;
       $data['all']=0;
	   $data['paid']=$paid;
	   $this->template->set('title','Sales Report by Branch');
	   $this->template->load('admin/template','admin/allslrpt_branch',$data);
    }


	function allsalesrpt_by_agency($paid,$agncy_id){

	   $this->load->model('report_model');
	   $data['query']=$this->report_model->allsalesrpt_by_agency($agncy_id,$paid);
	   $data['billno']=$agncy_id;
       $data['sid']=0;
	   $data['paid']=$paid;
	   $this->template->set('title','sales report by agency');
	   $this->template->load('admin/template','admin/allslrpt_agency',$data);
	}
     function allsalesrpt_by_agency_pay($paid,$agncy_id,$sid){

	   $this->load->model('report_model');
	   $data['query']=$this->report_model->allsalesrpt_by_agency($agncy_id,$paid);
	   $data['billno']=$agncy_id;
       $data['sid']=$sid;
		$data['paid']=$paid;
	   $this->template->set('title','sales report by agency');
	   $this->template->load('admin/template','admin/allslrpt_agency',$data);
	}

}
?>