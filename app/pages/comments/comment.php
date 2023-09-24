<?php
// подключение необходимых файлов обработчиков
include_once("../../includes/functions.php");
// include_once("includes/session.php");
include_once("../../includes/db.php");

?>

<!-- Page Header -->
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul class="page-header-breadcrumb">
					<li><a href="/">Home</a></li>
					<li>Comments</li>
				</ul>
				<h1>Comment</h1>
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
			<div class="col-md-12">
				<div class="section-row">
					<h3>Comments</h3>

					<a href="add_comment.php">Add comment</a>

					<table border="1" width="100%">
						<tr>
							<th width="5%">ID</td>
							<th width="40%">Text</td>
                            <th width="5%">User</td>
                            <th width="5%">Post</td>
						</tr>
						<?php
						try {
							$sql = "SELECT * FROM comment";
							$result = $db->query($sql);

							while ($row = $result->fetch_assoc()) {
								echo '<tr>';
								echo '<td>' . $row['id'] . '</td>';
								echo '<td>' . $row['text'] . '</td>';
                                echo '<td>' . $row['user_id'] . '</td>';
                                echo '<td>' . $row['post_id'] . '</td>';
                                echo '<td><a href="update_comment_form.php?id=' . $row['id'] . 
									'">Edit</a> | <a href="delete_comment.php?id=' . 
									$row['id'] . '">Delete</a></td>';
								echo '</tr>';
							}
						} catch (mysqli_sql_exception $e) {
							echo $e->getMessage();
						}
						?>
					</table>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
