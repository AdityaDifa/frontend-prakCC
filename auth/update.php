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
if (isset($_POST['id'], $_POST['title'], $_POST['author'], $_POST['jumlah'])) {
    // Dapatkan nilai 'id', 'title', 'author', dan 'jumlah'
    $id = $_POST['id'];
    $title = urldecode($_POST['title']);
    $author = urldecode($_POST['author']);
    $jumlah = urldecode($_POST['jumlah']);

    // Data yang akan dikirim ke API
    $data = array(
        'title' => $title,
        'author' => $author,
        'jumlah' => $jumlah
    );
    
    // Encode data menjadi format JSON
    $data_json = json_encode($data);
    
    // URL API
    $url = 'https://projek-api-tugas-prak-cc-rqransntba-et.a.run.app/books/' . $id;
    
    // Pengaturan HTTP PUT
    $options = array(
        'http' => array(
            'method' => 'PUT',
            'header' => 'Content-Type: application/json',
            'content' => $data_json
        )
    );
    
    // Buat context stream
    $context = stream_context_create($options);
    
    // Kirim permintaan PUT ke API
    $result = file_get_contents($url, false, $context);
    
    if ($result === false) {
        // Handle jika terjadi kesalahan
        header('Location: tabel-page.php?message=error');
    } else {
        // Handle respon dari API
        header('Location: tabel-page.php?message=updatesuccess');
    }
} else {
    echo "Invalid request. Missing one or more parameters.";
}
?>
