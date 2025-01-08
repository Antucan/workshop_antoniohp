<?php
namespace workshop_antoniohp\controller;

require '../../vendor/autoload.php';

use workshop_antoniohp\service\serviceReparation;
use workshop_antoniohp\view\viewReparation;

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
    $role = $_SESSION['role'];
    $idReparation = $_POST['uuid'];

    $service = new serviceReparation();
    $reparation = $service->getReparation($role, $idReparation);

    $view = new viewReparation();
    $view->render($role, $reparation);
}

function insertReparation()
{
}
//connect();