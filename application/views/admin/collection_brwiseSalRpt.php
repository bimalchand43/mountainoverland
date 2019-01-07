<?php
if($yr == ""){
 $dte_from= $dt_from;
 $dte_to = $dt_to;
}else{
 $dte_from="";
 $dte_to="";
}

 $cmbdays="<select name=\"daily\"><option value=\"\">Day</option>";
      for($i=1;$i<=31;$i++)
      {
        $checked="";
        if($i==$dly)
            $checked="selected";
        if($i <= 9)
           $ai = "0".$i;
        else
           $ai = $i;

        $cmbdays.="<option value=\"$ai\" $checked>$i</option><br>";
      }

      //$month='05';
      $cmbdays.="</select>";
    //echo $cmbdays;

    $cmbmonth="<select name=\"monthly\"><option value=\"\"> Month</option>";
      for($i=1;$i<=12;$i++)
      {
        switch($i)
        {
            case '01':
                $mname="Jan";
                break;
            case '02':
                $mname="Feb";
                break;
            case '03':
                $mname="Mar";
                break;
            case '04':
                $mname="Apr";
                break;
            case '05':
                $mname="May";
                break;
            case '06':
                $mname="Jun";
                break;
            case '07':
                $mname="Jul";
                break;
            case '08':
                $mname="Aug";
                break;
            case '09':
                $mname="Sep";
                break;
            case '10':
                $mname="Oct";
                break;

            case '11':
                $mname="Nov";
                break;
            case '12':
                $mname="Dec";
                break;
        }
        $checked="";
        if($i==$mnth)
            $checked="selected";
            if($i <= 9)
               $ai = "0".$i;
            else
               $ai = $i;
        $cmbmonth.="<option value=\"$ai\" $checked>$mname</option><br>";
      }


      $cmbmonth.="</select>";
    //echo $cmbmonth;

      $cmbyears="<select name=\"yearly\"><option value=\"\"> Year</option>";
      for($i=2010;$i<=2020;$i++)
      {
        $checked="";
       if($i==$yr)
            $checked="selected";
        $cmbyears.="<option value=\"$i\" $checked>$i</option><br>";
      }

      //$month='05';
      $cmbyears.="</select>";
?>

<script language="JavaScript">
         fucntion checkDate(dates){
            var d1=new Date();
            d1.toString('dd-mm-yyyy');
            alert();
         }

		</script>
<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>res/css/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>

<form name="ticket" method="POST" action="<?php echo $action; ?> ">
	    <table class="tblsearch" align="center" style="border:2px solid #CCC;" width="100%">
        <tr class="img">
              <th colspan="4"><h3>Collection Management</h3><br></th>
        </tr>
			<tr>
                <td> Select Year :</td>
                <td align="left"><?php echo $cmbyears; ?></td>
                <td>Select Month :</td>
                <td align="left"><?php echo $cmbmonth; ?></td>
               <!-- <td>Select Day :</td>
                <td align="left"><?php echo $cmbdays; ?></td>  -->

            </tr>
            <tr>
                <td colspan="4" align="center"> OR</td>
            </tr>
            <tr>
                <td> Date From : </td>
                <td><input type="text" name="date_from" onclick="displayDatePicker('date_from');" value="<?php echo $dte_from;?>"/>
                    <a href="javascript:void(0);" onclick="displayDatePicker('date_from');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a> </td>
                <td>Date To : </td>
                <td><input type="text" name="date_to" onclick="displayDatePicker('date_to');" value="<?php echo $dte_to;?>"/>
                    <a href="javascript:void(0);" onclick="displayDatePicker('date_to');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a> </td>
            </tr>


            <tr>
				<td colspan="4" align="right">
                     <input type="submit" name="submit" value="Search >>" />
                     <input type="submit" onSubmit="window.location.reload();" value="Reset">
                     <input type="hidden" name="single" value="S" />
                </td>
			</tr>

		</table>
	</form>
<?php
 if(isset($_POST['submit'])){
      $msg="";
      $msg.="
           <script language='JavaScript'>
                       function printpage(urls)
      		  {
      		   //window.print();
      		 	var url= urls;
      			newwindow=window.open(url,'Print Ticket','height=800,width=850,scrollbars=yes');
      			if (window.focus) {newwindow.focus()}
      			return false;
      		  }
              </script>
           <form>
                              <table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
                                      <h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\">Collection from Branch Wise Total Sales Report</h3>
                                      <tr bgcolor=\"#CCCCCC\">
                                          <th>S.No</th>
                                              <th> Branch Name</th>
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
             if($yr == ""){
               $link='collection_branch_print/'.$dte_from.'/'.$dte_to;
             }else{
              if($mnth == ""){
                      $mth=0;
                      $link='collection_branch_print/'.$yr.'/'.$mth.'/Y';

                  }else{
                   $mth=$mnth;
                   $link='collection_branch_print/'.$yr.'/'.$mth.'/Y';
                  }
              }
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
                 <tr>
                      <td colspan=\"10\" align=\"right\"> <a href=\"javascript:void(0);\" onClick=\"printpage('$link');\"><b>Print >></b></a></td>
                 </tr>

               </table>
        </form>
      ";


      echo $msg;
 }
?>
