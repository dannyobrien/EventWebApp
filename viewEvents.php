<?php
require_once 'Connection.php';
require_once 'EventTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEvents();
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
                    <th>Event Title</th>
                    <th>Email</th>
                    <th>Location ID</th>
                    <th>Attendees</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Entry Fee</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['location_id'] . '</td>';
                    echo '<td>' . $row['attendees'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['time'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>'
                    . '<a href="viewEvent.php?id='.$row['id'].'">View</a> '
                    . '<a href="editEventForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a class="deleteEvent" href="deleteEvent.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createEventForm.php">Create Event</a></p>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>   
    </body>
</html>
