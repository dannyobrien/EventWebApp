<?php
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require "styles.php" ?>
        <title></title>
    </head>
    <body>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        
        <div class="container">
            <h2>Welcome To Easy Event Management</h2>
        
            
            <div class="col-lg-6 ">
                <p>Easy Event Management is a website that allows to Create, View, Edit and
                    Delete events in a quick and easy way. You can search through your own 
                    events and also other upcoming events.</p>
            </div>
            
            <div class="col-lg-6 ">   
                <p>Each user can also add locations to the website and link them to events
                 by id numbers. The same locations may also be viewed, edited and deleted
                    from the site.</p>
            </div>
        
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>    
    </body>
</html>
