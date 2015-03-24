<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/register.js"></script>
        <?php require "styles.php" ?>
        <title></title>
    </head>
    <body>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <div class="container">
            <h2>Registration Form</h2>
            <form id="registerForm" action="register.php" method="POST">
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="username" value="<?php
                                    if (isset($_POST) && isset($_POST['username'])) {
                                        echo $_POST['username'];
                                    }
                                ?>" />
                                <span id="usernameError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['username'])) {
                                        echo $errorMessage['username'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" name="password" value="" />
                                <span id="passwordError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password'])) {
                                        echo $errorMessage['password'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td>
                                <input type="password" name="password2" value="" />
                                <span id="password2Error" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                        echo $errorMessage['password2'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Register" name="register" />
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
