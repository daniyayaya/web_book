<?php
error_reporting(E_ALL ^ E_NOTICE); //specify All errors and warnings are displayed
session_start();
extract($_POST);

//connect to MySQL DB
require_once __DIR__ . '/../database/conn.php';

$stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetchAll();
if($result){
    echo "<script>
    alert('A user with this email has already signed up!'); 
    window.location.href = 'http://localhost/book/pages/registration.html';
    </script>";

} else {
    //store data in session
    $_SESSION["username"] = $login;

    //hash password
    $hashedPassword = hash("sha256", $pass);

    $stmt = $conn->prepare("
        INSERT INTO user 
        VALUES(NULL, :username, :email, :hashedPassword)
    ");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $login);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->execute();

    echo "<script>
    alert('Sign up Success!'); 
    window.location.href = 'http://localhost/book/server/books.php';
    </script>";
}

?>