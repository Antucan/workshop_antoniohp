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

if (isset($_POST["setReparation"])) {
    setReparation();
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

function setReparation()
{
    $workshopId = $_SESSION['workshopId'];
    $workshopName = $_SESSION['workshopName'];
    $registerDate = $_SESSION['registerDate'];
    $licensePlate = $_SESSION['licensePlate'];

    $service = new serviceReparation();
    $reparation = $service->setReparation($workshopId, 
    $workshopName, $registerDate, $licensePlate);

    
}
