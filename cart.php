<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background:linear-gradient(90deg ,#154284, #cd122d); display:flex; flex-direction:column; align-items:center;" >
    <?php
    $host = "localhost";       // MySQL server hostname
    $username = "root";   // MySQL username
    $password = "Amru2002";   // MySQL password
    $database = "project";  // MySQL database name
    $sum = 0;
    $total_profit=0;
    $total_price=0;
// Create a connection
    $conn = new mysqli($host, $username, $password, $database);

// Check the connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['productName'], $_POST['sellPrice'], $_POST['amount'], $_POST['purchasePrice'])){
    $productName = $_POST['productName'];
    $sellPrice = $_POST['sellPrice'];
    $quantity = $_POST['amount'];
    $purchasePrice = $_POST['purchasePrice'];
    $profit = ($sellPrice-$purchasePrice)*$quantity;
    $date = date("y-m-d");
    $sql="Insert into order_list(product_name, quantityXproductPrice, quantity, profit, order_date)
    values('$productName',$sellPrice*$quantity,$quantity,$profit,'$date' )";
    mysqli_query($conn,$sql);
    }
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM order_list";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            }
        }
    
        ?>

     <div class="whites">
        <div style="height:85%;   border-bottom: 2px solid black;  display: flex;
    flex-direction: column;
    width: 100%;
    background-color: #ffffff;
    justify-content: start;

    align-items: center;
    padding: 20px;
    ">
        <?php
if (isset($data)) {
    foreach ($data as $i) {
      echo '
      <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
      <form action="cartElement.php" method="post" target="dummyframe">
        <div class="centering">
          <button type="submit" id="buttons">
            <img src="images/red-recycle-bin-icon-20.jpg" alt="Red Trash Can" style="width:20px; height:20px;">
          </button> 
          <strong class="amro">' . $i['product_name'] . '</strong>
        </div>
        <strong class="amro"> ' . $i['quantity'] . 'x' . $i['quantityXproductPrice'] / $i['quantity'] . '</strong>
        <input type="hidden" name="orderListID" value="' . $i['orderListID'] . '">
      </form>
      <script>
        window.onload = function() {
          var dummyFrame = document.getElementById("dummyframe");
          dummyFrame.onload = function() {
            window.location.reload();
          };
        };
      </script>
      ';
      $sum += $i['quantityXproductPrice'];
      $total_profit += $i['profit'];
      $total_price += $i['quantity']* (-1 * (($i['profit']/ $i['quantity']) - ($i['quantityXproductPrice'] / $i['quantity'])));
    }
  }
        ?>
        </div>
        <div class="items">
               <strong>Total Price</strong>
                <strong class="amro"><?php echo $sum ?></strong>
                <strong>Date </strong>
                <strong id="date"></strong>
                <button class="icon-button" id="trash">
                <img src="images/red-recycle-bin-icon-20.jpg" alt="Red Trash Can" class="left-icon">
                </button>
                <button class="icon-button" id="check">
                <img src="images/5aa78e207603fc558cffbf19.png" alt="Green Check Mark" class="right-icon">
                </button>
            </div>
        <!-- the end of div before whites -->
        </div>
        <!-- the end of the whites -->
<style>
.whites{
    display: flex;
    flex-direction: column;
    width: 80%;
    border-radius: 15px;
    background-color: #ffffff;
    justify-content: start;
    align-items: center;
    padding: 20px;
    padding-bottom:10px;

}
.items{
   display: grid;
   width: 100%;
   grid-template-columns: 90% 10%;
    color: black;
}
.amro{
    display: flex;
    column-gap: auto;
    /* background-color: red; */
}
.icon-button {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  border: none;
  background: none;
  font-size: 16px;
}

.icon-button:focus {
  outline: none;
}

.left-icon {
width: 55px;
height: 55px;
  margin-right: 10px;
  cursor: pointer;
}

.right-icon {
width: 55px;
height: 55px;
  margin-left: 10px;
  cursor: pointer;
}
.centering{
    display:flex;
}
.centering button{
    background: none;
    border:none;
    margin-top: -3px;
    cursor:pointer;
}
form{
    display: grid;
   width: 100%;
   grid-template-columns: 90% 10%;
    color: black;
}
</style>
  <script>
    var today = new Date();
    
    var formattedDate = today.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
    
    document.getElementById('date').textContent = formattedDate;
  </script>
  <script>
    var check = document.getElementById("check");
    var check2 = document.getElementById("trash");
    var buttons = document.querySelectorAll('buttons');
    check.addEventListener("click", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "cartBackCheck.php", true);
    xhr.onload = function() {
        window.location.href = "index.php"; // Redirect the user to index.php
    };
  xhr.send();
});

check2.addEventListener("click", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "cartBack.php", true);
    xhr.onload = function() {
        location.reload();
    };
    xhr.send();
});


</script>
</script>
</body>
</html>