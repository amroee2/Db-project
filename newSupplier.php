<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

// Connection successful
$CompanyName = filter_input(INPUT_POST,'Cname',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$SupplyDate = filter_input(INPUT_POST,'Sdate',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$PhoneNumber = filter_input(INPUT_POST,'PhoneNum',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
$sql2= "Insert into supplier(companyName, phone, supplyDate)
values ('$CompanyName', '$PhoneNumber', '$SupplyDate')";

mysqli_query($conn,$sql2);

echo '<div class="design">
You have insterted a new product!
<a href="index.php" ><button style="width: 100%; background-color: #FDC52C;">Return to main page</button></a>
</div>
<style>
body{
    background: linear-gradient(90deg,#cd122d,#154284);
    }
.design{
    display: grid;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
    justify-content: center;
    align-items: center;
    background-color: black;
    color: #FDC52C;
    row-gap:10px;
}
</style>';

$conn->close();
?>
</body>
</html>