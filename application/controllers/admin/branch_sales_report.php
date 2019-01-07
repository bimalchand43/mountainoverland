<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch_sales_report extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

	function totalSalesReport(){
	   $data['title']="Total Sales ";
	   $this->load->model('report_model');
	   $data['query']=$this->report_model->salesrept();

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
	      // echo "periodic"; die();
	   		$data['query']=$this->report_model->periodic_branch_sales_Rept();
			 //print_r($data['query']);
	   }

	    if($p1=="yearly"){
	    	$data['query_yearly']=$this->report_model->branch_salesyearlyrept($p2);
	   		$data['year']=$p2;
	   }

	   if($p1 == "monthly"){

			 $month=$this->convertMonthToNum($p3);
			 $data['query_monthly']=$this->report_model->branch_salesMonthlyrept($p2,$month);
			 //print_r($data['query_monthly']);
	   }

	   if($p1 == "daily"){

			 //$month=$this->convertMonthToNum($p3);
			 $data['query_daily']=$this->report_model->branch_salesDailyRept($p2);
			// print_r($data['query_daily']);
	   }

       if($p1 == "datewise"){
           $dfrom = strtotime($_POST["dfrom"]);
            $dto = strtotime($_POST["dto"]);
            $stdate = date('Y-m-d',$dfrom);
            $enddate = date('Y-m-d',$dto);
            $data["stdate"] = $stdate;
            $data["enddate"] = $enddate;
            $data['query_monthly'] = $this->report_model->branch_salesDatewiseRept($stdate,$enddate);
       }

	   $this->template->set('title','Perodic sales report');
	   $this->template->load('admin/template','admin/prd_branch_sales_rpt.php',$data);

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
                case "February":  $mon=2;
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
	
	
}	
