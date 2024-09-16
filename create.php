<?php

    $id = $_SESSION['id'];
    $ownerName = $_POST['ownerName'];
    $ownerContact = $_POST['ownerContact'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $type = $_POST['type'];
    $rooms = $_POST['rooms'];
    $image = 'assets/images/' . $_POST['image'] . '.jpg';
    $description = $_POST['description'];
    $location = $_POST['location'];
    $map = $_POST['map'];

//    $servername = "127.0.0.1:3306";
//    $username = 'root';
//    $password = '@21Nov2004';
//    $database = 'ClientDetailsDB';
//
//    $conn = mysqli_connect($servername, $username, $password, $database);
//
//    if (!$conn){
//        echo "error";
//    }

    $existSql2 = "INSERT INTO Details (client_id, owner_name, owner_contact, location, google_location, description, image, size, price, type, rooms) VALUES
($id, '$ownerName', '$ownerContact', '$location', '$map', '$description', '$image', '$size', '$price', '$type', '$rooms');";

    $result2 = mysqli_query($conn, $existSql2);

    header('location: /dashboard');