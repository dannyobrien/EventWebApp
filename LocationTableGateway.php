<?php

class LocationTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getLocations() {
        // execute a query to get all events
        $sqlQuery = "SELECT * FROM location";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve location");
        }

        return $statement;
    }

    public function getLocationById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM location WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve location");
        }

        return $statement;
    }

    public function insertLocation($n, $a, $ma, $mn, $me, $mm) {
        $sqlQuery = "INSERT INTO location " .
                "(name, address, maxAttendees, man_name, man_email, man_mobile) " .
                "VALUES (:name, :address, :maxAttendees, :man_name, :man_email, :man_mobile)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "address"=> $a,
            "maxAttendees" => $ma,
            "man_name" => $mn,
            "man_email" => $me,
            "man_mobile" => $mm,
        );

        $status = $statement->execute($params);

        echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';
        
        if (!$status) {
            die("Could not insert location");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteLocation($id) {
        $sqlQuery = "DELETE FROM location WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete location");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateLocation($id, $n, $a, $ma, $mn, $me, $mm) {
        $sqlQuery =
                "UPDATE location SET " .
                "name = :name, " .
                "address= :address, " .
                "maxAttendees = :maxAttendees, " .
                "man_name = :man_name, " .
                "man_email = :man_email, " .
                "man_mobile = :man_mobile, " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "name" => $n,
            "address" => $a,
            "maxAttendees" => $ma,
            "man_name" => $mn,
            "man_email" => $me,
            "man_mobile" => $mm,
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}