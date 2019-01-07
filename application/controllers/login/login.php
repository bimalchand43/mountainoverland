<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    private $limit = 10;
    function _construct()
     {
        parent::_construct();
	//	$this->load->library('session');
		$this->load->library('template');
		$this->load->library('encrypt');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library(array('table','form_validation'));
		$this->load->model('admin_model','',TRUE);
		
     }


    public function admin()	    
	{
	      //$this->load->library('session');
		  $this->load->library('encrypt');
		  
		  if ($this->session->userdata('logged_in') == TRUE)
		  {
				redirect('admin/home');
		  }
          $data['title']="Admin Login";
          $data['action']= site_url('login/login/validate_admin');
          $this->load->view('login/view_login',$data);

	}

    function validate_admin(){
	   // $this->load->library('session');
		$this->load->library('encrypt');
        $this->load->model('login_model');
		
		 $user =  $this->input->post('username');
		 $pass =  $this->input->post('password');
		
        $query=$this->login_model->validates($user,$pass);                   
	    //print_r($query); 
		
		if($query != 0){		
          foreach($query as $row){
			  //echo $row->companyid; die();
			  //echo $row->fullname; die();
			} 			
		   
		 $query_comp=$this->login_model->validates_comp($row->companyid); 
		   //foreach($query_comp as $rows){
			  
			//} 	
		//die();
		   if($row->compid !=0){
		   
		    $query_comp=$this->login_model->validates_comp($row->companyid); 
			foreach($query_comp as $row_comp){						  
			} 
			  if($row_comp->id != 0){
			      
			      if($row->category == 'ag'){ 
				          $query_brid=$this->login_model->get_branch_id($row->companyid);
						  
						  foreach($query_brid as $row_brid){
						  }
						  $query_brnch=$this->login_model->validates_brnch($row_brid->brid);
						     foreach($query_brnch as $row_agency){
							 
							 }
							 if($row_agency->id != 0){
							   $this->session->set_userdata($query);
							   $this->session->set_userdata('manager','manager');
							   $this->session->set_userdata('mansap','manager');							   
							 
								   foreach( $query as $rows){
								   //echo $rows->contact_person; die();
									   $this->session->set_userdata('sales_category',$rows->category);
									   $this->session->set_userdata('usertype',$rows->usertype);
									   $this->session->set_userdata('contactperson',$rows->fname);
									   $this->session->set_userdata('user_id',$rows->aid);
									   $this->session->set_userdata('compid',$rows->companyid);
									   $this->session->set_userdata('brid',$rows->bid);
									   $this->session->set_userdata('agid',$rows->agnid);
									   $this->session->set_userdata('brinitpnr',$rows->pnrinitial);
									   $this->session->set_userdata('aginitpnr',$rows->pnrinitial);									   
									   
								   }
							   redirect('admin/home');
							  }else{
							    $this->session->set_flashdata('message', '<div id="message">Username or Password is incorrect, please try again.                                                                          </div>');
		                        redirect('login/login/admin'); 
							  } 
		           }else{
				   
				       $this->session->set_userdata($query);
						   $this->session->set_userdata('manager','manager');
						   $this->session->set_userdata('mansap','manager');
						   
						 
						   foreach( $query as $rows){
						   //echo $rows->contact_person; die();
							   $this->session->set_userdata('sales_category',$rows->category);
							   $this->session->set_userdata('usertype',$rows->usertype);
							   $this->session->set_userdata('contactperson',$rows->fname);
							   $this->session->set_userdata('user_id',$rows->aid);
							   $this->session->set_userdata('compid',$rows->companyid);
							   $this->session->set_userdata('brid',$rows->bid);
							   $this->session->set_userdata('agid',$rows->agnid);
							   $this->session->set_userdata('brinitpnr',$rows->pnrinitial);
							   $this->session->set_userdata('aginitpnr',$rows->pnrinitial);
						   }
						   redirect('admin/home');
				   }
			  
			  }else{ 	
		
		        $this->session->set_flashdata('message', '<div id="message">Username or Password is incorrect, please try again.  </div>');
		        redirect('login/login/admin');           
		      }
		}else{ 	
		
		  $this->session->set_flashdata('message', '<div id="message">Username or Password is incorrect, please try again.  </div>');
		  redirect('login/login/admin');           
		}
	}else{
	   $this->session->set_flashdata('message', '<div id="message">Username or Password is incorrect, please try again.  </div>');
	   redirect('login/login/admin');
	}
			
    }


    public function branch(){
      //  $this->load->library('session');
		$this->load->library('encrypt');
		
		if ($this->session->userdata('logged_in') == TRUE)
		  {
				redirect('branch/home');
		  }
		
        $data['title']="Branch Login";
        $data['action']= site_url('login/login/validate_branch');
        $this->load->view('login/view_login',$data);
    }

    function validate_branch(){
	     $this->load->library('encrypt');
	   // $this->load->library('session');
        $this->load->model('login_model');
        $query=$this->login_model->validate();
		
        if($query){
            $data = array('username'=>  $this->input->post('username'),
                          'loged_in'=> true
                          );
                           $this->session->set_userdata($data);
						   
			 foreach( $query as $rows){
		   
		         $this->session->set_userdata('contactperson',$rows->contact_person);
		  
		     }
			  	
			
						   //$this->session->userdata('contact_person');                          
                          redirect('branch/home');
        }
		else
		{
	          $this->session->set_flashdata('message', '<div id="message">Username or Password is incorrect, please try again. </div>');
	          redirect('login/login/branch');       
            
         }
    }

    function admin_logout(){

		$this->session->sess_destroy();		
	    redirect('admin');
    }

    function branch_logout(){
	
		$this->session->sess_destroy();
	    redirect('admin');
    }

}

?>