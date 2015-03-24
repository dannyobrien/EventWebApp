<?php
require_once 'Connection.php';
require_once 'ComputerTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$computerGateway = new ComputerTableGateway($connection);

$computers = $computerGateway->getComputers();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/programmer.js"></script>
        <?php require "styles.php" ?>
        <title></title>
    </head>
    <body>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <div class="container">
            <h2>View Computers</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Make</th>
                        <th>Model</th>
                        <th>OS</th>
                        <th>Date Bought</th>
                        <th>Price</th>
                        <th>Programmer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $computers->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        echo '<td>' . $row['make'] . '</td>';
                        echo '<td>' . $row['model'] . '</td>';
                        echo '<td>' . $row['os'] . '</td>';
                        echo '<td>' . $row['dateBought'] . '</td>';
                        echo '<td>' . $row['price'] . '</td>';
                        echo '<td>' . $row['programmerName'] . '</td>';
                        echo '<td>'
                        . '<a href="viewComputer.php?id='.$row['id'].'">View</a> '
                        . '<a href="editComputerForm.php?id='.$row['id'].'">Edit</a> '
                        . '<a class="deleteComputer" href="deleteComputer.php?id='.$row['id'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';

                        $row = $computers->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <p><a href="createComputerForm.php">Create Computer</a></p>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>