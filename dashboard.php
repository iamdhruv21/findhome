<?php
    if(!$_SESSION['login']){
        header("location: /");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];

//        $servername = "127.0.0.1:3306";
//        $username = 'root';
//        $password = '@21Nov2004';
//        $database = 'ClientDetailsDB';
//
//        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn){
            echo "error";
        }

        $existSql2 = "DELETE FROM Details WHERE id = $id;";
        $result2 = mysqli_query($conn, $existSql2);

        header('location: /dashboard');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
<?php
$name = $_SESSION['username'];
    require ("navbar.php");

    require ("deshboardMain.php");
?>

<script>
    document.getElementById('show').addEventListener("click", show);
    document.getElementById('cancel').addEventListener("click", cancel);
    // document.getElementById('toggle').addEventListener("click", cancel);
    function cancel(){
        document.getElementById('toggle').style.display = 'none';
        console.log('hidden')
    }
    function show(){
        document.getElementById('toggle').style.display = 'block';
        console.log('show')
    }
</script>
</body>
</html>
