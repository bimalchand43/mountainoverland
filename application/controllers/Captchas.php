<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captchas extends CI_Controller {
 public function __construct()
 {
  parent::__construct();
  $this->load->model('home_model');
 }
 public function index()
 {
  $this->load->helper('captcha');
  $vals = array(
     'img_path' => './captcha/',
     'img_url' => 'http://localhost/ci_captcha/captcha/'
     );
  $cap = create_captcha($vals);
  $data = array(
     'captcha_time' => $cap['time'],
     'ip_address' => $this->input->ip_address(),
     'word' => $cap['word']
     );
  $this->session->set_userdata($data);
  $data['cap_img']=$cap['image'];
  $this->load->view('form_view',$data);
 }
 public function add_message()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[3]');
  $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
  $this->form_validation->set_rules('captcha', 'Security Code', 'trim|required|callback_check_captcha');
  if($this->form_validation->run() == FALSE)
  {
   $this->index();
  }
  else
  {
   $this->home_model->add_message();
  }
 }
 public function check_captcha()
 {
  $expiration = time()-7200; // Two hour limit
  $cap=$this->input->post('captcha');
  if($this->session->userdata('word')== $cap
   AND $this->session->userdata('ip_address')== $this->input->ip_address()
   AND $this->session->userdata('captcha_time')> $expiration)
  {
   return true;
  }
  else{
   $this->form_validation->set_message('check_captcha', 'Security number does not match.');
   return false;
  }
 }
}
?>
