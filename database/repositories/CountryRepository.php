<?php

namespace database\repositories;

use app\models\Country;



class CountryRepository extends Repository {


    public function get($id) {
        $sql = "SELECT * FROM country WHERE id = :id";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Country::class );
        $stmt->execute([
            'id'    => $id,
        ]);

        $country = $stmt->fetch();

        return $country;

    }

    public function getByName($name) {
        $sql = "SELECT * FROM country WHERE name = :name";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Country::class );
        $stmt->execute([
            'name'    => $name,
        ]);
        $country = $stmt->fetch();
        
        return $country;
    }

}