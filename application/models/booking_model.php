<?php
class booking_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function count_all($search){
       $dept_date = element('dept_date', $search);
	   $from = element('cboFrom', $search);
       $to = element('cboTo', $search);
       $this->load->database();
       $sql = "SELECT *
                FROM `tbl_sales`
                WHERE `dept_date` = '" . $dept_date . "'
				and `sfrom` = '".$from."'
				and `sto` = '".$to."'
				and  `Cancelled` ='N'";
        $query = $this->db->query($sql);
        return $query->num_rows();


	}
    /*function get_all($search)
    {
	    // print_r($search);
        $from = element('cboFrom', $search);
        $to = element('cboTo', $search);
        $dept_date = element('dept_date', $search); 

    //if($from != '' && $to!='' && $dept_date!=''){
       $this->load->database();
       $this->db->select('*');
       $this->db->from('tbl_sales');
       $this->db->where('sfrom',$from);
       $this->db->where('sto',$to);
       $this->db->where('dept_date',$dept_date);
       $this->db->join('tbl_busdetails', 'tbl_busdetails.bus_id = tbl_sales.bus_id');
       $this->db->join('tbl_routdetails', 'tbl_routdetails.root_id = tbl_sales.root_id');
       $query = $this->db->get();
	 	     print_r($this->db->last_query());
     print_r($query->result());
	  return $query->result();
     //}
    }*/
	function get_all($search){
	   $dept_date = element('dept_date', $search);
	   $from = element('cboFrom', $search);
       $to = element('cboTo', $search);
       $this->load->database();

		$sql ="select
		                 a.bus_no as busno,
						 a.bus_id as bus_id,
						 GROUP_CONCAT(a.seat_no SEPARATOR ',') as seats,
						 b.departure_time as dept_time,
						 b.fare as fare,
						 b.totalseat as tseat,
						 b.ampm as ampm,
						 c.rfrom as rfrom,
						 c.rto as rto
					from
						 tbl_sales a,
						 tbl_busdetails b,
						 tbl_routdetails c
					where
						 b.bus_id = a.bus_id
					and
						 c.root_id =a.root_id
					and
						 `sfrom` = '".$from."'
					AND
						 `sto` = '".$to."'
					AND
						 `dept_date` = '" . $dept_date . "'
				    AND
					     a.Cancelled ='N'
					group by
						 busno,
						 tseat,
						 rfrom,
						 rto
					order by
						 busno	";
         $query = $this->db->query($sql);
        //return $query->num_rows();

     // print_r($query->result());
	  return $query->result();

	}

    function getRecord($search){
    //print_r($search);
       $from = element('cboFrom', $search);
       $to = element('cboTo', $search);
       $dept_date = element('dept_date', $search);

      $this->load->database();
       $this->db->select('*');
       $this->db->from('tbl_busdetails');
       $this->db->where('rFrom',$from);
       $this->db->where('rTo',$to);
       $this->db->join('tbl_routdetails','tbl_busdetails.root_id = tbl_routdetails.root_id');
       $query = $this->db->get();
      // print_r($this->db->last_query());
       return $query->result();
    }

    function view_row($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tbl_busdetails');
		$this->db->where('bus_id', $id);
        $this->db->join('tbl_routdetails', 'tbl_busdetails.root_id = tbl_routdetails.root_id');
		$query= $this->db->get();
        return $query->result();
    }

	function sales_max_id()
	{
		$this->db->select_max('sales_id');
		$this->db->order_by('sales_id', 'DESC');
		$this->db->limit(1);
		$query=$this->db->get('tbl_sales');
		if($query->num_rows() > 0) {
             return $query->result();
        }
		
	}
	
	function select_row($dptdate,$rFrom,$rTo,$busNo){
	  //echo $dptdate;
	  //echo $rFrom;
	  //echo $rTo;
	  //echo $busNo;

	   $this->load->database();
       $this->db->select('*');
       $this->db->from('tbl_sales');
	   $this->db->where('dept_date',$dptdate);
       $this->db->where('sfrom',$rFrom);
       $this->db->where('sto',$rTo);
	   $this->db->where('bus_no',$busNo);
	   $this->db->where('Cancelled','N');
       $query = $this->db->get();
       return $query->result();
	}
    function select_rows($dptdate,$rFrom,$rTo,$busNo,$salesid){
	  //echo $dptdate;
	  //echo $rFrom;
	  //echo $rTo;
	  //echo $busNo;

	   $this->load->database();
       $this->db->select('*');
       $this->db->from('tbl_sales');
	   $this->db->where('dept_date',$dptdate);
       $this->db->where('sfrom',$rFrom);
       $this->db->where('sto',$rTo);
	   $this->db->where('bus_no',$busNo);
       $this->db->where('sales_id !=',$salesid);
	   $this->db->where('Cancelled','N');
       $query = $this->db->get();
       return $query->result();
	}
	function get_all_sales($max_id){
	 $this->db->select('*');
	 $this->db->from('tbl_sales');
	 $this->db->where('sales_id',$max_id);
	 //$this->db->where('Cancelled','N');
	 $query = $this->db->get();
	 return $query->result();
	}

    function get_all_salesdt($max_id){
     $this->load->database();
      $sql = "select a.*, b.comp_name as company, c.fullname as user from tbl_sales a, tbl_companyinfo b, tbl_adminuser c where sales_id=$max_id and b.id = a.compid and c.aid = a.issued_by";
      $query = $this->db->query($sql);
	  return $query->result();
	}

    function all_salesdt($max_id){
     $this->load->database();
      $sql = "select * from tbl_sales where sales_id=$max_id";
      $query = $this->db->query($sql);
	  return $query->result();
	}

   function get_all_salesDetails($pnr_id){
     $this->load->database();
      $sql = "select a.*, b.comp_name as company, c.fullname as user from tbl_sales a, tbl_companyinfo b, tbl_adminuser c where pnr='$pnr_id' and b.id = a.compid and c.aid = a.issued_by";
      $query = $this->db->query($sql);
	  return $query->result();
	}


	function get_all_passanger($max_id){
	  $this->load->database();
      $sql = "select * from tbl_passangerlist where sales_id=$max_id order by seatno asc";
      $query = $this->db->query($sql);
	  return $query->result();
	}
	
	function get_all_tc(){
	 $this->db->select('*');
	 $this->db->from('tbl_term_condition');
	 $this->db->where('status','Y');
	 $query=$this->db->get();
	 return $query->result();
	}
	
	function save_businfo($data){
       //print_r($data);
        $this->load->database();
		$this->db->insert('tbl_busdetails',$data);
		return $this->db->insert_id();
	}
	function get_rootinfo(){
		$query=$this->db->get('tbl_routdetails');
		return $query->result();
	}
	
	function get_all_bus(){
	 $sql="  select
	            a.bus_id,
	 			a.busNo,
				a.fare,
				a.departure_time,
				a.ampm,
				b.rFrom,
                                b.rTo 
		   from
		   		tbl_busdetails a,
				tbl_routdetails b
		   where
		        a.root_id = b.root_id
		   order by
		        a.departure_time					
	 ";
	 $query=$this->db->query($sql);
	 return $query->result();
	
	}
	function update_businfo($id,$businfo)
    {
       	$this->db->where('bus_id',$id);
		$this->db->update('tbl_busdetails',$businfo);
		

    }
	
	function get_businfo($id){
		$this->db->select('*');
		$this->db->from('tbl_busdetails');
		$this->db->where('bus_id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	
	function save_routinfo($data){
       //print_r($data);
        $this->load->database();
		$this->db->insert('tbl_routdetails',$data);
		return $this->db->insert_id();
	}
	function get_routeinfo($id){
	    $this->load->database();
		$this->db->select('*');
		$this->db->from('tbl_routdetails');
		$this->db->where('root_id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	function get_city(){
		$query=$this->db->get('tbl_city');
		return $query->result();
	}
	
	function count_sales(){
       $this->load->database();
       $sql = "SELECT * FROM `tbl_sales` where Cancelled ='N'";
        $query = $this->db->query($sql);
        return $query->num_rows();


	}
	
	function unpaid($salid,$recno, $recdate){
	    //echo $salid;
	    $this->load->database();
        $sql = "UPDATE `tbl_sales` SET paid='Y', reno='".$recno."', recdate='". date('Y-m-d', strtotime($recdate))."' WHERE sales_id=$salid";
		//echo $sql;
        $this->db->query($sql);
        return; 
	}
	
	function CheckPNR($pnr){
	$this->load->database();	
    $sql = "select * from tbl_sales where pnr = '$pnr'";
    $query = $this->db->query($sql);
    if($query->num_rows()>0)
        return 0;
    else
        return 1;
   }
   
   function getInpnr($bird){
    $this->load->database();	
    $sql = "select * from tbl_companyinfo where brid=$bird and agid=0";
    $query = $this->db->query($sql);
	return $query->result();
   
   }

   function ftcktcacl($tnumber,$pnrnumber){
    $this->load->database();	
    $sql = "select * from tbl_sales where sales_id=$tnumber and pnr ='$pnrnumber'";
    $query = $this->db->query($sql);
	return $query->result();
   
   }
   function fullcancel($salesid){
	    //echo $salid;
	    $this->load->database();
        $sql = "UPDATE `tbl_sales` SET Cancelled = 'Y' WHERE sales_id=$salesid";
        $this->db->query($sql);
        return;
	}

	function selectedseat($salesid){
	  $this->load->database();
      $sql = "select seat_no,rate from tbl_sales where sales_id=$salesid";
      $query = $this->db->query($sql);
	  return $query->result();
	}

	function selectmasterrecord($salesid){
	  $this->load->database();	
      $sql = "select * from tbl_sales where sales_id=$salesid";
      $query = $this->db->query($sql);
	  return $query->result();
	}
	
	function selectplist($salesid){
	  $this->load->database();	
      $sql = "select * from tbl_passangerlist where sales_id=$salesid";
      $query = $this->db->query($sql);
	  return $query->result();
	}
	
	function checkseat($root_id,$dptdate,$departure_time,$ampm,$rFrom,$rTo,$busNo){
	  $sql = "SELECT seat_no FROM `tbl_sales` where root_id=$root_id and dept_date='$dptdate' and dept_time='$departure_time' and ampm='$ampm' and sfrom='$rFrom' and sto='$rTo' and bus_no='$busNo' and Cancelled ='N'";
      $query = $this->db->query($sql);
      return $query->result();
	}
	
	function partialcheckseat($root_id,$dptdate,$departure_time,$ampm,$rFrom,$rTo,$busNo,$salesid){
	 $sql = "SELECT seat_no FROM `tbl_sales` where root_id=$root_id and dept_date='$dptdate' and dept_time='$departure_time' and ampm='$ampm' and sfrom='$rFrom' and sto='$rTo' and bus_no='$busNo' and Cancelled ='N' and sales_id != $salesid";
      $query = $this->db->query($sql);
      return $query->result();
	
	}
	

}

?>
