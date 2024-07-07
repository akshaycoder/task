<?php

header("HTTP/1.1 200 OK");

$servername='localhost';
$username='root';
$password='';
$dbname = "task";
try {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $pass = $_POST['pass'];
    $country = $_POST['country'];
    
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "INSERT INTO users (email,fullname,pass,country)
    VALUES ('$email', '$fullname','$pass','$country')";
    $conn->exec($sql);
   
   echo "<script>alert('New User Successfuly Register');</script>";
   echo "<script> window.location.href = 'index.html';</script>";

    }
catch(PDOException $e)
    {

    	echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>