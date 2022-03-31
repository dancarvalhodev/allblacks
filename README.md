# Desafio Técnico P21 Sistemas
## Requisitos
- Docker e Docker Compose Instalados.
  - [Instalação do Docker em Windows](https://docs.docker.com/desktop/windows/install/)
  - [Instalação do Docker em Linux](https://docs.docker.com/engine/install/)
  - [Instalação do Docker em Mac](https://docs.docker.com/desktop/mac/install/)

Observação: Em ambientes Windows e Mac o Docker Compose já vem embutido no Docker Desktop, entretanto em ambiente Linux é necessário seguir o [tutorial](https://docs.docker.com/compose/install/).

## Como rodar?
Use o meu repositório [Docker LAMP](https://github.com/dancarvalhodev/docker) como base para subir todo o ambiente necessário (Apache, MySQL, PHP).

#### Passo a Passo
- Clone o repositório Docker LAMP em sua pasta de preferência.
- Rode o comando `docker-compose up -d` para subir todo o ambiente docker.
- Clone [este](https://github.com/dancarvalhodev/allblacks) repositório com o projeto para dentro da pasta src do Docker LAMP, esta pasta se conecta ao /var/www/html da distribuição linux que está rodando dentro do docker.
- Entre no container mysql (necessário para criar o banco de dados) com o comando `docker exec -it mysql /bin/bash`.
  - Realize a conexão com o banco de dados usando o comando `mysql -u root -p` (a senha padrão é root e o usuário padrão também é root). **Observação: Em ambiente de produção é necessário, além de criar usuários separados do root, criar uma senha de root forte, complexa e longa.**
  - No console mysql rode `CREATE DATABASE allblacks;` para criar o banco de dados.
  - Dê permissões com `GRANT ALL PRIVILEGES ON allblacks.* TO 'root'@'localhost';` e rode `FLUSH PRIVILEGES;`.
  - A tabela é automaticamente criada ao abrir o projeto no browser pela primeira vez.
- Configure o hosts do seu sistema operacional para enchergar esse projeto (isso é possivel pois foi usado VHOSTS, o qual será configurado adiante).
  - Caso for Windows: Edite o arquivo hosts localizado em `C:\Windows\System32\drivers\etc`. Neste arquivo adicione abaixo das informações de Kubernetes do docker, o ip do WSL (para descobri-lo, rode `ipconfig` no prompt de comando) seguido de p21.test.
  - Caso for Linux: Edite o arquivo `/etc/hosts`e adicione a linha `172.17.0.1 p21.test` ao final do arquivo.
  - Caso for macOS: Edite o arquivo `/etc/hosts`e adicione a linha `127.0.0.1 p21.test` ao final do arquivo.
- Copie o arquivo all.conf localizado na raiz [deste](https://github.com/dancarvalhodev/allblacks) projeto e cole dentro de `docker/config/vhosts` do repositório Docker Lamp.

#### Permissões necessárias no Container Apache
- Acesse o container com o comando `docker exec -it apache /bin/bash`.
- Dê a permissão de modificação do diretório Uploads com o comando `chown -R www-data:www-data public/Uploads`

#### Observações relacionadas ao disparo de e-mails
- Caso queira utilizar o disparo de e-mails, é necessário criar uma conta no [sendgrid](https://app.sendgrid.com/) e gerar uma sendgrid_api_key.