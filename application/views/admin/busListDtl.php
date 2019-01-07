<?php
//echo $dptdate;
//echo "not booked this date";
$msg="";

foreach($buslist as $rows){

}
$msg.="<form>
      <table class=\"tbl_border\"  cellspacing=2 cellpadding=3 bgcolor=\"\" width=100%>
      <tr>
          <td colspan=7 class=\"img\"><h3><center>From $rows->rFrom  To $rows->rTo  for Date: $dptdate</h3></td>
      </tr>
      <tr bgcolor=\"#CCCCCC\">
            <th>No</th>
            <th>Bus Name</th>
            <th>Bus No.</th>
            <th>From</th>
            <th>To</th>
            <th>AVL Seat</th>
            <th>Fare</th>
            <th>Dept.Time</th>
            <th>Action</th>
        </tr>
        ";
   $i=1;
   foreach($buslist as $row){
   //echo $row->busName;

        $msg.="<tr>
                    <td> $i </td>
                    <td>".$row->busName."
                      <!--  <br/><div id='viewDtls'>[ ".anchor('admin/admin_booking/busDetails/'.$row->bus_id,'View Details')." ]</div>-->
						<input type=\"hidden\" name=\"dptdate\" value=\"$dptdate\"/>
                    </td>
                    <td>".$row->busNo." </td>
                    <td> ".$row->rFrom."</td>
                    <td>".$row->rTo."</td>
                    <td>".$row->totalSeat." </td>
                    <td> NRs.".number_format($row->fare,2)."</td>
                    <td>".$row->departure_time."</td>
                    <td id='selectButn'>".anchor('admin/admin_booking/selectSeats/'.$row->bus_id.'/'.$dptdate,'Select Seat')."</td>
               </tr> ";

         $i++;
   }
   $msg.=" </table>
</form>
 ";
 echo $msg;
?>

