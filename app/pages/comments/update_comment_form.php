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
					<li><a href="comment.php">Comments</a></li>
					<li>Edit comments</li>
				</ul>
				<h1>Edit comments</h1>
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
				<?php

				if (!empty($_GET['id'])) {

					try {
						$query = "SELECT * FROM comment WHERE id = ?";

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
									<form action="update_comment.php" method="post" name="updatePost">
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<span>text</span>
													<input class="input" type="hidden" name="id" value="<?= $row['id']; ?>">
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
													<span>Post</span>
													<select name="post_id">
														<?php
														try {
															$sql = "SELECT * FROM post";
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
