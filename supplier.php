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

$FinalPid = filter_input(INPUT_POST,'pid',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$FinalPname = filter_input(INPUT_POST,'FinalProductName',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$FinalPdate = filter_input(INPUT_POST,'FinalProductDate',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$FinalEdate = filter_input(INPUT_POST,'FinalExpiryDate',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$FinalCategory = filter_input(INPUT_POST,'FinalCategory',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$FinalSprice = filter_input(INPUT_POST,'FinalSprice',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$FinalPprice = filter_input(INPUT_POST,'FinalPprice',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$FinalAmount = filter_input(INPUT_POST,'FinalAmount',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if($FinalPname!=''){
$sql= "Update products P Set P.pName='$FinalPname' Where P.pid=$FinalPid";
mysqli_query($conn,$sql);
}
if($FinalPdate!=''){
$sql= "Update products P Set P.production_date='$FinalPdate' Where P.pid=$FinalPid";
mysqli_query($conn,$sql);
}
if($FinalEdate!=''){
$sql= "Update products P Set P.expiry_date='$FinalEdate' Where P.pid=$FinalPid";
mysqli_query($conn,$sql);
}
if($FinalCategory!=''){
$sql= "Update products P Set P.category='$FinalCategory' Where P.pid=$FinalPid";
mysqli_query($conn,$sql);
}
if($FinalSprice!=''){
$sql= "Update products P Set P.sell_price=$FinalSprice Where P.pid=$FinalPid";
mysqli_query($conn,$sql);
}
if($FinalPprice!=''){
$sql= "Update products P Set P.purchase_price=$FinalPprice Where P.pid=$FinalPid";
mysqli_query($conn,$sql);
}
if($FinalAmount!=''){
$sql= "Update products P Set P.amount=$FinalAmount + P.amount Where P.pid=$FinalPid";
mysqli_query($conn,$sql);
}

echo '<div class="design">
You have updated a product information
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
?>
</body>
</html>