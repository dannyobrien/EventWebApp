<?php

class EventTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getEvents() {
        // execute a query to get all events
        $sqlQuery = "SELECT * FROM event";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve event");
        }

        return $statement;
    }

    public function getEventById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM event WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve Event");
        }

        return $statement;
    }

    public function insertEvent($t, $em, $l, $a, $d, $ti, $p) {
        $sqlQuery = "INSERT INTO event " .
                "(title, email, location_id, attendees, date, time, price) " .
                "VALUES (:title, :email, :location, :attendees, :date, :time, :price)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "title" => $t,
            "email"=> $em,
            "location" => $l,
            "attendees" => $a,
            "date" => $d,
            "time" => $ti,
            "price" => $p
        );

        $status = $statement->execute($params);

        echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';
        
        if (!$status) {
            die("Could not insert event");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteEvent($id) {
        $sqlQuery = "DELETE FROM event WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete event");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateEvent($id, $t, $em, $l, $a, $d, $ti, $p) {
        $sqlQuery =
                "UPDATE event SET " .
                "title = :title, " .
                "email= :email, " .
                "location_id = :location, " .
                "attendees = :attendees, " .
                "date = :date, " .
                "time = :time, " .
                "price = :price " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "title" => $t,
            "email" => $em,
            "location" => $l,
            "attendees" => $a,
            "date" => $d,
            "time" => $ti,
            "price" => $p
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}