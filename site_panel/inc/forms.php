          <?php 
if(isset($_POST['index'])){
    $userid = mysqli_real_escape_string($connect,$_POST["adminid"]);
    $pass = mysqli_real_escape_string($connect,$_POST["pwd"]);
      
	  $sql = mysqli_query($connect,"SELECT * FROM $admin WHERE userid='$userid' AND accesscode='$pass' LIMIT 1"); // Query the person
	  $update = mysqli_query($connect,"UPDATE $admin SET lastlogin=NOW() WHERE userid='$userid'");
$data = mysqli_fetch_array($sql, MYSQLI_ASSOC);
//------MAKE SURE PERSON EXISTS-----
$existCount = mysqli_num_rows($sql); // Count the row nums
if ($existCount == 1) {
    while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
    }
    $_SESSION["admin_id"] = $data['admin_id'];
    $_SESSION["userid"] = $userid;
    $_SESSION["accesscode"] = $pass;
	$_SESSION['name'] = $data['name'];
echo "<div class='n_ok''> <p> Successfully Logged In. Redirecting...</p></div>";	
	  echo "<meta http-equiv=\"refresh\" content=\"3;URL=main.php\">";} else {
    echo '<div class="n_error"> <p>Invalid Login, try again.</p></div>';
}
}
?>


<?php

$valid_formats = array("jpg", "JPG", "PNG", "png", "gif", "jpeg");

$path = "gallery/"; // Upload directory
$count = 0;

if (isset($_POST['addg_images'])) {
$name='w3';
$name = str_replace(' ', '_', $name);
    // Loop $_FILES to exeicute all files
    foreach ($_FILES['photo']['name'] as $f => $name) {     
        if ($_FILES['photo']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }          
        if ($_FILES['photo']['error'][$f] == 0) {              
            if(!in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats)){
                $message[] = "$name is not a valid format";
                continue; // Skip invalid file formats
				
            }
			$pic = $name;
			$exec = mysqli_query($connect,"SELECT pic FROM $gallery WHERE pic = '$pic'");
if(mysqli_num_rows($exec) > 0){
                 echo "<div class='n_error''> <p>Photo called <strong>$pic</strong> already exists.</p></div>";

}

            else{ // No error found! Move uploaded files 
                if(move_uploaded_file($_FILES["photo"]["tmp_name"][$f], $path.$name))

                // Insert into Database
                
                $query = mysqli_query($connect,"INSERT INTO $g_images (id, pic, date) VALUES ('$_POST[id]','$pic',NOW())");
                if($query) {
                    $count++; // Number of successfully uploaded file
                }

            }
        }
    }
echo "<div class='n_ok''> <p><strong>$count</strong> Files successfully uploaded.</p></div>";
}

?>

 <?php
if(isset($_POST['add'])){

// resizes an image to fit a given width in pixels.
// works with BMP, PNG, JPEG, and GIF
// $file is overwritten
function fit_image_file_to_width($file, $w, $mime = 'image/jpeg') {
    list($width, $height) = getimagesize($file);
    $newwidth = $w;
    $newheight = $w * $height / $width;

    switch ($mime) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($file);
            break;
        case 'image/png';
            $src = imagecreatefrompng($file);
            break;
        case 'image/bmp';
            $src = imagecreatefromwbmp($file);
            break;
        case 'image/gif';
            $src = imagecreatefromgif($file);
            break;
    }

    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($dst, $file);
            break;
        case 'image/png';
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            imagepng($dst, $file);
            break;
        case 'image/bmp';
            imagewbmp($dst, $file);
            break;
        case 'image/gif';
            imagegif($dst, $file);
            break;
    }

    imagedestroy($dst);
}

// init file vars
$new = rand();
$pic= $new . ($_FILES['photo']['name']);
$target = 'gallery/' .$new . basename( $_FILES['photo']['name']);
$temp_name = $_FILES['photo']['tmp_name'];
$type = $_FILES["photo"]["type"];

$title = mysqli_real_escape_string($connect, $_POST['title']); 
$gal_type = mysqli_real_escape_string($connect, $_POST['gal_type']); 
$category = mysqli_real_escape_string($connect, $_POST['category']); 
$price = mysqli_real_escape_string($connect, $_POST['price']); 
$location = mysqli_real_escape_string($connect, $_POST['location']); 
$avail = mysqli_real_escape_string($connect, $_POST['avail']);
$caption = mysqli_real_escape_string($connect, $_POST['caption']); 
   //Tells you if its all ok

mysqli_query($connect,"INSERT INTO $gallery (pic, title, gal_type, category, price, avail, location, caption, date) 
VALUES 
('$pic','$title','$gal_type','$category','$price','$avail','$location','$caption',NOW())") ;
//Writes the information to the database  
	
// resize the image in the tmp directorys
fit_image_file_to_width($temp_name, 450, $type);

//Writes the photo to the server
if(move_uploaded_file($temp_name, $target)) {
 echo "<div class='alert alert-success' align='center'> <p>The property has been successfully Added</p></div>";
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=gallery.php\">";
} else {

    //Gives and error if its not 
echo "<div class='alert alert-danger' align='center'>Error Adding Entry</div>";

}
}
?>

