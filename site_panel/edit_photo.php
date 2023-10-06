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
			<div class="full_w">
    <div class="h_title">Edit Entry</div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="grid">
            <?php 
            if ($rows['pic']) { 
                $img_name = $rows['pic'];
                $imagepath = "<img width='200' src='gallery/$img_name'>"; 
                echo $imagepath ; 
            } else {
                echo "<img width='100' height='100' src='gallery/no_image.png' >" ;
            }	
            ?>
        </div>
        <div class="grid">
            <label>Title:</label>
            <input name="title" type="text" value="<?php echo $img_title ?>" />
        </div>
        <div class="grid">
            <label>Category:</label>
            <select name="category" id="category" required="">
                <option value="<?php echo $img_cat; ?>" selected="selected"><?php echo $img_cat; ?></option>
                <?php 
                include('inc/config.php');
                $sql = "SELECT * FROM $category ORDER BY id";
                $result = mysqli_query($connect, $sql);
                while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                    <?php
                }
                ?>
            </select>
            <input name="id" type="hidden" value="<?php echo $id; ?>">
        </div>
        <br />
        <div class="clear"></div>
        <div class="element">
            <div class="grid">
                <label>Type:</label>
                <select name="gal_type" id="gal_type">
                    <option value='<?php echo $img_type; ?>'><?php echo $img_type; ?></option>
                    <?php 
                    include('inc/config.php');
                    $sql = "SELECT * FROM $gal_type ORDER BY id";
                    $result = mysqli_query($connect, $sql);
                    while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                        <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="grid">
                <label>Price:</label>
                <input name="price" type="text" value="<?php echo $img_price; ?>" />
            </div>
            <div class="grid">
                <label>Location:</label>
                <input name="location" type="text" value="<?php echo $img_location; ?>" />
            </div>
            <div class="grid">
                <label>Availability:</label>
                <select name="avail" id="avail" required="">
                    <option value="<?php echo $img_avail; ?>" selected="selected"><?php echo $img_avail; ?></option>
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>
        </div>
        <div class="element">
            <label>Description:</label>
            <textarea name="caption" id="textarea" rows="3" cols="55" class="textarea"><?php echo $img_caption; ?></textarea>
        </div>
        <div align="right" class="element">
            <button type="submit" name="edit" class="add" id="add" onclick="return confirm_submit()">Edit Entry</button>
        </div>
    </form>
</div>



  </div>
</div>

	<?php
include('footer.php')

?>
