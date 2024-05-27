<?php
session_start();
// Mulai session
// Periksa apakah pengguna sudah login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: /index.html");

    exit();
}
?>
<?php
if (isset($_GET['title'], $_GET['author'], $_GET['jumlah'])) {
    // Dapatkan nilai 'id', 'title', 'author', dan 'jumlah'
    $title = urldecode($_GET['title']);
    $author = urldecode($_GET['author']);
    $jumlah = urldecode($_GET['jumlah']);

    // Data yang akan dikirim ke API
    $data = array(
        'title' => $title,
        'author' => $author,
        'jumlah' => $jumlah
    );
    
    // Encode data menjadi format JSON
    $data_json = json_encode($data);
    
    // URL API
    $url = 'https://projek-api-tugas-prak-cc-rqransntba-et.a.run.app/books';
    
    // Pengaturan HTTP POST
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => $data_json
        )
    );
    
    // Buat context stream
    $context = stream_context_create($options);
    
    // Kirim permintaan POST ke API
    $result = file_get_contents($url, false, $context);
    
    if ($result === false) {
        // Handle jika terjadi kesalahan
        header('Location: tabel-page.php?message=error');
    } else {
        // Handle respon dari API
        header('Location: tabel-page.php?message=tambahsuccess');
    }
} else {
    echo "Invalid request. Missing one or more parameters.";
}
?>
