# Imagen base con PHP y Apache
FROM php:7.4-apache

# ---------------------------------------------------
# 1. Instalar utilidades necesarias
# ---------------------------------------------------
RUN apt-get update && apt-get install -y \
    nano \
    vsftpd \
    tcpdump \
    curl \
    && apt-get clean

# ---------------------------------------------------
# 2. Configurar Apache y módulos PHP
# ---------------------------------------------------
RUN docker-php-ext-install mysqli

# ---------------------------------------------------
# 3. Crear carpeta segura requerida por vsftpd
#    (Necesario si el reto 2 sigue usando FTP)
# ---------------------------------------------------
RUN mkdir -p /var/run/vsftpd/empty \
    && chmod 555 /var/run/vsftpd/empty

# ---------------------------------------------------
# 4. Copiar los archivos de la web
# ---------------------------------------------------
COPY ./web /var/www/html

# Ajustar permisos correctos
RUN chown -R www-data:www-data /var/www/html

# ---------------------------------------------------
# 5. Exponer puertos necesarios
# ---------------------------------------------------
# HTTP -> 80
# FTP -> 21 (más rango pasivo si lo necesitas)
EXPOSE 80 21 21100-21110

# ---------------------------------------------------
# 6. Arranque de servicios
# ---------------------------------------------------
# Solo levantamos Apache y vsftpd si lo usas para Reto 2
CMD ["/bin/bash", "-c", "/usr/sbin/vsftpd & apache2-foreground"]
