<?php

namespace workshop_antoniohp\service;

require '../../vendor/autoload.php';

use workshop_antoniohp\model\reparation;
use Ramsey\Uuid\Uuid;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class serviceReparation
{
    public $mysqli;
    public $log;

    public function __construct()
    {
        $this->initializeLogger();
    }

    private function initializeLogger()
    {
        $this->log = new Logger('workshop_log');
        $this->log->pushHandler(new StreamHandler('../logs/app_workshop.log', Level::Info));
    }
    function connect()
    {
        $db = parse_ini_file("../../conf/db_conf.ini");
        try {
            $this->mysqli = new \mysqli($db["host"], $db["user"], $db["pwd"], $db["db_name"]);
            $this->log->info("Connection successfully");
        } catch (\Throwable $th) {
            $this->log->error("Not connected");
        }
    }

    function setReparation($workshopId, $workshopName, $registerDate, $licensePlate): Reparation
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
            $this->log->info("Record inserted successfully");
            return $reparation;
        } catch (\Throwable $th) {
            $this->log->error("Error inserting a record");
        }
    }

    function getReparation($role, $idReparation): Reparation
    {
        $this->connect();
        try {
            $stmt = $this->mysqli->prepare("SELECT * FROM reparation WHERE id_reparation = ?");
            $stmt->bind_param("s", $idReparation);
            $stmt->execute();

            $result = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            if ($result === null) {
                $this->log->warning("Record not found for id_reparation: $idReparation");
                $reparation = new Reparation(
                    "",
                    "",
                    "",
                    "",
                    "Record not found"
                );
                return $reparation;
            } else {
                $reparation = new Reparation(
                    $result["id_workshop"],
                    $result["id_reparation"],
                    $result["name_workshop"],
                    $result["register_date"],
                    $result["vLicense"]
                );
                $this->log->info("Record selected successfully");
                return $reparation;
            }
        } catch (\Throwable $th) {
            $this->log->warning("Record not found");
        }
    }
}
