<?php
// Step 1: Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "programdb";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Step 2: Insert record when form is submitted
if (isset($_POST['submit'])) {
  $emp_id = $_POST['emp_id'];
  $name = $_POST['name'];
  $designation = $_POST['designation'];
  $salary = $_POST['salary'];

  $sql = "INSERT INTO Employee_details (emp_id, name, designation, salary)
          VALUES ('$emp_id', '$name', '$designation', '$salary')";

  if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green;'>Employee added successfully!</p>";
  } else {
    echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Employee Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fafafa;
    }
    form {
      margin: 20px;
      padding: 15px;
      border: 1px solid #ddd;
      width: 300px;
      background-color: #fff;
    }
    table {
      border-collapse: collapse;
      margin: 20px;
      width: 80%;
    }
    th, td {
      border: 1px solid #333;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f0f0f0;
    }
  </style>
</head>
<body>

<h2>Enter Employee Details</h2>
<form method="post" action="">
  <label>Employee ID:</label><br>
  <input type="number" name="emp_id" required><br><br>

  <label>Name:</label><br>
  <input type="text" name="name" required><br><br>

  <label>Designation:</label><br>
  <input type="text" name="designation" required><br><br>

  <label>Salary:</label><br>
  <input type="number" step="0.01" name="salary" required><br><br>

  <input type="submit" name="submit" value="Add Employee">
</form>

<h2>Employee List</h2>
<table>
  <tr>
    <th>Employee ID</th>
    <th>Name</th>
    <th>Designation</th>
    <th>Salary</th>
  </tr>

<?php
// Step 3: Fetch and display employee details
$sql = "SELECT * FROM Employee_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row['emp_id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['designation']."</td>
            <td>".$row['salary']."</td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='4'>No employee records found</td></tr>";
}

$conn->close();
?>
</table>

</body>
</html>

