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
					<li><a href="">Home</a></li>
					<li>Categories</li>
				</ul>
				<h1>Categories</h1>
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
					<h3>Categories</h3>

					<a href="add_category.php">Add category</a>

					<table border="1" width="100%">
						<tr>
							<th width="10%">ID</td>
							<th width="20%">Title</td>
						</tr>
						<?php
						try {
							$sql = "SELECT * FROM category";
							$result = $db->query($sql);

							while ($row = $result->fetch_assoc()) {
								echo '<tr>';
								echo '<td>' . $row['id'] . '</td>';
								echo '<td>' . $row['title'] . '</td>';
                                echo '<td><a href="update_category_form.php?id=' . $row['id'] . '">Update</a> | <a href="delete_category.php?id=' . $row['id'] . '">Delete</a></td>';
								echo '</tr>';
							}
						} catch (Exception $e) {
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

<body>
    <form>
        <select name="cat" onchange="showCategory(this.value)" style="height:50px;">
            <option value="">Выберите категорию</option>
            <?php
            $result = mysqli_query($db, "SELECT * FROM category");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>";
                echo $row['title'];
                echo "</option>";
            }
            ?>
        </select>
    </form>

    <div id="CategoryInfo">

    </div>


    <script type="text/javascript">
        function showCategory(category_id) {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("CategoryInfo").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "searching.php?q=" + category_id, true);
            xmlhttp.send();

        }
    </script>

</body>