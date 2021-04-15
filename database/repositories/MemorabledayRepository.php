<?php

namespace database\repositories;

use app\models\Memorableday;


class MemorabledayRepository extends Repository {


    public function all() {
        $sql = "SELECT * FROM memorableday";
        $stmt = $this->conn->query( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Memorableday::class );
        $memorableday = $stmt->fetchAll();

        return $memorableday;

    }

    public function get($id) {
        $sql = "SELECT * FROM memorableday WHERE id = :id";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Memorableday::class );
        $stmt->execute([
            'id'    => $id,
        ]);

        $memorableday = $stmt->fetch();

        return $memorableday;

    }

    public function getByName($name) {
        $sql = "SELECT * FROM memorableday WHERE name = :name";
        $stmt = $this->conn->prepare( $sql );
        $stmt->setFetchMode( \PDO::FETCH_CLASS, Memorableday::class );
        $stmt->execute([
            'name'    => $name,
        ]);

        $memorableday = $stmt->fetch();

        return $memorableday;

    }

    public function add( Memorableday $memorableday ) {
        $sql = "INSERT INTO memorableday (name, day_id) VALUES(:name, :day_id)";
        $stmt = $this->conn->prepare( $sql );
        $success = $stmt->execute([
            'name'          => $memorableday->getName(),
            'day_id'        => $memorableday->getDay_id(),
        ]);

        if( $success ) {
            $memorableday->setId($this->conn->lastInsertId());
            return $memorableday;
        }

        return false;
    }

}