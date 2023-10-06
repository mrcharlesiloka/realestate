<?php
require_once ('header.php');
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
$img_location = $rows['location'];
$img_avail = $rows['avail'];
$img_caption = $rows['caption'];
$images = "site_panel/gallery/$img_name"
?>
<div class="page-title dark development">
<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="display-4 wow fadeInUp" data-wow-duration="" data-wow-delay="">
				<?php echo $img_title; ?>					
				</h1>
				
			</div> <!--  .col-md-8 -->
			<div class="col-md-4 breadcrumbs wow fadeInUp" data-wow-duration="" data-wow-delay=".1s">
				<ol class="breadcrumb"><li class="breadcrumb-item"><a href="./">Home</a></li><li class="breadcrumb-item active">Property Detail</li></ol>			</div> <!--  .col-md-4 -->
		</div> <!--  .row -->
	</div> <!--  .container -->
</div> <!--  .page-title -->
<section class="section light">
<div class="container">
	<div class="row">
<div class="col-12 section-content">
	
    <h1 class="display-4 left wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;"><?php echo $img_location; ?></h1>

    <p class="development-starting-cost tab-content wow fadeInRight">
        <span class="prefix">Price:</span> <strong><?php echo $img_price; ?></strong>
    </p> 

    <div class="lead left wow fadeInRight" data-wow-delay="0.07s" style="visibility: visible; animation-delay: 0.07s; animation-name: fadeInRight;">
        <?php echo $img_caption; ?>
    </div>
	
    <div class="btn-lg btn-primary wow fadeInRight">
        Category: <span><strong><?php echo $img_cat; ?></strong></span>&nbsp;&nbsp;|&nbsp;&nbsp;
        Type: <span><strong><?php echo $img_type; ?></strong></span>&nbsp;&nbsp; | &nbsp;&nbsp;
        <span><i class="fa fa-home fa-fw"></i> <strong><?php echo $img_avail; ?></strong></span>
    </div>
</div>
<!-- tab-content -->
</div> <!--  .row -->
		
</div> <!--  .container -->
</section>

<section class="section" id="development-gallery-section">
    <div class="container">
        <h2 class="wow zoomIn">Photo Gallery</h2><br />
        <div class="row">
            <div class="col-md-4 wow fadeInUp" data-wow-duration="" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                <figure class="figure">
                    <img src="<?php echo $images; ?>" alt="" class="figure-img img-fluid">
                </figure>
            </div>
            <?php
            $sql3 = "SELECT * FROM $g_images WHERE id='$id' ORDER BY date DESC";
            $result3 = mysqli_query($connect, $sql3);
            if (mysqli_num_rows($result3) == 0) {
                echo '<div style="text-align:center; style="text-align:center;">No More Photos in Gallery.</div><br/>';
            } else {
                while ($rows3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                    $gal_img_name = $rows3['pic'];
                    $gal_images = "site_panel/gallery/$gal_img_name";
            ?>
                    <div class="col-md-4 wow fadeInUp" data-wow-duration="" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                        <figure class="figure">
                            <img src="<?php echo $gal_images; ?>" alt="" class="figure-img img-fluid">
                        </figure>
                    </div> <!-- .col-md-4 -->
            <?php
                }
            }
            ?>
        </div> <!-- .row -->
    </div> <!-- .container -->
</section>


<section class="section lead-spacing development-contact-section" id="development-contact-section">
	<div class="container">
		<h2 class="wow zoomIn">Let Our Agent Contact You</h2>
		<p class="lead  wow slideInUp" data-wow-duration="" data-wow-delay="0.2s">Leave your details below and our agent will be in touch to discuss any questions or assist you in securing you own brand new home.</p>
		<div class="row">
<div class="col-md-3 agent-contact-info-section">
<img class="rounded-circle agent-pic wow slideInLeft" data-wow-duration="" data-wow-delay="0s" src="assets/img/no_image.png" class="img-fluid" />
<h3 class="wow slideInRight">In-House Agent</h3></div> <!--  .col-md-4 -->			

<div class="col-md-3 left">
<ul class="list-unstyled agent-contact-info-list">
<li class="wow slideInRight" data-wow-duration="" data-wow-delay="0s">
<span class="list-definition">Phone: </span><span><a rel="nofollow" href="tel:<?php echo $site_tel?>"><?php echo $site_tel?></a></span></li>
<li class="wow slideInRight" data-wow-duration="" data-wow-delay="0.2s"><span class="list-definition">Email: </span>
<span><a rel="nofollow" class="" data-toggle="tooltip" data-placement="bottom" title="Click to automatically open your email client" href="mailto:<?php echo $agent_email?>"><?php echo $agent_email?></a>
</span>
</li>
				</ul>
				
			</div> <!--  .col-md-3 -->
			
				<div class="col-md-6 contact-form left">
    <div class="wow fadeInUp" data-wow-duration="" data-wow-delay="0.1s">
        <noscript class="ninja-forms-noscript-message">
            Notice: JavaScript is required for this content.
        </noscript>
        <div id="nf-form-8-cont" class="nf-form-cont" aria-live="polite" aria-labelledby="nf-form-title-8" aria-describedby="nf-form-errors-8" role="form">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = "$agent_email";
                $ip = getenv("REMOTE_ADDR");

                $body = "
                <p><strong>::CONTACT FORM::</strong><br>
                <strong>Full Name:</strong> ".$_POST['name']."<br>
                <strong>Telephone:</strong> ".$_POST['tel']."<br>
                <strong>Email Address:</strong> ".$_POST['email']."<br>
                </p>
                ";
                $subject = "$img_title  - CLIENT FORM:) $ip";

                // Send email to admin
                $body = "$body";
                $from = "$site_title";
                $header = "Reply-To: $agent_email\r\n";
                $header .= "Return-Path: $agent_email\r\n";
                $header .= "From: $from <$agent_email>\r\n";
                $header .= "Content-Type: text/html; charset=iso-8859-1\n";
                mail("$email", "$subject", "$body", $header);

                echo '<div align="center"> 
                    <h4>Message Sent!</h4>
                    <p><h5>Thanks for visiting us and showing interest in this property.
                    An Agent will contact you promptly.</h5>
                    <p><h5>Thank You.</h5></p>
                </div>';
                echo "<meta http-equiv=\"refresh\" content=\"7;URL=index.php\">";
            }
            ?> <!-- Form itself -->
            <form name="sentMessage" id="contactForm" action="" method="post">
                <div class="control-group">
                    <div class="controls">
                        <input type="text" class="form-control" 
                            placeholder="Full Name" id="name" name="name" required="required" />
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="text" class="form-control" 
                            placeholder="Telephone" id="tel" name="tel" required="required" />
                        <p class="help-block"></p>
                    </div>
                </div> 	
                <div class="control-group">
                    <div class="controls">
                        <input type="email" class="form-control" placeholder="Email" 
                            name="email" id="email" required="required"/>
                        <p class="help-block"></p>
                    </div>
                </div>                		 
                <div id="success"></div> <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary pull-center">Send</button><br />
            </form>
        </div>
    </div>
</div>


        </div> <!--  .col-md-4 -->		</div> <!--  .row -->
	</div> <!--  .container -->
</section>	

	


<?
require_once ('footer.php');
?>