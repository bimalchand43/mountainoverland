<?php
class Driver_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
    function getall_driver(){
		$query = $this->db->get('tbl_driver');
		 return $query->result();
	}
	function fetch_to_update_driver_by_id($id){
		$this->load->database();
        $this->db->where('id', $id);
        $query=$this->db->get('tbl_driver');
        return $query->result();
	}
	function delete_driver_from_list($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_driver');
    }
    function get_all_driver_by_name(){
         $this->load->database();
         $sql = "select id, name from tbl_driver";
         $query = $this->db->query($sql);
	     return $query->result();
    }
    function get_all_bus_by_busno(){
        $this->load->database();
         $sql = "select bus_id, busNo from tbl_busdetails";
         $query = $this->db->query($sql);
	     return $query->result();
    }
    function get_all_driver_by_name_with_id($id){
         $this->load->database();
         $sql = "select id, name from tbl_driver where id=$id";
         $query = $this->db->query($sql);
	     return $query->result();
    }
    function get_all_route_by_name(){
       $query=$this->db->get('tbl_routdetails');
	   return $query->result();
    }
    function getall_expenses_list(){
     $sql="select
                a.id,
                a.date,
                a.expBy,
                a.remarks,
                a.amount,
                b.name,
                c.rFrom,
                c.rTo,
                d.busNo
          from
                tbl_expense a,
                tbl_driver b,
                tbl_routdetails c,
                tbl_busdetails d
          where
                a.bdId = b.id
                and
                a.route = c.root_id
                and
                a.busid = d.bus_id
          group by a.id";
         $query = $this->db->query($sql);
		 return $query->result();
    }
    function fetch_to_update_exp_by_id($id){
       $this->load->database();
        $this->db->where('id', $id);
        $query=$this->db->get('tbl_expense');
        return $query->result();
    }
    function delete_expenses_from_list($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_expense');
    }
    function expense_wise_report_multiple($yearly,$monthly,$intv_date_from,$intv_date_to){
            $sql="select
                a.id,
                a.date,
                a.expBy,
                a.remarks,
                a.amount,
                b.name,
                c.rFrom,
                c.rTo,
                d.busNo
          from
                tbl_expense a,
                tbl_driver b,
                tbl_routdetails c,
                tbl_busdetails d
          where
                a.bdId = b.id
                and
                a.route = c.root_id
                and
                a.busid = d.bus_id ";
          if($yearly!="" && $monthly=="" && $intv_date_from == "" && $intv_date_to==""){
                $sql.= " and  year(a.date)=$yearly";
          }elseif($yearly=="" && $monthly!="" && $intv_date_from == "" && $intv_date_to==""){
                $sql.= "and month(a.date)=$monthly";
          }elseif($yearly=="" && $monthly=="" && $intv_date_from!= "" && $intv_date_to==""){
                $sql.= "and a.date = '$intv_date_from'";
          }elseif($yearly=="" && $monthly=="" && $intv_date_from!= "" && $intv_date_to!=""){
                $sql.= "and a.date between '$intv_date_from' and '$intv_date_to'";
          }elseif($yearly!="" && $monthly!="" && $intv_date_from== "" && $intv_date_to==""){
                $sql.= "and month(a.date)=$monthly and year(a.date)=$yearly";
          }
          $sql.=" group by a.id";
         $query = $this->db->query($sql);
		 return $query->result();
       }
    function Expensereptmultiple($driver,$busno,$busroute){
            //echo $busno;
          $sql="select
                a.id,
                a.date,
                a.expBy,
                a.remarks,
                a.amount,
                b.name,
                c.rFrom,
                c.rTo,
                d.busNo
          from
                tbl_expense a,
                tbl_driver b,
                tbl_routdetails c,
                tbl_busdetails d
          where
                a.bdId = b.id
                and
                a.route = c.root_id
                and
                a.busid = d.bus_id ";
          if($driver!="" && $busno=="" && $busroute == ""){
                $sql.= "and  a.bdId=$driver";
          }elseif($driver=="" && $busno !="" && $busroute == ""){
                //echo "hello";
                $sql.= "and d.busNo='$busno'";
          }elseif($driver=="" && $busno=="" && $busroute != ""){
                $sql.= "and a.route = $busroute";
          }
          $sql.=" group by a.id";
          //echo $sql;
         $query = $this->db->query($sql);
		 return $query->result();
       }
}
?>

