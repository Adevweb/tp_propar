<?php

session_start();

if ($_SESSION['type'] == 'EXPERT') {
    header('location: ../view/homeAdmin.php');
} else {
    header('location: ../view/homeUser.php');
}


?>