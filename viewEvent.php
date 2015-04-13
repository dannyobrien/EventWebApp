<?php
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEventById($id);
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
        <div class="container"> 
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Event Title</td>'
                    . '<td>' . $row['title'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Email</td>'
                    . '<td>' . $row['email'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Location</td>'
                    . '<td>' . $row['location_id'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Number of Attendees</td>'
                    . '<td>' . $row['attendees'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Date</td>'
                    . '<td>' . $row['date'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Time</td>'
                    . '<td>' . $row['time'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Price </td>'
                    . '<td>' . $row['price'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editEventForm.php?id=<?php echo $row['id']; ?>">
                Edit Event</a>
            <a class="deleteEvent" href="deleteEvent.php?id=<?php echo $row['id']; ?>">
                Delete Event</a>
        </p>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>  
    </body>
</html>
