<?php
// Database connection credentials
$servername='localhost';
$username='root';
$password='';
$dbname = "task";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT userid,email,fullname,pass,country FROM users";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}


$conn->close();


header('Content-Type: application/json');
echo json_encode($users);
?>
