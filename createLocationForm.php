<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
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
        <h1>Create Location Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createLocationForm" name="createLocationForm" action="createLocation.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Location Name</td>
                        <td>
                            <input type="text" name="name" value="" />
                            <span id="nameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="" />
                            <span id="addressError" class="error"></span>
                        </td>
                    </tr>
                    <tr>                        
                        <td>Maximum Attendees</td>
                        <td>
                            <input type="text" name="maxAttendees" value="" />
                            <span id="maxAttendeesError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager Name</td>
                        <td>
                            <input type="text" name="man_name" value="" />
                            <span id="man_nameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager Email</td>
                        <td>
                            <input type="text" name="man_email" value="" />
                            <span id="man_emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager Mobile</td>
                        <td>
                            <input type="text" name="man_mobile" value="" />
                            <span id="man_mobileError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Event" name="createEvent" />
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
