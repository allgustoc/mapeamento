# Mapeamento

> Por que esse projeto existe?

## Instruções para desenvolvimento

Você pode configurar e manter seu próprio ambiente de desenvolvimento, mas um 
[ambiente Docker][1] é disponibilizado para facilitar a contribuição. 
Se você já conhece Docker e `docker-compose`, segue um resumo dos serviços
disponíveis:

[1]: https://blog.umbler.com/br/containers-102-primeiros-passos-para-realizar-a-instalacao

- `www` é a aplicação PHP sendo executada com Apache disponível em `http://localhost:8080`
- `db` é uma instância de MySQL com o banco definido por `./etc/sql/*.sql`
- `adminer` permite administrar e consultar o `db` através de `http://localhost:8081`

Credenciais do banco de dados:

| Hostname | User   | Password             | Database     |
|----------|--------|----------------------|--------------|
| `db`     | `root` | `em_desenvolvimento` | `maps_teste` |

Considerando que você já possui o [Docker][1] instalado, e que não está familiarizado
com a utilização dele para desenvolvimento, abaixo seguem seções descrevendo tarefas
recorrenter e como executá-las.

### Iniciando o servidor

`docker-compose up` irá baixar todas as imagens e executar os contâiners para
rodar a aplicação. Esse comando deve ser executado na _raiz do repositório_.

Após executar o comando, você pode acessar `https://localhost:8080` para ver a
aplicação sendo executada. Se a aplicação não funcionar, e o erro não for 
apresentado no navegador, você precisa reler os logs da execução para encontrar
o problema (e em qual contâiner foi gerado).

Independente do comando ter funcionado ou não o terminal fica travado, impedindo
você de executar outros comandos, e para terminar os contâiners você pode 
apertar `CTRL+C`.

Uma outra forma de executar o mesmo comando mas sem deixar o terminal travado é
executar `docker-compose up -d`. Com isso, para encerrar a execução dos contâiners
com `docker-compose down`.

### Examinando logs de um contâiner específico

Com `docker-compose logs <nome do serviço>` você pode examinar as últimas mensagens
de _log_ do contâiner.

Os nomes de serviço disponíveis estão no `docker-compose.yml` e podem ser descobertos
com um `docker-compose ps`

## Abrir um terminal dentro de um container

Julgando que queremos abrir um terminal dentro do serviço `www`:

    ```
    $ docker-compose exec www bash
    ```

Para sair do terminal, pode-se executar `exit` ou apertar `CTRL+D`.

### Atualizando a imagem Docker da aplicação

Uma imagem customizada do [php][], com os requisitos da aplicação, é utilizada
pelo `www` e definida em `./etc/docker/php/Dockerfile`. Ao mudar o `Dockerfile`
é preciso reconstruir a imagem da aplicação com `docker-compose up -d --build`.

[php]: https://hub.docker.com/_/php

