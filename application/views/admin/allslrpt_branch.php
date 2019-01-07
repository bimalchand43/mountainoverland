<?php
//date
function _date_range_limit($start, $end, $adj, $a, $b, $result)
{
    if ($result[$a] < $start) {
        $result[$b] -= intval(($start - $result[$a] - 1) / $adj) + 1;
        $result[$a] += $adj * intval(($start - $result[$a] - 1) / $adj + 1);
    }

    if ($result[$a] >= $end) {
        $result[$b] += intval($result[$a] / $adj);
        $result[$a] -= $adj * intval($result[$a] / $adj);
    }

    return $result;
}

function _date_range_limit_days($base, $result)
{
    $days_in_month_leap = array(31, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $days_in_month = array(31, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    _date_range_limit(1, 13, 12, "m", "y", &$base);

    $year = $base["y"];
    $month = $base["m"];

    if (!$result["invert"]) {
        while ($result["d"] < 0) {
            $month--;
            if ($month < 1) {
                $month += 12;
                $year--;
            }

            $leapyear = $year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0);
            $days = $leapyear ? $days_in_month_leap[$month] : $days_in_month[$month];

            $result["d"] += $days;
            $result["m"]--;
        }
    } else {
        while ($result["d"] < 0) {
            $leapyear = $year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0);
            $days = $leapyear ? $days_in_month_leap[$month] : $days_in_month[$month];

            $result["d"] += $days;
            $result["m"]--;

            $month++;
            if ($month > 12) {
                $month -= 12;
                $year++;
            }
        }
    }

    return $result;
}

function _date_normalize($base, $result)
{
    $result = _date_range_limit(0, 60, 60, "s", "i", $result);
    $result = _date_range_limit(0, 60, 60, "i", "h", $result);
    $result = _date_range_limit(0, 24, 24, "h", "d", $result);
    $result = _date_range_limit(0, 12, 12, "m", "y", $result);

    $result = _date_range_limit_days(&$base, &$result);

    $result = _date_range_limit(0, 12, 12, "m", "y", $result);

    return $result;
}


function _date_diff($one, $two)
{
    $invert = false;
    if ($one > $two) {
        list($one, $two) = array($two, $one);
        $invert = true;
    }

    $key = array("y", "m", "d", "h", "i", "s");
    $a = array_combine($key, array_map("intval", explode(" ", date("Y m d H i s", $one))));
    $b = array_combine($key, array_map("intval", explode(" ", date("Y m d H i s", $two))));

    $result = array();
    $result["y"] = $b["y"] - $a["y"];
    $result["m"] = $b["m"] - $a["m"];
    $result["d"] = $b["d"] - $a["d"];
    $result["h"] = $b["h"] - $a["h"];
    $result["i"] = $b["i"] - $a["i"];
    $result["s"] = $b["s"] - $a["s"];
    $result["invert"] = $invert ? 1 : 0;
    $result["days"] = intval(abs(($one - $two)/86400));

    if ($invert) {
        _date_normalize(&$a, &$result);
    } else {
        _date_normalize(&$b, &$result);
    }

    return $result;
}

