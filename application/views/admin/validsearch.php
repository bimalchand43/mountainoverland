<?php
$routefrom="<select name=\"cboFrom\">";
 foreach($query_city as $rows){ 	
    $routefrom.="<option value=\"$rows->city_name\">$rows->city_name</option>";	
}
 $routefrom.="</select>";
 
 $routeto="<select name=\"cboTo\">";
 foreach($query_city as $row){ 
   
    $routeto.="<option value=\"$row->city_name\">$row->city_name</option>";	
}
 $routeto.="</select>";
?>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>res/css/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>
<b><font color="red"><?php if(isset($_POST['submit'])){
	echo "<p style='border:2px solid #00FF99; text-align:center;background-color:#FFFFFF;'>$vdate </p>";

}?>  </font></b>
    <form name="" method="post" action="../admin_booking/busSearch">
            <table class='tblsearch' width=100% border=0 cellpadding="5" cellspacing="2">
                <tr class="img">
                    <th colspan="10"><h3>Online Bus Tickets Booking</h3></th>
                </tr>
                <tr>
                    <td>Departure From </td>
                     <td><?php echo $routefrom; ?></td>
                    <td>Arrival To</td>
                     <td><?php echo $routeto; ?></td>
                    <td colspan=2>Departure date</td>
                     <td colspan="2"><input type="text" name="dept_date" onclick="displayDatePicker('dept_date');" value=""/>
                    <a href="javascript:void(0);" onclick="displayDatePicker('dept_date');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a></td>
                    <td align="left"><input type="submit" name="submit" value="Search >>" /></td>
                </tr>
                
            </table>
       </form>
      <hr/>
  
