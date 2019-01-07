<?php
class main_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getCompanyInfo($id){
	
        $this->load->database();
       $this->db->select('*');
       $this->db->from('tbl_companyinfo');
       $this->db->where('id',$id);
       $query = $this->db->get();
       return $query->result();
    }

    function get_all($search)
    {
      $from = element('cboFrom', $search);
        $to = element('cboTo', $search);
        $dob = element('dob', $search);

    if($from == ''){
       $this->load->database();
       $this->db->select('*');
       $this->db->from('tbl_busdetails');
       $this->db->join('tbl_routdetails', 'tbl_busdetails.rid = tbl_routdetails.rid');
       $query = $this->db->get();
       return $query->result();
     }else{

      $this->load->database();
       $this->db->select('*');
       $this->db->from('tbl_busdetails');
       $this->db->where('from',$from );
       $this->db->where('to',$to);
       $this->db->join('tbl_routdetails', 'tbl_busdetails.rid = tbl_routdetails.rid');
       $query = $this->db->get();
       return $query->result();
       }
    }
    function view_row($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tbl_busdetails');
		$this->db->where('bid', $id);
        $this->db->join('tbl_routdetails', 'tbl_busdetails.rid = tbl_routdetails.rid');
		$query= $this->db->get();
        return $query->result();
    }

    function for_agency($data){
       // print_r($data);
        $this->load->database();
		$this->db->insert('tbl_for_agency',$data);
		return $this->db->insert_id();
    }

	function getall_for_agency($compid = "")
	{
	   $this->load->database();
      if($compid==""){
        $sql = "select a.*,b.comp_name from tbl_for_agency a, tbl_companyinfo b where b.id=a.branchid order by submit_date";
      }else{
        $sql = "select a.*,b.comp_name from tbl_for_agency a, tbl_companyinfo b where a.branchid=$compid and b.id=a.branchid order by submit_date";
      }
      $query = $this->db->query($sql);
      return $query->result();
	}

	function get_for_agency($id){
	   $this->load->database();
       $sql = "select a.*,b.comp_name from tbl_for_agency a, tbl_companyinfo b where a.id=$id and b.id=a.branchid order by submit_date";
      $query = $this->db->query($sql);
       return $query->result();
	}
    function getBranchList(){
      $this->load->database();
      $sql = "select id, comp_name from tbl_companyinfo where brid > 0 and agid = 0 order by comp_name asc";
      $query = $this->db->query($sql);
	  return $query->result();
    }
    function changepassword($uid){
    $this->load->database();
    $sql = "select password from tbl_adminuser where aid=$uid";
    $query = $this->db->query($sql);
    return $query->result();
    }
    
    function get_selected_user($aid){
     $this->load->database();
     $sql = "select username from tbl_adminuser where aid=$aid";
     $query = $this->db->query($sql);
     return $query->result();
    }
    function get_all_country(){
     $this->load->database();
     $sql = "select * from countries";
     $query = $this->db->query($sql);
     return $query->result();
    }
    function get_selected_country_name($country_id){
      $this->load->database();
      $sql = "select countries_name from countries where countries_id = $country_id";
      $query = $this->db->query($sql);
      return $query->result();
    }
	
	function get_brid($id){
	  $this->load->database();
      $sql = "select brid from tbl_companyinfo where id=$id";
      $query = $this->db->query($sql);
      return $query->result();
	}
	function getMaxAgid($brchid){
	//$brchid = $this->session->userdata('brid');
	$sql = "SELECT max(agid) as maxagid
                FROM `tbl_companyinfo`
                WHERE brid=$brchid				       				       
					   and `Category` ='a'	 
				";
        $query = $this->db->query($sql);
		return $query->result();
		//print_r($this->db->last_query());
	}
	
	function get_agData($brid,$agid){	
	    $sql = "SELECT *
                FROM
					`tbl_companyinfo`
                WHERE
					 `brid`= $brid and `agid` = $agid
				";
        $query = $this->db->query($sql);
	    return $query->result();
	    //print_r($query);
		//print_r($this->db->last_query());	
	}
	
	 
}

?>