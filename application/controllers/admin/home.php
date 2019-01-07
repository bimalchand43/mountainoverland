<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
		$this->load->library('session');
		$this->load->library('encrypt');
     }

     public function index()
     {
	   $this->load->library('session');
	   //echo $this->session->userdata["manager"];
	   if(isset($this->session->userdata["manager"]) and $this->session->userdata["manager"] == "manager")
	   {    
	   		$this->load->library('encrypt');
	   		$this->template->set('title','Home Pages');
      		$this->template->load('admin/template','admin/home');	   }
	   else
	   {	   		
			redirect("admin");
	   }
	   
	
     }

    public function companyprofile($id)
   {
      $this->load->model("main_model");
	  $data['query']=$this->main_model->getCompanyInfo($id);
	 // print_r($data['query']);
      $data['action']=site_url('admin/home/editcompanyinfo');
      $this->template->set('title', 'Company Profile');
      $this->template->load('admin/template', 'admin/companyprofile', $data);
   }
   
   function editcompanyinfo(){
    $this->load->model("main_model");
	if(isset($_POST["submit"])){
	  $id= $_POST['id'];
	  $data['query']=$this->main_model->getCompanyInfo($id);
	}
	$data['action']=site_url('admin/home/parseupdatecompinfo');
	$this->template->set('title', 'Edit Company Profile');
    $this->template->load('admin/template', 'admin/editcompanyprofile', $data);
	
   }
   
   function parseupdatecompinfo(){
   $this->load->model("main_model");  
     
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
	  redirect('admin/home/companyprofile/'.$id);
	
   }

   function getdata_for_agency($brid=""){
      $this->load->model("main_model");
	  $data['query']=$this->main_model->getall_for_agency($brid);
      foreach($data['query'] as $rows){}

      $query1 = $this->main_model->get_selected_country_name($rows->country);
	  //print_r($data['query']); die();
	  foreach($query1 as $row){
       $data["country_name"]=$row->countries_name;
      }
      $this->template->set('title', 'For New Agency');
      $this->template->load('admin/template', 'admin/for_new_agency',$data);
   }
   
   function newgencydetail($id){
      $this->load->model("main_model");
	  $data['query']=$this->main_model->get_for_agency($id);
	  
      $this->template->set('title', 'For New Agency');
      $this->template->load('admin/template', 'admin/newagencydetailview',$data);
   }

   function changepassword(){

    $data['action']=site_url('admin/home/parsechangepassword');
    $this->template->set('title', 'Change Password');
    $this->template->load('admin/template', 'admin/changepassword',$data);
   }

   function parsechangepassword(){
    $userid=$this->session->userdata["user_id"];
    $this->load->model('main_model');
    $query=$this->main_model->changepassword($userid);
    foreach($query as $row){
    }

    if($this->input->post('fcecpin')==$row->password){
        $updatepass=array('password'=>$this->input->post('fnecpin'));

        $this->db->where('aid',$userid);
        $this->db->update('tbl_adminuser',$updatepass);
        $this->session->set_flashdata('message', '<div id="message"><font color="green"><h3>Password Changed Successfully!!</h3></font> </div>');
	    redirect('admin/home/changepassword');
        }else{
      $this->session->set_flashdata('message', '<div id="message"><font color="red"><h3>Password Changed UnSuccessfully!!</h3></font> </div>');
	  redirect('admin/home/changepassword');
    }
   }
   
   function changepasswordrequest(){
     $this->load->model('admin_model');
     $data['query'] = $this->admin_model->get_list_of_users();
     $data['action']=site_url('admin/home/parsechangepasswordrequest');
     $this->template->set('title', 'Change Password Request');
     $this->template->load('admin/template', 'admin/viewchangepassword',$data);
   }
   function parsechangepasswordrequest(){
    if(isset($_POST['submit'])){
        $aid = $_POST['users'];
    }
    //echo $aid; die();
     $this->load->model('main_model');
     $query=$this->main_model->get_selected_user($aid);
     foreach($query as $row){
    }

        $updatepass=array('password'=>$this->input->post('fnecpin'));

        $this->db->where('aid',$aid);
        $this->db->update('tbl_adminuser',$updatepass);
        $this->session->set_flashdata('message', '<div id="message"><font color="green"><h3>Password Changed Successfully!!</h3></font> </div>');
	    redirect('admin/home/changepasswordrequest');

     // $this->session->set_flashdata('message', '<div id="message"><font color="red"><h3>Password Changed UnSuccessfully!!</h3></font> </div>');
	  //redirect('admin/home/changepasswordrequest');

   }




}


