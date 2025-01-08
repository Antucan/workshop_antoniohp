<?php
namespace workshop_antoniohp\service;
require '../../vendor/autoload.php';

use workshop_antoniohp\model\reparation;

class serviceReparation
{
    public $mysqli;
    function connect()
    {
        $db = parse_ini_file("../../conf/db_conf.ini");
        try {
            $this->mysqli = new \mysqli($db["host"], $db["user"], $db["pwd"], $db["db_name"]);
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
        $this->connect();
        $stmt = $this->mysqli->prepare("SELECT * FROM reparation WHERE id_reparation = ?");
        $stmt->bind_param("s", $idReparation);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        $reparation = new Reparation(
            $result["id_workshop"],
            $result["id_reparation"],
            $result["name_workshop"],
            $result["register_date"],
            $result["vLicense"]
        );
        return $reparation;
    }
}

