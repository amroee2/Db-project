<!DOCTYPE html>
<html>
<head>
  <title>Admin Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(90deg,#154284,#cd122d);
    }

    h2 {
      text-align: center;
    }

    form {
      max-width: 300px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px hsl(242, 38%, 15%);
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>

</head>
<body>
  <h2>Sign up form</h2>
  <form action="SignUp.php" method="post" id="choiceForm">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <label for="cPassword">Confirm Password:</label>
    <input type="password" id="cPassword" name="cPassword" required>
    <div style="display:flex;">
    <label for="Salary">Salary:</label>
    <input type="number" id="Salary" name="Salary"required>
    </div>
    <div style="display:flex;">
    <label for="PhoneNumber">Phone:</label>
    <input type="number" id="PhoneNumber" name="PhoneNumber" required>
    </div>
    <br>
    <input type="submit" name="submit" value="Sign Up">
    <a href="adminForm.php" style="text-align:center; justify-content:center; display:flex;">Already have an account? Sign in!</a>
  </form>
       <?php
if(isset($_POST['submit'])){
  $name = $_POST['username'];
  $password = $_POST['password'];
  $salary = $_POST['Salary'];
  $Phone = $_POST['PhoneNumber'];
  $servername = "localhost";
  $username_db = 'root';
  $password_db = 'Amru2002';
  $dbname = 'project';

  // Create a database connection
  $conn = new mysqli($servername, $username_db, $password_db, $dbname);
  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "Insert into employee(Salary,Employee_name,phone_number,password) values($salary,'$name',$Phone,'$password')";
  mysqli_query($conn,$sql);
  $conn->close();
}
?>
<script>
  var password = document.getElementById("password")
,confirm_password = document.getElementById("cPassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>