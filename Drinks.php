<!DOCTYPE html>
<html lang="en">
<head>
    <title>Barca Market</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="banner"> 
        <div>
            <div class="third_1">
            <a href="index.php">
                    <img src="images/logo.png" alt="" style="width: 55px; height: 55px;">
                    </a>
                    <h3>Barca Market</h3>
            </div>
        </div>
        <div class="third_2">
            <div >
                 <input type="search" placeholder=" Search" >
                 <button>
                    <span class="material-symbols-outlined">
                        search
                     </span>
                 </button>
            </div>
        </div>
        <div class="third_3">
                <img src="images/Palestine-Flag-PNG-HD.png">
                <a href="SignUp.php"class="btn2" style="text-decoration:none;">Sign Up</a>
                <a href="adminForm.php"class="btn2" style="text-decoration:none;">Sign In</a>
                <button id="btn1">EN</button>
        </div>
    </div>
    <div class="categories">
        <!-- center the sub-categories -->
        <div class="c_categories"> 
            <div class="sub-categories_1">
                   <a href="all.php"> <div>All</div></a>
                   <a href="CannedFood.php"><div>Canned Food</div></a>
                    <a href="Greens.php"><div>Greens</div></a>
                    <a href="Drinks.php"><div>Drinks</div></a>
                    <a href="CleaningSupplies.php"><div>Cleaning supplies</div></a>
            </div>

            <div class="sub-categories_2">
                <span> Welcome  Culers</span>
               
            </div>

            <div class="sub-categories_3">
                <a href="Candy.php"><div>Candy</div></a>
                <a href="cart.php"><div>Cart</div></a>
                <a href=""><div>Culers</div></a>
            </div>
</div>
    </div>
    <!-- contains all -->
    <div class="main-page">
        <div class="whitePage">
        <div class="products">
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
                }   else {
                    echo "No data found";
                }
            
                $conn->close();
                $numCols = 4;
                $count = 0;
        echo '<style>
          table {
            background-color:black;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
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
            border: 2px solid blue;
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
            if($i['category']=="Drinks"){
          if ($count % $numCols === 0) {
            echo '<tr>'; // Start a new row
          }
          echo '<td>
          <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
          <form action="cart.php" method="post" target="dummyframe">
              <div style="color: white; font-size:20px;">' . $i['pid'] . '. ' . $i['pName'] . '<hr></div>
              <div><strong>Production date:</strong>    ' . $i['production_date'] . '</div>
              <div><strong>Expiry date:</strong>    ' . $i['expiry_date'] . '</div>
              <div><strong>Category:</strong>   ' . $i['category'] . '</div>
              <div><strong>Sell price:</strong>   ' . $i['sell_price'] . '</div>
              <div><strong>Amount:</strong>   ' . $i['amount'] . '</div>
              <input type="submit">
              <input type="hidden" name="productName" value="' . $i['pName'] . '">
              <input type="hidden" name="sellPrice" value="' . $i['sell_price'] . '">
              <input type="hidden" name="purchasePrice" value="' . $i['purchase_price'] . '">
              <div class="addRemove">
                  <div style="background-color: gray; border-radius: 5px; display: flex; column-gap: 4px; cursor: pointer;">
                      <span class="material-symbols-outlined add">add</span>
                      <span class="material-symbols-outlined remove">remove</span>
                  </div>
                  <input class="addRemoveTextField" value="0" name="amount" type="text">
              </div>
          </form>
      </td>';      
          $count++;
          if ($count % $numCols === 0) {
            echo '</tr>'; // End the current row
          }
        }
    }
        // If the last row is not complete, add empty cells to fill the remaining columns
        if ($count % $numCols !== 0) {
          $remainingCols = $numCols - ($count % $numCols);
          echo str_repeat('<td></td>', $remainingCols);
          echo '</tr>'; // End the last row
        }
        echo '</table>';
        ?>
        </div>
    </div>
    </div> 
    <footer>
    <div class="First_Part">
    <div class="gapping">
        <img src="images/logo.png"> 
        <h3 style="font-size: 30px;margin: 15px 5px; margin-top: 30px;">Barca Market</h3>
    </div>
    <div>
        <h3 class="Copyright">&copy; Official Barca Market Website</h3>
    </div>
    </div>
    </footer>
