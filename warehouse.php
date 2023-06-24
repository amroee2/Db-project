<!DOCTYPE html>
<html>
<style>
 p{
  text-align: center;
  width: 100;
  font-weight: bold;
  font-size: 40px;
 }
</style>
<head>
  <title>Data Example</title>
</head>
<body>
  <h1> Store Products</h1>
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
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No data found";
}

$conn->close();
$numCols = 5; // Number of elements per row
$count = 0; // Counter to keep track of the number of elements

echo '<style>
  body{
    background: linear-gradient(90deg,#cd122d,#154284);
  }
  table {
    background-color:black;
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
    position: relative;
    top: 0px;
  }
  table td {
    border: 2px solid #ddd;
    padding: 10px;
    vertical-align: top;  
    font-weight: bold;
    color: #FDC52C;
  }
  table td:hover{
    border: 2px solid red;
  }
  table strong {
    text-decoration:underline;
    font-weight: bold;
    color: #FDC52C;
  }
  button{
    background-color: #FDC52C;
    transition: background-color 1s ease;
  }
  button:hover{
    background: linear-gradient(90deg,#cd122d,#154284);
  }
  h1 {
    text-align:center;
    font-size:75px;
  }
</style>';

echo '<table>';
foreach ($data as $i) {
  if ($count % $numCols === 0) {
    echo '<tr>'; // Start a new row
  }

  echo '
    <td>
      <div style="color: white; font-size:20px;">'.$i['pid'].'. '.$i['pName'].'<hr></div>
      <div><strong>Production date:</strong>    '.$i['production_date'].'</div>
      <div><strong>Expiry date:</strong>    '.$i['expiry_date'].'</div>
      <div><strong>Category:</strong>   '.$i['category'].'</div>
      <div><strong>Sell price:</strong>   '.$i['sell_price'].'</div>
      <div><strong>Purchase price:</strong>   '.$i['purchase_price'].'</div>
      <div><strong>Amount:</strong>   '.$i['amount'].'</div>
    </td>
  ';
  
  $count++;
  if ($count % $numCols === 0) {
    echo '</tr>'; // End the current row
  }
}
// If the last row is not complete, add empty cells to fill the remaining columns
if ($count % $numCols !== 0) {
  $remainingCols = $numCols - ($count % $numCols);
  echo str_repeat('<td></td>', $remainingCols);
  echo '</tr>'; // End the last row
}

echo '</table>';

echo '<div style="display:flex;column-gap: 10px; "> 
        <div>
        <a href="insert.html" style="text-decoration:none";> <button>  Insert </button> </a> 
        </div>
        <div>
         <a href="Update.html" style="text-decoration:none";> <button> Update </button> </a> 
        </div>
        <div> 
        <a href="Delete.html" style="text-decoration:none";> <button> Delete </button> </a> 
        </div>
        <div>
        <a href="newSupplier.html" style="text-decoration:none";> <button> Insert a new supplier </button> </a> 
        </div>
    </div>';
?>
</body>
</html>