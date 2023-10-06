<?php
require_once ('header.php');
$cat=$_GET['category'];
?>
<div class="page-title dark development">
<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="display-4 wow fadeInUp" data-wow-duration="" data-wow-delay="">
					Property Category (<?php echo $cat; ?>)					
				</h1>

				
			</div> <!--  .col-md-8 -->
			<div class="col-md-4 breadcrumbs wow fadeInUp" data-wow-duration="" data-wow-delay=".1s">
				<ol class="breadcrumb"><li class="breadcrumb-item"><a href="./">Home</a></li><li class="breadcrumb-item active">Property Category</li></ol>			</div> <!--  .col-md-4 -->
		</div> <!--  .row -->
	</div> <!--  .container -->
</div> <!--  .page-title -->
<section class="section light">
<div class="container">
	<div class="row">
<div class="col-12">
<?php
$sql="SELECT * FROM $gallery WHERE category='$cat' ORDER BY date DESC";
$result=mysqli_query($connect,$sql);
if (mysqli_num_rows($result) == 0) {
?>
	
<div class="tab-pane active" id="current" role="tabpanel" aria-labelledby="current-tab">
			<section class="section no-show-days wow fadeInUp" data-wow-duration="" data-wow-delay="0s">
			<h2 class="heading wow fadeInUp" data-wow-duration="" data-wow-delay="0.1s">No Properties in <?php echo $cat ?></h2> <!-- Property not found heading -->
			<p class="lead wow fadeInUp" data-wow-duration="" data-wow-delay="0.2s">We can notify you as soon as we have properties.</p> <!-- Notification message -->
				
        </section>
		 <!--  .row --></div>


<?php

}
	else{

while($rows = mysqli_fetch_array( $result,MYSQLI_ASSOC ))

{
 $img_name = $rows['pic'];
		$img_title = $rows['title'];
 $img_id = $rows['id'];
		$img_price = $rows['price'];
		$img_cat = $rows['category'];
		$img_type = $rows['gal_type'];
		$img_location = $rows['location'];
		$img_avail = $rows['avail'];
		$img_caption = $rows['caption'];
		$images = "site_panel/gallery/$img_name";
?>
     

<div class="tab-content">
<div class="tab-pane active" id="current" role="tabpanel" aria-labelledby="current-tab">

			<div class="single-entry wow fadeInUp" data-wow-duration="" data-wow-delay="0s">
			<div class="row">
			<div class="col-md-7">
			<img src="<?php echo $images; ?>" alt="" class="img-fluid" />
			</div> <!--  .col-md-6 -->
			<div class="col-md-5">
			<div class="single-entry-info section-content"><!--  Property details area -->
			<h2><?php echo $img_title; ?></h2>
			<p class="development-starting-cost"><span class="prefix">Price:</span> <?php echo $img_price; ?></p> 
			<h3 class="development-area"><?php echo $img_location; ?></h3> <!-- Property location -->
			<?php echo substr($img_caption,0,250); ?>...
			<a class="btn btn-lg btn-primary" title="selected" href="property_detail?id=<?php echo $img_id; ?>">Read More</a>
			<hr />
			<p>Category: <span><strong><?php echo $img_cat; ?></strong></span>&nbsp;&nbsp;<span style="background-color:#006600; color:#FFFFFF;">&nbsp;<i class="fa fa-home fa-fw"></i> <strong><?php echo $img_avail; ?></strong>&nbsp;</span></p>
			
			</div> <!--  .single-entry-info -->
			</div> <!--  .col-md-5 -->
			</div> <!--  .row -->
			</div> <!--  .single-entry -->
			
		
		</div>
</div>


 <?php
}
}
?>
	</div>
<!-- tab-content -->



	</div> <!--  .row -->

		
</div> <!--  .container -->
</section>
<?php
require_once ('footer.php');
?>