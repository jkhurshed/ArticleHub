<?php
// подключение необходимых файлов обработчиков
include_once("../../includes/functions.php");
// include_once("session.php");
include_once("../../includes/db.php");
// include_once('header.php');
?>

<!-- Page Header -->
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul class="page-header-breadcrumb">
					<li><a href="/">Home</a></li>
					<li><a href="category.php">Categories</a></li>
					<li>Edit categories</li>
				</ul>
				<h1>Edit category</h1>
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
			<?php if (isset($_GET['id'])) : ?>
				echo "ok";

				<?php

				if (!empty($_GET['id'])) {

					try {
						$query = "SELECT * FROM post WHERE id = ?";

						$sql = $db->prepare($query);

						$sql->bind_param('i', $_GET['id']);

						if ($sql->execute()) {
							$result = $sql->get_result();

							if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							 ?>
							
							<div class="col-md-5 col-md-offset-1">
								<div class="section-row">
									<h3>Edit category</h3>
									<form action="update_post.php" method="post" name="updatePost">
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<span>Title</span>
													<input class="input" type="text" name="title" value="<?= $row['title']; ?>">
													<input class="input" type="hidden" name="id" value="<?= $row['id']; ?>">
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<span>Description</span>
													<input class="input" type="text" name="description" value="<?= $row['description']; ?>">
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<span>Post text</span>
													<input class="input" type="text" name="text" value="<?= $row['text']; ?>">
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<span>User</span>
													<select name="user_id">
														<?php
														try {
															$sql = "SELECT * FROM users";
															$result = $db->query($sql);
															while ($row = $result->fetch_assoc()) {
																echo '<option value="' . $row['id'] . '">' . $row['login'] . '</option>';
															}
														} catch (Exception $e) {
															echo $e->getMessage();
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<span>Category</span>
													<select name="category_id">
														<?php
														try {
															$sql = "SELECT * FROM category";
															$result = $db->query($sql);
															while ($row = $result->fetch_assoc()) {
																echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
															}
														} catch (Exception $e) {
															echo $e->getMessage();
														}
														?>

													</select>
												</div>
											</div>
											<div class="col-md-12">
												<input type="submit" value="Submit" class="primary-button">
											</div>
										</div>
									</form>
								</div>
							</div>

				<?php
						} else {
							echo "No records found for the specified ID";
						}
					} else {
						echo "Error executing the query" . $db->error . "sql error: " . $sql->error;
					}
					$sql->close();
					$db->close();
					} catch (Exception $e) {
						echo $e->getMessage();
					}
				} else {
					echo "Enter the correct values";
				}
				?>
			<?php endif; ?>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php //include_once('footer.php'); 
?>
