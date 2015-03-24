<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);

$statement = $gateway->getlocations();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require "styles.php" ?>
        <script type="text/javascript" src="js/event.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Location Name</th>
                    <th>Location Address</th>
                    <th>Maximum Attendees</th>
                    <th>Manager Name</th>
                    <th>Manager Email</th>
                    <th>Manager Mobile</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['maxAttendees'] . '</td>';
                    echo '<td>' . $row['man_name'] . '</td>';
                    echo '<td>' . $row['man_email'] . '</td>';
                    echo '<td>' . $row['man_mobile'] . '</td>';
                    echo '<td>'
                    . '<a href="viewLocation.php?id='.$row['id'].'">View</a> '
                    . '<a href="editEventForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a class="deleteEvent" href="deleteEvent.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createLocationForm.php">Add Location</a></p>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>   
    </body>
</html>
