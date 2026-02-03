<?php
session_start();
include '../config/connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil data input
    $surname     = trim($_POST['surname']);
    $family_name = trim($_POST['family_name']);
    $dob         = $_POST['dob']; // Ambil data tanggal lahir
    $username    = trim($_POST['username']);
    $email       = trim($_POST['email']);
    $password    = $_POST['password']; 
    $status      = 'public'; 


    // 2. Buat Full Name otomatis
    $full_name   = $surname . ' ' . $family_name;

    // 3. Cek apakah username atau email sudah ada
    $check_sql = "SELECT username FROM login WHERE username = ? OR email = ? LIMIT 1";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("ss", $username, $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $_SESSION['error'] = "Username atau Email sudah terdaftar!";
        $stmt_check->close();
        header("Location: ../register.php");
        exit();
    } else {
        $stmt_check->close(); // Tutup check stmt sebelum buat yang baru

        // 4. Simpan ke Database (Pastikan kolom 'dob' sudah ada di tabel 'login' Anda)
        $sql = "INSERT INTO login (surname, family_name, full_name, dob, username, email, password, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        // 8 parameter string (ssssssss)
        $stmt->bind_param("ssssssss", $surname, $family_name, $full_name, $dob, $username, $email, $password, $status);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registrasi berhasil! Silahkan login.";
            $stmt->close();
            header("Location: ../login.php");
            exit();
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat menyimpan data.";
            $stmt->close();
            header("Location: ../register.php");
            exit();
        }
    }
    $conn->close();
} else {
    header("Location: ../register.php");
    exit();
}
?>