<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="register_process.php" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fio" id="fio" required><br><br>

        <label for="login">Username:</label>
        <input type="text" name="login" id="login" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Register">
    </form>


    <?php
    // Check for validation errors
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
    </head>
        <h2>Registration Form</h2>

        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="register_process.php" method="post">
            <!-- Rest of the form code -->
        </form>
</body>
</html>
