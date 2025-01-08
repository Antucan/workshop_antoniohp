<?php
namespace workshop_antoniohp\view;
if (isset($_POST['role'])) {
    session_start();
    $_SESSION['role'] = $_POST['role'];
    $role = $_SESSION['role'];
}

class viewReparation
{
    public function render($role, $model)
    {
        echo "<h4>Id Workshop: </h4><p>" . $model->getId_workshop() . "</p>";
        echo "<h4>Id Reparation: </h4><p>" . $model->getId_reparation() . "</p>";
        echo "<h4>Name Workshop: </h4><p>" . $model->getName_workshop() . "</p>";
        echo "<h4>Register Date: </h4><p>" . $model->getRegister_date() . "</p>";
        echo "<h4>License: </h4><p>" . $model->getVLicense() . "</p>";
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
        ID reparation number: <input type="text" id="uuid" name="uuid">
        <input type="submit" value="search" name="getReparation">
    </form>
    <?php
    if (isset($_POST['role']) && $_POST['role'] == 'employee') {
        ?>
        <form method="POST" action="../controller/controllerReparation.php" name="formInsertReparation">
            <h2>Insert car reparation</h2>
            <input type="submit" value="set" name="setReparation">
        </form>
        <?php
    }
    ?>
</body>

</html>