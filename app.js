const express = require('express');
const path = require('path');

const app = express();
const port = process.env.PORT || 8080;

// Serve index.html dari direktori yang sama dengan app.js
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html'));
});

// Mengizinkan akses ke authentication.php tanpa melakukan pengecekan
app.use('/auth', express.static(path.join(__dirname, 'auth', 'authentication.php')));

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
