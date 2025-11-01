<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Attendance</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>📊 Attendance Report</h2>

    <form method="POST">
      <label>Roll No:</label>
      <input type="text" name="roll_no" required>
      <button type="submit" name="view">View Attendance</button>
    </form>
    <br><a href="index.php">⬅ Back</a>
  </div>

  <?php
  if(isset($_POST['view'])) {
      $roll_no = $_POST['roll_no'];
      $student = mysqli_query($conn, "SELECT student_id, name FROM students WHERE roll_no='$roll_no'");
      if(mysqli_num_rows($student) > 0) {
          $s = mysqli_fetch_assoc($student);
          $id = $s['student_id'];
          $name = $s['name'];

          echo "<div class='container'><h3>Attendance for $name ($roll_no)</h3><table border='1'><tr><th>Date</th><th>Status</th></tr>";

          $records = mysqli_query($conn, "SELECT date, status FROM attendance WHERE student_id='$id' ORDER BY date DESC");
          while($r = mysqli_fetch_assoc($records)) {
              echo "<tr><td>".$r['date']."</td><td>".$r['status']."</td></tr>";
          }

          echo "</table></div>";
      } else {
          echo "<script>alert('❌ Roll number not found');</script>";
      }
  }
  ?>
</body>
</html>
