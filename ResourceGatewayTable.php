<?php

class ResourceTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getResources() {
        // execute a query to get all computers
        $sqlQuery =
                "SELECT c.*, p.name AS programmerName
                 FROM computers c
                 LEFT JOIN programmers p ON p.id = c.programmer_id";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve resource");
        }

        return $statement;
    }

    public function getResourcesByEventId($eventId) {
        // execute a query to get all computers
        $sqlQuery =
                "SELECT c.*, p.name AS programmerName
                 FROM computers c
                 LEFT JOIN programmers p ON p.id = c.programmer_id
                 WHERE c.programmer_id = :programmer_id";

        $params = array(
            "programmer_id" => $programmerId
        );
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve computers");
        }

        return $statement;
    }

    public function getComputerById($id) {
        // execute a query to get the computer with the specified id
        $sqlQuery =
                "SELECT c.*, p.name AS programmerName
                 FROM computers c
                 LEFT JOIN programmers p ON p.id = c.programmer_id
                 WHERE c.id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve computer");
        }

        return $statement;
    }

    public function insertComputer($mk, $mdl, $os, $db, $prc, $pId) {
        $sqlQuery = "INSERT INTO computers " .
                "(make, model, os, dateBought, price, programmer_id) " .
                "VALUES (:make, :model, :os, :dateBought, :price, :programmer_id)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "make" => $mk,
            "model" => $mdl,
            "os" => $os,
            "dateBought" => $db,
            "price" => $prc,
            "programmer_id" => $pId
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert computer");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteComputer($id) {
        $sqlQuery = "DELETE FROM computers WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete computer");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateComputer($id, $mk, $mdl, $os, $db, $prc, $pId) {
        $sqlQuery =
                "UPDATE computers SET " .
                "make = :make, " .
                "model = :model, " .
                "os = :os, " .
                "dateBought = :dateBought, " .
                "price = :price, " .
                "programmer_id = :programmer_id " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "make" => $mk,
            "model" => $mdl,
            "os" => $os,
            "dateBought" => $db,
            "price" => $prc,
            "programmer_id" => $pId
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}