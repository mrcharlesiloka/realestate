<div id="sidebar">
			<div class="box">
				<div class="h_title">&#8250; Menu </div>
				<ul id="home">
					<li class="b1"><a class="icon view_page" href="main.php">Home</a></li>
									</ul>
			</div>
			<div class="box">
				<div class="h_title">&#8250; Gallery</div>
				<ul id="home">
				<li class="b1"><a class="icon category" href="category.php">Categories / Types</a></li>
				<li class="b1"><a class="icon add" href="add.php"> Add New Property </a></li>
				<li class="b1"><a class="icon photo" href="gallery.php">Listings (<?php $sql = "SELECT COUNT(id) FROM $gallery"; $result = mysqli_query($connect,$sql); $row = mysqli_fetch_row($result); $total_records = $row[0];  echo "$total_records"; ?>)</a></li>
														</ul>
			</div>
			<div class="box">
				<div class="h_title">&#8250; Admin Profile </div>
				<ul id="home">
					<li class="b1"><a class="icon add_user" href="edit_pass.php">Edit Admin Profile</a></li>
				</ul>
			</div>
			<div class="box">
				<div class="h_title">&#8250; Log Out </div>
				<ul id="home">
					<li class="b1"><a class="icon block_users" href="logout.php">LogOut</a></li>
				</ul>
			</div>
		</div>