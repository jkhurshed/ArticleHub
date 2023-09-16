<?php


include_once("../../includes/db.php");
include_once("../../includes/functions.php");

if (session_id() == "") {
    session_start();
}

if (isset($_POST['login'])) $login = $_POST['login'];
if (isset($_POST['password'])) $password = $_POST['password'];
if (isset($_POST['remember'])) {
    $remember = $_POST['remember'] == "on" ? 1 : 0;
}


if (!empty($login) && !empty($password)) {

    // if(strlen($password) < 3) {
    // 	echo "Запольните форму правильно.";
    // 	exit;
    // }


    try {

        $query = "SELECT * FROM users WHERE login = ?";

        $sql = $db->prepare($query);

        $sql->bind_param("s", $login);

        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();


            if (password_verify($password, $row['password'])) {

                $_SESSION["id"] = session_id();
                // debug($_SESSION["id"], true);

                $_SESSION['id'] =  $row['id'];
                $_SESSION['login'] =  $row['login'];

                // debug($_SESSION, true);

                if (isset($remember) && $remember == 1) {
                    
                    //добавление куки
                    setcookie('sessionId', $_SESSION["id"], time() + (86400 * 30));
                    echo "ok";

                    // debug($remember, true);
                }


                header("Location: ../../main.php");
                exit;
            }

        }

        // $data = [
        // 	'name' => $name,
        // 	'color' => $color,
        // 	'status' => $status
        // ];

        // $sql->execute($data);

        // echo "Ok";
        // echo "<br>";

        // $sql = "SELECT * FROM category";
        // $result = $db->query($sql);

        // debug($result);


        // while($row = $result->fetch()) {
        // 	debug($row);
        // }

        // debug($row);


    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    if (empty($login)) $_SESSION['error']['login'] = 'Please fill the LOGIN field correctly';
    if (empty($password)) $_SESSION['error']['password'] = 'Please fill the PASSWORD field correctly';
}

header("Location: login.php");

$db->close();
?>
