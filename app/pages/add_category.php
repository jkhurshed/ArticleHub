<?php
include_once("includes/functions.php");
include_once("includes/db.php");

?>

<!-- Page Header -->
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul class="page-header-breadcrumb">
					<li><a href="/">Home</a></li>
					<li><a href="/category.php">Categories</a></li>
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
			<?php if (!isset($_POST['name'])) : ?>
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
				if (isset($_POST['title'])) $title = $_POST['title'];
                if (isset($_POST['title'])) {
                    $title = $_POST['title'];

                    if (!empty($title)) {
                        try {
							$title = $_POST['title'];

                            $query = "INSERT INTO category (title) VALUES (:title)";

                            $sql = $db->prepare($query);

                            $data = [
								'title' => $title
							];

                            $sql->execute($data);

                            echo "Ok";
                            echo "<br>";

                            $sql = "SELECT * FROM category";
                            $result = $db->query($sql);

                            debug($result);


                            while ($row = $result->fetch()) {
                                debug($row);
                            }

                            debug($row);
                            echo "record success";

                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
				    } else {
					echo "Fill the form correctly.";
				    }
                } else {
                    echo "Title not submitted.";
                }
				?>

			<?php endif; ?>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
