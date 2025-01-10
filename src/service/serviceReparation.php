<?php

namespace workshop_antoniohp\service;

require '../../vendor/autoload.php';

use workshop_antoniohp\model\reparation;
use Ramsey\Uuid\Uuid;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// $log = new Logger('workshop_log');
// $log->pushHandler(new StreamHandler('../logs/app_workshop.log', Level::Info));
class serviceReparation
{

    public $mysqli;
    function connect()
    {
        $log = new Logger('workshop_log');
        $log->pushHandler(new StreamHandler('../logs/app_workshop.log', Level::Info));
        $db = parse_ini_file("../../conf/db_conf.ini");
        try {
            $this->mysqli = new \mysqli($db["host"], $db["user"], $db["pwd"], $db["db_name"]);
            $log->info("Connection successfully");
        } catch (\Throwable $th) {
            $log->error("Not connected");
        }
    }

    function setReparation($workshopId, $workshopName, $registerDate, $licensePlate): Reparation
    {
        $log = new Logger('workshop_log');
        $log->pushHandler(new StreamHandler('../logs/app_workshop.log', Level::Info));
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
            $log->info("Record inserted successfully");
            return $reparation;

        } catch (\Throwable $th) {
            //throw $th;
            $log->error("Error inserting a record");
        }
    }

    function getReparation($role, $idReparation): Reparation
    {
        $this->connect();
        $log = new Logger('workshop_log');
        $log->pushHandler(new StreamHandler('../logs/app_workshop.log', Level::Info));
        try {
            $stmt = $this->mysqli->prepare("SELECT * FROM reparation WHERE id_reparation = ?");
            $stmt->bind_param("s", $idReparation);
            $stmt->execute();

            $result = $stmt->get_result()->fetch_assoc();
            $log->info("Record selected successfully");
            $stmt->close();
        } catch (\Throwable $th) {
            $log->warning("Record not found");
        }
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
