<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM users";


$result = $conn->query($sql);


$conn->close();
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vite App</title>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }


    
    
    header {
      background-color: #009494;
      color: white;
      padding: 10px 20px;
      text-align: center;
    }

    
    nav {
      display: inline-block;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
    }

    nav a:hover {
      text-decoration: underline;
    }
  
    </style>
    </head>
    <body>
    <header>
        <h1>SIEMENS TASK</h1>
        <nav>
          <a href="user_reg.html">Registration</a>
          <a href="pro.php">List of Users</a>
        </nav>
      </header>
    <center><h2>List of  Register Users</h2></center>
<?php if ($result->num_rows > 0): ?>
    <table >
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Fullname</th>
            <th>Password</th>
            <th>Country</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["userid"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["fullname"]; ?></td>
                <td><?php echo $row["pass"]; ?></td>
                <td><?php echo $row["country"]; ?></td>
                
            </tr>
        <?php endwhile; ?>
    </table>
    <center><a href="index.html">Back To Home Page</a></center>
        </body>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>