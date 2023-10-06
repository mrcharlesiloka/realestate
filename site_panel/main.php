<?php
include('inc/config.php');
include('header.php')

?>

<div id="content">
<?php
include('menu_s.php')

?>
  <div id="main">
			  <?php
include('inc/forms.php');
?>	
			
<div class="full_w">
<div class="h_title">Admin Panel v2.0 - Welcome</div>
<img src="img/mast.jpg" width="600" height="100" /></div>
<div class="clear"></div>
		   <div class="full_w">
<div class="h_title">Recent Properties in Gallery.</div>
		
</div>
<div class="g_wrapper">
    <?php
    $sql = "SELECT * FROM $gallery WHERE pic !='' ORDER BY id DESC LIMIT 8";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo '<div style="text-align:center;" > No Properties in Gallery.</div><br/>';
    } else {
        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $img_name = $rows['pic'];
            $img_title = $rows['title'];
            $img_id = $rows['id'];
            $images = "gallery/$img_name";
            $image = "<img width='100' height='70' src='gallery/$img_name' alt='$img_title' />";
            // Store all images in one variable
            $all_img = $img_name . $image;
            ?>
            <div class="g_box" align="center">
                <?php echo $img_title; ?><br/>
                <a href="photo_details.php?id=<?php echo $img_id ?>"><?php echo $image; ?></a>
                &nbsp; </p>
            </div>
            <?php
        }
    }
    ?>
</div>

<br>
<div align="right"><div class="button">
	<a href="gallery.php">More Entries</a></div>
	</div>
  </div>
		
</div>

	<?php
include('footer.php')

?>
