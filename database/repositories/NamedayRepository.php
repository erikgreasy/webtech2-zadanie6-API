<?php

namespace database\repositories;

use app\models\Country;
use app\models\Nameday;


class NamedayRepository extends Repository {

    public function all() {
        $sql = "SELECT * FROM nameday";
        $stmt = $this->conn->query( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Nameday::class );
        $namedays = $stmt->fetchAll();

        return $namedays;

    }

    public function get($id) {
        $sql = "SELECT * FROM nameday WHERE id = :id";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Nameday::class );
        $stmt->execute([
            'id'    => $id,
        ]);

        $nameday = $stmt->fetch();

        return $nameday;

    }

    public function getByName($name) {
        $sql = "SELECT * FROM nameday WHERE name = :name";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Nameday::class );
        $stmt->execute([
            'name'    => $name,
        ]);

        $nameday = $stmt->fetchAll();

        return $nameday;

    }

    public function getByNameAndCountry( $name, Country $country ) {
        $sql = "SELECT DISTINCT * FROM nameday WHERE name = :name AND country_id = :country_id";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Nameday::class );
        $stmt->execute([
            'name'          => $name,
            'country_id'    => $country->getId()
        ]);

        $nameday = $stmt->fetch();

        return $nameday;
    }

    public function getByCountryAndDay( $country, $day ) {
        $sql = "SELECT * FROM nameday WHERE country_id = :country_id AND day_id = :day_id";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Nameday::class );
        $stmt->execute([
            'country_id'    => $country->getId(),
            'day_id'    => $day->getId(),
        ]);

        $nameday = $stmt->fetchAll();

        return $nameday;

    }

    public function add( Nameday $nameday ) {
        $sql = "INSERT INTO nameday (name, country_id, day_id, original) VALUES(:name, :country_id, :day_id, :original)";
        $stmt = $this->conn->prepare( $sql );
        $success = $stmt->execute([
            'name'          => $nameday->getName(),
            'country_id'    => $nameday->getCountry_id(),
            'day_id'        => $nameday->getDay_id(),
            'original'      => $nameday->getOriginal(),
        ]);


        if( $success ) {
            $nameday->setId($this->conn->lastInsertId());
            return $nameday;
        }

        return false;
    }

}