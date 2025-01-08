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
    <form action="../src/view/viewReparation.php" method="POST">
        <select name="role">
            <option value="client">Client</option>
            <option value="employee">Employee</option>
        </select>
        <input type="submit" value="ENTER">
    </form>
</body>

</html>