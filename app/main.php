<?php
include_once("includes/db.php");
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title></title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<a href="pages/authentication/login.php">Login</a>
		<a href="pages/authentication/register.php">Sign up</a>
		<br>
		<?php
			try {
				$sql = "SELECT p.id, p.title, p.description, p.text, 
							   p.date_created, u.login, c.title as category 
							FROM post p LEFT JOIN users u ON p.user_id = u.id 
							LEFT JOIN category c ON p.category_id = c.id;";
				$result = $db->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo '<tr>';
					echo '<td>' . $row['login'] . ' in the ' . $row['category'];
					echo '<br>';
					echo '<td>' . $row['description'] . '</td>';
					echo '<br>';
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		?>
	</body>

</html>