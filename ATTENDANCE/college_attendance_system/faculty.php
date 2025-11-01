<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Faculty Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Faculty Login</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit" name="login">Login</button>
    </form>
    <br><a href="index.php">⬅ Back</a>
  </div>

  <?php
  if(isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $query = "SELECT * FROM faculty WHERE email='$email' AND password='$password'";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0) {
          echo "<script>alert('✅ Login Successful'); window.location='mark_attendance.php';</script>";
      } else {
          echo "<script>alert('❌ Invalid Credentials');</script>";
      }
  }
  ?>
</body>
</html>
