<?php
namespace workshop_antoniohp\src\service;
require_once __DIR__ . '/../vendor/autoload.php';
class reparation
{
    public $id_workshop;
    public $name_workshop;
    public $register_date;
    public $vLicense;
    function __construct()
    {
        $this->id_workshop = 0;
        $this->name_workshop = "";
        $this->register_date = "";
        $this->vLicense = "";
    }


    /**
     * Get the value of id_workshop
     */
    public function getId_workshop()
    {
        return $this->id_workshop;
    }

    /**
     * Set the value of id_workshop
     *
     * @return  self
     */
    public function setId_workshop($id_workshop)
    {
        $this->id_workshop = $id_workshop;

        return $this;
    }

    /**
     * Get the value of name_workshop
     */
    public function getName_workshop()
    {
        return $this->name_workshop;
    }

    /**
     * Set the value of name_workshop
     *
     * @return  self
     */
    public function setName_workshop($name_workshop)
    {
        $this->name_workshop = $name_workshop;

        return $this;
    }

    /**
     * Get the value of register_date
     */
    public function getRegister_date()
    {
        return $this->register_date;
    }

    /**
     * Set the value of register_date
     *
     * @return  self
     */
    public function setRegister_date($register_date)
    {
        $this->register_date = $register_date;

        return $this;
    }

    /**
     * Get the value of vLicense
     */
    public function getVLicense()
    {
        return $this->vLicense;
    }

    /**
     * Set the value of vLicense
     *
     * @return  self
     */
    public function setVLicense($vLicense)
    {
        $this->vLicense = $vLicense;

        return $this;
    }
    function connect()
    {
        $db = parse_ini_file("../../conf/db_conf.ini");
        try {
            $mysqli = new mysqli($db["host"], $db["user"], $db["pwd"], $db["db_name"]);
            echo "Connected to db correctly!";
            return $mysqli;
        } catch (\Throwable $th) {
            return "Error connection db!";
        }
    }

    function insertReparation()
    {
        $this->connect();
        $sql = "INSERT INTO reparation (id_workshop, name_workshop, register_date, vLicense)";
    }

    function getReparation()
    {
        $this->connect();
        $sql = "SELECT * FROM reparation";
    }
}

