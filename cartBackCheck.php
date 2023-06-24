
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'cart.php';
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
     $sql = "insert into ordert(total_profit,total_price) values($total_profit,$total_price)";
     mysqli_query($conn,$sql);
     $sql = "UPDATE order_list o 
     JOIN (
         SELECT product_name, COUNT(*) AS repetition_count
         FROM order_list
         GROUP BY product_name
     ) c ON o.product_name = c.product_name
     SET o.quantity = CASE
         WHEN c.repetition_count > 1 THEN o.quantity * 2
         ELSE o.quantity
     END;";
     mysqli_query($conn,$sql);
     $sql = "update products p, order_list o
     set p.amount = p.amount - o.quantity
     where p.pName IN(
     select distinct o.product_name
     from order_list
     where p.pName = o.product_name
     );";
     mysqli_query($conn,$sql);
     $sql = "Delete from order_list";
     mysqli_query($conn,$sql);
     $conn->close();
    ?>
</body>
</html>