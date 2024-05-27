const express = require('express');
const path = require('path');
const expressPhp = require('express-php');

const app = express();
const port = process.env.PORT || 8080;

// Serve index.html dari direktori yang sama dengan app.js
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html'));
});

// Menangani semua permintaan PHP di dalam folder 'auth'
app.use('/auth', expressPhp.cgi(path.join(__dirname, 'auth')));

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
