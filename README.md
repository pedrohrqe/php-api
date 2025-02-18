# API Simples em PHP

Esta é uma API simples desenvolvida em PHP que permite a conexão com um banco de dados MySQL para realizar operações CRUD em posts e listar usuários.

## Funcionalidades
- Criar um post
- Atualizar um post por ID
- Excluir um post por ID
- Listar posts de um usuário por ID
- Criar um usuário
- Atualizar um usuário por ID
- Excluir um usuário por ID
- Listar todos os usuários
- Listar um usuário pelo ID
- Listar um usuário pelo Nome
- Listar um usuário pelo E-mail

## Tecnologias Utilizadas
- PHP
- MySQL

## Acesso
http://pedrohrqe.mooo.com/api

## API
| Endpoint                            | Descrição                          |
|-------------------------------------|----------------------------------|
| `/api/post/createpost.php`         | Cria um novo post                |
| `/api/post/deletepost.php`         | Deleta um post                   |
| `/api/post/getpostsbyuserid.php`   | Obtém posts de um usuário por ID |
| `/api/post/updatepostbyid.php`     | Atualiza um post por ID          |
| `/api/user/createuser.php`         | Cria um novo usuário             |
| `/api/user/deleteuser.php`         | Deleta um usuário                |
| `/api/user/getuserbyemail.php`     | Obtém um usuário pelo e-mail     |
| `/api/user/getuserbyid.php`        | Obtém um usuário pelo ID         |
| `/api/user/getuserbyname.php`      | Obtém um usuário pelo nome       |
| `/api/user/getusers.php`           | Obtém todos os usuários          |
| `/api/user/updateuser.php`         | Atualiza um usuário              |