<?php
// Ambil data dari formulir
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

// Konfigurasi koneksi ke database
$servername = "localhost"; // Ganti sesuai dengan server MySQL Anda
$username = ""; // Ganti dengan nama pengguna MySQL Anda
$password = ""; // Ganti dengan kata sandi MySQL Anda
$db = "db_pinjam_barang"; // Ganti dengan nama database yang Anda gunakan

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk memasukkan data ke database
$sql = "INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