</body>
<style>

    a{
        text-decoration: none;
        color: white;
    }

    body{
        margin:  0;
        color: white;
        font-family: Roboto;
        background: linear-gradient(90deg,#cd122d,#154284);
    }
    .banner{
        display: grid;
        grid-template-columns: 20% auto auto;
        width: 100%;
        position: fixed;
        top: 0;
        background-color: #01002c;
        text-align: center;
        /* justify-content: center; */
        align-items: center;
        color: white;
        height: 70px;
        border: 2px solid blue;
        border-right: 10px solid blue;
        border-left: 10px solid #cd122d;

    }

    .third_1{
        display: flex;
        justify-content: center;
        align-items: center;
        column-gap: 10px;
        height: 100%;
    }
    .third_1 img{
        width: 55px;
        height: 55px;
    }
    .third_1 h3{
        margin: 0;
    }
    .third_2{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
    }
    .third_2 div{
        display: flex;
        width: 35%;
        max-width: 350px;

    }
    .third_3{
        display:flex;
        justify-content: right;
        align-items: center;
        column-gap: 15px;
        margin-right: 20px;
        
    }
    #btn1{
       height: 45px;
       width: 45px;
        border-radius: 50%;
        background-color: #181733;;
        border: none;
        color: #FDC52C;
        font-size: 12px;
        font-weight: bold;
        transition: background-color 1s;
        
    }

    #btn1:hover{
       background-color: #cd122d;
       
    }
    #btn2{
        width: 60px;
        background-color: #FDC52C;
        color: white;
        border: none;
        border-radius: 3px;
        padding: 5px;
        font-weight: bold;
    }
    .categories{
        display: flex;
        justify-content: center;
        width: 100%;
        background-color: #181733;
        position: fixed;
        top: 70px;
        height: 50px;
        border-top: 0.1px #cd122d solid;
        border-bottom: 4px #FDC52C solid; 
        
        /* border-left: 10px solid #cd122d; */
    }
    .c_categories{
        width: 90%;
        display: flex;
        justify-content: space-between;
        /* align-items: center; */
    }
    .sub-categories_1{
        display: flex;
        align-items: center;
        justify-content: center;
        column-gap: 10px;
        height: 100%;
    }
    .sub-categories_3{
        display: flex;
        align-items: center;
        justify-content: center;
        column-gap: 10px;
        height: 100%;
    }
    .sub-categories_1 div{
        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
        /* border-left: 1px white solid; */
        padding: 0px 5px;
    }
    .sub-categories_3 div{
        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
        /* border-left: 1px white solid; */
        padding: 0px 5px;
    }
    .sub-categories_2{
        display: flex;
        width: 300px;
        height: 100%;
        font-weight: bold;
    }
    .blue{
        background-color: #181733;
        width: 10px;
        height: 100%;
    }

    .red{
        background-color: #FDC52C;
        width: 10px;
        height: 100%;
    }
    .sub-categories_2 span{
        /* position: relative; */
        /* left: 150px;  */
        color: #FDC52C;
        font-size: 40px;
    }
    .main-page{
        margin-top: 300px;
        margin-left: 150px;
        width: 75%;
        margin-bottom: 300px;
       /* background-color: #cd122d ; */
    }
    /* .product{
        display: flex;
        flex-direction: column;
        /*justify-content: center;*/
        /* align-items: start;
        width: 150px;
        height: 200px;
        padding: 10px;
        row-gap: 5px;
        background-color: #01002c;
        border-radius: 5px;
        transition: background-color 1s;
    } */ 
    .product-img{
        margin-top: 2px;
    }

    .product-img img{
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        aspect-ratio: 5/3;
        
    }
    .description{
        width: 100%;
        display: flex;
        flex-direction: column;
        row-gap: 5px;
        margin-left: 7px;
        /*justify-content: start; */
    }
    .description h4{
        margin: 3px 0px;
    }
    .product:hover{
        background-color: #1d1c28;
    }
    footer{
        display: grid;
        flex-direction: column;
        background-color:#181733;
        height:140px;
        bottom:0px;
        width: 100%;
    }
    .First_Part{
        display: flex;
        flex-direction: column;
    }
    footer img{
        margin-top: 15px;
        width:60px;
        height:60px; 
        margin-left: 5px;  
    }
    .gapping{
        display: flex;
        align-items: center;
        column-gap: 10px;
    }
    .third_3 img{
        width: 35px;
        height: 35px;
    }
    footer .Copyright{
        margin-left: 10px;
        width:300px;
    }
    .whitePage{
    display: flex;
    flex-direction: column; 
    width: 95%;
    /* height: 1000px; */
    border-radius: 15px;
    background-color: #ffffff;
    }
    .products{
        margin-top:30px;
        margin-bottom:30px;
        margin-left:30px;
        margin-right:30px;
    }
    .addRemove{
        display: flex;
        column-gap: 20px;

    }
    .addRemove input{
        width: 30px;
        text-align: center;
        border-radius: 5px;
        border: 1px solid gray;
    }
    .btn2{
    width: 60px;
    background-color: #FDC52C;
    color: white;
    border: none;
    border-radius: 3px;
    padding: 5px;
    font-weight: bold;
}

</style>
<script>
    var addButtons = document.querySelectorAll('.add');
    var removeButtons = document.querySelectorAll('.remove');
    var valueFields = document.querySelectorAll('.addRemoveTextField');

    for (var i = 0; i < addButtons.length; i++) {
        addButtons[i].addEventListener("click", function () {
            var textField = this.parentElement.nextElementSibling;
            var currentValue = Number(textField.value);
            textField.value = currentValue + 1;
        });
    }

    for (var i = 0; i < removeButtons.length; i++) {
        removeButtons[i].addEventListener("click", function () {
            var textField = this.parentElement.nextElementSibling;
            var currentValue = Number(textField.value);
            if (currentValue != 0) {
                textField.value = currentValue - 1;
            }
        });
    }
    var check = document.getElementById("check");
    var check2 = document.getElementById("trash");
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

</html>