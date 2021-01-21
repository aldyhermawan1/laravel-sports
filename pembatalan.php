<?php
$servername = "localhost";
$username = "tambakin";
$password = "tambaktanpain";
$dbname = "tambakin_sports";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
mysqli_query($conn, "update transaksi set transaksi.lunasTransaksi = 'batal' where transaksi.tanggalTransaksi < date_sub(now(),interval 24 hour) and (transaksi.lunasTransaksi = 'belum')");
?>