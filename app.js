const express = require('express');
const path = require('path');

const app = express();
const port = process.env.PORT || 8080;

// Serve static files (opsional, jika kamu memiliki file-file statis di folder lain)
app.use(express.static(path.join(__dirname, 'public')));

// Serve index.html pada root route
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html')); // Sesuaikan dengan lokasi index.html yang sebenarnya
});

// Mengizinkan akses ke authentication.php tanpa melakukan pengecekan
app.use('/auth', express.static(path.join(__dirname, 'auth/authentication.php')));

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
