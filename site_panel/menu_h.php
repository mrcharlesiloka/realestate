<div id="nav">
			<ul>
				<li class="upp"><a href="main.php">Home</a>
								</li>
								<li class="upp"><a href="add.php">Add New Property</a></li>
				<li class="upp"><a href="gallery.php">Listings (<?php $sql = "SELECT COUNT(id) FROM $gallery"; $result = mysqli_query($connect,$sql); $row = mysqli_fetch_row($result); $total_records = $row[0];  echo "$total_records"; ?>)</a>
									</li>
								<li class="upp"><a href="category.php">Categories / Types</a></li>
								<li class="upp"><a href="edit_pass.php">Admin Profile</a></li>
								<li class="upp"><a href="logout.php">Logout</a></li>
							</ul>
		</div>