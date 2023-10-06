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
<div class="h_title">Categories / Types</div></div>
<div class="grid">
    <div class="button"><a href="gallery.php" title="All">All</a></div>
    <?php
    $sql = "SELECT * FROM $category ORDER BY id DESC";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo '<div style="text-align:center;"> No Category Created.</div><br/>';
    } else {
        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <div class="button">
                <a href="gallery_detail.php?category=<?php echo $rows['name']; ?>" title="View Category">
                    <?php echo $rows['name']; ?>
                </a>
            </div>
            <?php
        }
    }
    ?>

    <?php
    $sql2 = "SELECT * FROM $gal_type ORDER BY id DESC";
    $result2 = mysqli_query($connect, $sql2);
    if (mysqli_num_rows($result2) == 0) {
        echo '<div style="text-align:center;"> No Property Type Created.</div><br/>';
    } else {
        while ($rows2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
            ?>
            <div class="button">
                <a href="gallery_detail_type.php?gal_type=<?php echo $rows2['name']; ?>" title="View Property Type">
                    <?php echo $rows2['name']; ?>
                </a>
            </div>
            <?php
        }
    }
    ?>
</div>

				 
<div class="clear"></div><br>

<div class="full_w">
<div class="h_title">Photo Gallery</div></div>
<?php
$num_rec_per_page = 14;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $num_rec_per_page;

$sql = "SELECT * FROM $gallery WHERE pic !='' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 0) {
    echo '<div style="text-align:center;"> No Properties in Gallery.</div><br/>';
} else {
    ?>
    <form name="deletegalleryform" action="" method="post">
        <div class="button" align="left">
            <input name="deletegallery" type="submit" id="delete" onclick="return confirm_delete()" value="Delete Selected"/>
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
                    <div align="center">
                        <input name="u_id" type="hidden" value="<?php echo $rows['id']; ?>">
                        <input name="deletegalleryselect[<?php echo $rows['id']; ?>]" type="checkbox" id="pcheckbox"
                               value="<?php echo $rows['id']; ?>"/>
                    </div>
                    <?php echo $img_title; ?><br/>
                    <a href="photo_details.php?id=<?php echo $img_id ?>"><?php echo $image; ?></a>
                    &nbsp; </p>
                </div>
                <?php
            }
            ?>
        </div>
    </form>
    <?php
}
?>

	<div class="clear"></div><br>
<div class="pagination">
    <?php 
    $sql = "SELECT * FROM $gallery"; 
    $rs_result = mysqli_query($connect, $sql); // Run the query
    $total_records = mysqli_num_rows($rs_result); // Count number of records
    $total_pages = ceil($total_records / $num_rec_per_page); 

    echo "<a href='gallery.php?page=1'>" . 'First &laquo;' . "</a> "; // Go to 1st page  

    for ($i = 1; $i <= $total_pages; $i++) { 
        echo "<a href='gallery.php?page=" . $i . "'>" . $i . "</a> "; 
    }; 
    
    echo "<a href='gallery.php?page=$total_pages'>" . 'Last &raquo;' . "</a> "; // Go to last page
    ?>
</div>

  </div>
</div>

	<?php
include('footer.php')

?>
