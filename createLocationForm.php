<?php

class LocationTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getLocation() {
        // execute a query to get all managers
        $sqlQuery = "SELECT * FROM location";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve location");
        }

        return $statement;
    }

    public function getLocationById($id) {
        // execute a query to get the manager with the specified id
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
                "() " .
                "VALUES (:name, :address, :maxAttendees, :man_name, :man_email, :man_mobile)";

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

        if (!$status) {
            die("Could not insert manager");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteLocation($id) {
        $sqlQuery = "DELETE FROM managers WHERE id = :id";

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

    public function updateLocation($n, $a, $ma, $mn, $me, $mm) {
        $sqlQuery =
                "UPDATE location SET " .
                "name = :name, " .
                "address = :address, " .
                "maxAttendees = :maxAttendees, " .
                "man_name = :man_name, " .
                "man_email = :man_email, " .
                "man_mobile = :man_mobile, " .

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

