<?php
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$id = $_POST['id'];
$title = $_POST['title'];
$email = $_POST['email'];
$location = $_POST['location'];
$attendees = $_POST['attendees'];
$date = $_POST['date'];
$time= $_POST['time'];
$price = $_POST['price'];

$gateway->updateEvent($id, $title, $email, $location, $attendees, $date, $time, $price);

header('Location: viewEvents.php');






