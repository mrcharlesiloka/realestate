<?php
session_start();
if(isset($_SESSION["userid"])) {
  header("location: main.php");
  exit();
}
require_once('inc/config.php');
require_once('../f_config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Da Netseer" />
<title>Admin Panel v3.0</title>
<link rel="shortcut icon" href="img/favicon.gif">
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
</head>
<body>
<div class="wrap">
	<div id="content">
	  <div id="main">`
        <div class="full_w">
		<div align="center"><img src="img/mast.jpg" width="400" /></div>
		  <div class="sep"></div>
			  <?php
include('inc/forms.php');
?>	
<div class="sep"></div>
          <form action="" method="post" >
            <label for="login">Username:</label>
            <input id="adminid" name="adminid" class="text" autocomplete="off" placeholder="Username" required=""/>
            <label for="pass">Password:</label>
            <input id="pwd" name="pwd" type="password" class="text" placeholder="Password"required=""/>
            <div class="sep"></div>
            <button type="submit" name="index" class="ok">Login</button> <button type="reset" class="cancel">Clear</button>
          </form>
        </div>
	    <div class="footer">&raquo; &nbsp;<a href="../">Back to <?php echo $site_title ?></a></div>
      </div>
	</div>
</div>

</body>
</html>
