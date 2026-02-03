<?php
session_start();
session_unset();
session_destroy();

// Cek apakah logout karena timeout atau tombol logout biasa
if (isset($_GET['timeout']) && $_GET['timeout'] == 'true') {
    header("Location: ../index.php?message=timeout");
} else {
    header("Location: ../index.php?message=logged_out");
}
exit();
?>