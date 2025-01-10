<?php

namespace workshop_antoniohp\view;

if (isset($_POST['role'])) {
    session_start();
    $_SESSION['role'] = $_POST['role'];
    $role = $_SESSION['role'];
}
class viewReparation
{
    public function render($reparation)
    {
        echo "<h4>Id Workshop: </h4><p>" . $reparation->getId_workshop() . "</p>";
        echo "<h4>Name Workshop: </h4><p>" . $reparation->getName_workshop() . "</p>";
        echo "<h4>Register Date: </h4><p>" . $reparation->getRegister_date() . "</p>";
        echo "<h4>License: </h4><p>" . $reparation->getVLicense() . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reparation</title>
</head>

<body>
    <h1>Car Workshop</h1>
    <form method="POST" action="../controller/controllerReparation.php" name="formSearchReparation">
        <h2>Search car reparation</h2>
        ID reparation number: <input type="text" id="uuid" name="uuid" required>
        <input type="submit" value="search" name="getReparation">
    </form>
    <?php
    if (isset($_POST['role']) && $_POST['role'] == 'employee') {
        ?>
        <form method="POST" action="../controller/controllerReparation.php" name="formInsertReparation">
            <h2>Create car reparation</h2>
            <label for="workshopId">Workshop ID (4 digits):</label>
            <input type="text" id="workshopId" name="workshopId" maxlength="4" required><br>
            <label for="workshopName">Workshop Name (up to 12 characters):</label>
            <input type="text" id="workshopName" name="workshopName" maxlength="12" required><br>
            <label for="registerDate">Register Date:</label>
            <input type="text" id="registerDate" name="registerDate"
                pattern="\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])" required><br>
            <label for="licensePlate">License Plate (9999-XXX):</label>
            <input type="text" id="licensePlate" name="licensePlate" pattern="\d{4}[A-Z]{3}"><br>
            <input type="submit" value="set" name="setReparation">
        </form>
        <?php
    }
    ?>
    <button onclick="window.location.href='../../src/'">RETURN</button>
</body>

</html>