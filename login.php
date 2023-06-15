<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'atmin' && $password === 'qwerty123') {

        $_SESSION['username'] = $username;

        header('Location: index.php');
        exit();
    } else {
        $error = "Username or password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Document</title>
</head>
<body>

<div class="login-box">
    <img src="profil.png" class="profil"></img>
    <h1> LOGIN</h1>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <p class="username">
            <label>Username :</label>
            <input type="text" name="username" placeholder="Username..." required></input>
        </p>

        <p class="password">
            <label>Password :</label>
            <input type="password" name="password" placeholder="Password..." required></input>
        </p>

        <button type="submit" class="submit">Login</button><br/><br>
    </form>
</div>

</body>
</html>