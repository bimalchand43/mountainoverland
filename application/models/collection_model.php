<?php
class Collection_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }



    function salesrept_branch_wise($yearly="",$monthly="",$intv_date_from="",$intv_date_to=""){
      // $dt= $yearly.'-'.$monthly.'-'.$daily;
       $this->load->database();
       $sql = "Select
                              a.compid,
                              b.brid,
                              b.comp_name,
                              sum(if(paid='Y',a.no_of_seat,0)) paid_tick,
                              sum(if(paid='Y',a.no_of_seat * a.rate,0)) paid_amt,
                              sum(if(paid='N',a.no_of_seat,0)) unpaid_tick,
                              sum(if(paid='N',a.no_of_seat * a.rate,0)) unpaid_amt,
                                      sum(a.rate * a.no_of_seat) amount
              from
                              tbl_sales a,
                              tbl_companyinfo b
              where
                              b.id = a.compid
              and
                              a.brid >0
              and
                              a.Cancelled ='N'
               ";         if($yearly !="" and $monthly =="" and $intv_date_from == "" and $intv_date_to==""){
                              $sql.=" and year(a.ticket_issue_date)=$yearly";
                          }elseif($yearly !="" and $monthly !="" and $intv_date_from == "" and $intv_date_to==""){
                              $sql.="and month(a.ticket_issue_date) = $monthly and year(a.ticket_issue_date)=$yearly";
                          }elseif($yearly =="" and $monthly =="" and $intv_date_from != "" and $intv_date_to !=""){
                             $sql.=" and a.ticket_issue_date between '$intv_date_from' and '$intv_date_to'";
                          }elseif($yearly =="" and $monthly =="" and $intv_date_from != "" and $intv_date_to ==""){
                            $sql.=" and a.ticket_issue_date ='$intv_date_from'";
                          }
            $sql.="  group by
                              a.brid
              order by
                              a.brid";
       $query = $this->db->query($sql);
       return $query->result();
        }

    function salesrept_agency_wise($yearly="",$monthly="",$intv_date_from="",$intv_date_to=""){
       $companyid = $this->session->userdata('compid');
       $brid = $this->session->userdata('brid');
       $this->load->database();
       $sql = "Select
                              a.compid,
                              b.brid,
                              b.comp_name,
                              sum(if(paid='Y',a.no_of_seat,0)) paid_tick,
                              sum(if(paid='Y',a.no_of_seat * a.rate,0)) paid_amt,
                              sum(if(paid='N',a.no_of_seat,0)) unpaid_tick,
                              sum(if(paid='N',a.no_of_seat * a.rate,0)) unpaid_amt,
                                      sum(a.rate * a.no_of_seat) amount
              from
                              tbl_sales a,
                              tbl_companyinfo b
              where
                              b.id = a.compid
              and
                              b.brid = $brid and b.agid > 0
              and
                              a.Cancelled ='N' ";
                          if($yearly !="" and $monthly =="" and $intv_date_from == "" and $intv_date_to==""){
                              $sql.=" and year(a.ticket_issue_date)=$yearly";
                          }elseif($yearly !="" and $monthly !="" and $intv_date_from == "" and $intv_date_to==""){
                              $sql.=" and month(a.ticket_issue_date) = $monthly and year(a.ticket_issue_date)=$yearly";
                          }elseif($yearly =="" and $monthly =="" and $intv_date_from != "" and $intv_date_to !=""){
                             $sql.=" and a.ticket_issue_date between '$intv_date_from' and '$intv_date_to'";
                          }elseif($yearly =="" and $monthly =="" and $intv_date_from != "" and $intv_date_to ==""){
                            $sql.=" and a.ticket_issue_date ='$intv_date_from'";
                          }
            $sql.="  group by
                              a.compid
              order by
                              a.compid ";
       //echo $sql;
       $query = $this->db->query($sql);
       return $query->result();
   }
}

?>
