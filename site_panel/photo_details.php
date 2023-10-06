<?php
include('inc/config.php');
include('header.php');
// get value of id that sent from address bar
$id=$_GET['id'];

// Retrieve data from database 
$sql="SELECT * FROM $gallery WHERE id='$id'";
$result=mysqli_query($connect,$sql);
$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
$img_name = $rows['pic'];
$img_cat = $rows['category'];
$img_title = $rows['title'];
$img_type = $rows['gal_type'];
$img_price = $rows['price'];
$img_avail = $rows['avail'];
$img_location = $rows['location'];
$img_caption = $rows['caption'];
?>
<div id="content">
<form action="" method="post" enctype="multipart/form-data">
<?php
include('menu_s.php')

?>
  <div id="main">
    <div class="full_w" align="right">
      <div class="button"> <a href="javascript:history.back(1)">Click To Go Back</a></div>
	   <div align="center">
			  <?php
include('inc/forms.php');
?>
</div>
             </div>
    <div class="clear"></div>
		   <div class="half_w half_right">
    <div class="h_title">Photo </div>
    <table>
        <tr>
            <td align="center">
                <?php 
                if ($rows['pic']) { 
                    $img_name = $rows['pic'];
                    $imagepath = "<img width='300' src='gallery/$img_name'>"; 
                    echo $imagepath; 
                } else {
                    echo "<img width='100' height='100' src='gallery/no_image.png'>";
                }	
                ?>
            </td>
        </tr>
        <tr>
            <td><strong>Availability:</strong> <?php echo $img_avail; ?></td>
        </tr>
        <tr>
            <td>
                <div class="element">
                    <label>Select More Photos:</label>
                    <input name="photo[]" type="file" multiple />
                </div>
            </td>
        </tr>
        <tr>
            <td>
        <button type="submit" name="addg_images" class="add" onclick="return confirm_submit()">Add More Photos</button>
        </td>
        </tr>
    </table>
</div>

	
	<div class="half_w half_right">
    <div class="h_title">Product Details </div>
    <table>
        <tr>
            <td><strong>Title:</strong> <?php echo $img_title; ?></td>
        </tr>
        <tr>
            <td><strong>Category: </strong><?php echo $img_cat; ?></td>
        </tr>
        <tr>
            <td><strong>Type:</strong> <?php echo $img_type; ?></td>
        </tr>
        <tr>
            <td><strong>Price: </strong><?php echo $img_price; ?></td>
        </tr>
        <tr>
            <td><strong>Location: </strong><?php echo $img_location; ?></td>
        </tr>
    </table>
    <input name="id" type="hidden" value="<?php echo $id; ?>">

    <div align="right">
        <div class="button">
            <a href="edit_photo.php?id=<?php echo $id; ?>" class="add">Edit Entry</a>
        </div>
        <button type="submit" class="cancel" onclick="return confirm_delete()" name="deletephoto">Delete</button>
    </div>
    <br />
</div>


		<div class="clear"></div>
	
		    <div class="full_w">
              <table>
    <tr>
        <td>
            <div class="h_title">Description</div>
        </td>
        <td><?php echo $img_caption; ?></td>
    </tr>
</table>


			  </div>
		</form>	
			  
	<div class="clear"></div>
		    <div class="full_w">
              <div class="h_title">More Photos</div>
			  </div>
<?php
$sql3 = "SELECT * FROM $g_images WHERE id='$id' ORDER BY date DESC";
$result3 = mysqli_query($connect, $sql3);
if (mysqli_num_rows($result3) == 0) {
    echo '<div style="text-align:center;"> No More Photos in Gallery.</div><br/>';
} else {
    ?>
    <form name="deletegalleryform" action="" method="post">
        <div class="button" align="left">
            <input name="deleteg_images" type="submit" id="delete" onclick="return confirm_delete()" value="Delete Selected" />
        </div>
        <div class="button" align="left">
            <a onclick="javascript:checkAll('deletegalleryform', true);" href="javascript:void();">Select All</a>
        </div>
        <div class="button" align="left">
            <a onclick="javascript:checkAll('deletegalleryform', false);" href="javascript:void();">De-Select All</a>
        </div>
        <div class="clear"></div><br>
        <div class="g_wrapper">
            <?php
            while ($rows3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                $img_name = $rows3['pic'];
                $img_id = $rows3['img_id'];
                $images = "gallery/$img_name";
                $image = "<img width='100' height='70' src='gallery/$img_name' />";
                // Store all images in one variable
                $all_img = $img_name . $image;
                ?>
                <div class="g_box" align="center">
                    <div align="center">
                        <input name="u_id" type="hidden" value="<?php echo $rows['id']; ?>">
                        <input name="deleteg_imagesselect[<?php echo $img_id; ?>]" type="checkbox"
                               id="checkbox[<?php echo $img_id; ?>]" value="<?php echo $img_id; ?>"/>
                    </div>
                    <p>
                        <?php echo $image; ?>
                        &nbsp;
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </form>
    <?php
}
?>
			  
			  
 
 </div>
		<div class="clear"></div>

	<?php
include('footer.php')

?>
