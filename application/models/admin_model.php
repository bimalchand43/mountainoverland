<?php
class admin_model extends CI_Model
{
    private $tbl_companyinfo= 'tbl_companyinfo';
    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
    function save($data){
        //print_r($data);
        $this->load->database();
		$this->db->insert($this->tbl_companyinfo,$data);
		return $this->db->insert_id();

	}

    function count_all(){
		return $this->db->count_all($this->tbl_companyinfo);
	}

	/*function get_paged_list(){
		$this->db->order_by('id','asc');
		$query = $this->db->get($this->tbl_companyinfo);
		return $query->result();
	}*/

	function get_paged_list(){
	   $sql = "SELECT *
                FROM `tbl_companyinfo`
                WHERE `brid` !=0
					   and `Category` ='b'
				";
        $query = $this->db->query($sql);
		return $query->result();


	   /*$this->db->select('*');
	   $this->db->from('tbl_companyinfo');
	   $this->db->where('status','y');
	   $this->db->where('Category','b');
	   $this->db->where('brid','0');
	   $this->db->where('agid','0');
	   $this->db->order_by('id','asc');
	   $query = $this->db->get();
       return $query->result();*/

	}

    function view_detail($id){
        $this->load->database();
        $this->db->from('tbl_companyinfo');
		$this->db->where('id', $id);
		$query= $this->db->get();
        return $query->result();
	}

    function update_companyinfo($id,$companyinfo)
    {
       	$this->db->where('id',$id);
		$this->db->update($this->tbl_companyinfo,$companyinfo);

    }

   function delete_comRecord($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_companyinfo);
	}
	
	function get_maxid()
	{
		$this->db->select_max('brid');
		$this->db->order_by('brid', 'DESC');
		$this->db->limit(1);
		$query=$this->db->get($this->tbl_companyinfo);
		return $query->result();
		
	}
	
	function get_barnchData($bid){
	$this->load->database();
       $sql = "SELECT id,cmpid,brid,max(agid)+1 as mxagid 
                FROM `tbl_companyinfo`
                WHERE `brid` = " . $bid . "
				group by brid";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_agency_list($p3){
	  $sql = "SELECT * 
                FROM `tbl_companyinfo`
                WHERE `agid` !=0
				       and  `brid`=$p3				       
					   and `Category` ='a'	 
				";
        $query = $this->db->query($sql);
		return $query->result();
	
	}
	
	function get_adminusers($cid){
     if($cid==0){
        $cid = $this->session->userdata('compid');
     }
  //echo $cid; 
	 $sql = "SELECT *
                FROM
					`tbl_adminuser`
                WHERE
					 `compid`= $cid
				";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
		return $query->result();
	
	}
	
	function save_adminuser($data){
        //print_r($data);
        $this->load->database();
		$this->db->insert('tbl_adminuser',$data);
		return $this->db->insert_id();

	}
	
	function update_branch_status($page,$stat,$id){
		// echo $stat;
		 //echo $id; die();
		 $this->load->database();
		 if($page == 'branchlist'){
			$sql="update `tbl_companyinfo` set `status`='$stat' where `id`=$id";
		 }
		 
		 if($page == 'showusers'){
			$sql="update `tbl_adminuser` set `status`='$stat' where `aid`=$id";
		 }
		 
		 if($page == 'branchusers'){
			$sql="update `tbl_adminuser` set `status`='$stat' where `aid`=$id";
		 }
		 
		 if($page == 'agencylist'){
			$sql="update `tbl_companyinfo` set `status`='$stat' where `id`=$id";
		 }
		 
		 if($page == 'agencyliststst'){
			$sql="update `tbl_companyinfo` set `status`='$stat' where `id`=$id";
		 }
		 if($page == 'agencyuserstsuser'){
			$sql="update `tbl_adminuser` set `status`='$stat' where `aid`=$id";
		 }
		 
		 if($page == 'branchuserlist'){
			$sql="update `tbl_adminuser` set `status`='$stat' where `aid`=$id";
		 }
		 if($page == 'agencyuserlist'){
			$sql="update `tbl_adminuser` set `status`='$stat' where `aid`=$id";
		 }
		 
		 
		 
	 
	  	return $this->db->query($sql);	 	
	}
	
	function get_branchusers($cid){
     
  //echo $cid; 
	 $sql = "SELECT *
                FROM
					`tbl_adminuser`
                WHERE
					 `compid`= $cid
				";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
		return $query->result();
	
	}
	function get_admin_user($id){
	 $sql = "SELECT *
                FROM
					`tbl_adminuser`
                WHERE
					 `aid`= $id
				";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
		return $query->result();
	}
	
	
	function change_pass($pass,$id){
		$sql="update tbl_adminuser set password='$pass' where aid=$id";
		$query = $this->db->query($sql);       
		return;
	}
	
	function agency_list(){
	 $brchid = $this->session->userdata('brid');
	  $sql = "SELECT * 
                FROM `tbl_companyinfo`
                WHERE `agid` !=0
				       and brid=$brchid				       				       
					   and `Category` ='a'	 
				";
        $query = $this->db->query($sql);
		return $query->result();
	
	}
	
	
	
	function getMaxAgid(){
	$brchid = $this->session->userdata('brid');
	$sql = "SELECT max(agid)as maxagid
                FROM `tbl_companyinfo`
                WHERE brid=$brchid				       				       
					   and `Category` ='a'	 
				";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_adminuserprofile($id){
	$sql = "SELECT *
                FROM
					`tbl_adminuser`
                WHERE
					 `aid`= $id
				";
        $query = $this->db->query($sql);
	    return $query->result();
	
	}
	
	function edit_adminuser($data,$id){
        //print_r($data);
        $this->load->database();
		$this->db->where('aid',$id);
		$this->db->update('tbl_adminuser',$data);
		return ;

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
	function get_list_of_users(){
        $sql = "SELECT * FROM tbl_adminuser";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function get_mas_intpnr($mxbrid){
	    $sql = "SELECT pnrinitial
                FROM
					`tbl_companyinfo`
                WHERE
					 `brid`= $mxbrid and `agid` = 0
				";
        $query = $this->db->query($sql);
	    return $query->result();
	}

}

?>