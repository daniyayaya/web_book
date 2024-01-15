<?php
error_reporting(E_ALL ^ E_NOTICE); //specify All errors and warnings are displayed
session_start();
extract($_POST);

//connect to MySQL DB
require_once __DIR__ . '/../database/conn.php';

//hash password
$hashedPassword = hash("sha256", $pass);

$stmt = $conn->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashedPassword);
$stmt->execute();
$result = $stmt->fetchAll();

if(!$result){
    echo "<script>
    alert('Invalid email and/or password. Please login again.'); 
    window.location.href = 'http://localhost/book/pages/login.html';
    </script>";
} else {
    //store data in session
    $_SESSION["username"] = $result[0]['username'];
    
    header("Location: http://localhost/book/server/books.php");
}

?>