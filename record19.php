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
    $book_no = $_POST['book_no'];
    $title = $_POST['title'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    $sql = "INSERT INTO Book_details (book_no, title, edition, publisher)
            VALUES ('$book_no', '$title', '$edition', '$publisher')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Book added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Entry Form</title>
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

<h2>Enter Book Details</h2>
<form method="post" action="">
    <label>Book No:</label><br>
    <input type="number" name="book_no" required><br><br>

    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Edition:</label><br>
    <input type="text" name="edition" required><br><br>

    <label>Publisher:</label><br>
    <input type="text" name="publisher" required><br><br>

    <input type="submit" name="submit" value="Add Book">
</form>

<h2>All Books</h2>
<table>
    <tr>
        <th>Book No</th>
        <th>Title</th>
        <th>Edition</th>
        <th>Publisher</th>
    </tr>

<?php
// Step 3: Display all books
$sql = "SELECT * FROM Book_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['book_no']."</td>
                <td>".$row['title']."</td>
                <td>".$row['edition']."</td>
                <td>".$row['publisher']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No books found</td></tr>";
}

$conn->close();
?>
</table>

</body>
</html>

