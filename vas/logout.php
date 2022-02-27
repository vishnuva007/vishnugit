<?php
ob_start();
session_start();
if(isset($_SESSION['id'])) {
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_email']);
unset($_SESSION['user_phno']);
header("Location: login.php");
} else {
header("Location: login.php");
}
?>