<?php
include('inc/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Da Netseer" />
<title>Admin Panel v2.0</title>
<link rel="shortcut icon" href="img/favicon.gif">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/metallic.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script LANGUAGE="JavaScript">	
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

</head>
<body>
<div class="wrap">
<div id="header"></div>
<div id="main">
			<div class="full_w">
			<div class="left">
				<p>Now <strong>Logged In</strong></p>
			</div>
			<div class="align-right">
					<p><strong><script>
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
                    </script></strong>&nbsp;&nbsp; [ <a href="index.php">Login Admin</a> ]</p>
				</div>
			</div></div>


<div id="content">

  <div id="main">   
  <?php
include('inc/forms.php');
?>
  
        <div class="clear"></div>
		    <div class="full_w">
              <div class="h_title">Admin Info</div>
			  <form action="" method="post" >
		      <div class="button">
                <input name="deleteadmin" type="submit" id="delete" onclick="return confirm_delete()" value="Delete Selected" />
			  </div>
<table width="100%">
<thead>
<?php
$sql2 = "SELECT * FROM $admin";
$result2 = mysqli_query($connect, $sql2);
while ($rows2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
?>

<tr>
    <th width="14%"><input name="deleteadminsselect[<?php echo $rows2['admin_id']; ?>]" type="checkbox" id="checkbox[<?php echo $rows2['admin_id']; ?>]" value="<?php echo $rows2['admin_id']; ?>" /></th>
    <td width="37%"><div align="left">
        <?php echo $rows2['name']; ?></div></td>
    <td width="24%"><?php echo $rows2['userid']; ?></td>
    <td width="25%"><?php echo $rows2['accesscode']; ?></td>
</tr>
<?php
}
?>

</thead>
</table>
</form>
<div align="center">
 <form action="" method="post">
			  <div class="element">
                  <label>Account Name:</label>
                  <input type="text"  name="name" id="name"  placeholder="Account Name" required=""/>
                </div>
		        <div class="element">
                  <label>Username: </label>
                  <input type="text" name="userid" id="userid"  placeholder="Username" required=""/>
                </div >
		        <div class="element">
                  <label>Password:</label>
                  <input id="accesscode" class="alignRight" type="text"  name="accesscode"  placeholder="Password" required=""/>
                </div>
		        <div class="element">
                  <button type="submit" class="add" name="newadmin" id="newadmin"onclick="return confirm_submit()" >Create New Admin</button>
	            </div>
	          </form>
    </div>
	</div>
		    
  </div>
		<div class="clear"></div>
</div>

	<?php
include('footer.php')

?>
