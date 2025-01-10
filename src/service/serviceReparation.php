<?php

namespace workshop_antoniohp\service;

require '../../vendor/autoload.php';

use workshop_antoniohp\model\reparation;
use Ramsey\Uuid\Uuid;

// $log = new Monolog\Logger('workshop_log');
// $log->pushHandler(new Monolog\Handler\StreamHandler(''))
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

    function setReparation($workshopId, $workshopName, $registerDate, $licensePlate)
    {
        $this->connect();
        //generar uuid
        $uuid = Uuid::uuid4()->toString();
        //crear objeto new Reparation
        $reparation = new reparation($uuid, $workshopId, $workshopName, register_date: $registerDate, vLicense: $licensePlate);
        //insertar en bbdd
        $query = "INSERT INTO reparation (id_workshop, id_reparation, name_workshop, register_date, vLicense) 
        VALUES ('$workshopId', '$uuid', '$workshopName', '$registerDate', '$licensePlate')";
        //devolver al controlador tipo Reapartion
        try {
            $this->mysqli->query($query);
            // $this->log->info("Record inserted successfully");
        } catch (\Throwable $th) {
            //throw $th;
        }
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
