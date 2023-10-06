<?php
include('inc/config.php');
include('header.php');
$admin_id=$_SESSION['admin_id'];
// Retrieve data from database 
$sql="SELECT * FROM $admin WHERE admin_id=$admin_id";
$result=mysqli_query($connect,$sql);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div id="content">
<?php
include('menu_s.php')

?>
  <div id="main">
    		    <div class="half_w half_right">
              <div class="h_title">View Details</div>
			  <div align="center"></div>
					<form>
			<div class="element">
                                <label>Account Name:</label>
                                <span><?php echo $rows['name']; ?><span/>
              </div>
			  <div class="element">
                            <label>Username: </label>
                            <span><?php echo $rows['userid']; ?><span/>
              </div >
						   <div class="element">
                                <label>Password:</label>
                                 <span><?php echo $rows['accesscode']; ?><span/>
                         </div>
						</form>
</div>
 <div class="half_w half_right">
              <div class="h_title">Edit Admin Details</div>
			  <div align="center">
			  <?php
include('inc/forms.php');
?>	
			</div>
			<form action="" method="post">
			<div class="element">
			<span>*Ensure to Use entries you will remember and always keep your password private.</span>
			</div>
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
								<input name="admin_id" type="hidden" id="admin_id" value="<?php echo $rows['admin_id']; ?>">
                         </div>
						<div class="element" align="right">
	<button type="submit" class="editadmin" name="editadmin" id="add"onclick="return confirm_submit()" >Edit Admin Details</button>
</div>
</form>
</div>
  </div>
		<div class="clear"></div>
</div>

	<?php
include('footer.php')

?>
