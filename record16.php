<!DOCTYPE html>
<html>
<head>
    <title>Odd or Even Checker</title>
</head>
<body>
    <h2>Check whether a number is Odd or Even</h2>
    <form method="get" action="">
        Enter a number: 
        <input type="text" name="num" required>
        <input type="submit" value="Check">
    </form>

    <?php
    if (isset($_GET['num'])) {
        $num = $_GET['num'];
        if (is_numeric($num)) {
            if ($num % 2 == 0) {
                echo "<h3>$num is an Even number.</h3>";
            } else {
                echo "<h3>$num is an Odd number.</h3>";
            }
        } else {
            echo "<h3>Please enter a valid numeric value.</h3>";
        }
    }
    ?>
</body>
</html>

