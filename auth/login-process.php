<?php
session_start();
include '../config/connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek user berdasarkan username
    $sql = "SELECT * FROM login WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifikasi Password (Plain text sesuai kode awal Anda)
        if ($password === $user['password']) {
            
            // --- SET SESSION VARIABLES ---
            $_SESSION['masuk'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['status'] = $user['status'];
            
            // Simpan nama-nama ke session
            $_SESSION['surname'] = $user['surname'];         // Untuk sapaan "Hi, John"
            $_SESSION['family_name'] = $user['family_name']; // Untuk data form
            $_SESSION['full_name'] = $user['full_name'];     // Untuk tampilan profil lengkap
            $_SESSION['dob'] = $user['dob'];     // Untuk tampilan profil lengkap
            
            // --- FITUR TIMEOUT ---
            // Simpan waktu login sekarang
            $_SESSION['last_activity'] = time();

            // --- REDIRECT ---
            $status = strtolower($user['status']);

            if ($status === 'pelajar') {
                header("Location: /buitenzorg-hs/");
                exit();
            } elseif ($status === 'pengajar') {
                header("Location: /buitenzorg-hs/teacher/");
                exit();
            } elseif ($status === 'public') {
                header("Location: ../dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = 'Invalid Role';
                header("Location: ../login.php");
                exit();
            }
        }
    }

    // Jika Gagal
    $_SESSION['error'] = 'Invalid Username or Password';
    header("Location: ../login.php");
    exit();

    $stmt->close();
    $conn->close();

} else {
    header("Location: ../login.php");
    exit();
}
?>