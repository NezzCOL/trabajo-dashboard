<?php
    session_start();
    session_destroy();
    header('location: ../../../../trabajo-dashboard/index.php');
?>