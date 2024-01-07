<?php
$host = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "js_input"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $usia = isset($_POST["usia"]) ? $_POST["usia"] : "";

    if (empty($nama) || empty($usia)) {
        echo "Nama dan usia harus diisi.";
        exit();
    }

    $sql = "INSERT INTO mahasiswa (nama, usia) VALUES ('$nama', $usia)";
    $result = $conn->query($sql);

    if ($result) {
        // Jika data berhasil ditambahkan, kirim HTML baris baru untuk ditambahkan ke tabel
        echo "<tr><td>$nama</td><td>$usia</td></tr>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    exit();
}
?>

