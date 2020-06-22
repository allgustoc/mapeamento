# Diretório `/etc`

Contém as configurações da aplicação:

- Definem ambientes em `./etc/*.php`
- Arquivos para criar o banco em `./etc/sql/*.sql`

## Ambientes

Definidos na _raiz do diretório de configuração_ onde o nome do arquivos é o
**nome do ambiente**. A aplicação deve ler o arquivo com o _nome do ambiente_
em que está sendo executado, exemplo:

    ```php
    require_once "./etc/desevolvimento.php"
    ```