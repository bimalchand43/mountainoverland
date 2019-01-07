<?php
class Login_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }
    function validates($user,$pass){
	  $passwrd= ($pass);
	   $sql = "SELECT 
	                  a.aid as aid,
	  				  a.compid as companyid,
					  a.fullname as fname,
					  a.Category as category,
					  a.usertype as usertype,
					  b.cmpid as compid,
					  b.brid as bid,
					  b.agid as agnid,
					  b.pnrinitial as pnrinitial
                FROM  tbl_adminuser a,
					  tbl_companyinfo b  
                WHERE
					 a.username ='$user'
				and
					  a.password ='$passwrd'
				and
					  a.compid = b.id
				and
					  a.status ='Y'	
				group by
					  a.compid";
        $query = $this->db->query($sql);
		//print_r($this->db->last_query($sql));
	 
	   //$query = $this->db->get('users');
        //echo $query->num_rows(); 
		// return $query->result();
		//print_r($uname); die();
        if($query->num_rows==1){
            return $query->result();
        }else{
		  return 0;
		}
		

    }
	
	
	function validates_comp($compid){
	 $sql = "   SELECT *	                 
                FROM  
				      tbl_companyinfo
                WHERE
					 `id` = $compid				
				and
					  `status` ='Y'	
				";
        $query = $this->db->query($sql);
		if($query->num_rows==1){
			return $query->result();
		}
	
	}
	
	function validates_brnch($brid){
	    $sql = "SELECT *	                 
                FROM  
				      tbl_companyinfo
                WHERE
					 `brid` = $brid	
					 and
					 `agid`=0			
				and
					  `status` ='Y'	
				";
        $query = $this->db->query($sql);
		if($query->num_rows==1){
			return $query->result();
		}else{
		return 0;
		}
	
	}
	
	function get_branch_id($companyid){
		$sql="select brid from tbl_companyinfo where id=$companyid";
		$query = $this->db->query($sql);
		if($query->num_rows ==1){
			return $query->result();
		}
	
	}
	

}

?>