<?php require("connection.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login Panel</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container">
    <div class="myform">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <h2>ADMIN LOGIN</h2>
        <input type="text" placeholder="Admin Name" name="AdminName">
        <input type="password" placeholder="Password" name="AdminPass">
        <button type="submit" name="login">LOGIN</button>
      </form>
    </div>
    <div class="image">
      <img src="image.jpg">
    </div>
  </div>

  <?php

  function input_filter($data)
  {
    $data = trim($data);
    $data = stripslashes($data);;
    $data = htmlspecialchars($data);

    return $data;
  }

  if (isset($_POST['login'])) {

    // fulter user input 
    $AdminName = input_filter($_POST['AdminName']);
    $AdminPass = input_filter($_POST['AdminPass']);

    //escaping specail symbol user in sql statement
    $AdminName = mysqli_real_escape_string($conn, $AdminName);
    $AdminPass = mysqli_real_escape_string($conn, $AdminPass);

    // query templete

    $query = "SELECT * FROM `admin_login` WHERE `Admin_Name` = ? AND `Admin_Password` = ?";

    // prepaid statement

    if ($stmt = mysqli_prepare($conn, $query)) {
      mysqli_stmt_bind_param($stmt, "ss", $AdminName, $AdminPass); // binding value to 
      mysqli_stmt_execute($stmt);   // excuting prepaid statement
      mysqli_stmt_store_result($stmt);   // trabsfering the result of excutuon
      if (mysqli_stmt_num_rows($stmt) == 1) {

        session_start();
        $_SESSION['AdminLoginId'] = $AdminName;
        header("location: Admin_panal.php");
      } else {
        echo "<script> alert('Invalid Admin name or Password') </script>";
      }
      mysqli_stmt_close($stmt);
    } else {
      echo "<script> alert('sql query can not be prepaid;') </script>";
    }
  }
  ?>
</body>

</html>