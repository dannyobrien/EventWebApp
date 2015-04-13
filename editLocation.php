<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$maxAttendees = $_POST['maxAttendees'];
$man_name = $_POST['man_name'];
$man_email = $_POST['man_email'];
$man_mobile = $_POST['man_mobile'];

$gateway->updateLocation($id, $name, $address, $maxAttendees, $man_name, $man_email, $man_mobile);

header('Location: viewLocation.php');






