<?php
namespace workshop_antoniohp\src\controller;

require '../../vendor/autoload.php';

use workshop_antoniohp\src\service\serviceReparation;
use workshop_antoniohp\src\view\viewReparation;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["getReparation"])) {
    getReparation();
}

if (isset($_POST["insertReparation"])) {
    insertReparation();
}

function getReparation()
{
    //echo __LINE__;
    $role = $_SESSION['role'];
    $idReparation = $_POST['uuid'];

    $service = new serviceReparation();
    $reparation = $service->getReparation($role, $idReparation);

    $view = new viewReparation();
    $view->render($reparation);
}

function insertReparation()
{
}
//connect();