<?php
include_once("../../includes/db.php");

$category_id = (int) $_GET['q'];

$result = mysqli_query($db, "SELECT * FROM category WHERE id = " . $category_id);

echo "<table border=1>
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
";

echo mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result))
{
    echo "
        <tr>
            <td>".$row['id']."</td>
            <td>".$row['title']."</td>
        </tr>
    ";

}

echo "</table>";

mysqli_close($db);
?>