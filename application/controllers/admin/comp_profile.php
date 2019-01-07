<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comp_profile extends CI_Controller {
    private $limit = 10;
    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library(array('table','form_validation'));
		$this->load->model('admin_model','',TRUE);
     }

    	public function index()
	{
        $this->template->set('title', 'Welcome Admin');
        $this->template->load('admin/template', 'admin/home');
         //echo "Admin Page Here";
	   //	$this->load->view('welcome_message');
	}



   public function create_company()
   {

      $activated="";
      $suspended="";
      $locked="";
      $disabled="";

      $this->load->library(array('table','form_validation'));
      $data['id']="";
      $data['title']='Create Branch and Agency';
      $data['action']= site_url('admin/comp_profile/addCompany');
      $this->_set_fields();
		// set validation properties
	  $this->_set_rules();

      $this->template->set('title', 'Create Branch and Agency');
      $this->template->load('admin/template', 'admin/create_company',$data);
   }

   function addCompany()
	{
	    if(isset($_POST['id'])){
		  $bid=$_POST['id'];
		}
        $this->load->library(array('table','form_validation'));
        $this->load->model('admin_model');
		$max_query = $this->admin_model->get_maxid();
		foreach($max_query as $row){
		  $maximumid= $row->brid +1;
		  $agnid=0;
		  $cat='b';
		}

    // echo $_POST['brname']; die();
	
	 if($_POST['brname'] == 'branch'){
	 
	  $bpnrinit=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	  
	  $query_maxpnr=$this->admin_model->get_mas_intpnr($row->brid); 
	  
		  foreach($query_maxpnr as $pnr_row){
		   $pnrin= $pnr_row->pnrinitial; 
		   $arrpnr = explode(",",$pnrin);
		  //print_r($arrpnr); 
		   }
		   //print_r($bpnrinit);
		   
		   $k=0;
		   for($s=0; $s<sizeof($bpnrinit); $s++){										
				if($arrpnr[$k] == $bpnrinit[$s]){
				   $pnrint=$bpnrinit[$s+1]; 
				   break;
				}				
			}		   
		 
	 }else{
	 
		 if(isset($_POST['id'])){
		    $bid=$_POST['id']; 
		    $dataBranch = $this->admin_model->get_barnchData($bid);
			foreach($dataBranch as $rows){
			 $maximumid=$rows->brid;
			 $agnid=$rows->mxagid;			 
			 $cat='a';			 
			}
			
			 $ag=$agnid - 1;
			 $dataAg = $this->admin_model->get_agData($bid,$ag);
			 // print_r($dataAg);
			 foreach($dataAg as $rowss){		  
			 	 $pnrint = substr($rowss->pnrinitial,0,1).''.(substr($rowss->pnrinitial,1,2) + 1);
			 }			
		  }
	   }	  
		//print($data['max_query']);

			$companyinfo = array(
			                'cmpid'=>1,
							'brid'=>$maximumid,
							'agid'=>$agnid,
			                'comp_name' => $this->input->post('cname'),
							'address' => $this->input->post('caddress'),
                            'city' => $this->input->post('city'),
                            'country' => $this->input->post('country'),
                            'phoneNo' => $this->input->post('cphone'),
                            'faxNo' => $this->input->post('cfax'),
                            'email' => $this->input->post('email'),
                            'contact_person' => $this->input->post('cperson'),
                            'desination' => $this->input->post('cpdesination'),
                            'cnt_phone' => $this->input->post('cpphone'),
                            'cnt_mobile' => $this->input->post('cpmobile'),
                            'password' =>"",
                            'pin_no' =>"",
                            'login_hit' => "",
                            'last_password' =>"",
                            'login_failure' =>"",
                            'status' => 'Y',
                            'Category' =>$cat,
							'pnrinitial' =>$pnrint
							);
			$this->admin_model->save($companyinfo);

			// set user message
            $data['title'] = 'List Of Company';
			$data['message'] = '<div class="success"></div>';
            //$this->template->load('admin/template', 'admin/companyList',$data);
            redirect('admin/comp_profile/view_company/'.'branchlist'.'/'.'0'.'/'.'0','refresh');
	}

   function view_company($p1,$p2=0,$p3=0)
   {
   		$this->load->model('admin_model');

		 //$cid= $this->session->userdata('compid');
         if($p1 == 'showusers'){
		 	$data['query_admin']=$this->admin_model->get_adminusers($p2);
		 }
		 
		 if($p1 == 'branchlist'){
		   $data['query'] = $this->admin_model->get_paged_list();
		 }
		 if($p1 == 'agencylist'){
		   $data['query1'] = $this->admin_model->get_agency_list($p2);
		 }
		
		 if($p1=='branchlist'  and $p2=='showbranchusers'){
			 $data['query_branch_user']=$this->admin_model->get_branchusers($p3);
         }
		 
		 if($p1=="branchlist" and $p2 == "agencylist"){
		 	$data['query1'] = $this->admin_model->get_agency_list($p3);
		 }
		 
		 if($p1=="newagncyuser" and $p2 == "agencylistuser"){
		 	$data['query_agencyusers'] = $this->admin_model->get_branchusers($p3);
		 }
		 
		 if($p1 == 'adminUserPass'){
		    $data['user']=	$p1;	    
			$data['action_chngPass']= site_url('admin/comp_profile/changePassword');			
		 } 
		 if($p1 == 'branchUserPass'){
		    $data['user']=	$p1;	    
			$data['action_chngPass']= site_url('admin/comp_profile/changePassword');			
		 } 
		 if($p1 == 'agencyUserPass'){
		    $data['user']=	$p1;	    
			$data['action_chngPass']= site_url('admin/comp_profile/changePassword');			
		 } 
		 
		 if($p1 == 'showusers' and $p2 == 'viewAdminProfile'){
		    $data['user']=	$p1;			
			$data['query_adminProfile']=$this->admin_model->get_adminuserprofile($p3);						
		 } 
		 
		 if($p1 == 'branchlist' and $p2 == 'viewBranchProfile'){
		    $data['user']=	$p1;			
			$data['query_branchProfile']=$this->admin_model->get_adminuserprofile($p3);						
		 } 
		 
		 if($p1 == 'showusers' and $p2 == 'editAdminProfile'){
		    $data['user']=	$p1;
			$data['action_editUsers']= site_url('admin/comp_profile/editUsers');			
			$data['query_editAdmin']=$this->admin_model->get_adminuserprofile($p3);						
		 }
		 
		 if($p1 == 'branchlist' and $p2 == 'editBranchProfile'){
		    $data['user']=	$p1;
			$data['action_editUsers']= site_url('admin/comp_profile/editUsers');			
			$data['query_editAdmin']=$this->admin_model->get_adminuserprofile($p3);						
		 }
		 
		 if($p1 == 'branchlist' and $p2 == 'bprofile'){
		    $this->load->model("main_model");
	        $data['query_bprofle']=$this->main_model->getCompanyInfo($p3);				
		 }
		 if($p1 == 'branchlist' and $p2 == 'editbprofile'){
		    
	        $data['query_bprofle']=$this->main_model->getCompanyInfo($p3);
		    $data['action_editbprofile']= site_url('admin/comp_profile/editbprofile');			
				
		 }  
		 
		 
		 
         $data['comname']=$p1;  
		 $data['agname']=$p2;   
		 $data['bid']=$p3;      
          
		//$data['coame']='branchlist';
		

        $data['title']='Branch Information List';
		$data['action']= site_url('admin/comp_profile/addCompany');
		$data['action_adminuser']= site_url('admin/comp_profile/parseAdminuser');
		//$data['action_branchuser']= site_url('admin/comp_profile/parseBranchuser');

     	$this->template->set('title', 'Company List');
     	$this->template->load('admin/template', 'admin/companyList',$data);
   }
   
   function editbprofile(){
	  extract($_POST);
	 $compinfo=array('comp_name'=>$c_name,
	 				 'address'=>$c_address,
					 'city'=>$c_city,
					 'country'=>$c_country,
					 'phoneNo'=>$c_phone,
					 'faxNo'=>$c_fax,
					 'email'=>$c_email,
					 'contact_person'=>$c_cnt_person,
					 'desination'=>$c_desination,
					 'cnt_phone'=>$c_cnt_phone,
					 'cnt_mobile'=>$c_cnt_mobile);
	 
	  $this->db->where('id',$id);	  
	  $this->db->update('tbl_companyinfo',$compinfo);
	  $this->session->set_flashdata('message', '<div id="message"><center><font color="green">Profile Updated Successfully!!</font></center> </div>');
	  redirect('admin/comp_profile/view_company/branchlist');
   }
   
   function view_agency($p1,$p2=0,$p3=0){
        $this->load->model('admin_model');
		$data['comname']=$p1;
		$data['comname2']=$p2;
		$data['comnid3']=$p3;
		
		$query=$this->admin_model->getMaxAgid();		
		//print_r($query);
		foreach($query as $row){		
		}
		
		if($p1 == 'agencylist'){
		   $data['query'] = $this->admin_model->agency_list();
		 }
		
		if($p1 =='agencylist' and $p2=='agencylistuser'){
		 $data['query_agencyusers'] = $this->admin_model->get_branchusers($p3);
		}
		
		if($p1 =='agencylist' and $p2=='viewAgencyProfile'){
		 $data['query_agencyusersprofile'] = $this->admin_model->get_adminuserprofile($p3);
		}
		
		if($p1 == 'agencyPass'){
		    $data['user']=	$p1;	    
			$data['action_chngPass']= site_url('admin/comp_profile/changePassword');			
		}
		
		if($p1 == 'editAgencyProfile' and $p2 == 'agencylist'){
		    $data['user']=	'agencylistuser';
			$data['action_editUsers']= site_url('admin/comp_profile/editUsers');			
			$data['query_editAdmin']=$this->admin_model->get_adminuserprofile($p3);						
		 } 
		 
		 if($p1 == 'agencylist' and $p2 == 'aprofile'){
		    $this->load->model("main_model");
	        $data['query_aprofle']=$this->main_model->getCompanyInfo($p3);				
		 }
		 if($p1 == 'agencylist' and $p2 == 'editaprofile'){
		    
	        $data['query_aprofle']=$this->main_model->getCompanyInfo($p3);
		    $data['action_editaprofile']= site_url('admin/comp_profile/editaprofile');			
				
		 }  
		 
		    
		 
		$data['action']= site_url('admin/comp_profile/addAgency');
		$data['action_aguser']= site_url('admin/comp_profile/parseAgencyuser');
		
        $this->template->set('title', 'Company List');
     	$this->template->load('admin/template', 'admin/agencyList',$data);
   }
   
   function editaprofile(){
	  extract($_POST);
	 $compinfo=array('comp_name'=>$c_name,
	 				 'address'=>$c_address,
					 'city'=>$c_city,
					 'country'=>$c_country,
					 'phoneNo'=>$c_phone,
					 'faxNo'=>$c_fax,
					 'email'=>$c_email,
					 'contact_person'=>$c_cnt_person,
					 'desination'=>$c_desination,
					 'cnt_phone'=>$c_cnt_phone,
					 'cnt_mobile'=>$c_cnt_mobile);
	 
	  $this->db->where('id',$id);	  
	  $this->db->update('tbl_companyinfo',$compinfo);
	  $this->session->set_flashdata('message', '<div id="message"><center><font color="green">Profile Updated Successfully!!</font></center> </div>');
	  redirect('admin/comp_profile/view_agency/agencylist');
   }
   
   function addAgency(){
   $this->load->model('admin_model');
	$brchid = $this->session->userdata('brid');
	
	
	$query=$this->admin_model->getMaxAgid();		
		//print_r($query);
		foreach($query as $row){
		
		
		if($row->maxagid == ""){
  $agmxid=0;
$agmaxid = $row->maxagid +1;
}else{
$agmxid=$row->maxagid;
$agmaxid = $row->maxagid +1;


}
		
		
		 //$agmaxid = $row->maxagid + 1;
		 
		     $dataAg = $this->admin_model->get_agData($brchid,$agmxid);			 
			 foreach($dataAg as $rowss){		  
			 	 $pnrint = substr($rowss->pnrinitial,0,1).''.(substr($rowss->pnrinitial,1,2) + 1);
			 }
		}
			$agencyinfo = array(
			                'cmpid'=>1,
							'brid'=>$brchid,
							'agid'=>$agmaxid,
			                'comp_name' => $this->input->post('cname'),
							'address' => $this->input->post('caddress'),
                            'city' => $this->input->post('city'),
                            'country' => $this->input->post('country'),
                            'phoneNo' => $this->input->post('cphone'),
                            'faxNo' => $this->input->post('cfax'),
                            'email' => $this->input->post('email'),
                            'contact_person' => $this->input->post('cperson'),
                            'desination' => $this->input->post('cpdesination'),
                            'cnt_phone' => $this->input->post('cpphone'),
                            'cnt_mobile' => $this->input->post('cpmobile'),
                            'password' =>"",
                            'pin_no' =>"",
                            'login_hit' => "",
                            'last_password' =>"",
                            'login_failure' =>"",
                            'status' => 'Y',
                            'Category' =>'a',
							'pnrinitial' =>$pnrint
							);
			$this->admin_model->save($agencyinfo);
			
                     
            redirect('admin/comp_profile/view_agency/agencylist/','refresh');
		
   }

   function parseAdminuser(){
        $this->load->model('admin_model');
        extract($_POST);
        
		//echo $address; die();
		$action="";
        if(isset($_POST['action'])){
		  $action=$_POST['action'];
		}	
             
			if($action == 'branch'){
			  $cid=$_POST['id'];
			  $catg='br';
			}elseif($action == 'agency'){
			  $cid=$_POST['id'];
			  $catg='ag';		
			}else{
			  	
			  $cid= $this->session->userdata('compid');
			  $catg='ad';
			}
	    
		//echo $catg; die();
		
		$adminuser = array(
			                'compid'=>$cid,
							'fullname'=>$fname,
							'Address'=>$address,
			                'email'=>$email,
							'phone'=>$phone,
							'username'=>$uname,
							'password'=>($pass),
							'usertype'=>$usertype,
							'Category' =>$catg,
                            'status' => 'Y'
							);
		$this->admin_model->save_adminuser($adminuser);

		//$data['comname']='showusers';
		if($action == 'agency'){
		   redirect('admin/comp_profile/view_company/branchlist');
		}else if($action == 'branch'){
  		   redirect('admin/comp_profile/view_company/showusers');
		}else{
		   redirect('admin/comp_profile/view_company/showusers');
		}
   }
   
   function parseAgencyuser(){
       // echo "Hello";
        $this->load->model('admin_model');
        extract($_POST);
		       
		if($_POST['action'] == 'agency'){
		  $cid=$_POST['id'];
		  $catg='ag';		
		}	
		$adminuser = array(
			                'compid'=>$cid,
							'fullname'=>$fname,
							'Address'=>$address,
			                'email'=>$email,
							'phone'=>$phone,
							'username'=>$uname,
							'password'=>($pass),
							'usertype'=>$usertype,
							'Category' =>$catg,
                            'status' => 'Y'
							);
		$this->admin_model->save_adminuser($adminuser);

		if($_POST['action'] == 'agency'){
		   redirect('admin/comp_profile/view_agency/agencylist');
		}
		
   }
   
   function statusFun($p1=0,$p2=0,$p3=0){
     $this->load->model('admin_model');
	 if($p3 =='Y'){
       $sts='N';
     }else{
       $sts='Y';
    }
	$this->admin_model->update_branch_status($p1,$sts,$p2);
	
	if($p1 == 'branchlist'){    	
    	redirect('admin/comp_profile/view_company/branchlist/','refresh');
    }
	if($p1 == 'agencylist'){    	
    	redirect('admin/comp_profile/view_company/branchlist/','refresh');
    }  
	
	if($p1 == 'showusers'){     	
    	redirect('admin/comp_profile/view_company/showusers/','refresh');
    } 
	
	if($p1 == 'branchusers'){    	
    	redirect('admin/comp_profile/view_company/branchlist/','refresh');
    } 
	
	if($p1 == 'agcListStatus'){
    	redirect('admin/comp_profile/view_company/branchlist/','refresh');
    }
	
	if($p1 == 'agencyliststst'){
    	redirect('admin/comp_profile/view_agency/agencylist/','refresh');
    } 
	
	if($p1 == 'agencyuserstsuser'){
    	redirect('admin/comp_profile/view_agency/agencylist/','refresh');
    }
	if($p1 == 'branchuserlist'){
       redirect('admin/comp_profile/view_branch_user/branchuserlist/','refresh');
	}
	if($p1 == 'agencyuserlist'){
       redirect('admin/comp_profile/view_agency_user/branchuserlist/','refresh');
	}
	 
   }
   
  function changePassword(){
     //$this->load->library('session');
	 $this->load->library('encrypt');
     $this->load->model('admin_model');
   	 extract($_POST);	
	 //echo $user; die();
	$query=$this->admin_model->get_admin_user($id); 
	//print_r($query);
	foreach($query as $row){	
	}
	
	if($row->password == $oldpass and $rpass == $pass){
	  $query_update=$this->admin_model->change_pass($pass,$id);
	   $this->session->set_flashdata('message', '<div id="message"><font color="green">Password Change successfully!!</font> </div>');
		  
		  if($user == 'adminUserPass'){
			  redirect('admin/comp_profile/view_company/showusers/');
		  }	
		  
		  if($user == 'branchUserPass'){
			 redirect('admin/comp_profile/view_company/branchlist/');
		  } 
		  
		  if($user == 'agencyUserPass'){
			 redirect('admin/comp_profile/view_company/branchlist/');
		  }
		  
		  if($user == 'agencyPass'){
			 redirect('admin/comp_profile/view_agency/agencylist/');
		  }  
		   
	}
	else{
	 
	   if($user == 'agencyPass'){
	      $this->session->set_flashdata('message', '<div id="message"><font color="red">Password Change unsuccessfully!!</font> </div>');
	      redirect('admin/comp_profile/view_agency/agencyPass/'.$id);
	   }else{
	      $this->session->set_flashdata('message', '<div id="message"><font color="red">Password Change unsuccessfully!!</font> </div>');
	      redirect('admin/comp_profile/view_company/adminUserPass/'.$id);
	   }	
	}
  }
  
  function editUsers(){
    //$this->load->library('session');
	 $this->load->library('encrypt');
     $this->load->model('admin_model');
   	 extract($_POST);
	 
	 print_r($_POST);
	    
	$adminuser = array(			                
							'fullname'=>$fname,
							'Address'=>$address,
			                'email'=>$email,
							'phone'=>$phone,
							'username'=>$uname,
							'password'=>($pass),
							'usertype'=>$usertype                           
							);
	$this->admin_model->edit_adminuser($adminuser,$id);
    if($user == 'adminuser'){
	 redirect('admin/comp_profile/view_company/showusers/');
	} 
	
	if($user == 'branchuser'){
	 redirect('admin/comp_profile/view_company/branchlist/');
	} 
	
	if($user == 'agencylistuser'){
	 redirect('admin/comp_profile/view_agency/agencylist/');
	} 
  }
   
   function _set_fields()
	{
		$this->form_data->id = '';
		$this->form_data->name = '';
        $this->form_data->cname = '';
        $this->form_data->caddress = '';
        $this->form_data->city = '';
        $this->form_data->country = '';
        $this->form_data->cphone = '';
        $this->form_data->cfax = '';
        $this->form_data->email = '';
        $this->form_data->cperson = '';
        $this->form_data->cpdesination = '';
        $this->form_data->cpphone = '';
        $this->form_data->cpmobile = '';
        $this->form_data->pass = '';
        $this->form_data->rpass = '';
        $this->form_data->pin = '';
        $this->form_data->rpin = '';

	}

    function view_companyInfo($id)
    {
       $this->load->model('admin_model');
        $data['title'] = 'Company Information Details';

       // echo $id;
		// get person details
		$data['compdata'] = $this->admin_model->view_detail($id);

		// load view
       // print_r($data);
        $this->template->set('title', 'Company Details');
        $this->template->load('admin/template', 'admin/view_companyinfo',$data);
	}
	
	function newagency($branchid=0,$id=0){
	    //echo $branchid;
		$this->load->model("main_model");
	    $data['query']=$this->main_model->getall_for_agency($branchid);
        foreach($data['query'] as $rows){}
		
		$query1 = $this->main_model->get_selected_country_name($rows->country);
	     //print_r($data['query']); die();
	    foreach($query1 as $row){
         $data["country_name"]=$row->countries_name;
        }
		$data['id']=$id;
	    $data['brid']=$branchid;
	    $data["countries"] = $this->main_model->get_all_country();
		$data['action']= site_url('admin/comp_profile/parsenewagency');
	    $this->template->set('title', 'Create New Agency');
        $this->template->load('admin/template', 'admin/createnewagency',$data);
	}
	
	function parsenewagency(){
	  
		extract($_POST);
		//echo $_POST['brid'];
		//echo $brid; 
	$br= $this->session->userdata('brid'); 
    $ag= $this->session->userdata('agid'); 
	
		
	$this->load->model('main_model');
	$query_brid=$this->main_model->get_brid($brid);
	
	foreach($query_brid as $rbrid){
	  $brchid=$rbrid->brid; 
	}	
	
	$query=$this->main_model->getMaxAgid($brchid);		
		//print_r($query);
		
		foreach($query as $row){
		
		if($row->maxagid == '') $row->maxagid=0; 
		 $agmaxid = $row->maxagid + 1;
		 
		     $dataAg = $this->main_model->get_agData($brchid,$row->maxagid);			 
			 foreach($dataAg as $rowss){		  
			 	 $pnrint = substr($rowss->pnrinitial,0,1).''.(substr($rowss->pnrinitial,1,2) + 1);
			 }
		}
			$agencyinfo = array(
			                'cmpid'=>1,
							'brid'=>$brchid,
							'agid'=>$agmaxid,
			                'comp_name' => $this->input->post('cname'),
							'address' => $this->input->post('caddress'),
                            'city' => $this->input->post('city'),
                            'country' => $this->input->post('country'),
                            'phoneNo' => $this->input->post('cphone'),
                            'faxNo' => $this->input->post('cfax'),
                            'email' => $this->input->post('email'),
                            'contact_person' => $this->input->post('cperson'),
                            'desination' => $this->input->post('cpdesination'),
                            'cnt_phone' => $this->input->post('cpphone'),
                            'cnt_mobile' => $this->input->post('cpmobile'),
                            'password' =>"",
                            'pin_no' =>"",
                            'login_hit' => "",
                            'last_password' =>"",
                            'login_failure' =>"",
                            'status' => 'Y',
                            'Category' =>'a',
							'pnrinitial' =>$pnrint
							);
			$this->db->insert('tbl_companyinfo',$agencyinfo);
			$create=array('created'=>'Y');
			$this->db->where('id',$id);
			$this->db->update('tbl_for_agency',$create);				
				
            $this->session->set_flashdata('message', '<div id="message"><font color="green">Required Agency Created Successfully !!</font> </div>');
            if($br == 0 and $ag == 0){
			   redirect('/admin/home/getdata_for_agency/','refresh');
			}else{
			   redirect('/admin/home/getdata_for_agency/'.$brid,'refresh');
		    }
	}

    function update_companyInfo($id)
	{


        $this->load->library(array('table','form_validation'));
        $this->load->model('admin_model');
        //$this->_set_rules();
        //$this->_set_fields();
        $compRecord = $this->admin_model->view_detail($id);
        foreach($compRecord as $row)
        {
           //echo $row->comp_name; die();
        }
        $data['id']=$id;
		$this->form_data->cname = $row->comp_name;
        $this->form_data->caddress = $row->address ;
        $this->form_data->city = $row->city;
        $this->form_data->cphone = $row->phoneNo;
        $this->form_data->cfax = $row->faxNo;
        $this->form_data->email = $row->email;
        $this->form_data->cperson = $row->contact_person;
        $this->form_data->cpdesination = $row->desination;
        $this->form_data->cpphone = $row->cnt_phone;
        $this->form_data->cpmobile = $row->cnt_mobile;
        $this->form_data->pass = $row->password;
        $this->form_data->rpass = $row->password;
        $this->form_data->pin =$row->pin_no;
        $this->form_data->rpin = $row->pin_no;
        //echo $row->status;
         $this->form_data->country = $row->country;
        if($row->country =="Nepal"){
            $data['nep']="selected";
        }else{
             $data['nep']="";
        }
        if($row->country =="India"){
            $data['ind']="selected";
        }else{
             $data['ind']="";
        }
        if($row->country =="Others"){
            $data['othr']="selected";
        }else{
             $data['othr']="";
        }

        if($row->status=="ACT"){
          $data['activated']="selected";
        }else
        {
            $data['activated']="";
        }
        if($row->status=="SPD"){

             $data['suspended']="selected";
        }
        else
        {
            $data['suspended']="";
        }
        if($row->status=="LCK"){

             $data['locked']="selected";
        }
        else
        {
            $data['locked']="";
        }
        if($row->status=="DSB"){

             $data['disabled']="selected";
        }else
        {
             $data['disabled']="";
        }

        if($row->Category == "branch"){
          $data['branch']="selected";
        }else{
          $data['branch']="";
        }
        if($row->Category == "agency"){
          $data['agency']="selected";
        }else{
          $data['agency']="";
        }


        // set common properties
		$data['title'] = 'Update Company Information';
		$data['message'] = '';
		$data['action'] = site_url('admin/comp_profile/updateCompanyInfo');

        $this->template->set('title', 'Update Company Details');
        $this->template->load('admin/template', 'admin/update_company',$data);
	}

    function updateCompanyInfo($id)
    {
        $this->load->model('admin_model');
        $this->load->library(array('table','form_validation'));

		$this->_set_fields();

		$this->_set_rules();
        //echo $id;

		// run validation
	    /*if ($this->form_validation->run() == FALSE)
		{

            $compRecord = $this->admin_model->view_detail($id);
            foreach($compRecord as $row)
            {
               //echo $row->comp_name; die();
            }
			$data['message'] = '';
            $this->form_data->cname = $row->comp_name;
            $this->form_data->caddress = $row->address ;
            $this->form_data->city = $row->city;
            $this->form_data->country = $row->country;
            $this->form_data->cphone = $row->phoneNo;
            $this->form_data->cfax = $row->faxNo;
            $this->form_data->email = $row->email;
            $this->form_data->cperson = $row->contact_person;
            $this->form_data->cpdesination = $row->desination;
            $this->form_data->cpphone = $row->cnt_phone;
            $this->form_data->cpmobile = $row->cnt_mobile;

            $data['title'] = 'Update Company Information';
    		$data['message'] = '';
    		$data['action'] = site_url('administrator/admin/updateCompanyInfo');

            $this->template->set('title', 'Update Company Details');
            $this->template->load('admin/template', 'admin/update_company',$data);
		}
		else
		{   */

           $companyinfo = array('comp_name' => $this->input->post('cname'),
							'address' => $this->input->post('caddress'),
                            'city' => $this->input->post('city'),
                            'country' => $this->input->post('country'),
                            'phoneNo' => $this->input->post('cphone'),
                            'faxNo' => $this->input->post('cfax'),
                            'email' => $this->input->post('email'),
                            'contact_person' => $this->input->post('cperson'),
                            'desination' => $this->input->post('cpdesination'),
                            'cnt_phone' => $this->input->post('cpphone'),
                            'cnt_mobile' => $this->input->post('cpmobile'),
                            'password' => $this->input->post('pass'),
                            'pin_no' => $this->input->post('pin'),
                            'status' => $this->input->post('status'),
                            'Category' => $this->input->post('category'),
							);
			$this->admin_model->update_companyinfo($id,$companyinfo);
            redirect('admin/comp_profile/view_company/','refresh');

		//}


    }

    function delete_companyInfo($id)
    {
        $this->load->model('admin_model');
		$this->admin_model->delete_comRecord($id);

		redirect('admin/comp_profile/view_company/','refresh');
    }



	// validation rules
    function _set_rules()
	{
        $this->load->library(array('table','form_validation'));
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('dob', 'DoB', 'trim|required|callback_valid_date');

		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

	// date_validation callback
	function valid_date($str)
	{
		//match the format of the date
		if (preg_match ("/^([0-9]{2})-([0-9]{2})-([0-9]{4})$/", $str, $parts))
		{
			//check weather the date is valid of not
			if(checkdate($parts[2],$parts[1],$parts[3]))
				return true;
			else
				return false;
		}
		else
			return false;
	}
	
	
	function flash_message()
   {
	// get flash message from CI instance
	$ci =& get_instance();
	$flashmsg = $ci->session->flashdata('message');

	$html = '';
	if (is_array($flashmsg))
	{
		$html = '<div id="flashmessage" class="'.$flashmsg[type].'">
			<img style="float: right; cursor: pointer" id="closemessage" src="'.base_url().'images/cross.png" />
			<strong>'.$flashmsg['title'].'</strong>
			<p>'.$flashmsg['content'].'</p>
			</div>';
	}
	return $html;
  }
  
  function view_branch_user($p1="",$p2="",$p3=""){
        //echo $p1;
        $compid=$this->session->userdata('compid');
        $this->load->model('admin_model');
		$data['query_branch_user']=$this->admin_model->get_branchusers($compid);
		
		if($p1 =='branchuserlist' and $p2=='viewprofile'){
		 $data['query_branchusersprofile'] = $this->admin_model->get_adminuserprofile($p3);
		}
		
		if($p1 =='branchuserlist' and $p2=='editprofile'){
			$data['action_editUsers']= site_url('admin/comp_profile/editbranchUsers');			
			$data['query_editprofile']=$this->admin_model->get_adminuserprofile($p3);	
		}
  
        $data['action']= site_url('admin/comp_profile/addAgency');
		$data['action_bguser']= site_url('admin/comp_profile/parsebranchuser');
		$data['action_chngPass']=site_url('admin/comp_profile/changebranchpassword');
		
		$data['p1']=$p1;
		$data['p2']=$p2;
		$data['p3']=$p3;
		
        $this->template->set('title', 'Branch User List');
     	$this->template->load('admin/template', 'admin/branchlist',$data);
  }
  
  function parsebranchuser(){
        $compid=$this->session->userdata('compid');
        $this->load->model('admin_model');
        extract($_POST);
		       
		if($_POST['action'] == 'branch'){
		  
		  $catg='br';		
		}	
		$adminuser = array(
			                'compid'=>$compid,
							'fullname'=>$fname,
							'Address'=>$address,
			                'email'=>$email,
							'phone'=>$phone,
							'username'=>$uname,
							'password'=>($pass),
							'usertype'=>$usertype,
							'Category' =>$catg,
                            'status' => 'Y'
							);
		$this->db->insert('tbl_adminuser',$adminuser);

		if($_POST['action'] == 'branch'){
		   $this->session->set_flashdata('message', '<div id="message"><font color="green">Branch user Created Successfully !!</font> </div>');
		   redirect('admin/comp_profile/view_branch_user/branchuserlist','refresh');
		}
		
   }
   
   function editbranchUsers(){
     
	 extract($_POST);
	 //echo $id; die();
	 $adminuser = array(			                
							'fullname'=>$fname,
							'Address'=>$address,
			                'email'=>$email,
							'phone'=>$phone,
							'username'=>$uname,
							'password'=>($pass),
							'usertype'=>$usertype                           
							);	
	 
	  $this->db->where('aid',$id);	  
	  $this->db->update('tbl_adminuser',$adminuser);
	  $this->session->set_flashdata('message', '<div id="message"><center><font color="green">Profile Updated Successfully!!</font></center> </div>');
	  redirect('admin/comp_profile/view_branch_user/branchuserlist','refresh');
   }
   
   function changebranchpassword(){
   // echo "helllo";
	extract($_POST);
	$passvalue= array('password'=>$pass);
	$this->db->where('aid',$id);
	$this->db->update('tbl_adminuser',$passvalue);
	
	$this->session->set_flashdata('message', '<div id="message"><center><font color="green">Password Changed Successfully!!</font></center> </div>');
	  redirect('admin/comp_profile/view_branch_user/branchuserlist','refresh');
   
   }
   
   
    function view_agency_user($p1="",$p2="",$p3=""){
        //echo $p1;
        $compid=$this->session->userdata('compid');
        $this->load->model('admin_model');
		$data['query_branch_user']=$this->admin_model->get_branchusers($compid);
		
		if($p1 =='branchuserlist' and $p2=='viewprofile'){
		 $data['query_branchusersprofile'] = $this->admin_model->get_adminuserprofile($p3);
		}
		
		if($p1 =='branchuserlist' and $p2=='editprofile'){
			$data['action_editUsers']= site_url('admin/comp_profile/editagencyUsers');			
			$data['query_editprofile']=$this->admin_model->get_adminuserprofile($p3);	
		}
  
        $data['action']= site_url('admin/comp_profile/addAgency');
		$data['action_bguser']= site_url('admin/comp_profile/agencyuserparse');
		$data['action_chngPass']=site_url('admin/comp_profile/changeagencypassword');
		
		$data['p1']=$p1;
		$data['p2']=$p2;
		$data['p3']=$p3;
		
        $this->template->set('title', 'Branch User List');
     	$this->template->load('admin/template', 'admin/agencyuserlist',$data);
  }
  
  function agencyuserparse(){
        $compid=$this->session->userdata('compid');
        $this->load->model('admin_model');
        extract($_POST);
		       
		if($_POST['action'] == 'agency'){
		  
		  $catg='ag';		
		}	
		$adminuser = array(
			                'compid'=>$compid,
							'fullname'=>$fname,
							'Address'=>$address,
			                'email'=>$email,
							'phone'=>$phone,
							'username'=>$uname,
							'password'=>($pass),
							'usertype'=>$usertype,
							'Category' =>$catg,
                            'status' => 'Y'
							);
		$this->db->insert('tbl_adminuser',$adminuser);

		if($_POST['action'] == 'agency'){
		   $this->session->set_flashdata('message', '<div id="message"><font color="green">Agency user Created Successfully !!</font> </div>');
		   redirect('admin/comp_profile/view_agency_user/branchuserlist','refresh');
		}
		
   }
   
   function editagencyUsers(){
     
	 extract($_POST);
	 //echo $id; die();
	 $adminuser = array(			                
							'fullname'=>$fname,
							'Address'=>$address,
			                'email'=>$email,
							'phone'=>$phone,
							'username'=>$uname,
							'password'=>($pass),
							'usertype'=>$usertype                           
							);	
	 
	  $this->db->where('aid',$id);	  
	  $this->db->update('tbl_adminuser',$adminuser);
	  $this->session->set_flashdata('message', '<div id="message"><center><font color="green">Profile Updated Successfully!!</font></center> </div>');
	  redirect('admin/comp_profile/view_agency_user/branchuserlist','refresh');
   }
   
   function changeagencypassword(){
   // echo "helllo";
	extract($_POST);
	$passvalue= array('password'=>$pass);
	$this->db->where('aid',$id);
	$this->db->update('tbl_adminuser',$passvalue);
	
	$this->session->set_flashdata('message', '<div id="message"><center><font color="green">Password Changed Successfully!!</font></center> </div>');
	  redirect('admin/comp_profile/view_agency_user/branchuserlist','refresh');
   
   }
   
   function getResultfromdb($username){
            $this->load->database();
            $this->db->where('username',$username);
            $query = $this->db->get('tbl_adminuser')->num_rows();
            if($query == 0 )
                echo 'userOk';
            else
                echo 'userNo';
    }

   

}

?>