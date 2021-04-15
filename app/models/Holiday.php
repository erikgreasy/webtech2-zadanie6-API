<?php

namespace app\models;

use database\repositories\DayRepository;


class Holiday implements \JsonSerializable {
    private $id;
    private $name;
    private $country_id;
    private $day_id;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of country_id
     */ 
    public function getCountry_id()
    {
        return $this->country_id;
    }

    /**
     * Set the value of country_id
     *
     * @return  self
     */ 
    public function setCountry_id($country_id)
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Get the value of day_id
     */ 
    public function getDay_id()
    {
        return $this->day_id;
    }

    /**
     * Set the value of day_id
     *
     * @return  self
     */ 
    public function setDay_id($day_id)
    {
        $this->day_id = $day_id;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function day() {
        $dr = new DayRepository();
        return $dr->get( $this->day_id );
    }


    public function jsonSerialize() {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'day_id'    => $this->day_id,
            'day'   => $this->day()
        ];
    }
}