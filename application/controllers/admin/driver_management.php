<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Driver_management extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

     public function index()
     {
        $this->load->model('driver_model');
		$data['query'] = $this->driver_model->getall_driver();
        $this->template->set('title','List Drivers');
        $this->template->load('admin/template','admin/driverlist',$data);
     }
     public function add_driver(){
        $data['action']=site_url('admin/driver_management/parse_adddriver');
        $this->template->set('title', 'Driver Entry');
		$this->template->load('admin/template', 'admin/adddriverFrm',$data);
     }
     public function parse_adddriver(){
        $jdate = date('y-m-d', strtotime($this->input->post('jdate')));
        $ldate = date('y-m-d', strtotime($this->input->post('ldate')));

        $data = array('name'=>$this->input->post('drivername'),
                      'address'=>$this->input->post('address'),
                      'mobile'=>$this->input->post('mobileno'),
                      'age'=>$this->input->post('age'),
                      'joinDate'=>$jdate,
                      'leftDate'=>$ldate
                    );

      $this->db->insert('tbl_driver', $data);
      $this->index();
     }
     public function updateDriverlist($id){
        $data['action']=site_url('admin/driver_management/parseUpdateDriver');
		$this->load->model('driver_model');
        $data['title']="Update Driver Info";
     	$data['query'] =  $this->driver_model->fetch_to_update_driver_by_id($id);
		$this->template->load('admin/template', 'admin/updateDriverFrm',$data);
     }
     public function parseUpdateDriver(){
     $jdate = date('y-m-d', strtotime($this->input->post('jdate')));
     $ldate = date('y-m-d', strtotime($this->input->post('ldate')));

        $data = array('name'=>$this->input->post('drivername'),
                      'address'=>$this->input->post('address'),
                      'mobile'=>$this->input->post('mobileno'),
                      'age'=>$this->input->post('age'),
                      'joinDate'=>$jdate,
                      'leftDate'=>$ldate
                    );
      $this->db->where('id',$_POST['id']);
      $this->db->update('tbl_driver', $data);
      $this->index();
     }

     public function driver_delete($id){
      $this->load->model('driver_model');
      $this->driver_model->delete_driver_from_list($id);
      $this->index();
     }
     public function expenseslist(){
         $this->load->model('driver_model');
		 $data['query'] = $this->driver_model->getall_expenses_list();
         $this->template->set('title','List Expenses');
         $this->template->load('admin/template','admin/expenselist',$data);
     }
     public function expenseentryfrm(){
        $data['action']=site_url('admin/driver_management/parseaddExpenses');
		$this->load->model('driver_model');
     	$data['qry_driver'] =  $this->driver_model->get_all_driver_by_name();
        $data['qry_route'] =  $this->driver_model->get_all_route_by_name();
        $data['qry_busnumber'] =  $this->driver_model->get_all_bus_by_busno();
		$this->template->load('admin/template', 'admin/addexpenseFrm',$data);
     }
     public function parseaddExpenses(){
        $date = date('y-m-d', strtotime($this->input->post('date')));

        $data = array('date'=>$date,
                      'bdid'=>$this->input->post('bdid'),
                      'busid'=>$this->input->post('busno'),
                      'route'=>$this->input->post('rootid'),
                      'expBy'=>$this->input->post('expenseby'),
                      'remarks'=>$this->input->post('remarks'),
                      'amount'=>$this->input->post('amount')
                    );

      $this->db->insert('tbl_expense', $data);
      $this->expenseslist();
     }
     public function updateExplist($id){
        $data['action']=site_url('admin/driver_management/parseUpdateExpenses');
		$this->load->model('driver_model');
     	$data['qry_driver'] =  $this->driver_model->get_all_driver_by_name();
        $data['qry_route'] =  $this->driver_model->get_all_route_by_name();
        $data['qry_busnumber'] =  $this->driver_model->get_all_bus_by_busno();
        $data['title']="Update Expenses info";
        $data['explist']=$this->driver_model->fetch_to_update_exp_by_id($id);
		$this->template->load('admin/template', 'admin/updateexpenseFrm',$data);
     }
     public function parseUpdateExpenses(){
      $date = date('y-m-d', strtotime($this->input->post('date')));

        $data = array('date'=>$date,
                      'bdid'=>$this->input->post('bdid'),
                      'busid'=>$this->input->post('busno'),
                      'route'=>$this->input->post('rootid'),
                      'expBy'=>$this->input->post('expenseby'),
                      'remarks'=>$this->input->post('remarks'),
                      'amount'=>$this->input->post('amount')
                    );
      $this->db->where('id',$_POST['id']);
      $this->db->update('tbl_expense', $data);
      $this->expenseslist();
     }
     public function ExpList_delete($id){
         $this->load->model('driver_model');
         $this->driver_model->delete_expenses_from_list($id);
         $this->expenseslist();
     }

     public function expense_report(){
        $data['title']="Total Expenses ";
	    $this->load->model('driver_model');

        $single = "";
        $yearly = "";
        $monthly = "";
        $daily = "";
        $busno = "";
        $busroute = "";
        $date_from = "";
        $date_to = "";
        $driver = "";
	   if(isset($_POST["submit"])){
	     extract($_POST);
	   }


		if($single == "M"){
        if($date_from != "")
		 		$intv_date_from = date('Y-m-d', strtotime($date_from));
			else
				$intv_date_from = $date_from;

		 	if($date_to != "")
		 		$intv_date_to = date('Y-m-d', strtotime($date_to));
			else
				$intv_date_to =$date_to;
        //echo $intv_date_from;
        //echo $intv_date_to;
        $data['query']=$this->driver_model->expense_wise_report_multiple($yearly,$monthly,$intv_date_from,$intv_date_to);
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


		if($single == "S"){
		    /*if($date_from != "")
		 		$intv_date_from =date('Y-m-d', strtotime($date_from));
			else
				$intv_date_from = $date_from;

		 	if($date_to != "")
		 		$intv_date_to =date('Y-m-d', strtotime($date_to));
			else
				$intv_date_to =$date_to;*/

                //echo $driver;

	    $data['query']=$this->driver_model->Expensereptmultiple($driver,$busno,$busroute);
	    }

	   $data['query_busno']=$this->driver_model->get_all_bus_by_busno();
	   $data['query_route']=$this->driver_model->get_all_route_by_name();
       $data['query_driver']=$this->driver_model->get_all_driver_by_name();

       $data['busnum']=$busno;
	   $data['root']=$busroute;
       $data['driverid']= $driver;


	   $data['action']=site_url('admin/driver_management/expense_report');
	   $this->template->set('title','sales report');
	   $this->template->load('admin/template','admin/expenseReportFrm',$data);
     }

     /*function expenses_report_print($p1="",$p2="",$p3=""){
        $data['title']="Expenses Management ";
	    $this->load->model('driver_model');
       if($p3 == ""){
         $date_from = $p1;
         $date_to = $p2;
         $yearly="";
         $monthly = "";
       }else{
         $date_from = "";
         $date_to = "";
         $yearly=$p1;
         $monthly =$p2;
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
       $data['query']=$this->driver_model->expense_wise_report_multiple($yearly,$monthly,$intv_date_from,$intv_date_to);
	   //print_r($data['query']);die();

       $this->load->view('admin/print_expense_rpt',$data);

    }*/

}
?>
