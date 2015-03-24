<?php
$session_id = session_id();
if ($session_id == "") {
    session_start();
}
?>
<div class="container">
    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="index.php">Home</a></li>
            <li><a href="viewEvents.php">Events</a></li>
            <li><a href="viewLocations.php">Locations</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['username'])) { ?>
            <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
            <li><a href="loginForm.php">Login</a></li>
        <?php } ?>
        </ul>
        
    </nav>
</div>
