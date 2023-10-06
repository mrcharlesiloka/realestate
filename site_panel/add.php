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
    <div class="h_title">Add Property</div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="grid">
            <label>Select Photo:</label>
            <input name="photo" type="file"/>
        </div>
        <div class="grid">
            <label>Title:</label>
            <input name="title" type="text" required=""/>
        </div>
        <div class="grid">
            <label>Category:</label>
            <select name="category" id="category" required="">
                <option value=''>Select a Category</option>
                <?php
                $sql = "SELECT * FROM $category ORDER BY id";
                $result = mysqli_query($connect, $sql);
                while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <br/>
        <div class="clear"></div>
        <div class="element">
            <div class="grid">
                <label>Type:</label>
                <select name="gal_type" id="gal_type" required="">
                    <option value=''>Select Type</option>
                    <?php
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
                <input name="price" type="text" required=""/>
            </div>
            <div class="grid">
                <label>Location:</label>
                <input name="location" type="text" required=""/>
            </div>
            <div class="grid">
                <label>Availability:</label>
                <select name="avail" id="avail" required="">
                    <option value="Available" selected="selected">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>
        </div>
        <div class="element">
            <label>Description:</label>
            <textarea name="caption" id="textarea" rows="3" cols="55" class="textarea"></textarea>
        </div>
        <div align="right" class="element">
            <button type="submit" name="add" class="add" id="add" onclick="return confirm_submit()">Add Property</button>
        </div>
    </form>
</div>



  </div>
</div>

	<?php
include('footer.php')

?>
