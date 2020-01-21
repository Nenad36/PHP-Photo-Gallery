<?php include ("includes/header.php"); ?>

<?php

if ($session->is_signed_in()) {
    redirect("");
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user_found = User::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "Your password or username incorrect";
    }

 } else {
    $the_message = "";
    $username = "";
    $password = "";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="loginForm/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="loginForm/css/style.css">
</head>
<body>

<div class="main">

    <div class="container">
        <div class="p-2 mb-2 bg-danger text-center"><?php echo $the_message; ?></div>
        <form action="" method="post" class="appointment-form">
            <h2>education appointment form</h2>
            <div class="form-group-1">
                <input type="text" name="username" value="<?php htmlentities($username); ?>" placeholder="Username" />
                <input type="password" name="password" value="<?php htmlentities($password); ?>" placeholder="Password" />
            </div>
            <div class="form-submit">
                <input type="submit" name="submit" class="submit" value="Login" />
            </div>
        </form>
    </div>

</div>

<!-- JS -->
<script src="loginForm/vendor/jquery/jquery.min.js"></script>
<script src="loginForm/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
