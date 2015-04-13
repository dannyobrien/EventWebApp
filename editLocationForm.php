<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';
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
$gateway = new LocationTableGateway($connection);
$wardGateway = new EventTableGateway($connection);

$statement = $gateway->getLocationById($id);
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
        <div class="container">
        <h1>Edit Location Form</h1>
            <?php
            if (isset($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';
            }
            ?>
            <form id="editLocationForm" name="editLocationForm" action="editLocation.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Location Name</td>
                            <td>
                                <input type="text" name="name" value="<?php
                                    if (isset($_POST) && isset($_POST['name'])) {
                                        echo $_POST['name'];
                                    }
                                    else echo $row['name'];
                                ?>" />
                                <span id="nameError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['name'])) {
                                        echo $errorMessage['name'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" name="address" value="<?php
                                    if (isset($_POST) && isset($_POST['address'])) {
                                        echo $_POST['address'];
                                    }
                                    else echo $row['address'];
                                ?>" />
                                <span id="addressError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['address'])) {
                                        echo $errorMessage['address'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Maximum Attendees</td>
                            <td>
                                <input type="text" name="maxAttendees" value="<?php
                                    if (isset($_POST) && isset($_POST['maxAttendees'])) {
                                        echo $_POST['maxAttendees'];
                                    }
                                    else echo $row['maxAttendees'];
                                ?>" />
                                <span id="maxAttendeesError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['maxAttendees'])) {
                                        echo $errorMessage['maxAttendees'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Manager Name</td>
                            <td>
                                <input type="text" name="man_name" value="<?php
                                    if (isset($_POST) && isset($_POST['man_name'])) {
                                        echo $_POST['man_name'];
                                    }
                                    else echo $row['man_name'];
                                ?>" />
                                <span id="man_nameError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['man_name'])) {
                                        echo $errorMessage['man_name'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Manager Email</td>
                            <td>
                                <input type="text" name="man_email" value="<?php
                                    if (isset($_POST) && isset($_POST['man_email'])) {
                                        echo $_POST['man_email'];
                                    }
                                    else echo $row['man_email'];
                                ?>" />
                                <span id="man_emailError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['man_email'])) {
                                        echo $errorMessage['man_email'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Manager Mobile</td>
                            <td>
                                <input type="text" name="man_mobile" value="<?php
                                    if (isset($_POST) && isset($_POST['man_mobile'])) {
                                        echo $_POST['man_mobile'];
                                    }
                                    else echo $row['man_mobile'];
                                ?>" />
                                <span id="man_mobileError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['man_mobile'])) {
                                        echo $errorMessage['man_mobile'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Location" name="updateLocation" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>  
    </body>
</html>
