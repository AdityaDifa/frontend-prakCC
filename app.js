// app.js
const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const connection = require('./db'); // Hanya jika Anda masih membutuhkan koneksi database

const app = express();
const port = process.env.PORT || 8080;

app.use(bodyParser.json());

// Set the static files location
app.use(express.static(path.join(__dirname, 'public')));

// Serve index.html on the root route
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html'));
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
