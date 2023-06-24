<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"><script>
  function errorUser(){
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Invalid username or password',
})
  }
</script>
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
  <h2>Login Form</h2>
  <form action="adminForm.php" method="post" id="choiceForm">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <div>
    <label for="password">Password:</label>
    <div style="display:flex;">
    <input type="password" id="password" name="password" required>
    <i class="far fa-eye" id="togglePassword" style="cursor: pointer; margin-left:-30px; margin-top:8px;"></i>
    </div>
    </div>
    <ul class="choices">
      <li>
        <input type="radio" id="choice1" name="choice" value="Choice 1" required>
        <label for="choice1">HR</label>
      </li>
      <li>
        <input type="radio" id="choice2" name="choice" value="Choice 2" required>
        <label for="choice2">Employee</label>
      </li>
    </ul>
    <input type="submit" name="submit" value="Login">
    <a href="SignUp.php" style="text-align:center; justify-content:center; display:flex;">Don't have an account? Sign Up!</a>
  </form>
       <?php
if(isset($_POST['submit'])){
  $name = $_POST['username'];
  $password = $_POST['password'];
  $choice = $_POST['choice'];
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
  // Perform the SQL query based on the choice value
  if ($choice === 'Choice 1') { // HR selected
    $sql = "SELECT * FROM HR WHERE HR_name = '$name' AND password = '$password'";
  } elseif ($choice === 'Choice 2') { // Employee selected
    $sql = "SELECT * FROM employee WHERE Employee_name = '$name' AND password = '$password'";
  } else {
    // Invalid choice
    echo "Invalid choice.";
    exit;
  }

  $result = $conn->query($sql);
  // Check if any rows were returned
  if ($result->num_rows > 0) {
    // User authenticated, do something
    echo "Login successful!";
    if ($choice === 'Choice 2') { // HR selected
      header("Location: EmployeeIndex.php"); // Redirect to HR page
    } elseif ($choice === 'Choice 1') { // Employee selected
      header("Location: HR.php"); // Redirect to Employee page
    }
    exit;
  } else {
    echo '<script> errorUser(); </script>';
  }


  // Close the database connection
  $conn->close();
}
?>
<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</body>
</html>