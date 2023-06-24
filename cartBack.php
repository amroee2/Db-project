
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $host = "localhost";       // MySQL server hostname
     $username = "root";   // MySQL username
     $password = "Amru2002";   // MySQL password
     $database = "project";  // MySQL database name
 
 // Create a connection
     $conn = new mysqli($host, $username, $password, $database);
 
 // Check the connection
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }
     $sql = "Delete from order_list";
     mysqli_query($conn,$sql);
     $conn->close();
     
    ?>
</body>
</html>