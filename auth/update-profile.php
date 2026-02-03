<?php
session_start();

// 1. Cek Login
if (!isset($_SESSION['masuk']) || $_SESSION['masuk'] !== true) {
    header("Location: ../index.php");
    exit();
}

// 2. Hubungkan ke Database
// Menggunakan path sesuai file register-process.php
include '../config/connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- AMBIL DATA INPUT ---
    $surname     = trim($_POST['surname']);
    $family_name = trim($_POST['family_name']);
    $email_baru  = trim($_POST['email']);
    $new_password = $_POST['new_password'];

    // Ambil Email Lama dari Session untuk identifikasi user di Database
    // (Karena kita update berdasarkan user yang sedang login)
    $email_lama  = $_SESSION['email']; 

    // --- UPDATE OTOMATIS FULL NAME ---
    // Sesuai logika di register-process.php, full_name adalah gabungan surname + family_name
    $full_name   = $surname . ' ' . $family_name;

    // Validasi sederhana
    if (empty($surname) || empty($family_name) || empty($email_baru)) {
        header("Location: ../profile.php?status=empty");
        exit();
    }

    // --- LOGIKA UPDATE DATA ---
    
    // Skenario A: User ingin ganti Password
    if (!empty($new_password)) {
        // Update: surname, family_name, full_name, email, password
        // Note: Di register-process.php password disimpan langsung (plain text). 
        // Jika Anda ingin mengubahnya jadi hash, gunakan password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE login SET surname = ?, family_name = ?, full_name = ?, email = ?, password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $surname, $family_name, $full_name, $email_baru, $new_password, $email_lama);

    } else {
        // Skenario B: Hanya update data diri (Password kosong)
        $sql = "UPDATE login SET surname = ?, family_name = ?, full_name = ?, email = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $surname, $family_name, $full_name, $email_baru, $email_lama);
    }

    // --- EKSEKUSI ---
    if ($stmt->execute()) {
        // Jika berhasil update database, UPDATE JUGA SESSION
        // Supaya tampilan di dashboard langsung berubah tanpa harus logout-login lagi
        $_SESSION['surname']     = $surname;
        $_SESSION['family_name'] = $family_name;
        // Tidak perlu simpan full_name di session jika dashboard merakitnya sendiri, 
        // tapi jika dashboard butuh, bisa tambahkan: $_SESSION['full_name'] = $full_name;
        $_SESSION['email']       = $email_baru; // Penting: update email di session jika user ganti email

        header("Location: ../profile.php?status=success");
    } else {
        // Gagal (Mungkin email baru sudah dipakai orang lain, dll)
        header("Location: ../profile.php?status=error");
    }

    $stmt->close();
    $conn->close();

} else {
    header("Location: ../profile.php");
    exit();
}
?>