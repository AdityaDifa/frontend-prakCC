# Menggunakan image PHP dengan server Apache dari Docker Hub
FROM php:apache

# Menetapkan direktori kerja di dalam container
WORKDIR /var/www/html

# Menyalin seluruh kode sumber proyek
COPY . .

# Menetapkan port yang akan digunakan oleh server Apache (biasanya port 80)
EXPOSE 8080

# Perintah untuk menjalankan server Apache saat container dijalankan
CMD ["apache2-foreground"]
