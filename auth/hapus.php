<?php
session_start();
// Mulai session
// Periksa apakah pengguna sudah login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: /frotnend-TugasAkhir/index.html");

    exit();
}
?>
?>
<?php
if (isset($_GET['id'])) {
    // Dapatkan nilai 'id' dari parameter URL
    $id = $_GET['id'];
    
    // URL API dengan ID buku yang akan dihapus
    $url = 'https://projek-api-tugas-prak-cc-rqransntba-et.a.run.app/books/' . $id;
    
    // Pengaturan HTTP DELETE
    $options = array(
        'http' => array(
            'method' => 'DELETE'
        )
    );
    
    // Buat context stream
    $context = stream_context_create($options);
    
    // Kirim permintaan DELETE ke API
    $result = file_get_contents($url, false, $context);
    
    if ($result === false) {
        // Handle jika terjadi kesalahan
        header('Location: tabel-page.php?message=error');
    } else {
        // Handle respon dari API
        header('Location: tabel-page.php?message=hapussuccess');
    }
} else {
    // Jika parameter 'id' tidak tersedia, kembalikan pesan kesalahan
    echo "Invalid request. Missing parameter 'id'.";
}
?>
