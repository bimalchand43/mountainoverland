<?php
$msg="         
        <form name=\"frmtbladmin\" method=\"POST\" action=\"\">
            <table cellpadding=\"0\" cellspacing=\"1\"  width=\"100%\" style=\"border:1px solid #C9C9C9; \">
 
            	<tr>
					<td colspan=5><center><h3>Sales Reports on Year : $year</h3><center></td>
				</tr>
				<tr style=\"background-color:#C9C9C9;\" align=\"center\">
	               <th width=\"15%\">Year</th>
                   <th width=\"15%\">Month</th>
                   <th width=\"35%\">Total Sales</th>
                   <th width=\"20%\">Total Amount</th>
                   <th width=\"15%\">Action</th>
            	</tr>";
         $i=0;
          $catid=0;
          $k=0;
          $result=0;
          $tAmt=0;
           foreach($query as $row)
           {    $mybg="bgcolor=\"#EAEAEA\"";
              $j=$i+1;
              $trcol="#EFEFEF";
              if($i%2==0)
                      $mybg=" bgcolor=\"$trcol\"";
                        $msg.="
                                 <tr $mybg  align=\"center\">
                                    <td> ".$row->yr."</td>
        				            <td><a href=\"orderman.php?action=viewMnth&yr=".$row->yr."&mn=".$row->mn."\">".$row->mn."</a></td>
                                    <td>".$row->nos."</td>
                                    <td align=\"right\">".number_format($row->TotalAmt,2)."</td>
                                    <td>[<a href=\"orderman.php?action=viewMnth&yr=".$row->yr."&mn=".$row->mn."\">View</a>]</td>
        		                </tr>
                            ";

                $i++;
                $result+=$row->nos;
                 $tAmt+=$row->TotalAmt;
           }
            $msg.="<tr bgcolor=\"#C9C9C9\">
                       <td>
                            <b>Total : </b>
                       </td>

                       <td>
                           &nbsp;
                       </td>

                       <td align=\"center\">
                           <b> $result </b>
                       </td>
                       <td align=\"right\"><b>".number_format($tAmt,2)."</b></td>
                       <td> &nbsp; </td>


            </table>
            </form>

            ";


echo $msg;
?>
