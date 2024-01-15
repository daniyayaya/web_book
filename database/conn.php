<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db = "book_db";

try {

    $conn = new PDO("mysql:host=$servername;port=3307;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ""; 
} catch (PDOException $e) {
    echo "Failed" . $e->getMessage();
}

?>