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
        <h1>Create Event Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createEventForm" name="createEventForm" action="createEvent.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Event Title</td>
                        <td>
                            <input type="text" name="title" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>                        
                        <td>Location ID</td>
                        <td>
                            <input type="text" name="location_id" value="" />
                            <span id="locationError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Number of Attendees</td>
                        <td>
                            <input type="text" name="attendees" value="" />
                            <span id="attendeesError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                            <input type="text" name="date" value="" />
                            <span id="dateError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>
                            <input type="text" name="time" value="" />
                            <span id="timeError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Entry Fee</td>
                        <td>
                            <input type="text" name="price" value="" />
                            <span id="priceError" class="error"></span>
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
