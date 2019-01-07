<?php
class Feedback extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('mfeedback');
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('captcha');
    }

    public function index()
    {
		$data = array(
				'name' =>$this->input->POST('name'),
				'email' =>$this->input->POST('email'),
				'remarks'=>$this->input->POST('remark'),
				'ipaddress'=>$this->session->userdata('ip_address'),
				'type'=>('F')
		);
		
		//print_r($data);
		$this->load->library('session');
        //get product details
        //$data['content'] = $this->mproduct->get_details();
		
		if ($this->input->post() && ($this->input->post('word') == $this->session->userdata('word'))) {
		
		    $this->db->insert('tbl_feedback_contactus',$data);
            $this->template->load('template', 'feedback_success');
        }else {
				// load codeigniter captcha helper
                $this->load->helper('captcha');

                $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => 'http://local.busbooking.com/captcha/',
                'img_width'	 => '155',
                'img_height' => 30,
                'border' => 0,
                'expiration' => 7200
                );

                 // create captcha image
                $cap = create_captcha($vals);

                // store image html code in a variable
                $data['image'] = $cap['image'];
				//$data['error'] = "Captcha doesnot match!!";
               // store the captcha word in a session
                $this->session->set_userdata('word', $cap['word']);

                $this->template->load('template', 'feedback',$data);
   					 }
   		 }
}
?>
