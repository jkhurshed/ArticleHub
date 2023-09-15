<?php
include_once("../../functions.php");
include_once("../../includes/db.php");

?>

<!-- Page Header -->
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul class="page-header-breadcrumb">
					<li><a href="/">Home</a></li>
					<li><a href="category.php">Categories</a></li>
					<li>Add categories</li>
				</ul>
				<h1>Add category</h1>
			</div>
		</div>
	</div>
</div>
<!-- /Page Header -->
</header>
<!-- /Header -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php if (!isset($_POST['title'])) : ?>
				<div class="col-md-5 col-md-offset-1">
					<div class="section-row">
						<h3>Add category</h3>
						<form action="add_category.php" method="post">
							<div class="row">
								<div class="col-md-7">
									<div class="form-group">
										<span>Title</span>
										<input class="input" type="text" name="title">
									</div>
								</div>
								
								<div class="col-md-12">
									<input type="submit" value="Submit" class="primary-button">
								</div>
							</div>
						</form>
					</div>
				</div>
			<?php else : ?>
			
				<?php 

					if (isset($_POST['title'])) {
						
						// print_r($_POST);
						// exit;
						
						try {
							$sql = 'INSERT INTO category(title) VALUES(?)';

							// if($db->query($sql)) {
							// 	echo 'Ok';
							// 	exit;

							// }

							$stmt = $db->prepare($sql);
							$stmt->bind_param('s', $_POST['title']);
									
							$stmt->execute();
	
							$effected_rows = $stmt->effected_rows;

							$stmt->close();
							$db->close();

							header("Location: category.php");
							exit;
							
						} catch (Exception $e) {
							echo $e->getMessage();
						}


					}

				?>
			<?php endif; ?>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
