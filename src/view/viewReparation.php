<?php
namespace workshop_antoniohp\src\view;
class viewReparation
{
    public function render($model)
    {
        
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
    <form method="POST" action="../controller/controllerReparation.php" name="formSearchReparation">
        <h1>Car Workshop</h1>
        <h2>Search car reparation</h2>
        ID reparation number: <input type="text" id="uuid" name="uuid">
        <input type="submit" value="search" name="getReparation">
    </form>
</body>

</html>