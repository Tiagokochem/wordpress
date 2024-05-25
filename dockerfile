FROM wordpress:latest

# Copie o tema personalizado para a pasta de temas do WordPress
COPY./twentyseventeen /var/www/html/wp-content/themes/twentyseventeen/

# Copie o arquivo functions.php personalizado para o tema
COPY./twentyseventeen/functions.php /var/www/html/wp-content/themes/twentyseventeen/functions.php
