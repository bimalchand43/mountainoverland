<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Login</title>
 </head>
 <body>
 
 <center>
   <img src="/res/images/logo.jpg" width=\"200\" height=\"100\"/>
   <h3><?php echo $title;?></h3>
   <?php echo $this->session->flashdata('message'); ?>

    <form method="post" action="<?php echo $action; ?>">
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
  </center> 
 </body>
</html>