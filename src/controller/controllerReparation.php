<?php
namespace workshop_antoniohp\src\controller;

require '../../vender/autoload.php';

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
}

function insertReparation()
{
}
//connect();