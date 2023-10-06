<?php 
	session_start();
	
	// set inactive timing to 30minutes of idileness
	$inactive = 60*60;
	 
	if (isset($_SESSION["timeout"])) {
	    // calculate the session's "time to live"
	    $sessionTTL = time() - (int)$_SESSION["timeout"];
	    if ($sessionTTL > $inactive) {
	        session_destroy();
	        header("Location: index.php");
			exit();
	    }
	}
	 
	$_SESSION["timeout"] = time();
	
	
if(!isset($_SESSION['userid'])){
     header( 'Location: index.php' );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Da Netseer" />
<title>Admin Panel v3.0</title>
<link rel="shortcut icon" href="img/favicon.gif">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" href="css/zebra_datepicker.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/metallic.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/zebra_datepicker.js"></script>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
        tinymce.init({
            selector: "#textarea"
        });
    </script>
	
<script LANGUAGE="JavaScript">	
$(document).ready(function() {

    // assuming the controls you want to attach the plugin to
    // have the "datepicker" class set
    $('input.datepicker').Zebra_DatePicker();

});
<!--
function confirm_delete()
{
var agree=confirm("Are you sure you want to delete?");
if (agree)
return true ;
else
return false ;
}
// -->

<!--
function confirm_submit()
{
var agree=confirm("Are you sure you want to Submit?");
if (agree)
return true ;
else
return false ;
}
// -->
</script>
<script type="text/javascript" language="javascript">// <![CDATA[
function checkAll(deletegalleryform, checktoggle)
{
  var checkboxes = new Array(); 
  checkboxes = document[deletegalleryform].getElementsByTagName('input');
 
  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      checkboxes[i].checked = checktoggle;
    }
  }
}
// ]]></script>
<style type="text/css">
.g_wrapper {
  display: grid;
  grid-template-columns: 150px 150px 150px 150px;
  grid-gap: 5px;
  background-color: #fff;
  color: #444;
}

.g_box {
  background-color: #444;
  color: #fff;
  border-radius: 5px;
  padding: 5px;
  font-size: 100%;
}
</style>
</head>
<body>
<div class="wrap">
<div id="header">
		<div id="top">
			<div class="left">
				<p>Welcome, <strong><?php echo $_SESSION['name']; ?></strong></p>
			</div>
			<div class="right">
				<div class="align-right">
					<p>Login Time: <strong><script>
var mydate=new Date()
var theYear=mydate.getFullYear()
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
document.write(dayarray[day]+", "+montharray[month]+" "+daym+", "+theYear)
                    </script></strong></p>
				</div>
			</div>
		</div>
	  <?php
include('menu_h.php')

?>
<div id="main"></div>
