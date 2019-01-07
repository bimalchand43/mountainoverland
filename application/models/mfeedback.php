<?php
class MFeedback extends CI_Model {
	function __construct(){
		parent::__construct();
	}
    function getall_feedback(){
		$query = $this->db->get('tbl_feedback_contactus');
		 return $query->result();
	} 
	function update_feedback($id){
		$this->load->database();
        $this->db->where('cfid', $id);
        $query=$this->db->get('tbl_feedback_contactus');
        return $query->result();
	}
	function delete_feedback($id){
        $this->db->where('cfid', $id);
        $this->db->delete('tbl_feedback_contactus');
    }
}


?>