//date
$rows->compid="";
foreach($query as $rows){
}
$colspan ="";
$cname="";
$msg="";
$msg.="
     <form name=\"\" method = \"POST\" action=\"".base_url()."admin/admin_booking/unpaid_branch/N/$sid/$rows->compid\">";
          if($rows->compid == ""){
                if($all == 1){
                    $msg.="  <table>
                                         <tr>
                                              <td>".anchor('admin/sales_report/allsalesrpt_by_branch/'.$billno.'/Y',"Paid")."</td>
                                              <td> &nbsp; </td>
                                              <td>".anchor('admin/sales_report/allsalesrpt_by_branch/'.$billno.'/N',"Unpaid")."</td>
                                      </tr>

                         <table>";
                 }else{
                  $msg.="  <table>
                                         <tr>
                                              <td>".anchor('admin/sales_report/salesrpt_by_branch/'.$billno.'/Y',"Paid")."</td>
                                              <td> &nbsp; </td>
                                              <td>".anchor('admin/sales_report/salesrpt_by_branch/'.$billno.'/N',"Unpaid")."</td>
                                      </tr>

                         <table>";
                 }
          }else{
                 $cname=$rows->comp_name;
                 if($all==1){
                      $msg.="  <table>
                                            <tr>
                                                 <td>".anchor('admin/sales_report/allsalesrpt_by_branch/'.$rows->brid.'/Y',"Paid")."</td>
                                                 <td> &nbsp; </td>
                                                 <td>".anchor('admin/sales_report/allsalesrpt_by_branch/'.$rows->brid.'/N',"Unpaid")."</td>
                                         </tr>

                            <table>";
                  }else{
                     $msg.="  <table>
                                            <tr>
                                         <td>".anchor('admin/sales_report/salesrpt_by_branch/'.$rows->compid.'/Y',"Paid")."</td>
                                                 <td> &nbsp; </td>
                                                 <td>".anchor('admin/sales_report/salesrpt_by_branch/'.$rows->compid.'/N',"Unpaid")."</td>
                                         </tr>

                            <table>";
                  }
         }
                $msg.="<table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
                                <h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\"> Sale List Detail of $cname</h3>
                                <tr bgcolor=\"#CCCCCC\">
                                    <th>S.No</th>
                                        <th> Sales Id</th>
                                        <th> Issue Date</th>
                                        <th> Dept from</th>
                                        <th> Dept To </th>
                                        <th> Name on Ticket</th>
                                        <th> Bus No.</th>
                                        <th> Departure Date </th>
                                        <th> No. of Seat</th>
                                        <th> Rate per seat</th>
                                        <th> Ticket Amount</th>";
					if($paid=='Y'){
						$colspan = "colspan=3";
						$msg.="<th> Receipt No</th>
                                        <th> Receipt Date</th>";
					}
                                        $msg.="<th> Action </th>
                                </tr>";
                                $i=1;
                                $tAmt=0.00;
                $cdate=date('Y-m-d');
        foreach($query as $rows){
        $ndate=$rows->dept_date;
        $dlist = _date_diff(strtotime($cdate), strtotime($ndate));


    if($rows->paid =="N" && $dlist["days"] > 30){
      $redstyle="style=color:red;";
    } else{
        $redstyle="";
    }
            $totalAmount=$rows->rate * $rows->no_of_seat;
                $rc="lcb";
              if($i%2==1) $rc="dcb";
                 $msg.="<tr class=\"$rc\">
                                <td>$i</td>
                                        <td>".anchor('admin/admin_booking/report_showticket/'.$rows->sales_id,"$rows->sales_id")."</td>
                                        <td>$rows->ticket_issue_date</td>
                                        <td>$rows->sfrom</td>
                                        <td>$rows->sto</td>
                                        <td>$rows->name_on_ticket</td>
                                        <td>$rows->bus_no</td>
                                        <td>$rows->dept_date</td>
                                        <td align=\"center\">$rows->no_of_seat</td>
                                        <td align=\"right\">".number_format($rows->rate,2)."</td>
                                        <td align=\"right\" $redstyle>".number_format($totalAmount,2)."</td>";
										if($paid=='Y'){
											$msg.="<td align=\"right\">$rows->reno</td>
											<td align=\"center\">$rows->recdate</td>";
										}
                                        $msg.="<td>[".anchor('admin/admin_booking/report_showticket/'.$rows->sales_id,"View")."]";
                                          if($rows->paid =="N"){
                                             $sales_category=$this->session->userdata('sales_category');
                         if($all==1){
                         if($sales_category == 'ad'){
                                                                $msg.="                                                                        
                                    [".anchor('admin/sales_report/allsalesrpt_by_branch_pay/N/'.$billno.'/'.$rows->sales_id,"Pay Now")."]
                                    ";

                                                        }else{
                                                          $msg.="
                                    [".anchor('admin/sales_report/allsalesrpt_by_branch_pay/N/'.$billno.'/'.$rows->sales_id,"Pay Now")."]

                          ";
                                                        }
                      }else{
                        if($sales_category == 'ad'){
                                                                $msg.="
                                    [".anchor('admin/sales_report/salesrpt_by_branch_pay/N/'.$billno.'/'.$rows->sales_id,"Pay Now")."]
                                    ";

                                                        }else{
                                                          $msg.="
                                    [".anchor('admin/sales_report/salesrpt_by_branch_pay/N/'.$billno.'/'.$rows->sales_id,"Pay Now")."]

                          ";
                                                        }
                      }

                                         }else{
                                           $msg.="";
                                         }
                                        $msg.="</td>
                            </tr>
                           ";
                $i++;
                 $tAmt+=$totalAmount;
    }


         $msg.="
           <tr  bgcolor=\"#C9C9C9\">
                           <th colspan=10 align=\"left\"> Total Amount </th>
                        <th align=\"right\">Rs. ".number_format($tAmt,2)." </th>
                        <th $colspan> &nbsp; </th>
           </tr>

         </table>";
     if($sid > 0){
        $msg.="  <link href=\"".base_url()."res/css/calendar.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"".base_url()."res/js/calendar.js\"></script>
        <br><table align=\"center\" style=\"border:1px solid #DDDDDD;\">
            <tr><td>Ticket No:</td><td>$sid</td><td>Branch Name:</td><td>$rows->comp_name</td></tr>
            <tr><td>Receipt No:</td><td><input type=\"text\" name=\"rno\" value=\"\"></td>
            <td>Received Date:</td><td><input type=\"text\" name=\"recdate\" onclick=\"displayDatePicker('recdate');\" value=\"".date('d-m-Y')."\"/>
                    <a href=\"javascript:void(0);\" onclick=\"displayDatePicker('recdate');\"><img src=\"".base_url()."res/css/images/calendar.png\" alt=\"calendar\" border=\"0\"></a></td></tr>
            <tr><td colspan=\"2\"></td><td><input type=\"submit\" name=\"submit\" value=\"Pay\">
            <input type=\"hidden\" name=\"unpid\" value=\"N\">
            <input type=\"hidden\" name=\"salesid\" value=\"$sid\">
            <input type=\"hidden\" name=\"compid\" value=\"$rows->compid\">
            </td></tr>

        </table>";
     }else{

        $msg.="  </form>";
}


echo $msg;
?>
