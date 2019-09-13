# Pluri-Back-end
Avaliação técnica desenvolvedor PHP


### Pré-configurações
Para este projeto foi utilizado o banco de dados Postgrees. É necessario criar um banco de dados chamado de DBPluri


## Instalação


Ao clonar o repositorio é necessario rodar o comando:

```
composer install 
```

Quando todas as dependencias forem instaladas  necessario configurar o arquivo .env

Uma das modificações a serem realizadas é quanto a variavel API_DOMAIN, está precisa conter o sufixo 'api.' seguido do endereço de instalação utilizado para esta pasta do laravel. No meu caso era o localhost.

Outra modificação necessaria é quanto as configurações de banco de dados. Geralmente as configurações são parecidas, mas caso tenha modificado algo na instalação do postgrees, é necessario modificar as variáveis a seguir.


```
.env
...

DB_CONNECTION=pgsql  <- O banco escolhido.
DB_HOST=127.0.0.1    <- Endereço do banco.
DB_PORT=5432         <- Porta referente ao banco.
DB_DATABASE=DBPluri  <- Nome do banco de dados.
DB_USERNAME=postgres <- Usuário escolhido para acessar o banco.
DB_PASSWORD=123456   <- Senha escolhida de acesso ao banco.
```

## Gerar tabelas do banco de dados

As tabelas do banco de dados são criadas utilizando migrations. Para criar basta o inserir o comando na raíz do projeto:

```
php artisan migrate
```

Caso necessário, é possível popular o banco de dados utilizando o seeder.
```
php artisan db:seed
```

## Usando a API

### CRUD Usuário 
substituir localhost pelo endereço configurado para a variável API_DOMAIN

```
GET  - http://api.localhost/aluno           -> Retorna todos os alunos
GET  - http://api.localhost/aluno/{id_aluno) -> Retorna o aluno com id informado

POST - http://api.localhost/aluno           -> Cria um novo aluno, necessario enviar um json no formato ex:
{'nome':'pedro','email': 'psco@gmail.com', 'sexo': 'masculino', 'dataNascimento':'24/01/1995'}

PUT - http://api.localhost/aluno/{id_aluno}  -> Modifica um aluno já criado através do id do aluno. As informações a serem enviadas necessitam estar em um json, ex: {'nome':'soares','email': 'psco5@gmail.com'}

DELETE -  http://api.localhost/aluno/{id_aluno} -> deleta um aluno com id especificado 
 
```



