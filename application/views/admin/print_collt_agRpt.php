<html>
<head>
  <link href="<?php echo base_url(); ?>res/css/printTicket.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
	 <div class="print_info">
	  <table>
          <tr>
		      <td><img src="/res/images/logo.jpg"/></td>
		      <td><?php $this->load->view('ticketHeader.php');?> </td>
	      </tr>
	  </table>
<?php
$msg="";
$msg.="
     <style type=\"text/css\">
				@media print {
					input#btnPrint {
						display: none;
					}
				}
			</style>

		<script language=\"javascript\">
		 function printpage()
		  {
		   window.print();
		  }
		</script>
        <link href=\"".base_url()."res/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />

        <form>
                        <table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
                                <h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\">Collection from Agency Wise Total Sales Report</h3>
                                <tr bgcolor=\"#CCCCCC\">
                                    <th>S.No</th>
                                        <th> Agency Name</th>
                                        <th> Total Ticket Amount</th>
                                        <th> Piad no of Ticket</th>
                                        <th> Paid Amount </th>
                                        <th> Unpiad no of Ticket</th>
                                        <th> Unpaid Amount</th>
                                        <th>Amount</th>
                                        <th>Receipt No.</th>
                                        <th>Date</th>
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
                                        <td>$rows->comp_name</td>
                                        <td align=\"right\">".number_format($rows->amount,2)."</td>
                                        <td align=\"center\">$rows->paid_tick</td>
                                        <td align=\"right\">".number_format($rows->paid_amt,2)."</td>
                                        <td align=\"center\">$rows->unpaid_tick</td>
                                        <td align=\"right\">".number_format($rows->unpaid_amt,2)."</td>
                                        <td>____________</td>
                                        <td>____________</td>
                                        <td>____________</td>
                            </tr>
                           ";
                $i++;
                $paidno+=$rows->paid_tick;
        $paidAmt+=$rows->paid_amt;
                $unpaidno+=$rows->unpaid_tick;
        $unpaidAmt+=$rows->unpaid_amt;
                $tAmt+=$rows->amount;
    }

        $link="/collection_agency_print/";
         $msg.="
           <tr  bgcolor=\"#C9C9C9\">
                           <th colspan=2 align=\"left\"> Total </th>
                           <th align=\"right\">Rs. ".number_format($tAmt,2)." </th>
                           <th align=\"center\"> $paidno </th>
                           <th align=\"right\">Rs. ".number_format($paidAmt,2)." </th>
                           <th align=\"center\"> $unpaidno </th>
                           <th align=\"right\">Rs. ".number_format($unpaidAmt,2)." </th>
                           <th colspan=\"4\">&nbsp;</th>
           </tr>

         </table>
  </form>
  <br><br><br>
  <table width=\"100%\">
  <tr><td>____________</td><td align=right>___________</td></tr>
  <tr><td>Prepared By</td><td align=right>Approved By</td></tr>
  <tr><td colspan=\"2\" align=\"center\"><p style=\"padding-right:50px;\"><input type=\"button\" id=\"btnPrint\" value=\"Print &gt;&gt;\" onclick=\"printpage();\"/></p>
</td></tr>
</table>
";


echo $msg;
?>
</div>
</body>
</html>
