<?php
    if($_SESSION['login']){
        header("location: /dashboard");
        exit;
    }
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userPassword = $_POST['password'];
        $cpassword = $_POST['confirm-password'];

//        $servername = "127.0.0.1:3306";
//        $username = 'root';
//        $password = '@21Nov2004';
//        $database = 'ClientDetailsDB';
//
//        $conn = mysqli_connect($servername, $username, $password, $database);

//        if (!$conn) {
//            echo "error";
//        }

        $existSql1 = "SELECT * FROM Clients WHERE email = '$email';";
        $result1 = mysqli_query($conn, $existSql1);

        if (!mysqli_num_rows($result1)) {
                if ($userPassword == $cpassword){
                    $existSql2 = "INSERT INTO Clients (name, email, password)
                                  VALUES('$name', '$email', '$userPassword');";
                    $result2 = mysqli_query($conn, $existSql2);

                    $result3 = mysqli_query($conn, $existSql1);
                    while($user = mysqli_fetch_assoc($result3)){
                        $_SESSION['id'] = $user['id'];
                    }

                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $name;
                    $_SESSION['email'] = $email;

                    header('location: /dashboard');
                }
                else{
                    $error = 'Password does not Match';
                }

        }
        else{
            $error = 'Email Exist';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HexaShop</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>

<body>
<div class="container">
    <h2 class="font-mono">findhome.com</h2>
    <form action="/register" method="post">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required placeholder="E.g: John J Rambo">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="E.g: johnjrambo@gmail.com">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="********">

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" required placeholder="********">
        <p><?=$error?></p>

        <input type="submit" value="Register">

        <p>Already have an account? <a href="/login">Login Here</a></p>
    </form>
</div>
</body>

</html>
