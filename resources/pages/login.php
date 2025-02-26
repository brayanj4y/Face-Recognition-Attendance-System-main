<?php

//handle user login logics



$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($password)) {
        $errors['password'] = 'Password cannot be empty';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        exit();
    }
    if ($userType == "administrator") {
        $stmt = $pdo->prepare("SELECT * FROM tbladmin WHERE emailAddress = :email");
    } elseif ($userType == "lecture") {
        $stmt = $pdo->prepare("SELECT * FROM tbllecture WHERE emailAddress = :email");
    }
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user'] = [
            'id' => $user['Id'],
            'email' => $user['emailAddress'],
            'name' => $user['firstName'],
            'role' => $userType,
        ];

        header('Location: home');
        exit();
    } else {
        $errors['login'] = 'Invalid email or password';
        $_SESSION['errors'] = $errors;
    }
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}


function display_error($error, $is_main = false)
{
    global $errors;
    if (isset($errors["{$error}"])) {

        echo '<div class="' . ($is_main ? 'error-main' : 'error') . '">
                <p>' . $errors["{$error}"] . '</p>
        </div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login to access dashboard </title>
    <link href="resources/images/logo/logo light.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="resources/assets/css/login_styles.css">
</head>

<body>

    <div class="container" id="signIn">
        <div class="logo">
        <img src="resources/images/logo/logo light.png" alt="">
        </div>
        <h1 class="form-title">WELCOME, LOGIN</h1>
        <?php
        display_error('login', true);
        ?>
        <form method="POST" action="">
                <select name="user_type" id="" required>
                    <option value="">Select User</option>
                    <option value="lecture">Manager</option>
                    <option value="administrator">Admin</option>
                </select>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <?php
                display_error('email');
                ?>
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <?php
                display_error('password')
                ?>

            <input type="submit" class="btn" value="LOGIN" name="login">
        </form>

    </div>
    <script src="resources/assets/javascript/script.js"></script>
</body>

</html>