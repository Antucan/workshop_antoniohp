<?php
namespace workshop_antoniohp\view;
class viewReparation
{
    public function render($model)
    {
        echo "<h3>" . $model->getId_workshop() . "</h3>";
        echo "<h3>" . $model->getId_reparation() . "</h3>";
        echo "<h3>" . $model->getName_workshop() . "</h3>";
        echo "<h3>" . $model->getRegister_date() . "</h3>";
        echo "<h3>" . $model->getVLicense() . "</h3>";
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
    <form method="POST" action="../controller/controllerReparation.php" name="formInsertReparation">
        <h2>Insert car reparation</h2>
        
        <input type="submit" value="search" name="setReparation">
    </form>
</body>

</html>