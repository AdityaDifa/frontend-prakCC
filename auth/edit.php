<?php
session_start();
// Mulai session
// Periksa apakah pengguna sudah login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: /frotnend-TugasAkhir/index.html");

    exit();
}
?>
<?php
if (isset($_GET['title'], $_GET['author'], $_GET['jumlah'])) {
    // Dapatkan nilai 'id' dari parameter URL
    $id = $_GET['id'];
    $title = $_GET['title'];
    $author = $_GET['author'];
    $jumlah = $_GET['jumlah'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Page</title>
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
        <div class='login-container'>
        <form action="update.php" method='POST'>
    <div class='content-login'>
        <h1>Edit Data Buku</h1>
        <div class='form-field'>
            <p>id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
            <!-- Input ID tidak bisa diedit -->
            <input type="text" id="id" name="id" required value="<?php echo $id; ?>" class="input-2" readonly/>
        </div>
        <div class='form-field'>
            <p>Judul :</p>
            <!-- Input judul -->
            <input type="text" id="title" name="title" required value="<?php echo $title; ?>" class="input-2"/>
        </div>
        <div class='form-field'>
            <p>Author :</p>
            <!-- Input author -->
            <input type="text" id="author" name="author" required value="<?php echo $author; ?>" class="input-2"/>
        </div>
        <div class='form-field'>
            <p>Jumlah :</p>
            <!-- Input jumlah -->
            <input type="number" id="jumlah" name="jumlah" required value="<?php echo $jumlah; ?>" class="input-2"/>
        </div>
        <div style='margin : 20px 0'>
            <button type='submit' class='button-13'>Update</button>
        </div>
    </div>
</form>

        </div>
    
    </main>
</body>

</html>
