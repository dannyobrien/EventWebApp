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
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require "styles.php" ?>
        <title></title>
        <script type="text/javascript" src="js/event.js"></script>
    </head>
    <body>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        
        <h1>Edit Event Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editEventForm" name="editEventForm" action="editEvent.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Event Title</td>
                        <td>
                            <input type="text" name="title" value="<?php
                                if (isset($_POST) && isset($_POST['title'])) {
                                    echo $_POST['title'];
                                }
                                else echo $row['title'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['title'])) {
                                    echo $errorMessage['title'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php
                                if (isset($_POST) && isset($_POST['email'])) {
                                    echo $_POST['email'];
                                }
                                else echo $row['email'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['email'])) {
                                    echo $errorMessage['email'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>
                            <input type="text" name="location" value="<?php
                                if (isset($_POST) && isset($_POST['location'])) {
                                    echo $_POST['location'];
                                }
                                else echo $row['location'];
                            ?>" />
                            <span id="locationError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['location'])) {
                                    echo $errorMessage['location'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Attendees</td>
                        <td>
                            <input type="text" name="attendees" value="<?php
                                if (isset($_POST) && isset($_POST['attendees'])) {
                                    echo $_POST['attendees'];
                                }
                                else echo $row['attendees'];
                            ?>" />
                            <span id="attendesError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['attendees'])) {
                                    echo $errorMessage['attendees'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                            <input type="text" name="date" value="<?php
                                if (isset($_POST) && isset($_POST['date'])) {
                                    echo $_POST['date'];
                                }
                                else echo $row['date'];
                            ?>" />
                            <span id="dateError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['date'])) {
                                    echo $errorMessage['date'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>
                            <input type="text" name="time" value="<?php
                                if (isset($_POST) && isset($_POST['time'])) {
                                    echo $_POST['time'];
                                }
                                else echo $row['time'];
                            ?>" />
                            <span id="timeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['time'])) {
                                    echo $errorMessage['time'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                        <td>Entry Fee</td>
                        <td>
                             <input type="text" name="price" value="<?php
                                if (isset($_POST) && isset($_POST['price'])) {
                                    echo $_POST['price'];
                                }
                                else echo $row['price'];
                                ?>" />
                            <span id="priceError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['price'])) {
                                    echo $errorMessage['price'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Event" name="updateEvent" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>  
    </body>
</html>
