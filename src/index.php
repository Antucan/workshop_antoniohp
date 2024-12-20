<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Workshop</title>
</head>

<body>
    <h1>Car Workshop</h1>
    <h2>Choose role</h2>
    <form action="../src/view/viewReparation.php" method="post">
        <select name="role" id="role">
            <option value="1">Client</option>
            <option value="2">Employee</option>
        </select>
        <input type="submit" value="ENTER">
    </form>
</body>
<?php
// session_start();
// if (isset($_POST['role'])) {
//     $_SESSION['role'] = $_POST['role'];
//     var_dump($_SESSION['role']);
// }
?>

</html>