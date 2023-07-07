<?php
// include("path.php");

session_start();
// session_unset();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['admin']);
unset($_SESSION['message']);
unset($_SESSION['type']);

session_destroy();

//  header('location: ' . BASE_URL . '../index.php');
 header('location:  ../index.php'); // same as above