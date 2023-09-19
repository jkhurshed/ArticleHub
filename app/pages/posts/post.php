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
					<li>Posts</li>
				</ul>
				<h1>Posts</h1>
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
					<h3>Posts</h3>

					<a href="/add_post.php">Add post</a>

					<table border="1" width="100%">
						<tr>
							<th width="5%">ID</td>
							<th width="20%">Title</td>
                            <th width="20%">Description</td>
                            <th width="25%">text</td>
                            <th width="5%">user_id</td>
                            <th width="5%">category_id</td>
						</tr>
						<?php
						try {
							$sql = "SELECT * FROM post";
							$result = $db->query($sql);

							while ($row = $result->fetch_assoc()) {
								echo '<tr>';
								echo '<td>' . $row['id'] . '</td>';
								echo '<td>' . $row['title'] . '</td>';
                                echo '<td>' . $row['description'] . '</td>';
                                echo '<td>' . $row['text'] . '</td>';
                                echo '<td>' . $row['user_id'] . '</td>';
                                echo '<td>' . $row['category_id'] . '</td>';
                                echo '<td><a href="update_post.php?id=' . $row['id'] . 
									'">Редактировать</a> | <a href="delete_post.php?id=' . 
									$row['id'] . '">Удалить</a></td>';
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
