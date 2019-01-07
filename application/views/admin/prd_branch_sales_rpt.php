<?php
$msg="";

if($para1 == "period"){
$msg.="

     <table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
	    <h3 style=\"background-color: #DEDEFC; width:98%; text-align: left;\">Periodic Sales Report</h3>
        <tr bgcolor=\"#CCCCCC\">
            <th> Year </th>
			<th> Paid no of Ticket </th>
            <th> Paid Amount </th>
            <th> Unpaid no of Ticket</th>
			<th> Unpaid Amount</th>
            <th align=\"right\">Total Bill Amount</th>
            <th>Action</th>
        </tr>
        ";
        $i=0;
		$paidno =0;
		$paidAmt=0.00;
		$unpaidno =0;
		$unpaidAmt=0.00;
		$tAmt=0.00;
        foreach($query as $rows){
		$totalbill=$rows->paid_amt + $rows->unpaid_amt;
		//echo $rows->nos;
        $rc="lcb";
      	if($i%2==1) $rc="dcb";
        $msg.="
        <tr class=\"$rc\">
            <td align=\"center\">".anchor('admin/branch_sales_report/periodicSalesReport/yearly/'.$rows->tyear,"$rows->tyear")."</td>
            <td align=\"center\">".$rows->paid_tick."</td>
			<td align=\"center\">".number_format($rows->paid_amt,2)."</td>
			<td align=\"center\">".$rows->unpaid_tick."</td>
			<td align=\"center\">".number_format($rows->unpaid_amt,2)."</td>
            <td align=\"right\">Rs. ".number_format($totalbill,2)."</td>
            <td align=\"center\">[".anchor('admin/branch_sales_report/periodicSalesReport/yearly/'.$rows->tyear,"View")."]</td>
        </tr>
        ";
        $i++;
		$paidno+=$rows->paid_tick;
        $paidAmt+=$rows->paid_amt;
		$unpaidno+=$rows->unpaid_tick;
        $unpaidAmt+=$rows->unpaid_amt;
		$tAmt +=$totalbill;
        }
        $msg.="
		           <tr bgcolor=\"#CCCCCC\">
                       <th><b>Total :</b> </th>
                       <th align=\"center\"><b> $paidno </b></th>
					   <th align=\"center\"><b>Rs. ".number_format($paidAmt,2)."</b></th>
					   <th align=\"center\"><b> $unpaidno </b></th>
					   <th align=\"center\"><b>Rs. ".number_format($unpaidAmt,2)."</b></th>
                       <th align=\"right\"><b>Rs. ".number_format($tAmt,2)." </b></th>
                       <th> &nbsp; </th>

                   </tr>
      </table>
      ";
  }
  if($para1 =="yearly"){
   $msg.="

         <table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
              <h3 style=\"background-color: #DEDEFC; width:98%; text-align: left;\">Sales Reports on Year : $year</h3>

				<tr bgcolor=\"#CCCCCC\">
	               <th>Year</th>
                   <th>Month</th>
                   <th> Paid no of Ticket </th>
					<th> Paid Amount </th>
					<th> Unpaid no of Ticket</th>
					<th> Unpaid Amount</th>
                   <th>Total Amount</th>
                   <th>Action</th>
            	</tr>";
         $i=0;
          $catid=0;
          $k=0;
          $paidno =0;
			$paidAmt=0.00;
			$unpaidno =0;
			$unpaidAmt=0.00;
			$tAmt=0.00;
           foreach($query_yearly as $rows)
           {
		     $totalbill=$rows->paid_amt + $rows->unpaid_amt;
		     $mybg="bgcolor=\"#EAEAEA\"";
              $j=$i+1;
             $rc="lcb";
         	if($i%2==1) $rc="dcb";
                        $msg.="
                                 <tr class=\"$rc\">
                                    <td> ".$rows->yr."</td>
        				            <td>".anchor('admin/branch_sales_report/periodicSalesReport/monthly/'.$rows->yr.'/'.$rows->mn,"$rows->mn")."</td>
                                    <td align=\"center\">".$rows->paid_tick."</td>
									<td align=\"center\">".number_format($rows->paid_amt,2)."</td>
									<td align=\"center\">".$rows->unpaid_tick."</td>
									<td align=\"center\">".number_format($rows->unpaid_amt,2)."</td>
                                    <td align=\"right\">".number_format($totalbill,2)."</td>
                                    <td>[".anchor('admin/branch_sales_report/periodicSalesReport/monthly/'.$rows->yr.'/'.$rows->mn,"View")."]</td>
        		                </tr>
                            ";

                $i++;
                $paidno+=$rows->paid_tick;
				$paidAmt+=$rows->paid_amt;
				$unpaidno+=$rows->unpaid_tick;
				$unpaidAmt+=$rows->unpaid_amt;
				$tAmt +=$totalbill;
           }
            $msg.="<tr bgcolor=\"#CCCCCC\">
                       <th colspan=2 align=\"left\"><b>Total : </b></th>
					   <th align=\"center\"><b> $paidno </b></th>
					   <th align=\"center\"><b>Rs. ".number_format($paidAmt,2)."</b></th>
					   <th align=\"center\"><b> $unpaidno </b></th>
					   <th align=\"center\"><b>Rs. ".number_format($unpaidAmt,2)."</b></th>
                       <th align=\"right\"><b>Rs. ".number_format($tAmt,2)." </b></th>
                       <th> &nbsp; </th>


            </table>


            ";
  }

  if($para1=="monthly" || $para1 == "datewise"){
  $stitle = "Sales Reports on Month : $para3";
  if($para1 == "datewise"){
    $stitle = "Sales Report From : $stdate To : $enddate";
  }
	  $msg=" <link href=\"".base_url()."res/css/calendar.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"".base_url()."res/js/calendar.js\"></script>
			<table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
              <h3 style=\"background-color: #DEDEFC; width:98%; text-align: left;\">$stitle</h3>
                <tr><td colspan=\"9\"><form name=\"dsales\" method=\"post\" action=\"".base_url()."admin/branch_sales_report/periodicSalesReport/datewise\">
                <table width=\"100%\" style=\"border:1px solid #DDDDDD;\">
                       <tr><td>Date From:</td><td><input type=\"text\" name=\"dfrom\" onclick=\"displayDatePicker('dfrom');\" value=\"\"/>
                    <a href=\"javascript:void(0);\" onclick=\"displayDatePicker('dfrom');\"><img src=\"".base_url()."res/css/images/calendar.png\" alt=\"calendar\" border=\"0\"></a></td>
                       <td>Date To:</td><td><input type=\"text\" name=\"dto\"  onclick=\"displayDatePicker('dto');\" value=\"\"/>
                    <a href=\"javascript:void(0);\" onclick=\"displayDatePicker('dto');\"><img src=\"".base_url()."res/css/images/calendar.png\" alt=\"calendar\" border=\"0\"></a></td>
                    <td><input type=\"submit\" name=\"submit\" value=\"Search>>\"></td></tr>
                </table>
                </form>
              <td></tr>
					<tr style=\"background-color:#C9C9C9;\" align=\"center\">
					   <th>Date</th>
					   <th> Paid no of Ticket </th>
					   <th> Paid Amount </th>
					   <th> Unpaid no of Ticket</th>
					   <th> Unpaid Amount</th>
					   <th>Total Amount</th>
					   <th>Action</th>
					</tr>";
			   $i=0;
			   $catid=0;
			   $paidno =0;
				$paidAmt=0.00;
				$unpaidno =0;
				$unpaidAmt=0.00;
				$tAmt=0.00;
			  foreach($query_monthly as $rows)
			   {  /*echo "<pre>";
				  print_r($row);
				  echo "</pre>"; die();
	*/             $totalbill=$rows->paid_amt + $rows->unpaid_amt;
				  $mybg="bgcolor=\"#EAEAEA\"";
				  $j=$i+1;
				   $rc="lcb";
         	       if($i%2==1) $rc="dcb";
                        $msg.="
                                 <tr class=\"$rc\">
										<td align=\"center\">".anchor('admin/branch_sales_report/periodicSalesReport/daily/'.$rows->dt,"$rows->dt")."</td>
										<td align=\"center\">".$rows->paid_tick."</td>
										<td align=\"center\">".number_format($rows->paid_amt,2)."</td>
										<td align=\"center\">".$rows->unpaid_tick."</td>
										<td align=\"center\">".number_format($rows->unpaid_amt,2)."</td>
										<td align=\"right\">".number_format($totalbill,2)."</td>
										<td align=\"center\">[".anchor('admin/branch_sales_report/periodicSalesReport/daily/'.$rows->dt,"View")."]</td>
									</tr>
								";

					$i++;
					$paidno+=$rows->paid_tick;
					$paidAmt+=$rows->paid_amt;
					$unpaidno+=$rows->unpaid_tick;
					$unpaidAmt+=$rows->unpaid_amt;
					$tAmt +=$totalbill;
					//echo $total;
			   }

			   $msg.="
					   <tr bgcolor=\"#C9C9C9\">
					        <th align=\"left\"><b>Total : </b></th>
							<th align=\"center\"><b> $paidno </b></th>
						   	<th align=\"center\"><b>Rs. ".number_format($paidAmt,2)."</b></th>
						   	<th align=\"center\"><b> $unpaidno </b></th>
						   	<th align=\"center\"><b>Rs. ".number_format($unpaidAmt,2)."</b></th>
							<th align=\"right\"><b>Rs.  ".number_format($tAmt,2)." </b></th>
							 <th> &nbsp; </th>
					   </tr>

				</table>
				</form>

				";
       }

	 if($para1 == "daily"){

	  $msg="
			<table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
              <h3 style=\"background-color: #DEDEFC; width:98%; text-align: left;\">Sales Reports on Date : $para2</h3>
				<tr style=\"background-color:#C9C9C9;\" align=\"center\">
					<th style=\"text-align:left\">Sales ID</th>
					<th style=\"text-align:center\">Departure Date</th>
					<th>Bus No.</th>
					<th>Dept from </th>
					<th>Dept To</th>
					<th>Name on Ticket</th>
					<th>Ticket Amount</th>
					<th>Paid/Unpaid</th>
					<th>Action</th>
				</tr>";
			$i=0;
			$totalBillAmt=0.00;
			 foreach($query_daily as $row){

					$j=$i+1;
					$rc="lcb";
         	        if($i%2==1) $rc="dcb";
                        $msg.="
                         <tr class=\"$rc\">
							<td>".anchor('admin/admin_booking/report_showticket/'.$row->sales_id,"$row->sales_id")."</td>
							<td>$row->dept_date</td>
							<td>$row->bus_no</td>
							<td>$row->sfrom</td>
							<td>$row->sto</td>
							<td>$row->name_on_ticket</td>
							<td align=\"right\">".number_format($row->rate * $row->no_of_seat,2)."</td>
							<td align=\"center\">$row->paid_tick</td>
							<td>[".anchor('admin/admin_booking/report_showticket/'.$row->sales_id,"View")."]</td>
						</tr>
							";
					$i++;
					$totalBillAmt+= $row->rate * $row->no_of_seat;

			}


			$msg.="
					<tr bgcolor=\"#C9C9C9\">
						<th colspan=\"6\" align=\"left\"> <b>Total : </b> </th>
						<th align=\"right\">NRs ".number_format($totalBillAmt,2)."</th>
						<th> &nbsp; </th>
						<th> &nbsp; </th>
					</tr>
			</table>

			";

	 }

   echo $msg;
?>
