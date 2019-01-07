<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
        $this->template->set('title','Home Page');
        $this->template->load('template','home');

	   //	$this->load->view('welcome_message');
	}

    function destination()
    {
        //echo "hello sir"; die();
        $this->template->set('title','Destination');
        $this->template->load('template','destination');
    }
    function packages()
    {

      $this->template->set('title','Packages');
      $this->template->load('template','package');    // Show template file and package.php file
    }

    function gadbad(){
      $this->template->set('title','Gadbad Page');
      $this->template->load('template','gadbad');    // Show template file and package.php file
    }




    function application(){
      $this->load->model("main_model");

      $data["companyinfo"] = $this->main_model->getBranchList();

      $this->template->set('title','Application Page');
      $this->template->load('template','application',$data);
    }
    function parse_application()
    {
	//echo $this->session->userdata["APPL"]; die();
	if(($this->session->userdata["APPL"])==0) {
		 $curr_date=date('Y-m-d');
		 $this->load->model("main_model");

		 $agency = array('business_name' => $this->input->post('binss_name'),
						 'person_name' => $this->input->post('contact_name'),
						 'address' => $this->input->post('address'),
						 'city' => $this->input->post('city'),
						 'country' => $this->input->post('country'),
						 'phone' => $this->input->post('phone'),
						 'mobile' => $this->input->post('mobile'),
						 'email' => $this->input->post('email'),
						 'submit_date' => $curr_date,
                         'branchid' => $this->input->post('branch'));

		 $this->main_model->for_agency($agency);

		 $this->session->set_userdata("APPL",1);

	}
	 //$this->application();
/*

Dear [contact Name],

Thank you very much for your interest for the agency of our company.

We have received your detail as follows

Name of Agency :
Contact Person Name
...
...
..
...

We will contact you as soon as possible on the given contact detail.


Regards
For : Sales and Marketing
Mountain  Overland P. Ltd.
Pokhara, Nepal



*/



	 $this->session->set_flashdata('message', '<div id="message"><font color="green"><h3>Data Inserted Successfully!!</h3></font> </div>');
	 redirect('main/index/');
	 //$this->index();
    }

    function aboutus(){

      $this->template->set('title','About Us Page');
      $this->template->load('template','aboutus');
    }
    function contactus(){

      $this->template->set('title','Contact us Page');
      $this->template->load('template','contact');
    }

	function checkticket(){

      $this->template->set('title','Contact us Page');
      $this->template->load('template','ChkTicket');
    }
	
	function feedback(){

      $this->template->set('title','Feedback Page');
      $this->template->load('template','feedback');
    }
	
	function parse_feedback(){
	
	 $data = array(
				'name' =>$this->input->POST('name'),
				'email' =>$this->input->POST('email'),
				'remarks'=>$this->input->POST('remark'),
				'ipaddress'=>$this->session->userdata('ip_address'),
				'type'=>('F')
	 );
	 $this->db->insert('tbl_feedback_contactus',$data);
	 $this->session->set_flashdata('message', '<div id="message"><font color="green"><h3>Data Inserted Successfully!!</h3></font> </div>');
	 redirect('main/feedback');
	
	}
}


