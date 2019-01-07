<?php
    $loginForm = "";
    $loginForm = "
         <form name=\"ulogin\">
         <table>
              <tr>
                  <th colspan=\"2\">User Login</th>
              </tr>
              <tr>
                  <td>Email</td>
                  <td><input type=\"text\" name=\"uemail\">
              </tr>
              <tr>
                  <td>Password</td>
                  <td><input type=\"password\" name=\"upass\">
              </tr>
              <tr>
                  <th colspan=\"2\">
                    <input type=\"submit\" value=\"Login\">
                  </td>
              </tr>

         </table>
         </form>
         ";

   echo $loginForm;

?>
