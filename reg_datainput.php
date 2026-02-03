<?php
include './config/connection.php';

// Mengambil data input form
$idc = $_POST["idc"];
$fname = $_POST["fname"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$sex = $_POST["sex"];
$age = $_POST["age"];
$pob = $_POST["pob"];
$poo = $_POST["poo"];
$country_of_origin = $_POST["country_of_origin"];
$schid = $_POST["schid"];
$prev_edu = $_POST["prev_edu"];
$nos = $_POST["nos"];
$avg_score = $_POST["avg_score"];
$stuprog1 = $_POST["stuprog1"];
$stuprog2 = $_POST["stuprog2"];
$housing_plan = $_POST["housing_plan"];
$financial_aid = $_POST["financial_aid"];
$career_plan = $_POST["career_plan"];
$social_extr_plan = isset($_POST["social_extr_plan"]) ? implode(", ", $_POST["social_extr_plan"]) : '';


// Menangani file upload
$id_check_query = "SELECT * FROM admission2025 WHERE idc = '$idc' LIMIT 1";
$id_check_result = $conn->query($id_check_query);

if ($id_check_result->num_rows > 0) {
    // Jika ID sudah terdaftar
    echo "<script>window.location = 'error_modal_id.php';</script>";
    exit();
}

$email_check_query = "SELECT * FROM admission2025 WHERE email = '$email' LIMIT 1";
$email_check_result = $conn->query($email_check_query);

if ($email_check_result->num_rows > 0) {
    // Jika email sudah terdaftar
    echo "<script>window.location = 'error_modal_email.php';</script>";
    exit();
}

if (isset($_FILES["academic_transcript"])) {
    $academic_transcript_name = $_FILES["academic_transcript"]["name"]; // Nama file
    $file_tmp = $_FILES["academic_transcript"]["tmp_name"]; // File sementara
    $file_size = $_FILES["academic_transcript"]["size"]; // Ukuran file
    $file_error = $_FILES["academic_transcript"]["error"]; // Error jika ada

    // Menentukan folder untuk menyimpan file
    $target_dir = "./uploads/"; // Folder tempat file akan disimpan
    $target_file = $target_dir . basename($academic_transcript_name); // Path lengkap file

    // Memeriksa apakah file telah berhasil diupload
    if ($file_error === 0) {
        // Memindahkan file ke folder tujuan
        if (move_uploaded_file($file_tmp, $target_file)) {
            echo "File telah berhasil diupload.<br>";
        } else {
            echo "Terjadi kesalahan saat mengupload file.<br>";
            exit;
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah file.<br>";
        exit;
    }
} else {
    echo "Tidak ada file yang diunggah.<br>";
    exit;
}

// Menyusun query SQL untuk menyimpan data ke database
$sql = "INSERT INTO admission2025 
(idc, fname, email, dob, sex, age, pob, poo, country_of_origin, schid, prev_edu, nos, academic_transcript, avg_score, stuprog1, stuprog2, housing_plan, financial_aid, career_plan, social_extr_plan) 
VALUES ('$idc', '$fname', '$email', '$dob', '$sex', '$age', '$pob', '$poo', '$country_of_origin', '$schid', '$prev_edu', '$nos', '$target_file', '$avg_score', '$stuprog1', '$stuprog2', '$housing_plan', '$financial_aid', '$career_plan', '$social_extr_plan')";

// Menjalankan query SQL
if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman index.php dengan pesan notifikasi
    header("Location: index.php?message=Check your email to verify your admission");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
