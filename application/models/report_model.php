<?php
class report_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
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
        function salesrept($salesbill,$nameonticket,$tbusnos,$troutes){ 	   
       $this->load->database();
	   
	  $companyid = $this->session->userdata('compid');
      $brid = $this->session->userdata('brid');
      
	      
	   if($brid=="0"){
	   
	         $sql ="select * from tbl_sales ";
		  if($salesbill != "" and $nameonticket =="" and $tbusnos == "" and $troutes ==""){
		     $sql.="where sales_id=$salesbill  and Cancelled ='N'";
		  }else if($salesbill == "" and $nameonticket !="" and $tbusnos == "" and $troutes ==""){
		     $sql.="where name_on_ticket like '$nameonticket%' and Cancelled ='N'";
		  }else if($salesbill== "" and $nameonticket =="" and $tbusnos != "" and $troutes ==""){
		     $sql.="where bus_no = '$tbusnos' and Cancelled ='N'";
		  }else if($salesbill== "" and $nameonticket =="" and $tbusnos == "" and $troutes !=""){
		     $sql.="where root_id = $troutes and Cancelled ='N'";
		  }else{
		     $sql.="where Cancelled ='N'";
		  }
	    
		 
	   }else{
	     		 
		     $sql ="select * from tbl_sales ";
		  if($salesbill != "" and $nameonticket =="" and $tbusnos == "" and $troutes ==""){
		     $sql.="where sales_id=$salesbill  and Cancelled ='N' and compid=$companyid";
		  }else if($salesbill == "" and $nameonticket !="" and $tbusnos == "" and $troutes ==""){
		     $sql.="where name_on_ticket like '$nameonticket%' and Cancelled ='N' and compid=$companyid";
		  }else if($salesbill== "" and $nameonticket =="" and $tbusnos != "" and $troutes ==""){
		     $sql.="where bus_no = '$tbusnos' and Cancelled ='N' and compid=$companyid";
		  }else if($salesbill== "" and $nameonticket =="" and $tbusnos == "" and $troutes !=""){
		     $sql.="where root_id = $troutes and Cancelled ='N' and compid=$companyid";
		  }else{
		     $sql.="where Cancelled ='N' and compid=$companyid";
		  }
	   }
        $query = $this->db->query($sql);
        return $query->result();
	}

        function salesreptmultiple($intv_date_from,$intv_date_to,$chkdate,$tbusno,$troute){
               $companyid = $this->session->userdata('compid');
          $brid = $this->session->userdata('brid');
       //echo $agid = $this->session->userdata('agid');
           if($brid=="0"){
                         if($chkdate == 'issuedate'){
                                        $sql="select * from tbl_sales ";
                                        if($intv_date_from != "" and $intv_date_to == ""){
                                                  $sql.="where ticket_issue_date ='$intv_date_from' and Cancelled ='N'";
                                                  if($tbusno != ""){
                                                        $sql.=" and bus_no = '$tbusno'";
                                                        }else if($tbusno == "" and $troute != ""){
                                                                $sql.=" and root_id = ".$troute;
                                                        }
                                        }else if($intv_date_from != "" and $intv_date_to != ""){
                                                  $sql.="where (ticket_issue_date between '$intv_date_from' and '$intv_date_to') and Cancelled ='N'";
                                                  if($tbusno != ""){
                                                        $sql.=" and bus_no = '$tbusno'";
                                                        }else if($tbusno == "" and $troute != ""){
                                                                $sql.=" and root_id = ".$troute;
                                                        }
                                        }else{
                                                  $sql.="where Cancelled ='N'";
                                        }
                         }else{
                                        $sql="select * from tbl_sales ";
                                        if($intv_date_from != "" and $intv_date_to == ""){
                                                  $sql.="where dept_date ='$intv_date_from' and Cancelled ='N'";
                                                   if($tbusno != ""){
                                                        $sql.=" and bus_no = '$tbusno'";
                                                        }else if($tbusno == "" and $troute != ""){
                                                                $sql.=" and root_id = ".$troute;
                                                        }
                                        }else if($intv_date_from != "" and $intv_date_to != ""){
                                                  $sql.="where (dept_date between '$intv_date_from' and '$intv_date_to') and Cancelled ='N'";
                                                  if($tbusno != ""){
                                                        $sql.=" and bus_no = '$tbusno'";
                                                        }else if($tbusno == "" and $troute != ""){
                                                                $sql.=" and root_id = ".$troute;
                                                        }
                                        }else{
                                                  $sql.="where Cancelled ='N'";
                                        }
                         }
                }else{

                     if($chkdate == 'issuedate'){
                                        $sql="select * from tbl_sales ";
                                        if($intv_date_from != "" and $intv_date_to == ""){
                                                  $sql.="where ticket_issue_date ='$intv_date_from' and Cancelled ='N' and compid=$companyid";
                                                  if($tbusno != ""){
                                                        $sql.=" and bus_no = '$tbusno'";
                                                        }else if($tbusno == "" and $troute != ""){
                                                                $sql.=" and root_id = ".$troute;
                                                        }
                                        }else if($intv_date_from != "" and $intv_date_to != ""){
                                                  $sql.="where (ticket_issue_date between '$intv_date_from' and '$intv_date_to') and Cancelled ='N' and compid=$companyid";
                                                  if($tbusno != ""){
                                                        $sql.=" and bus_no = '$tbusno'";
                                                        }else if($tbusno == "" and $troute != ""){
                                                                $sql.=" and root_id = ".$troute;
                                                        }
                                        }else{
                                                  $sql.="where Cancelled ='N' and compid=$companyid";
                                        }
                         }else{
                                        $sql="select * from tbl_sales ";
                                        if($intv_date_from != "" and $intv_date_to == ""){
                                                  $sql.="where dept_date ='$intv_date_from' and Cancelled ='N' and compid=$companyid";
                                                   if($tbusno != ""){
                                                        $sql.=" and bus_no = '$tbusno'";
                                                        }else if($tbusno == "" and $troute != ""){
                                                                $sql.=" and root_id = ".$troute;
                                                        }
                                        }else if($intv_date_from != "" and $intv_date_to != ""){
                                                  $sql.="where (dept_date between '$intv_date_from' and '$intv_date_to') and Cancelled ='N' and compid=$companyid";
                                                  if($tbusno != ""){
                                                        $sql.=" and bus_no = '$tbusno'";
                                                        }else if($tbusno == "" and $troute != ""){
                                                                $sql.=" and root_id = ".$troute;
                                                        }
                                        }else{
                                                  $sql.="where Cancelled ='N' and compid=$companyid";
                                        }
                         }

                }
        //echo $sql;
         $query = $this->db->query($sql);
     return $query->result();
        }

    function periodicsalesrept(){
       $this->load->database();

        $sql="SELECT
                                  year(ticket_issue_date) tyear,
                                  sum(if(paid='Y',no_of_seat,0)) paid_tick,
                                  sum(if(paid='Y',no_of_seat*rate,0)) paid_amt,
                                  sum(if(paid='N',no_of_seat,0)) unpaid_tick,
                                  sum(if(paid='N',no_of_seat*rate,0)) unpaid_amt
                FROM
                                  tbl_sales
            WHERE
                                  Cancelled ='N'
                group by
                                 year(ticket_issue_date)";

        $query = $this->db->query($sql);
        return $query->result();
        }

        function salesyearlyrept($yr){
                  $this->load->database();
           $sql= "select
                                year( ticket_issue_date) as yr,
                                monthname(ticket_issue_date) as mn,
                                sum(if(paid='Y',no_of_seat,0)) paid_tick,
                                sum(if(paid='Y',no_of_seat*rate,0)) paid_amt,
                                sum(if(paid='N',no_of_seat,0)) unpaid_tick,
                                sum(if(paid='N',no_of_seat*rate,0)) unpaid_amt
                  from
                                tbl_sales
                  where
                                 year(ticket_issue_date)=$yr and Cancelled ='N'
                  group by
                                 month(ticket_issue_date),
                                 monthname(ticket_issue_date)
                  order by ticket_issue_date";
                $query = $this->db->query($sql);
                return $query->result();

        }

        function salesMonthlyrept($yr,$mon){
                $sql="
                        select
                                          DATE_FORMAT(ticket_issue_date , '%Y-%m-%d') as dt,
                                          sum(if(paid='Y',no_of_seat,0)) paid_tick,
                                      sum(if(paid='Y',no_of_seat*rate,0)) paid_amt,
                                      sum(if(paid='N',no_of_seat,0)) unpaid_tick,
                                      sum(if(paid='N',no_of_seat*rate,0)) unpaid_amt
                                from
                                         tbl_sales
                                where
                                         month(ticket_issue_date) = $mon and year(ticket_issue_date)=$yr and Cancelled ='N'
                                group by
                                         DATE_FORMAT(ticket_issue_date , '%Y-%m-%d')
                        ";
                $query = $this->db->query($sql);
                return $query->result();
        }
     function salesDatewiseRept($stdt,$enddt){
                $sql="
                        select
                                          DATE_FORMAT(ticket_issue_date , '%Y-%m-%d') as dt,
                                          sum(if(paid='Y',no_of_seat,0)) paid_tick,
                                      sum(if(paid='Y',no_of_seat*rate,0)) paid_amt,
                                      sum(if(paid='N',no_of_seat,0)) unpaid_tick,
                                      sum(if(paid='N',no_of_seat*rate,0)) unpaid_amt
                                from
                                         tbl_sales
                                where
                    ticket_issue_date between \"$stdt\" and \"$enddt\" and Cancelled ='N'
                                group by
                                         DATE_FORMAT(ticket_issue_date , '%Y-%m-%d')
                        ";

                $query = $this->db->query($sql);
                return $query->result();
        }
        function salesDailyRept($dt){
                $sql="select  *,
                                          if(paid='Y','Yes','No') paid_tick
                          from
                                          tbl_sales
                          where
                                DATE_FORMAT(ticket_issue_date , '%Y-%m-%d')= \"$dt\" and Cancelled ='N'
                          group by
                                sales_id";
                $query = $this->db->query($sql);
                return $query->result();
        }

        function periodic_branch_sales_Rept(){
       $this->load->database();
            $companyid = $this->session->userdata('compid');
           $sql="SELECT
                                  year(ticket_issue_date) tyear,
                                  sum(if(paid='Y',no_of_seat,0)) paid_tick,
                                  sum(if(paid='Y',no_of_seat*rate,0)) paid_amt,
                                  sum(if(paid='N',no_of_seat,0)) unpaid_tick,
                                  sum(if(paid='N',no_of_seat*rate,0)) unpaid_amt
                FROM
                                  tbl_sales
            where
                                    compid = $companyid        and Cancelled ='N'
                group by
                                 year(ticket_issue_date)";

        $query = $this->db->query($sql);
        return $query->result();
        }

        function branch_salesyearlyrept($yr){
                  $this->load->database();
                $companyid = $this->session->userdata('compid');
                $sql= "select
                                year( ticket_issue_date) as yr,
                                monthname(ticket_issue_date) as mn,
                                sum(if(paid='Y',no_of_seat,0)) paid_tick,
                                sum(if(paid='Y',no_of_seat*rate,0)) paid_amt,
                                sum(if(paid='N',no_of_seat,0)) unpaid_tick,
                                sum(if(paid='N',no_of_seat*rate,0)) unpaid_amt
                  from
                                tbl_sales
                  where
                                 year(ticket_issue_date)=$yr and  compid = $companyid and Cancelled ='N'
                  group by
                                 month(ticket_issue_date),
                                 monthname(ticket_issue_date)
                  order by ticket_issue_date";


                $query = $this->db->query($sql);
                return $query->result();

        }

        function branch_salesMonthlyrept($yr,$mon){
           $companyid = $this->session->userdata('compid');

                $sql="
                        select
                                          DATE_FORMAT(ticket_issue_date , '%Y-%m-%d') as dt,
                                          sum(if(paid='Y',no_of_seat,0)) paid_tick,
                                      sum(if(paid='Y',no_of_seat*rate,0)) paid_amt,
                                      sum(if(paid='N',no_of_seat,0)) unpaid_tick,
                                      sum(if(paid='N',no_of_seat*rate,0)) unpaid_amt
                                from
                                         tbl_sales
                                where
                                         month(ticket_issue_date) = $mon and year(ticket_issue_date)=$yr and compid = $companyid and Cancelled ='N'
                                group by
                                         DATE_FORMAT(ticket_issue_date , '%Y-%m-%d')
                        ";

                $query = $this->db->query($sql);
                return $query->result();
        }

        function branch_salesDailyRept($dt){
           $companyid = $this->session->userdata('compid');
           $sql="select  *,
                                          if(paid='Y','Yes','No') paid_tick
                          from
                                          tbl_sales
                          where
                                DATE_FORMAT(ticket_issue_date , '%Y-%m-%d')= \"$dt\" and compid = $companyid and Cancelled ='N'
                          group by
                                sales_id";

                $query = $this->db->query($sql);
                return $query->result();
        }
     function branch_salesDatewiseRept($stdt,$enddt){
           $companyid = $this->session->userdata('compid');
           $sql="select
                                          DATE_FORMAT(ticket_issue_date , '%Y-%m-%d') as dt,
                                          sum(if(paid='Y',no_of_seat,0)) paid_tick,
                                      sum(if(paid='Y',no_of_seat*rate,0)) paid_amt,
                                      sum(if(paid='N',no_of_seat,0)) unpaid_tick,
                                      sum(if(paid='N',no_of_seat*rate,0)) unpaid_amt
                                from
                                         tbl_sales
                                where
                                ticket_issue_date between \"$stdt\" and \"$enddt\" and compid = $companyid and Cancelled ='N'
                                group by
                                         DATE_FORMAT(ticket_issue_date , '%Y-%m-%d')";

                $query = $this->db->query($sql);
                return $query->result();
        }
        function salesrept_branch_wise(){
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
                                                b.brid >0 and b.agid=0
                                and
                                                a.Cancelled ='N'

                                group by
                                                a.brid
                                order by
                                                a.brid";
       $query = $this->db->query($sql);
       return $query->result();
        }

        function salesrept_agency_wise($compid,$brid){
       $this->load->database();
       $sql = "Select
                                                a.compid,
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
                                                a.compid = b.id
                                and
                                                b.brid = $brid and b.agid > 0
                                and
                                                a.Cancelled ='N'

                                group by
                                                a.compid
                                order by
                                                a.compid";
       $query = $this->db->query($sql);
       return $query->result();
        }
    function allsalesrpt_by_branch($compid,$paid){
       $this->load->database();
       //$sql = "select * from tbl_sales where `compid`=$compid and paid='$paid' and Cancelled ='N' order by sales_id";
       $sql = "select a.*, b.comp_name from tbl_sales a, tbl_companyinfo b where a.brid=$compid and a.paid='$paid' and a.Cancelled ='N' and b.id=a.compid order by a.sales_id";
       $query = $this->db->query($sql);
       return $query->result();
        }
    function salesrpt_by_branch($compid,$paid){
       $this->load->database();
       //$sql = "select * from tbl_sales where `compid`=$compid and paid='$paid' and Cancelled ='N' order by sales_id";
       $sql = "select a.*, b.comp_name from tbl_sales a, tbl_companyinfo b where a.compid=$compid and a.paid='$paid' and a.agid=0 and a.Cancelled ='N' and b.id=a.compid order by a.sales_id";
       $query = $this->db->query($sql);
       return $query->result();
        }
        function allsalesrpt_by_agency($compid,$paid){
       $this->load->database();
       //$sql = "select * from tbl_sales where `compid`=$compid and paid='$paid' and Cancelled ='N' order by sales_id";
       $sql = "select a.*, b.comp_name from tbl_sales a, tbl_companyinfo b where a.compid=$compid and a.paid='$paid' and a.Cancelled ='N' and b.id=a.compid order by a.sales_id";
       $query = $this->db->query($sql);
       return $query->result();
        }




}

?>