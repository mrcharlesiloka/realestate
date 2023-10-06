<?php
require_once ('header.php');
?>
<div class="page-title dark development">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="display-4 wow fadeInUp" data-wow-duration="" data-wow-delay="">
					Contact Us						
				</h1>

				
			</div> <!--  .col-md-8 -->
			<div class="col-md-4 breadcrumbs wow fadeInUp" data-wow-duration="" data-wow-delay=".1s">
				<ol class="breadcrumb"><li class="breadcrumb-item"><a href="./">Home</a></li><li class="breadcrumb-item active">Contact Us</li></ol>			</div> <!--  .col-md-4 -->
		</div> <!--  .row -->
	</div> <!--  .container -->
</div> <!--  .page-title -->
<section class="section contact-info parallax" id="contact-info-section">	<div class="container">		<h2 class="heading wow fadeInUp d-none d-md-block" data-wow-duration="" data-wow-delay="0s"><font color="#FFFFFF">Need to contact us now?</font></h2>		<div class="row contact-info-row">			<div class="col-md-4 wow fadeInUp" data-wow-duration="" data-wow-delay="0.3s">				<div><a rel="nofollow" title="Click / tap to dial" data-toggle="tooltip" data-placement="bottom" href="tel:<?php echo $site_tel ?>"><i class="fa fa-fw fa-phone"></i><?php echo $site_tel ?></a>				</div> <!--  .div -->			</div> <!--  .col-md-4 -->			<div class="col-md-4 wow fadeInUp" data-wow-duration="" data-wow-delay="0.4s">				<div><a rel="nofollow" class="" data-toggle="tooltip" data-placement="bottom" title="Click to automatically open your email client" href="mailto:<?php echo $site_email ?>"><i class="fa fa-fw fa-send"></i><?php echo $site_email ?></a>				</div> <!--  .div -->			</div> <!--  .col-md-4 -->			<div class="col-md-4 wow fadeInUp" data-wow-duration="" data-wow-delay="0.5s">				<div>					<i class="fa fa-fw fa-map-marker"></i><span class=""><?php echo $site_address ?></span>				</div> <!--  .div -->			</div> <!--  .col-md-4 -->		</div><!--  .row -->	</div><!--  .container --></section>		
<section class="section light map-and-form">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="heading wow fadeInUp" data-wow-duration="" data-wow-delay="0s">Where to find us</h2>
				<div class="embed-responsive embed-responsive-4by3 wow fadeInUp" data-wow-duration="" data-wow-delay="0s">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.771766242076!2d6.7220454!3d6.2051554!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043f36f803f5cf9%3A0xb0ab960473717bc!2sMike%20Eraga%20%26%20Associates!5e0!3m2!1sen!2sro!4v1691571472057!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>			</div> <!--  .col-md-3 -->

			<div class="col-md-6">
				<h2 class="heading wow fadeInUp" data-wow-duration="" data-wow-delay="0.1s">Send us a message</h2>
				<div class="wow fadeInUp" data-wow-duration="" data-wow-delay="0.1s"><noscript class="ninja-forms-noscript-message">
    Notice: JavaScript is required for this content.</noscript><div id="nf-form-8-cont" class="nf-form-cont" aria-live="polite" aria-labelledby="nf-form-title-8" aria-describedby="nf-form-errors-8" role="form">
        <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email = "$site_email";
$ip = getenv("REMOTE_ADDR");

$body = "
<p><strong>::CONTACT FORM::</strong><br>
<strong>Full Name:</strong> ".$_POST['name']."<br>
<strong>Email Address:</strong> ".$_POST['email']."<br>
<strong>Message:</strong> ".$_POST['mssg']."<br>
</p>
";
$subject = "$site_title - CONTACT FORM:) $ip";

// mail to admin
			$body="$body";
			$from ="$site_title";
			$header = "Reply-To: $site_email\r\n";
			$header .= "Return-Path: $site_email\r\n";
			$header .= "From: $from <$site_email>\r\n";
			$header .= "Content-Type: text/html; charset=iso-8859-1\n";
			mail("$email", "$subject", "$body", $header);
// Mail End	

echo '<div align="center"> 
<h4>Message Sent!</h4>
<p><h5>Thanks for visiting us and placing your inquiries.
You will be contacted promptly.</h5>
<p><h5>Thank You.</h5></p>
</div>';	
 echo "<meta http-equiv=\"refresh\" content=\"7;URL=index.php\">";
}
?>                       <!-- Form itself -->
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
			<input type="email" class="form-control" placeholder="Email" 
			   	           name="email" id="email" required ="required"/>
					   <p class="help-block"></p>
		</div>
	    </div> 	
			  
               <div class="control-group">
                 <div class="controls">
				 <textarea rows="10" cols="100" class="form-control" 
                       placeholder="Message" id="message" name="mssg" required="required"
		        minlength="5" maxlength="999" style="resize:none"></textarea><p class="help-block"></p>
		</div>
               </div> 		 
	     <div id="success"> </div> <!-- For success/fail messages -->
	    <button type="submit" class="btn btn-primary pull-center">Send</button><br />
          </form>
                                <!-- /.row -->
           

</div></div>			</div> <!--  .col-md-3 -->
		</div> <!--  .row -->
	</div>
</section>

 <!--  .section -->
<?php
require_once ('footer.php');
?>