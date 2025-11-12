<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body style="text-align:center; margin-top:100px;">
    <?php
    if (isset($_GET['user'])) {
        $user = htmlspecialchars($_GET['user']);
        echo "<h2>Welcome, $user!</h2>";
    } else {
        echo "<h2>Welcome!</h2>";
    }
    ?>
</body>
</html>

