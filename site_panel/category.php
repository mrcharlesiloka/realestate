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
			
<div class="half_w half_right">
    <div class="h_title">Categories </div>
    <?php
    $sql = "SELECT * FROM $category ORDER BY id DESC";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo '<div style="text-align:center;"> No Category Created.</div><br/>';
    } else {
        ?>
        <form action="" method="post">
            <div class="button" align="left">
                <input name="deletecategory" type="submit" id="delete" onclick="return confirm_delete()"
                       value="Delete Selected"/>
            </div>
            <div class="clear"></div><br>

            <?php
            while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <div class="grid">
                    <input name="deletecategoryselect[<?php echo $rows['id']; ?>]" type="checkbox"
                           id="checkbox[<?php echo $rows['id']; ?>]" value="<?php echo $rows['id']; ?>"/>
                    <a href="gallery_detail.php?category=<?php echo $rows['name']; ?>" title="View Category">
                        <?php echo $rows['name']; ?>
                    </a>
                    &nbsp; &nbsp;
                </div>

                <?php
            }
            ?>
        </form>
        <?php
    }
    ?>
    <br/><br/>
</div>

<div class="half_w half_right">
              <div class="h_title">Add New Category</div>
			  			<form action="" method="post">
						<div class="element">
                                <label>Enter a Category Name:</label>
                                <input type="text"  name="cat" id="cat"  placeholder="Enter a Category Name" required=""/>
              </div>
			 <div class="element">
	<button type="submit" name="addcat" class="add" id="add"onclick="return confirm_submit()" >Add New Category</button>
</div>
</form>
</div>
			
<div class="half_w half_right">
    <div class="h_title">Property Type </div>
    <?php
    $sql = "SELECT * FROM $gal_type ORDER BY id DESC";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo '<div style="text-align:center;"> No Property Type Created.</div><br/>';
    } else {
        ?>
        <form action="" method="post">
            <div class="button" align="left">
                <input name="deletegal_type" type="submit" id="delete" onclick="return confirm_delete()"
                       value="Delete Selected"/>
            </div>
            <div class="clear"></div><br>

            <?php
            while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <div class="grid">
                    <input name="deletegal_typeselect[<?php echo $rows['id']; ?>]" type="checkbox"
                           id="checkbox[<?php echo $rows['id']; ?>]" value="<?php echo $rows['id']; ?>"/>
                    <a href="gallery_detail_type.php?gal_type=<?php echo $rows['name']; ?>"
                       title="View Property Type">
                        <?php echo $rows['name']; ?>
                    </a>
                    &nbsp; &nbsp;
                </div>

                <?php
            }
            ?>
        </form>
        <?php
    }
    ?>
    <br/><br/>
</div>

<div class="half_w half_right">
              <div class="h_title">Add New Property Type</div>
			  			<form action="" method="post">
						<div class="element">
                                <label>Enter a Name:</label>
                                <input type="text"  name="gal_type" id="gal_type"  placeholder="Enter a Property Type" required=""/>
              </div>
			 <div class="element">
	<button type="submit" name="addgal_type" class="add" id="add"onclick="return confirm_submit()" >Add Property Type</button>
</div>
</form>
</div>
 </div>
</div>

	<?php
include('footer.php')

?>
