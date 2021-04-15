<?php

namespace database\repositories;

use app\models\Day;

class DayRepository extends Repository {

    public function get( $id ) {
        $sql = "SELECT * FROM day WHERE id = :id";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Day::class );
        $stmt->execute([
            'id'    => $id,
        ]);

        $day = $stmt->fetch();

        return $day;
    }


    public function getByDate( $date ) {
        $sql = "SELECT * FROM day WHERE date = :date";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Day::class );
        $stmt->execute([
            'date'    => $date,
        ]);

        $day = $stmt->fetch();

        return $day;

    }

    public function add( Day $day ) {
        $sql = "INSERT INTO day (date) VALUES(:date)";
        $stmt = $this->conn->prepare( $sql );
        $success = $stmt->execute([
            'date'  => $day->getDate(),
        ]);

        if( $success ) {
            $day->setId($this->conn->lastInsertId());
            return $day;
        }

        return false;
    }

}