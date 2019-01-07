<?php
class busmgmt_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function busSearch($search){
       $dept_date = element('dept_date', $search);
	   $busno = element('busno', $search);
       $ttime = element('ttime', $search);
       $ampm = element('ampm', $search);
       $troute = element('troute', $search);
       $this->load->database();
       $cat = $this->session->userdata('sales_category');

       $wclause="a.dept_date= \"".$dept_date."\"";
       if($busno != "")
        $wclause.=" and a.bus_no= \"".$busno."\"";
       if($ttime != "")
        $wclause.=" and a.dept_time= \"".$ttime."\" and a.ampm=\"".$ampm."\"";
       if($troute != "")
        $wclause.=" and a.root_id=".$troute;
       if($cat != "ad"){
            $brid = $this->session->userdata('brid');
            $wclause.= " and brid =". $brid ;
       }

       $sql ="SELECT
                a.bus_no,
                a.dept_date,
                a.dept_time,
                a.ampm,
                a.sfrom,
                a.sto,
                a.root_id
             FROM
                tbl_sales a
             WHERE ". $wclause ." group by a.root_id, a.dept_time, a.dept_date";

      // echo $sql;
        $query = $this->db->query($sql);
	    return $query->result();
		//print_r($query->result());


    }
    function getChalani($search){
       $bus_no = element('bus_no', $search);
       $root_id = element('root_id', $search);
       $dept_time = element('dept_time', $search);
       $dept_date = element('dept_date', $search);

       $this->load->database();
       $sql ="SELECT
                a.bus_no,
                a.dept_date,
                a.dept_time,
                a.ampm,
                a.sfrom,
                a.sto,
                a.pnr,
                a.no_of_seat,
                a.rate,
                b.sales_id,
                b.fullname,
                b.address,
                b.age,
                b.gender,
                b.seatno,
                b.allseats
             FROM
                tbl_sales a,
                tbl_passangerlist b
             WHERE a.root_id= $root_id and a.dept_time = '$dept_time' and a.dept_date = '$dept_date' and a.bus_no = '$bus_no' and b.sales_id=a.sales_id and a.Cancelled='N'";
        //echo $sql;
        $query = $this->db->query($sql);
	    return $query->result();
    }

    function cancel_log($search)
    {
        $bus_no = element('bus_no', $search);
        $dept_date = element('dept_date', $search);
        $dept_time = element('dept_time', $search);
        $root_id = element('root_id', $search);
        $this->load->database();
        $sql ="select
                a.bus_no,
                a.sales_id,
                b.date,
                c.fullname as user,
                b.sales_id,
                b.remarks
             from
                tbl_sales a,
                tbl_log b,
                tbl_adminuser c
             where
                b.sales_id = a.sales_id
             and
                a.bus_no = '$bus_no'
             and
                a.dept_date = '$dept_date'
             and
                a.dept_time = '$dept_time'
             and
                a.root_id = $root_id
             and
                c.aid = a.issued_by";

            $query = $this->db->query($sql);
	        return $query->result();
    }
	function get_routinfo(){
		 $this->load->database();
         $sql = "SELECT DISTINCT root_id,rFrom,rTo FROM tbl_routdetails";
         $query = $this->db->query($sql);
         return $query->result();
	}

	function get_bus_no(){
	     $this->load->database();
         $sql = "SELECT bus_id,busNo FROM tbl_busdetails order by busNo ASC";
         $query = $this->db->query($sql);
         return $query->result();
	}
	
	function get_dept_time(){
	     $this->load->database();
         $sql = "SELECT DISTINCT departure_time FROM tbl_busdetails order by departure_time ASC";
         $query = $this->db->query($sql);
         return $query->result();
	}
}

?>
