<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'mikeeraga');

// Connect to server and select database.
$connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Table Names
$gallery="gallery"; // Table name
$admin="admin"; // Table name
$category="category"; // Table name
$gal_type="gal_type"; // Table name
$g_images="g_images"; // Table name
?>