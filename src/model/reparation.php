<?php
namespace workshop_antoniohp\model;
class reparation
{
    public $id_reparation;
    public $id_workshop;
    public $name_workshop;
    public $register_date;
    public $vLicense;
    function __construct($id_workshop, $id_reparation, $name_workshop, $register_date, $vLicense)
    {
        $this->id_workshop = $id_workshop;
        $this->id_reparation = $id_reparation;
        $this->name_workshop = $name_workshop;
        $this->register_date = $register_date;
        $this->vLicense = $vLicense;
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

    /**
     * Get the value of id_reparation
     */
    public function getId_reparation()
    {
        return $this->id_reparation;
    }

    /**
     * Set the value of id_reparation
     *
     * @return  self
     */
    public function setId_reparation($id_reparation)
    {
        $this->id_reparation = $id_reparation;

        return $this;
    }
}