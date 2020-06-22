FROM php:7.2-apache

# Utilitário para facilitar instalação de extensões
# https://github.com/mlocati/docker-php-extension-installer
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions

# Extensão utilizada para acessar Banco de Dados MySQL
RUN install-php-extensions mysqli

# Utiliza a configuração padrão do PHP para o ambiente
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
#RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"