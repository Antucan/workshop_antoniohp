<?php
namespace workshop_antoniohp\src\service;

use workshop_antoniohp\src\model\reparation;
use workshop_antoniohp\src\view\ViewReparation;

require '../../vendor/autoload.php';
class serviceReparation
{
    public $mysqli;
    function connect()
    {
        $db = parse_ini_file("../../conf/db_conf.ini");
        try {
            $this->mysqli = new \mysqli($db["host"], $db["user"], $db["pwd"], $db["db_name"]);
            echo "Connected to db correctly!";
        } catch (\Throwable $th) {
            return "Error connection db!";
        }
    }

    function insertReparation()
    {
        $this->connect();
        $sql = "INSERT INTO reparation (id_workshop, name_workshop, register_date, vLicense)";
    }

    function getReparation($role, $idReparation): Reparation
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM reparation WHERE idReparation = ?");
        $stmt->bind_param("s", $idReparation);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        $reparation = new Reparation(
            $result["id_workshop"],
            $result["idReparation"],
            $result["name_workshop"],
            $result["register_date"],
            $result["vLicense"]
        );
        return $reparation;
    }
}

