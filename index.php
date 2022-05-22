<?php
session_start();

if(isset($_SESSION['id'])) {
    header("location:dashboard/dashboard.php");
} else {
    header("location:login/halaman_login.php");
}
