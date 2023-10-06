<?php
require_once ('header.php');
?>
	
<div id="home-carousel-main" class="home-carousel carousel slide home-carousel carousel-fade" data-ride="carousel">

    <div class="carousel-inner" role="listbox">

    <div class="carousel-item active" style="background-image: url('assets/img/slide/slide1.jpg')">
	</div>
	<div class="carousel-item" style="background-image: url('assets/img/slide/slide2.jpg')">
	</div>
	<div class="carousel-item" style="background-image: url('assets/img/slide/slide3.jpg')">
	</div>
	<div class="carousel-item" style="background-image: url('assets/img/slide/slide4.jpg')">
	</div>    
    </div> <!--  .carousel-inner -->

    <ol class="carousel-indicators">
        <li data-target="#home-carousel-main" data-slide-to="1"></li>
		<li data-target="#home-carousel-main" data-slide-to="2"></li>
		<li data-target="#home-carousel-main" data-slide-to="3"></li>
		<li data-target="#home-carousel-main" data-slide-to="4"></li>    
		</ol> <!--  .carousel-indicators -->

    <a class="carousel-control-prev" href="#home-carousel-main" role="button" data-slide="prev">
      <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
      <i class="fa fa-fw fa-angle-left"></i>
      <span class="sr-only">Previous</span>
    </a>
    
    <a class="carousel-control-next" href="#home-carousel-main" role="button" data-slide="next">
      <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
      <i class="fa fa-fw fa-angle-right"></i>
      <span class="sr-only">Next</span>
    </a>

</div>

<section class="section dark intro">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><img src="assets/img/eraga.png" class="img-fluid border card-img-top"  />
				<h2 class="heading wow fadeInUp" data-wow-duration="" data-wow-delay="0s">Property Sales, Residential, Commercial, Agricultural &amp; Industrial Concerns</h2>
			</div> <!--  .col-md-12 -->
			<div class="col-md-6">
				<p class="lead wow fadeInUp" data-wow-duration="" data-wow-delay="0.1s">We are ever committed to not only help you make better property decisions but to also help you get the best financial returns from any of your financial investments with us.</p> 
				<!--  .lead -->
		  </div> <!--  .col-md-6 -->
			<div class="col-md-6">
				<p class="wow fadeInUp" data-wow-duration="" data-wow-delay="0.2s">Our business is built on trust and integrity. We have vast knowledge and strategic relationships within the industry which gives our clients, partners, investors and suppliers the confidence to work with us.</p>
		  </div> <!--  .col-md-6 -->
		</div> <!--  .row -->
	</div> <!--  .container -->
</section> <!--  .intro -->
<section class="section light completed">
<div class="container">
<div class="row">
<div class="col-md-5">
<div class="completed-carousel owl-theme owl-carousel">
<div><img src="assets/img/pg1.jpg" alt="7 on Westbourne Image" class="card-img-top" />
</div>
<div><img src="assets/img/pg2.jpg" alt="12 on Dover Image" class="card-img-top" />
</div></div> 
<!--  .completed-carousel -->
</div> 
<!--  .col-md-5 -->

<div class="col-md-7">
<h2 class="heading left wow fadeInUp" data-wow-duration="" data-wow-delay="0s">Who We Are</h2>
<p class="lead wow fadeInUp" data-wow-duration="" data-wow-delay="0.1s">We are a firm of Estate Surveyors and Valuers. A Chartered Surveyors approved to practice Estate Surveyors. We are known for delivering modern properties in Nigeria and globally. Perfect properties for families, perfect for investors.</p> 
<!--  .lead -->
<p class="wow fadeInUp" data-wow-duration="" data-wow-delay="0.2s"><?php echo $site_title ?> was incorporated in Nigeria with Registration Number <strong>2043956.</strong> It was registered on 06 Nov 2007.</p>
</div> 
<!--  .col-md-5 -->
</div> 
<!--  .row -->
</div> 
<!--  .container -->
</section> 
<!--  .completed -->

<section class="section about wow fadeInUp" data-wow-duration="" data-wow-delay="0s">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h2 class="heading wow fadeInUp" data-wow-duration="" data-wow-delay="0.1s">Choose <? echo $site_title?>!
				  <!--  .lead -->
			    </h2>
							<p>Looking to keep your property well-managed but would rather not manage it yourself? Our Property Management team works with landlords, whether for a single property or a portfolio, to keep tenancies running smoothly and any maintenance issues dealt with efficiently.</p>
							<p>From repairs to legal responsibilities, we provide an effective service that will give you and your tenants peace of mind.</p>
							<p>We aim to make sure our landlords receive the best possible service at all times. As a result, our head of property services will regularly meet with our landlords to advise on how they can best optimize their investment, build a longstanding relationship and get regular feedback on what is going well and on what we can improve.</p>
							<p class="wow fadeInUp" data-wow-duration="" data-wow-delay="0.3s">&nbsp;</p>
			</div> <!--  .col-md-6 -->
			<div class="col-md-5">
<div class="owl-carousel about-carousel">
<div>
<img src="assets/img/0000_Office-400x300.jpg" alt="Home Image" class="img-fluid border card-img-top" />
</div>

<div>
<img src="assets/img/0001_Outside-400x300.jpg" alt="Home Image" class="img-fluid border card-img-top" />
</div>
</div> <!--  .owl-carousel -->
			</div> <!--  .col-md-6 -->
		</div> <!--  .row -->
	</div> <!--  .container -->
</section> <!--  .about -->
  
<?php
require_once ('footer.php');
?>