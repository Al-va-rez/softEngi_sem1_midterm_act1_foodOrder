<?php
    if(isset($_POST['btn_Clear'])) {
        session_start(); // Establish connection to the current session
        session_unset(); // Delete all session variables
        header('Location: index.php'); // Go back to homepage
    };
?>