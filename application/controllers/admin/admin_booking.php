<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_booking extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
		$this->load->library('session');
        $this->load->library('encrypt');
		//$this->load->view('admin/adminvali');


     }

   public function busSearch()
	{
		 $deptdate="";
		$data['dptdate']="";

        $this->load->helper('array');
        $this->load->model('booking_model');

        $search = array('cboFrom' => $this->input->post('cboFrom'),
							'cboTo' => $this->input->post('cboTo'),
							'dept_date' => date('Y-m-d', strtotime($this->input->post('dept_date'))));

       // print_r($search);
	   if(isset($_POST['submit'])){
	     $data['dptdate'] =date('Y-m-d', strtotime($_POST['dept_date']));
	     $data1['dptdate'] =date('Y-m-d', strtotime($_POST['dept_date']));
		}
		  //echo $lastbookingdate =('2012-08-18 6:30:03');
		  //echo $todaydate = date('Y-m-d h:i:s');
		 $todaydate = date('Y-m-d');



		if($data['dptdate'] >=$todaydate){
				$record['num_rows'] = $this->booking_model->count_all($search);
				//print_r($record['num_rows']);

				if($record['num_rows']>0){
				   $data['buseslist'] = $this->booking_model->get_all($search);
					//print_r($data['buseslist']);
				   $data['buslist'] = $this->booking_model->getRecord($search);
                   $data['query_city']=$this->booking_model->get_city();

					$this->template->set('title','Bus List Page');
				   $this->template->load('admin/template','admin/busList',$data);

				   }
				else{
				   //print_r($search);
				   $data1['buslist'] = $this->booking_model->getRecord($search);
				   $data1['query_city']=$this->booking_model->get_city();
				   //$this->template->set('title','Bus List Page1');
				   //$this->template->load('admin/template','admin/busListDtl',$data1);
				   $this->template->set('title','Home Pages');
				   $this->template->load('admin/template','admin/busSearch',$data1);
				}
		}else{
		           $datevalid['vdate']="Entered Date are not valid. Please Re-enter valid Date !!";
				   $datevalid['query_city']=$this->booking_model->get_city();
		           $this->template->set('title','Home Pages');
				   $this->template->load('admin/template','admin/validsearch',$datevalid);
		}


	   //	$this->load->view('welcome_message');
	}


    /*function busListDetail()
    {
        //echo "hello";
        $deptdate="";
        $this->load->helper('array');
        $this->load->model('booking_model');

        $search = array('cboFrom' => $this->input->post('cboFrom'),
							'cboTo' => $this->input->post('cboTo'),
							'dept_date' => date('Y-m-d', strtotime($this->input->post('dept_date'))));

       // print_r($search);
	     $data['dptdate'] =date('Y-m-d', strtotime($_POST['dept_date']));
	     $data1['dptdate'] =date('Y-m-d', strtotime($_POST['dept_date']));

        $record['num_rows'] = $this->booking_model->count_all($search);
        //print_r($record['num_rows']);
        if($record['num_rows']>0){
           $data['buseslist'] = $this->booking_model->get_all($search);
		   //print_r($data['buseslist']);

           $data['buslist'] = $this->booking_model->getRecord($search);


		    $this->template->set('title','Bus List Page');
           $this->template->load('admin/template','admin/busList',$data);

        }
		else{
           //print_r($search);
           $data1['buslist'] = $this->booking_model->getRecord($search);
           $this->template->set('title','Bus List Page1');
           $this->template->load('admin/template','admin/busListDtl',$data1);
        }

    }*/
    function busDetails($id)
    {
      $data['sltseat']=anchor('admin/admin_booking/selectSeats/'.$id,'Select Seat');
      $data['title']='Bus Details';
      $data['link_back']=anchor('admin/admin_booking/busListDetail/','Back to list of Bus',array('class'=>'back'));

      $this->load->model('booking_model');
      $data['query']=$this->booking_model->view_row($id);

      $this->template->set('title','Bus List Page');
      $this->template->load('admin/template','admin/busDetails',$data);
    }



    function selectSeats($id,$dptdate){
	
		//echo $dptdate;
	  //echo $_POST['dptdate']; die();
	  if(isset($_POST['submit'])){	  	
		$data['id']=$_POST['id'];
	    $data['dptdate']=$_POST["dpdate"]; 
		
	  }else{
	  	$data['dptdate']=$dptdate;
	    $data['id']=$id;
	  }
	  
	  
      $data['action']=site_url('admin/admin_booking/selectSeats/'.$id.'/'.$dptdate);
	  $data['action1']=site_url('admin/admin_booking/parsepassengerDetails');


      $this->load->model('booking_model');
      $data['query']=$this->booking_model->view_row($id);


	  foreach($data['query'] as $row)
	  {
	   $fare =$row->fare;
	  }
	  $data['query1']=$this->booking_model->select_row($dptdate,$row->rFrom,$row->rTo,$row->busNo);
	  
	  
	  /*if(isset($_POST['submit'])){
	  
	    $query=$this->booking_model->view_row($_POST['id']);
		foreach($query as $row){
		}
		$sets =$_POST['seatnum'];
	   $this->checkavailabelseat($row->root_id,$_POST["dpdate"],$row->departure_time,$row->ampm,$row->rFrom,$row->rTo,$row->busNo,$sets,$_POST['id']);
	  }*/
	  

	  //print_r($data['query1']); die();
      $this->template->set('title','Seat select Page');
      $this->template->load('admin/template','admin/selectSeats',$data);

    }

	function passengerDetails()
	{
	   $id= $_POST['id'];
	   $dptdate= $_POST["dpdate"];
      //echo $_POST['seatnum'];
	  $data['action']=site_url('admin/admin_booking/parsepassengerDetails');
	  $this->load->model('booking_model');
	  $data['id']=$id;
	  $data['dptdate']=$dptdate;
      $data['query']=$this->booking_model->view_row($id);

	  $this->template->set('title','Passenger Details Page');
      $this->template->load('admin/template','admin/passgdetails',$data);
	}


	function MakePNR(){
		$str= "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$pnr = "";
		for($i=0;$i<5;$i++){
		  $rltr = rand(0,35);
		  $pnr.=$str[$rltr];
		}
		return $pnr;
	}



	function CreatePNR(){
	   $this->load->model('booking_model');
	   $sales_category=$this->session->userdata('sales_category');
	   if($sales_category == 'br'){
	        $newPnr = $this->session->userdata('brinitpnr').'00'.$this->MakePNR();
	   }else{
	        $bird= $this->session->userdata('brid');
			$query=$this->booking_model->getInpnr($bird);

			foreach($query as $row){

			}
	   		$newPnr = $row->pnrinitial.$this->session->userdata('aginitpnr').$this->MakePNR();
	   }

	   $this->booking_model->CheckPNR($newPnr);
	   if($this->booking_model->CheckPNR($newPnr)==0)
			  $newPnr = $this->CreatePNR();
	   else
			  return $newPnr;
	}


	function parsepassengerDetails()
	{

		$sales_category=$this->session->userdata('sales_category');
		$user_id=$this->session->userdata('user_id');
		$comp_id=$this->session->userdata('compid');
		$br_id=$this->session->userdata('brid');
		$ag_id=$this->session->userdata('agid');

		$this->load->model('booking_model');

		$data['count_sales']=$this->booking_model->count_sales();
		//echo $data['count_sales']; die();

		if($data['count_sales'] == 0){
			$max_id=1;
		}else{
			$maxsales_id=$this->booking_model->sales_max_id();
			foreach($maxsales_id as $maxid){
				$max_id=$maxid->sales_id + 1;
		    }
	    }

	    $dptdate=$_POST["dptdate"];
	  	$fname = $_POST["fname"];
		$gender = $_POST["gender"];
		$age = $_POST["age"];
		$seat = $_POST["seat"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$mast_fname = $_POST["mast_fname"];
		$mobile = $_POST["mobile"];
        $mnationality=$_POST["mnationality"];
        $midno =$_POST["midno"];
        $mage =$_POST["mage"];
        $mgender =$_POST["mgender"];
        $nationality=$_POST["nationality"];
        $idno =$_POST["idno"];


        $query=$this->booking_model->view_row($_POST['id']);
		foreach($query as $row){

		}
		// $totAmolunt=$row->fare * $_POST['no_of_seat'];
		 $currDate=date('Y-m-d');

		 $newPNR = $this->CreatePNR();
		 //echo $newPNR; die();

		$record=array(
		                'sales_id'=>$max_id,
						'bus_id'=>$row->bus_id,
						'root_id'=>$row->root_id,
						'compid'=>$comp_id,
						'brid'=>$br_id,
						'agid'=>$ag_id,
						'dept_date'=>$dptdate,
						'dept_time'=>$row->departure_time,
						'ampm'=>$row->ampm,
						'sfrom'=>$row->rFrom,
						'sto'=>$row->rTo,
						'bus_no'=>$row->busNo,
						'seat_no'=>$this->input->post('seatn'),
						'no_of_seat'=>$this->input->post('no_of_seat'),
						'rate'=>$row->fare,
						'name_on_ticket'=>$this->input->post('mast_fname'),
						'passanger_list'=>$this->input->post('no_of_seat'),
						'contact_address'=>$this->input->post('address'),
						'phone'=>$this->input->post('phone'),
						'mobile'=>$this->input->post('mobile'),
						'email'=>$this->input->post('email'),
						'ticket_issue_date'=>$currDate,
						'sales_category_by'=>$sales_category,
						'issued_by'=>$user_id,
						'pnr'=>$newPNR,
                        'gender'=>$this->input->post('mgender'),
					    'age'=>$this->input->post('mage'),
                        'nationality'=>$this->input->post('mnationality'),
                        'idno'=>$this->input->post('midno')
		);
		$lf = count($fname);
		//print_r($record);

		//echo $this->session->userdata["CNEC"];
		    $pdetail = 0;
		    
		$seatn=$this->input->post('seatn');
		$this->checkavailabelseat($row->root_id,$dptdate,$row->departure_time,$row->ampm,$row->rFrom,$row->rTo,$row->busNo,$seatn,$row->bus_id);
		    
			if(($this->session->userdata["CNEC"])==0) {
				$this->db->insert('tbl_sales',$record);
				for($i=0;$i<$lf;$i++){
					$records = array(
							  'sales_id'=>$max_id,
							  'fullname'=>$fname[$i],
							  'address'=>$this->input->post('address'),
							  'email'=>$this->input->post('email'),
							  'phone'=>$this->input->post('phone'),
                              'nationality'=>$nationality[$i],
                              'idno'=>$idno[$i],
							  'gender'=>$gender[$i],
							  'age'=>$age[$i],
							  'seatno'=>$seat[$i],
                              'allseats'=>$this->input->post('seatn')
					);
					if($fname[$i] != ""){
						$this->db->insert('tbl_passangerlist',$records);
                        $pdetail = 1;
					}
				}

                if ($pdetail == 0)
                {
                    $mrecords = array(
							  'sales_id'=>$max_id,
							  'fullname'=>$this->input->post('mast_fname'),
							  'address'=>$this->input->post('address'),
							  'email'=>$this->input->post('email'),
							  'phone'=>$this->input->post('phone'),
							  'gender'=>$this->input->post('mgender'),
							  'age'=>$this->input->post('mage'),
							  'seatno'=>0,
                              'allseats'=>$this->input->post('seatn'),
                              'nationality'=>$this->input->post('mnationality'),
                              'idno'=>$this->input->post('midno')
                              );
                        $this->db->insert('tbl_passangerlist',$mrecords);
                }
               // echo $pdetail;
			$this->session->set_userdata('CNEC',1);

			$data['query']=$this->booking_model->get_all_salesdt($max_id);
			$data['query1']=$this->booking_model->get_all_passanger($max_id);
			$data['tc_query']=$this->booking_model->get_all_tc();


			$data['home']=anchor('admin/admin_booking/busSearch','Select Seat');
			$this->template->set('title','Print Ticket');
			$this->template->load('admin/template','admin/printTicket',$data);
			//$this->load->view('admin/printTicket',$data);
		}else{
		     //$data['count_sales']=$this->booking_model->count_sales();
			 //echo $data['count_sales'];
			 foreach($maxsales_id as $maxid){
			     if($data['count_sales'] == 1){
				 	$max_id=$maxid->sales_id ;
				 }else{
					$max_id=$max_id - 1;
				 }
			}
				//echo $max_id;
			  $data['query']=$this->booking_model->get_all_salesdt($max_id);
			  $data['query1']=$this->booking_model->get_all_passanger($max_id);
			  $data['tc_query']=$this->booking_model->get_all_tc();


			  $data['home']=anchor('admin/admin_booking/busSearch','Select Seat');
			  $this->template->set('title','Print Ticket');
			  //$this->load->view('admin/printTicket',$data);
			  $this->template->load('admin/template','admin/printTicket',$data);
	  }

	 }

  function showticket(){
	  $this->load->model('booking_model');
	  $tnumber="";
	  $tname="";
	  $tcancel="";
	  if(isset($_POST['submit'])){
	    extract($_POST);
		//echo $tnumber; die();
		if($tnumber != ''){

		    $query=$this->booking_model->get_all_salesdt($tnumber);
			foreach($query as $rw){
			    $tname=$rw->name_on_ticket;
			    $tcancel=$rw->Cancelled;
			}
		    if($tname != "" and $tcancel !='Y'){
				$data['query']=$this->booking_model->get_all_salesdt($tnumber);
				$data['query1']=$this->booking_model->get_all_passanger($tnumber);
				$data['tc_query']=$this->booking_model->get_all_tc();
		    }
	    }
	  }
	  $data['tnumber']=$tnumber;
	  $data['tname']=$tname;
	  $data['tcancel'] = $tcancel;
	  $data['action']=site_url('admin/admin_booking/showticket');
	  $this->template->set('title','Passenger Details Page');
      $this->template->load('admin/template','admin/showticket',$data);
 }

	 function printticket($tnumber){

	  $this->load->model('booking_model');
	  if(!$tnumber)

	  $tnumber=0;
	  //$get = $this->uri->uri_to_assoc();
	  //$tnumber = $get['tnumber'];

		//echo $tnumber; die();
		if($tnumber != 0){
			$data['query']=$this->booking_model->get_all_salesdt($tnumber);
			$data['query1']=$this->booking_model->get_all_passanger($tnumber);
			$data['tc_query']=$this->booking_model->get_all_tc();
	    	}

	  $data['tnumber']=$tnumber;
	  $data['action']=site_url('admin/admin_booking/printticket');
	  //$this->template->set('title','Passenger Details Page');
      	$this->load->view('admin/printTickets',$data);
	 }

	 function report_showticket($tnumber){
	// echo "hello sir"; die();
	  $this->load->model('booking_model');

	  $data['query']=$this->booking_model->get_all_salesdt($tnumber);
	  $data['query1']=$this->booking_model->get_all_passanger($tnumber);
	  $data['tc_query']=$this->booking_model->get_all_tc();


	  $data['tnumber']=$tnumber;
	  $data['action']=site_url('admin/admin_booking/printticket');
	  $this->template->set('title','Passenger Details Page');
      $this->template->load('admin/template','admin/report_showticket',$data);

	 }

	 function paidunpaid($branch="",$salesid=""){

	  $this->load->model('booking_model');
	  $data['query']=$this->booking_model->unpaid($salesid);

		  if($branch =='branch'){
			 redirect('admin/sales_report/totalSalesReport/branch','refresh');

		  }else{
			 redirect('admin/sales_report/totalSalesReport','refresh');
		 }
	 }

	 function unpaid_agency($unpid="",$salesid="",$cmpid=""){
     if(isset($_POST['submit'])){
        extract($_POST);
        $this->load->model('booking_model');
	    $data['query']=$this->booking_model->unpaid($salesid,$rno,$recdate);
      }
	  redirect('admin/sales_report/allsalesrpt_by_agency/N/'.$cmpid,'refresh');
	  //admin/sales_report/allsalesrpt_by_agency/N/37
	 }
	function unpaid_branch($unpid="",$salesid="",$cmpid=""){
     if(isset($_POST['submit'])){
        extract($_POST);
        $this->load->model('booking_model');
	    $data['query']=$this->booking_model->unpaid($salesid,$rno,$recdate);
      }
	  redirect('admin/sales_report/salesrpt_by_branch/'.$cmpid.'/N','refresh');
	  //admin/sales_report/allsalesrpt_by_agency/N/37
	 }
	 function fticketcancelled(){
	  $this->load->model('booking_model');
	  if(isset($_POST['submit'])){
	    extract($_POST);
		//echo $tnumber; die();
		if($tnumber != '' and $pnrnumber != ''){
		  $data['query']=$this->booking_model->ftcktcacl($tnumber,$pnrnumber);

	    }
		$data['tnumber']=$tnumber;
	    $data['pnrnumber']=$pnrnumber;
	  }


	  $data['action']=site_url('admin/admin_booking/fticketcancelled');
	  $this->template->set('title','Passenger Details Page');
      $this->template->load('admin/template','admin/fullticketcancel',$data);
	 }

	function fullticketcancel($salesid){
	  $this->load->model('booking_model');
	  $user_id=$this->session->userdata('user_id');
	  $data['query']=$this->booking_model->fullcancel($salesid);
	  $currDate=date('Y-m-d');
	  $logrecord=array(
						'user_id'=>$user_id,
						'sales_id'=>$salesid,
						'date'=>$currDate,
						'remarks'=>'Full Cancel',
						'logtype'=>'Cancel'
		);

		$this->db->insert('tbl_log',$logrecord);

	  $this->template->set('title','Passenger Details Page');
      $this->session->set_flashdata('message', '<div id="message"><font color="green">Ticket Cancel Successfully!!</font> </div>');
	  redirect('admin/admin_booking/fticketcancelled/','refresh');
	}

	function partialticketcancel($id,$dptdate,$salesid,$cancelled){
	 if(isset($_POST['submit'])){
		$data['id']=$_POST['id'];
	    $data['dptdate']=$_POST["dpdate"];
        $data['salesid']=$_POST["salesid"];
        $data['cancelled']=$_POST["cancelled"];

	  }else{
	  	$data['dptdate']=$dptdate;
	    $data['id']=$id;
        $data['salesid']=$salesid;
        $data['cancelled']=$cancelled;
	  }


      $data['action']=site_url('admin/admin_booking/partialticketcancel/'.$id.'/'.$dptdate.'/'.$salesid.'/'.$cancelled);
	  $data['action1']=site_url('admin/admin_booking/parsepDetails');


      $this->load->model('booking_model');
      $data['query']=$this->booking_model->view_row($id);

	  
	  foreach($data['query'] as $row)
	  {
	   $fare =$row->fare;	   
	  }		
	  $data['query1']=$this->booking_model->select_rows($dptdate,$row->rFrom,$row->rTo,$row->busNo,$salesid);
	  $data['query2']=$this->booking_model->selectedseat($salesid);
	  $data['query3']=$this->booking_model->selectmasterrecord($salesid);
	  $data['query4']=$this->booking_model->selectplist($salesid);
	  
	  /*if(isset($_POST['submit'])){
	  
	    $query=$this->booking_model->view_row($_POST['id']);
		foreach($query as $row){
		}
		$sets =$_POST['seatnum'];
		$salesid=$_POST["salesid"];
		//$cancelled=$_POST["cancelled"];
	   $this->partialreturncheck($row->root_id,$_POST["dpdate"],$row->departure_time,$row->ampm,$row->rFrom,$row->rTo,$row->busNo,$sets,$_POST['id'],$salesid,$cancelled);
	  }*/
	  
	 
	  $this->template->set('title','Passenger Details Page');
      $this->template->load('admin/template','admin/partialselectedseat',$data);
	}

	function parsepDetails(){
		
		
        $salesid=$_POST["salesid"];
		$pseat=$_POST["pseat"];
        

	 
	
	    $sales_category=$this->session->userdata('sales_category');
		$user_id=$this->session->userdata('user_id');
		$comp_id=$this->session->userdata('compid');
		$br_id=$this->session->userdata('brid');
		$ag_id=$this->session->userdata('agid');

		$this->load->model('booking_model');
		
		$data['count_sales']=$this->booking_model->count_sales();
		//echo $data['count_sales']; die();
		

	    $dptdate=$_POST["dptdate"];
	  	$fname = $_POST["fname"];
		$gender = $_POST["gender"];
		$age = $_POST["age"];
		$seat = $_POST["seat"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$mast_fname = $_POST["mast_fname"];
		$mobile = $_POST["mobile"];
        $mnationality=$_POST["mnationality"];
        $midno =$_POST["midno"];
        $mage =$_POST["mage"];
        $mgender =$_POST["mgender"];
        $nationality = $_POST["nationality"];
        $idno =$_POST["idno"];

        $query=$this->booking_model->view_row($_POST['id']);
		foreach($query as $row){

		}
		// $totAmolunt=$row->fare * $_POST['no_of_seat'];
		 $currDate=date('Y-m-d');

		 //$newPNR = $this->CreatePNR();
		 //echo $newPNR; die();

		$record=array(

						'bus_id'=>$row->bus_id,
						'root_id'=>$row->root_id,
						'compid'=>$comp_id,
						'brid'=>$br_id,
						'agid'=>$ag_id,
						'dept_date'=>$dptdate,
						'dept_time'=>$row->departure_time,
						'ampm'=>$row->ampm,
						'sfrom'=>$row->rFrom,
						'sto'=>$row->rTo,
						'bus_no'=>$row->busNo,
						'seat_no'=>$this->input->post('seatn'),
						'no_of_seat'=>$this->input->post('no_of_seat'),
						'rate'=>$row->fare,
						'name_on_ticket'=>$this->input->post('mast_fname'),
						'passanger_list'=>$this->input->post('no_of_seat'),
						'contact_address'=>$this->input->post('address'),
						'phone'=>$this->input->post('phone'),
						'mobile'=>$this->input->post('mobile'),
						'email'=>$this->input->post('email'),
						'ticket_issue_date'=>$currDate,
						'sales_category_by'=>$sales_category,
						'issued_by'=>$user_id,
                        'gender'=>$this->input->post('mgender'),
					    'age'=>$this->input->post('mage'),
                        'nationality'=>$this->input->post('mnationality'),
                        'idno'=>$this->input->post('midno')
		);

		$logrecord=array(
						'user_id'=>$user_id,
						'sales_id'=>$salesid,
						'date'=>$currDate,
						'remarks'=>'Partial Modified : Previous Seat :'.$pseat.'->Current Seat :'.$this->input->post('seatn'),
						'logtype'=>'Cancel'
		);
		$lf = count($fname);
		//print_r($record);
		$sets=$this->input->post('seatn');
		$this->partialreturncheck($row->root_id,$dptdate,$row->departure_time,$row->ampm,$row->rFrom,$row->rTo,$row->busNo,$sets,$row->bus_id,$salesid);

		//echo $this->session->userdata["CNEC"];

			if(($this->session->userdata["CNEC"])==0) {
			     $this->db->where('sales_id',$salesid);
				$this->db->update('tbl_sales',$record);

				$this->db->insert('tbl_log',$logrecord);

             $this->db->delete('tbl_passangerlist', array('sales_id' => $salesid));

				for($i=0;$i<$lf;$i++){
					$records = array(
							  'sales_id'=>$salesid,
							  'fullname'=>$fname[$i],
							  'address'=>$this->input->post('address'),
							  'email'=>$this->input->post('email'),
							  'phone'=>$this->input->post('phone'),
							  'gender'=>$gender[$i],
							  'age'=>$age[$i],
							  'seatno'=>$seat[$i],
                              'nationality'=>$nationality[$i],
                              'idno'=>$idno[$i]

					);
					if($fname[$i] != ""){

						$this->db->insert('tbl_passangerlist',$records);
					}
				}
			$this->session->set_userdata('CNEC',1);

			$data['query']=$this->booking_model->get_all_salesdt($salesid);
			$data['query1']=$this->booking_model->get_all_passanger($salesid);
			$data['tc_query']=$this->booking_model->get_all_tc();


			$data['home']=anchor('admin/admin_booking/busSearch','Select Seat');
			$this->template->set('title','Print Ticket');
			$this->template->load('admin/template','admin/printTicket',$data);
			//$this->load->view('admin/printTicket',$data);
		}else{
		     //$data['count_sales']=$this->booking_model->count_sales();
			 //echo $data['count_sales'];

				//echo $max_id;
			  $data['query']=$this->booking_model->get_all_salesdt($salesid);
			  $data['query1']=$this->booking_model->get_all_passanger($salesid);
			  $data['tc_query']=$this->booking_model->get_all_tc();


			  $data['home']=anchor('admin/admin_booking/busSearch','Select Seat');
			  $this->template->set('title','Print Ticket');
			  //$this->load->view('admin/printTicket',$data);
			  $this->template->load('admin/template','admin/printTicket',$data);
	  }
	}
	
	
	function checkavailabelseat($root_id,$dptdate,$departure_time,$ampm,$rFrom,$rTo,$busNo,$seatn,$busid){
		 $this->load->model('booking_model');
		 $query=$this->booking_model->checkseat($root_id,$dptdate,$departure_time,$ampm,$rFrom,$rTo,$busNo);
		 //echo $seatn;
		 //print_r($query);
		 
		 $seatnos="";
		  $t=0;
		  foreach($query as $data)
		  {
			if($t > 0)
				$seatnos.= ",";
			$seatnos.= $data->seat_no;
		
			$t++;
		  }
		  $seatnos;
		  $seatnumbe= explode(",",$seatnos); //database table selected seats.		 
		  
		  $seatnum= explode(",",$seatn);     //user selected seats.
		 
		 //echo $seatnumbe;
		 //echo $seatnum;
		//print_r($seatnum);
		//print_r($seatnumbe);
		 //die();
			 for($k=0;$k<sizeof($seatnum);$k++){
			   for($l=0; $l<sizeof($seatnumbe); $l++){
					 if($seatnum[$k] == $seatnumbe[$l]){
					  $this->session->set_flashdata('message', '<div id="message"><font color="red">OOPS!! The desired seat just been booked by another station. Please Try next seat.</font> </div>');
					  redirect('admin/admin_booking/selectSeats/'.$busid.'/'.$dptdate);
						
						break;
					 }
				} 
			 }
	
	}
	
	function partialreturncheck($root_id,$dptdate,$departure_time,$ampm,$rFrom,$rTo,$busNo,$seatn,$busid,$salesid){
		 $this->load->model('booking_model');
		
		 
		 //$query_seatno=$this->booking_model->selectedseat($salesid);
		 
		 //foreach($query_seatno as $rseat){
		// }
		// $pseat= explode(",",$rseat->seat_no);
		// print_r($pseat);
		 //echo $seatn;
		 //print_r($query);
		 //echo $salesid;
		 $query=$this->booking_model->partialcheckseat($root_id,$dptdate,$departure_time,$ampm,$rFrom,$rTo,$busNo,$salesid); 
		 $seatnos="";
		  $t=0;
		  foreach($query as $data)
		  {
			if($t > 0)
				$seatnos.= ",";
			$seatnos.= $data->seat_no;
		
			$t++;
		  }
		  $seatnos;
		  $seatnumbe= explode(",",$seatnos); //database table selected seats.		 
		  
		  $seatnum= explode(",",$seatn);     //user selected seats.
		 
		 //echo $seatnumbe;
		 //echo $seatnum;
		 //print_r($seatnum);
		 //print_r($seatnumbe);
		 //echo $salesid;
		 //die();
		 
			 
		       for($k=0;$k<sizeof($seatnum);$k++){
			      for($l=0; $l<sizeof($seatnumbe); $l++){
					 if($seatnum[$k] == $seatnumbe[$l]){
					  $this->session->set_flashdata('message', '<div id="message"><font color="red">OOPS!! The desired seat just been booked by another station. Please Try next seat.</font> </div>');
					      //die();
					           redirect('/admin/admin_booking/partialticketcancel/'.$busid.'/'.$dptdate.'/'.$salesid.'/C');
						
						break;
					 }
				} 
			 }
	         
		}	 
	 
}

?>
