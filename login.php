<?php
    $error = '';
    if($_SESSION['login']){
        header("location: /dashboard");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $userPassword = $_POST['password'];

//        $servername = "127.0.0.1:3306";
//        $username = 'root';
//        $password = '@21Nov2004';
//        $database = 'ClientDetailsDB';
//
//        $conn = mysqli_connect($servername, $username, $password, $database);
//
//        if (!$conn){
//            echo "error";
//        }

        $existSql2 = "SELECT * FROM Clients WHERE email = '$email';";
        $result2 = mysqli_query($conn, $existSql2);

        $user = [];

        if (mysqli_num_rows($result2)) {
            while($user = mysqli_fetch_assoc($result2)){
                if ($userPassword== $user['password']){

                    $_SESSION['login'] = 1;
                    $_SESSION['username'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['id'] = $user['id'];
//                    echo ($_SESSION['login'] . " " . $_SESSION['username']);
                    header('location: /dashboard');
                }
                else{
                    $error = 'Incorrect Password';
                }
            }
        }
        else{
            $error = 'Invalid Credentials';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HexaShop</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
<div class="login-container">
    <form class="login-form" action="/login" method="POST">
        <h2 class="font-mono">findhome.com</h2>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" id="username" name="email" placeholder="Enter your email address" required>
            <?php if($error == 'Invalid Credentials') : ?>
                <p class="text-red-500 py-1">*<?=$error ?></p>
            <?php endif;?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <?php if($error == 'Incorrect Password') : ?>
                <p class="text-red-500 py-1">*<?=$error ?></p>
            <?php endif;?>
        </div>
        <button type="submit">Login</button>

        <p>Don't have an account? <a href="/register">Register Here</a></p>
    </form>
</div>
</body>
</html>