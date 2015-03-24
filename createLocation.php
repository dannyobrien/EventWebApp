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

$name = $_POST['name'];

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

$address = $_POST['address'];
$maxAttendees = $_POST['maxAttendees'];
$man_name = $_POST['man_name'];
$man_email = $_POST['man_email'];
$man_mobile= $_POST['man_mobile'];

$gateway->insertEvent($name, $address, $maxAttendees, $man_name, $man_email, $man_mobile);

header('Location: viewLocations.php');

