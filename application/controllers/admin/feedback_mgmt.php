<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_mgmt extends CI_Controller {

    function _construct()
     {
        parent::_construct();
        $this->load->helper('url');
        $this->load->helper('array');
     }

    public function feedbackList()
	{   
		$this->load->model('mfeedback');
		$data['query'] = $this->mfeedback->getall_feedback();
        $this->template->set('title','Feedback Pages');
        $this->template->load('admin/template','admin/feedbackListFrm',$data);

	   //	$this->load->view('welcome_message');
	}
	public function updateFeedbacklist($id){
		//echo $id;
		$data['action']=site_url('admin/feedback_mgmt/updatedFeedback/'.$id.'');
		$this->load->model('mfeedback');
     	$data['query'] =  $this->mfeedback->update_feedback($id);
		$this->template->load('admin/template', 'admin/feedbackUpdateListFrm',$data);
	}
	public function updatedFeedback(){
		$data = array('name'=>$this->input->post('name'),
                      'email'=>$this->input->post('email'),
                      'remarks'=>$this->input->post('remark'),
                    );
					
	  $this->db->where('cfid', $_POST['id']);
      $this->db->update('tbl_feedback_contactus', $data);
      $this->feedbackList();
	}
	public function viewFeedback($id){
		//$data['action']=site_url('admin/feedback_mgmt/submitverifydata/'.$id.'');
		$this->load->model('mfeedback');
     	$data['query'] =  $this->mfeedback->update_feedback($id);
		$this->template->load('admin/template', 'admin/feedbackView',$data);	
	}
	public function feedback_delete($id){
        $this->load->model('mfeedback');
        $this->mfeedback->delete_feedback($id);
        $this->feedbackList();
    } 
	public function replymessage($id){
		//$id = $_GET['id'];
		$data['action']=site_url('admin/feedback_mgmt/submitverifydata/'.$id.'');
		$this->load->model('mfeedback');
		$data['query'] =  $this->mfeedback->update_feedback($id);
		$this->template->load('admin/template', 'admin/replaymessage_view',$data);
	}
	public function submitverifydata(){
		//echo $id;
		$data = array('verified'=>$this->input->post('verify'),
					'replied'=>$this->input->post('replay'),
					'replymessage'=>$this->input->post('message'),
					'verifiedby'=>$this->session->userdata('contact_id'),
					'repliedby'=>$this->session->userdata('contact_id'),
					'ipaddress'=>$this->session->userdata('ip_address'),
					'type'=>'f',
					'verifieddate'=>date('Y-m-d H:i:s'),
					'replieddate'=>date('Y-m-d H:i:s')
						
						);
						//print_r($data); die();
			$this->db->where('cfid', $_POST['id']);
			$this->db->update('tbl_feedback_contactus', $data);
			$this->feedbackList();
			
	}   
}

?>
