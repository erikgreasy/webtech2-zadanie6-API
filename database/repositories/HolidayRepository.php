<?php

namespace database\repositories;

use app\models\Country;
use app\models\Holiday;


class HolidayRepository extends Repository {


    public function get($id) {
        $sql = "SELECT * FROM holiday WHERE id = :id";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Holiday::class );
        $stmt->execute([
            'id'    => $id,
        ]);

        $holiday = $stmt->fetch();

        return $holiday;

    }

    public function getByName($name) {
        $sql = "SELECT * FROM holiday WHERE name = :name";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Holiday::class );
        $stmt->execute([
            'name'    => $name,
        ]);

        $holiday = $stmt->fetch();

        return $holiday;

    }

    public function getByCountry( Country $country ) {
        $sql = "SELECT * FROM holiday WHERE country_id = :country_id";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Holiday::class );
        $stmt->execute([
            'country_id'    => $country->getId(),
        ]);

        $holidays = $stmt->fetchAll();

        return $holidays;

    }

    public function add( Holiday $holiday ) {
        $sql = "INSERT INTO holiday (name, country_id, day_id) VALUES(:name, :country_id, :day_id)";
        $stmt = $this->conn->prepare( $sql );
        $success = $stmt->execute([
            'name'          => $holiday->getName(),
            'country_id'    => $holiday->getCountry_id(),
            'day_id'        => $holiday->getDay_id(),
        ]);

        if( $success ) {
            $holiday->setId($this->conn->lastInsertId());
            return $holiday;
        }

        return false;
    }

}