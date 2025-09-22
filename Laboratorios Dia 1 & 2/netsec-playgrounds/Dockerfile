# Imagen base con PHP y Apache
FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    nano \
    vsftpd \
    tcpdump \
    curl \
 && apt-get clean

RUN docker-php-ext-install mysqli

# Carpeta segura requerida por vsftpd
RUN mkdir -p /var/run/vsftpd/empty && chmod 555 /var/run/vsftpd/empty

# --- Web ---
COPY ./web /var/www/html
RUN chown -R www-data:www-data /var/www/html

# --- CONFIGURACIÓN VSFTPD (usa tu archivo) ---
COPY ./services/vsftpd.conf /etc/vsftpd.conf

# --- USUARIO FTP + BANDERA (se crea en build time) ---
RUN useradd -m ftpuser \
 && echo "ftpuser:password123" | chpasswd \
 && mkdir -p /home/ftpuser/ftp \
 && echo "FLAG{ftp_plaintext_credentials}" > /home/ftpuser/ftp/flag_ftp.txt \
 && chown -R ftpuser:ftpuser /home/ftpuser \
 && chmod 755 /home/ftpuser /home/ftpuser/ftp \
 && chmod 644 /home/ftpuser/ftp/flag_ftp.txt

EXPOSE 80 21 21100-21110

# Arranque de servicios
CMD ["/bin/bash", "-c", "/usr/sbin/vsftpd & apache2-foreground"]
