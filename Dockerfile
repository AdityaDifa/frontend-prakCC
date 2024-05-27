# Gunakan image PHP dengan server Apache dari Docker Hub
FROM php:apache

# Menetapkan direktori kerja di dalam container
WORKDIR /var/www/html

# Menyalin index.html dan style.css ke dalam container
COPY index.html .
COPY style.css .

# Menyalin seluruh isi folder 'auth' ke dalam container
COPY auth/ /var/www/html/auth/

# Menetapkan port yang akan digunakan oleh server Apache (biasanya port 80)
EXPOSE 80

# Perintah untuk menjalankan server Apache saat container dijalankan
CMD ["apache2-foreground"]