<?php
if(isset($_POST['edit'])){

$title = mysqli_real_escape_string($connect, $_POST['title']); 
$category = mysqli_real_escape_string($connect, $_POST['category']); 
$caption = mysqli_real_escape_string($connect, $_POST['caption']); 
$location = mysqli_real_escape_string($connect, $_POST['location']); 
$price = mysqli_real_escape_string($connect, $_POST['price']); 
$avail = mysqli_real_escape_string($connect, $_POST['avail']);
$gal_type = mysqli_real_escape_string($connect, $_POST['gal_type']); 
$id=$_POST['id'];


// update data in mysql database 
$sql="UPDATE $gallery SET title='$title', gal_type='$gal_type', category='$category', price='$price', avail='$avail', location='$location', caption='$caption'
WHERE id='$id'";
$result=mysqli_query($connect,$sql);

// if successfully updated. 
if($result){
    echo "<div class='n_ok'>Edited Successfully</div>";
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=photo_details.php?id=$id\">";
}

else {
echo "<div class='n_warning'>Error Editing</div>";
}
}
?>

<?php
if(isset($_POST['newadmin'])){

$exec=mysqli_query($connect,"INSERT INTO $admin (admin_id, userid, accesscode, name, lastlogin)
VALUES
('','$_POST[userid]','$_POST[accesscode]','$_POST[name]',NOW())");

// if successfully updated. 
if($exec){
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=_.php\">";
}

else {
echo "<div class='n_warning'>Error Creating...</div>";
}
}
?>

<?php
if(isset($_POST['editadmin'])){

$userid=$_POST['userid'];
$accesscode=$_POST['accesscode'];
$name=$_POST['name'];
$admin_id=$_POST['admin_id'];

// update data in mysql database 
$sql="UPDATE $admin SET userid='$userid', accesscode='$accesscode', name='$name'
WHERE admin_id='$admin_id'";
$result=mysqli_query($connect,$sql);

// if successfully updated. 
if($result){
 echo "<div class='n_ok'>Successfully Updated | Logging you Out...</div>";
 echo "<meta http-equiv=\"refresh\" content=\"3;URL=logout.php\">";
}

else {
echo "<div class='n_warning'>Error Editing - Loading...</div>";
}
}
?>


<?php
			if(isset($_POST['deletecategory'])){
                // Check if delete button active, start this
                if ( ! empty($_POST['deletecategory'])) {
                    foreach ($_POST['deletecategoryselect'] as $id => $value) {
					$qry=mysqli_query($connect,"SELECT * FROM $category WHERE id='$id'");
$row=mysqli_fetch_array($qry,MYSQLI_ASSOC);
 $sql = 'DELETE FROM `'.$category.'` WHERE `id`='.(int)$id;
                        $del=mysqli_query($connect,$sql);
						
                    }
                    if($del){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=category.php\">";
}
                }
                }
                 ?>
				 
<?php
			if(isset($_POST['deletegal_type'])){
                // Check if delete button active, start this
                if ( ! empty($_POST['deletegal_type'])) {
                    foreach ($_POST['deletegal_typeselect'] as $id => $value) {
					$qry=mysqli_query($connect,"SELECT * FROM $gal_type WHERE id='$id'");
$row=mysqli_fetch_array($qry,MYSQLI_ASSOC);
 $sql = 'DELETE FROM `'.$gal_type.'` WHERE `id`='.(int)$id;
                        $del=mysqli_query($connect,$sql);
						
                    }
                    if($del){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=category.php\">";
}
                }
                }
                 ?>

			 <?php
			if(isset($_POST['deleteadmin'])){
                // Check if delete button active, start this
                if ( ! empty($_POST['deleteadmin'])) {
                    foreach ($_POST['deleteadminsselect'] as $id => $value) {
					$qry=mysqli_query($connect,"SELECT * FROM $admin WHERE admin_id='$id'");
                    $row=mysqli_fetch_array($qry,MYSQLI_ASSOC);
                   $sql = 'DELETE FROM `'.$admin.'` WHERE `admin_id`='.(int)$id;
                        $del=mysqli_query($connect,$sql);
	                    }
                    if($del){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=_.php\">";
}
                }
                }
                 ?>



<?php
if(isset($_POST['addcat']))
{


 $name = $_POST['cat'];
 
 $exec = mysqli_query($connect,"SELECT name FROM $category WHERE name = '$name'");
if(mysqli_num_rows($exec) > 0){
                 echo "<div class='n_error''><p>Category $name already exists. </p></div>";
				 }else{

$result=mysqli_query($connect,"INSERT INTO $category (name)
VALUES
('$name')");

if($result){
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=category.php\">";
}

else {
 echo "<div class='n_warning'>Error creating category!</div>";
}
}
}

?>

<?php
if(isset($_POST['addgal_type']))
{


 $name = $_POST['gal_type'];
 
 $exec = mysqli_query($connect,"SELECT name FROM $gal_type WHERE name = '$name'");
if(mysqli_num_rows($exec) > 0){
                 echo "<div class='n_error''><p>Property Type $name already exists. </p></div>";
				 }else{

$result=mysqli_query($connect,"INSERT INTO $gal_type (name)
VALUES
('$name')");

if($result){
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=category.php\">";
}

else {
 echo "<div class='n_warning'>Error creating Property Type!</div>";
}
}
}

?>

<?php
if (isset($_POST['deletephoto'])) {
    $id = $_POST["id"];

    // Retrieve data for the selected entry from $gallery and $g_images tables
    $qry = mysqli_query($connect, "SELECT * FROM $gallery WHERE id='$id'");
    $qry_images = mysqli_query($connect, "SELECT * FROM $g_images WHERE id='$id'");
    $row = mysqli_fetch_array($qry, MYSQLI_ASSOC);

    // Initialize an array to store image names
    $image_names = array();

    while ($image_row = mysqli_fetch_array($qry_images, MYSQLI_ASSOC)) {
        if ($image_row["pic"] != "") {
            $image_names[] = $image_row["pic"];
        }
    }

    // Loop through image names and delete images from the "gallery" folder
    foreach ($image_names as $img_name) {
        if (!empty($img_name)) {
            unlink("gallery/" . $img_name);
        }
    }

    // Unlink the image uploaded in the $gallery table's "pic" field
    if (!empty($row["pic"])) {
        unlink("gallery/" . $row["pic"]);
    }

    // Delete all records associated with the selected entry from the $g_images table
    $sql_images = 'DELETE FROM `' . $g_images . '` WHERE `id`=' . (int)$id;
    $del_images = mysqli_query($connect, $sql_images);

    // Delete the corresponding record from the $gallery table
    $sql_gallery = 'DELETE FROM `' . $gallery . '` WHERE `id`=' . (int)$id;
    $del_gallery = mysqli_query($connect, $sql_gallery);

    if ($del_gallery && $del_images) {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=gallery.php\">";
    }
}
?>


<?php
if (isset($_POST['deletegallery'])) {
    $u_id = $_POST['u_id'];

    // Check if delete button active, start this
    if (!empty($_POST['deletegalleryselect'])) {
        foreach ($_POST['deletegalleryselect'] as $id => $value) {
            $qry = mysqli_query($connect, "SELECT * FROM $gallery WHERE id='$id'");
            $qry_images = mysqli_query($connect, "SELECT * FROM $g_images WHERE id='$id'");
            
            $row = mysqli_fetch_array($qry, MYSQLI_ASSOC);
            
            // Initialize an array to store image names
            $image_names = array();
            
            while ($image_row = mysqli_fetch_array($qry_images, MYSQLI_ASSOC)) {
                if ($image_row["pic"] != "") {
                    $image_names[] = $image_row["pic"];
                }
            }
            
            // Unlink images associated with the $gallery table row
            if (!empty($row["pic"])) {
                $image_names[] = $row["pic"];
            }
            
            // Loop through image names and delete images from the "gallery" folder
            foreach ($image_names as $img_name) {
                if (!empty($img_name)) {
                    unlink("gallery/" . $img_name);
                }
            }

            // Delete all records associated with the selected entry from the $g_images table
            $sql_images = "DELETE FROM $g_images WHERE id='$id'";
            $del_images = mysqli_query($connect, $sql_images);

            // Delete the corresponding record from the $gallery table
            $sql_gallery = "DELETE FROM $gallery WHERE id='$id'";
            $del_gallery = mysqli_query($connect, $sql_gallery);
        }
        
        if ($del_gallery && $del_images) {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=gallery.php\">";
        }
    }
}
?>

<?php
			if(isset($_POST['deleteg_images'])){
			 $u_id = $_POST['u_id'];
                // Check if delete button active, start this
                if ( ! empty($_POST['deleteg_images'])) {
                    foreach ($_POST['deleteg_imagesselect'] as $id => $value) {
					$qry=mysqli_query($connect,"SELECT * FROM $g_images WHERE img_id='$id'");
$row=mysqli_fetch_array($qry,MYSQLI_ASSOC);
if($row["pic"]!="") {  
  $img_name=$row["pic"];
  unlink("gallery/".$img_name);
}
 $sql = 'DELETE FROM `'.$g_images.'` WHERE `img_id`='.(int)$id;
                        $del=mysqli_query($connect,$sql);
						
                    }
                    if($del){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=photo_details.php?id=$u_id\">";
}
                }
                }
                 ?>