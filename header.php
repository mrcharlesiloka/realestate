<?php
require_once ('f_config.php');
require_once ('site_panel/inc/config.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title><?php echo $site_title?> | Property Sales and Rentals</title>
	<meta name="geo.placename" content="Asaba, Delta, Nigeria" />
<meta name="robots" content="index, follow" />
<meta http-equiv="content-language" content="en" />
	<meta name="description" content="Looking for your new home? Sales, Rentals and short-lets? That is our core and we would love to get you settled in your new favorite space. We are <?php echo $site_title?>" />
	<meta name="robots" content="index, follow" />
<link rel='dns-prefetch' href='http://cdnjs.cloudflare.com/' />
<link rel='dns-prefetch' href='http://code.jquery.com/' />
<link rel='dns-prefetch' href='http://maxcdn.bootstrapcdn.com/' />
<link rel='dns-prefetch' href='http://s.w.org/' />
<link rel='stylesheet' id='main-theme-stylesheet-css'  href='assets/css/theme.min8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='owl-carousel-stylesheet-css'  href='assets/OwlCarousel2/2.3.4/assets/owl.carousel.min8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='owl-carousel-theme-css'  href='assets/OwlCarousel2/2.3.4/assets/owl.theme.default8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='animate-css'  href='assets/animate.css/3.7.2/animate8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<link rel="icon" href="assets/img/favicon.png"/>
<!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
"name" : "<?php echo $site_title?>",
"url": "https://<?php echo $site_url?>",
"https://web.facebook.com/<?php echo $site_url?>",
"https://www.instagram.com/<?php echo $site_url?>"
}

{
"@context": "http://schema.org",
"@type": "LocalBusiness",
"name" : "<?php echo $site_title?>",
"url": "https://<?php echo $site_url?>",
"logo": "https://<?php echo $site_url?>/assets/img/Logo_black.png",
"image": "https://<?php echo $site_url?>/assets/img/Logo_black.png",
"description": "Looking for your new home? Sales, Rentals and short-lets? That is our core and we would love to get you settled in your new favorite space. We are <?php echo $site_title?>",
"telephone": "<?php echo $site_tel?>",
"email" : "<?php echo $site_email?>",
"address": {
"@type": "PostalAddress",
"addressLocality": "Asaba",
"addressRegion": "NG",
"streetAddress": "<?php echo $site_address?>",
"postalCode": ""
},
"openingHours": [
"Mo-Fr 09:00-17:00"
] }
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src=""></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '');
</script>

		</head>

	<body class="home page-template-default page page-id-31 wp-custom-logo" data-spy="scroll" data-target=".scrollspy" data-offset="200" style="position: relative;">
	<div class="hfeed site" id="page">
	<nav id="main-navbar" class="navbar main-navbar  navbar-expand-lg clear-nav">	
<div class="container">

		<a class="navbar-brand" title="Go to home page" href="./"><img src="assets/img/Logo_black.png" class="d-inline-block align-top" alt="Go to home page"></a>
	  	<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
	  		    	<span class="navbar-toggler-icon"></span>
	  	</button> -->
	  	<button 
     class="navbar-toggler collapsed" 
    data-target="#mainNavbar" 
    data-toggle="collapse">
        <span class="line"></span> 
        <span class="line"></span> 
        <span class="line"></span>
</button>

		<div id="mainNavbar" class="collapse navbar-collapse">
		<ul id="menu-main-menu" class="navbar-nav mr-auto">
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2555 nav-item"><a href="./" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-3029 nav-item"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-3029">Our Company</a>
<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-3029" role="menu">
<li class="menu-item nav-item"><a href="about" class="nav-link">About Us</a></li>
<li class="menu-item nav-item"><a href="management" class="nav-link">Property Management</a></li>
<li class="menu-item nav-item"><a href="#" class="nav-link">Agents</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-3029 nav-item"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-3029">Properties</a>
<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-3029" role="menu">
<!--<li class="menu-item nav-item"><a href="about" class="nav-link">FOR-RENT</a></li>
<li class="menu-item nav-item"><a href="about" class="nav-link">FOR-SALE</a></li>
<li class="menu-item nav-item"><a href="about" class="nav-link">LEASE</a></li>-->
<?php
// Commented out code to prevent execution

// Retrieve categories from the database and create dropdown items
$sqlcat = "SELECT * FROM $category ORDER BY id DESC";
$resultcat = mysqli_query($connect, $sqlcat);

// Check if there are no categories in the result
if (mysqli_num_rows($resultcat) == 0) {
    // Display a message indicating that no categories have been created
    echo '<div style="text-align:center;style="text-align:center;" > No Category Created.</div><br/>';
} else {
    // Loop through each row of the result using a while loop
    while ($rowscat = mysqli_fetch_array($resultcat, MYSQLI_ASSOC)) {
?>
    <!-- Commented out code to generate dropdown menu items -->
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3027 nav-item">
        <a href="properties_detail?category=<?php echo $rowscat['name']; ?>" class="dropdown-item">
            <?php echo $rowscat['name']; ?>
        </a>
    </li>
<?php
    }
}
?>

</ul>

</li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2555 nav-item"><a href="contact" class="nav-link">Contact</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2555 nav-item"><a href="callto:+27 00 000 0000" class="nav-link"><i class="fa fa-phone"></i><?php echo $site_tel?></a></li>
</ul></div></div> <!--  .container -->
	</nav><!-- .site-navigation --> 