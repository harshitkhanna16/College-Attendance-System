<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mark Attendance</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>📝 Mark Attendance</h2>

    <form method="POST">
      <label>Date:</label>
      <input type="date" name="date" required><br><br>

      <label>Subject ID:</label>
      <input type="number" name="subject_id" required><br><br>

      <label>Student Roll No:</label>
      <input type="text" name="roll_no" required><br><br>

      <label>Status:</label>
      <select name="status" required>
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
      </select><br><br>

      <button type="submit" name="submit">Mark Attendance</button>
    </form>

    <br><a href="index.php">⬅ Back</a>
  </div>

  <?php
  if(isset($_POST['submit'])) {
      $date = $_POST['date'];
      $subject_id = $_POST['subject_id'];
      $roll_no = $_POST['roll_no'];
      $status = $_POST['status'];

      $student = mysqli_query($conn, "SELECT student_id FROM students WHERE roll_no='$roll_no'");
      if(mysqli_num_rows($student) > 0) {
          $row = mysqli_fetch_assoc($student);
          $student_id = $row['student_id'];

          $query = "INSERT INTO attendance(student_id, subject_id, date, status)
                    VALUES('$student_id', '$subject_id', '$date', '$status')";
          mysqli_query($conn, $query);

          echo "<script>alert('✅ Attendance Marked Successfully');</script>";
      } else {
          echo "<script>alert('❌ Roll Number not found');</script>";
      }
  }
  ?>
</body>
</html>
