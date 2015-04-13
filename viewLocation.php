<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';

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
$gateway = new LocationTableGateway($connection);

$statement = $gateway->getLocationById($id);
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
                    echo '<td>Location Name</td>'
                    . '<td>' . $row['name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Location Address</td>'
                    . '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Maximum Attendees</td>'
                    . '<td>' . $row['maxAttendees'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Manager Name</td>'
                    . '<td>' . $row['man_name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Manager Email</td>'
                    . '<td>' . $row['man_email'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Manager Mobile</td>'
                    . '<td>' . $row['man_mobile'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editLocationForm.php?id=<?php echo $row['id']; ?>">
                Edit Location</a>
            <a class="deleteLocation" href="deleteLocation.php?id=<?php echo $row['id']; ?>">
                Delete Location</a>
        </p>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>  
    </body>
</html>

