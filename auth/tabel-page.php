<?php
session_start();
// Mulai session
// Periksa apakah pengguna sudah login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: /index.html");

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel-Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <div>
                <p style="font-weight: bolder;font-size: 19px;">Gudang Buku</p>
            </div>
            <div>
                <a href="logout.php"><button class="button-13">Logout</button></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Tabel Data Buku</h1>
        </div>
        <div style="margin: 10px 0;" class="container">
            <form action="tambah.php" method="GET">
                <div style="display:flex;flex-direction:row">
                    <input type="text" id="title" name="title" required placeholder="title" class="input-1" />
                    <input type="text" id="author" name="author" required placeholder="author" class="input-1" />
                    <input type="number" id="jumlah" name="jumlah" required placeholder="jumlah" class="input-1" />
                    <button class="button-13" style="width: 120px;height: 30px;" type="submit">Tambah Buku</button>
                </div>
            </form>
        </div>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Author</th>
                    <th>Jumlah</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                // Koneksi ke database
                $servername = "34.101.160.191";
                $username = "difa";
                $password = "ambatukam";
                $dbname = "gudangbuku";

                try {
                    // Buat koneksi PDO
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Ambil data dari API
                    $url = "https://projek-api-tugas-prak-cc-rqransntba-et.a.run.app/books";
                    $json = file_get_contents($url);
                    $data = json_decode($json, true);

                    // Tampilkan data ke dalam tabel
                    foreach ($data as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['author'] . "</td>";
                        echo "<td>" . $row['jumlah'] . "</td>";
                        echo "<td><a href='edit.php?id=" . $row['id'] . "&title=" . $row['title'] . "&author=" . $row['author'] . "&jumlah=" . $row['jumlah'] . "'><button class='button-13'>edit</button></a></td>";
                        echo "<td><a href='hapus.php?id=" . $row['id'] . "&title=" . $row['title'] . "&author=" . $row['author'] . "&jumlah=" . $row['jumlah'] . "'><button class='button-13'>hapus</button></a></td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                ?>
            </table>
        </div>
    </main>
</body>

</html>
