<?php

$msg="";
$msg.="
     <form>
                        <table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
                                <h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\">Branch Wise Total Sales Report</h3>
                                <tr bgcolor=\"#CCCCCC\">
                                    <th>S.No</th>
                                        <th> Branch Name</th>
                                        <th> Piad no of Ticket</th>
                                        <th> Paid Amount </th>
                                        <th> Unpiad no of Ticket</th>
                                        <th> Unpaid Amount</th>
                                        <th> Total Ticket Amount</th>
                                        <th>Sales Of</th>
                                </tr>";
                                $i=1;
                                $tAmt=0.00;
                                $paidno =0;
                                $paidAmt=0.00;
                                $unpaidno =0;
                                $unpaidAmt=0.00;
        foreach($query as $rows){
                $rc="lcb";
              if($i%2==1) $rc="dcb";
                 $msg.="<tr class=\"$rc\">
                                <td>$i</td>
                                        <td>".anchor('admin/sales_report/total_sales_by_agency/'.$rows->compid.'/'.$rows->brid,"$rows->comp_name")."</td>
                                        <td align=\"center\">$rows->paid_tick</td>
                                        <td align=\"right\">".number_format($rows->paid_amt,2)."</td>
                                        <td align=\"center\">$rows->unpaid_tick</td>
                                        <td align=\"right\">".number_format($rows->unpaid_amt,2)."</td>
                                        <td align=\"right\">".number_format($rows->amount,2)."</td>
                                        <td align=\"center\">[".anchor('admin/sales_report/salesrpt_by_branch/'.$rows->compid.'/N',"Branch")."]
                    [".anchor('admin/sales_report/total_sales_by_agency/'.$rows->compid.'/'.$rows->brid,"Agency")."]
                    [".anchor('admin/sales_report/allsalesrpt_by_branch/'.$rows->brid.'/N',"All")."]</td>
                            </tr>
                           ";
                $i++;
                $paidno+=$rows->paid_tick;
        $paidAmt+=$rows->paid_amt;
                $unpaidno+=$rows->unpaid_tick;
        $unpaidAmt+=$rows->unpaid_amt;
                $tAmt+=$rows->amount;
    }


         $msg.="
           <tr  bgcolor=\"#C9C9C9\">
                           <th colspan=2 align=\"left\"> Total </th>
                        <th align=\"center\"> $paidno </th>
                        <th align=\"right\">Rs. ".number_format($paidAmt,2)." </th>
                        <th align=\"center\"> $unpaidno </th>
                        <th align=\"right\">Rs. ".number_format($unpaidAmt,2)." </th>
                        <th align=\"right\">Rs. ".number_format($tAmt,2)." </th>
                        <th>&nbsp;</th>
           </tr>

         </table>
  </form>
";


echo $msg;
?>
