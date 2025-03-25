# Projeto - Teste Prático Adiplix

## Descrição do Projeto

Este projeto consiste em um sistema de **Cadastro de Pessoas e Tarefas**, desenvolvido utilizando o framework **Laravel** em PHP. O sistema permite gerenciar informações de pessoas e tarefas, estabelecendo um **relacionamento muitos-para-muitos** entre elas, onde cada pessoa pode estar associada a várias tarefas e cada tarefa pode ser atribuída a múltiplas pessoas.

O objetivo principal deste projeto é demonstrar conhecimento em diversos aspectos do desenvolvimento com Laravel, incluindo a criação de modelos, migrations para a estrutura do banco de dados, factories e seeders para popular os dados, o uso do Eloquent ORM para interação com o banco de dados, Requests para validação de dados e a implementação de um **CRUD completo** para as entidades de Pessoas e Tarefas. Além disso, o sistema oferece funcionalidades para **atribuir e remover tarefas de pessoas**, bem como listar as tarefas de uma pessoa e as pessoas atribuídas a uma tarefa.

Este sistema pode ser testado utilizando ferramentas como **Postman** ou **Insomnia**.

## Funcionalidades

O sistema implementa as seguintes funcionalidades:

*   **CRUD para Pessoas:**
    *   **Criar:** Permite cadastrar novas pessoas no sistema, exigindo um **nome (obrigatório)** e um **e-mail (obrigatório e único)**. A rota correspondente é `POST /people`. O corpo da requisição espera um JSON com as chaves `"name"` e `"email"` (exemplo: `{"name": "João da Silva", "email": "joao.silva@example.com"}`) .
    *   **Listar:** Permite visualizar todas as pessoas cadastradas no sistema. A rota correspondente é `GET /people`.
    *   **Visualizar:** Permite visualizar os detalhes de uma pessoa específica, identificada pelo seu ID. A rota correspondente é `GET /people/{person}`.
    *   **Editar:** Permite atualizar as informações de uma pessoa existente, identificada pelo seu ID. A rota correspondente é `PUT/PATCH /people/{person}`. Espera um JSON com os campos a serem atualizados (`"name"` e/ou `"email"`) [nosso histórico de conversas,.
    *   **Excluir:** Permite remover uma pessoa do sistema, identificada pelo seu ID. A rota correspondente é `DELETE /people/{person}`.

*   **CRUD para Tarefas:**
    *   **Criar:** Permite cadastrar novas tarefas no sistema, exigindo um **título (obrigatório)**. A rota correspondente é `POST /tasks`. O corpo da requisição espera um JSON com a chave `"title"` e opcionalmente `"description"` (texto) e `"status"` (booleano, padrão: `false`). Exemplo: `{"title": "Nova Tarefa", "description": "Detalhes da tarefa.", "status": false}`.
    *   **Listar:** Permite visualizar todas as tarefas cadastradas no sistema. A rota correspondente é `GET /tasks`.
    *   **Visualizar:** Permite visualizar os detalhes de uma tarefa específica, identificada pelo seu ID. A rota correspondente é `GET /tasks/{task}`.
    *   **Editar:** Permite atualizar as informações de uma tarefa existente, identificada pelo seu ID. A rota correspondente é `PUT/PATCH /tasks/{task}`. Espera um JSON com os campos a serem atualizados (`"title"`, `"description"` e/ou `"status"`).
    *   **Excluir:** Permite remover uma tarefa do sistema, identificada pelo seu ID. A rota correspondente é `DELETE /tasks/{task}`.

*   **Relacionamento Pessoas ↔ Tarefas:**
    *   **Atribuir Tarefas a uma Pessoa:** Permite associar uma ou mais tarefas a uma pessoa específica, identificada pelo seu ID. A rota correspondente é `POST /people/{person}/tasks`. Espera um JSON com um array de IDs de tarefas existentes na chave `"tasks"` (exemplo: `{"tasks": [5, 9, 12]}`).
    *   **Remover Tarefas de uma Pessoa:** Permite desassociar uma ou mais tarefas de uma pessoa específica, identificada pelo seu ID. A rota correspondente é `DELETE /people/{person}/tasks`. Espera um JSON com um array de IDs de tarefas a serem removidas na chave `"tasks"` (exemplo: `{"tasks": [5, 12]}`).
    *   **Listar Tarefas de uma Pessoa:** Permite visualizar todas as tarefas associadas a uma pessoa específica, identificada pelo seu ID. A rota correspondente é `GET /people/{person}/tasks`.
    *   **Listar Pessoas Atribuídas a uma Tarefa:** Permite visualizar todas as pessoas associadas a uma tarefa específica, identificada pelo seu ID. A rota correspondente é `GET /tasks/{task}/people`.

*   **Factories e Seeders:** O projeto inclui factories para a geração de dados fictícios de pessoas e tarefas, e seeders para popular o banco de dados com **10 pessoas e 30 tarefas**, distribuindo as tarefas aleatoriamente entre as pessoas.

## Tecnologias Utilizadas

*   **PHP:** Linguagem de programação utilizada no backend.
*   **Laravel:** Framework PHP utilizado para o desenvolvimento da aplicação.
*   **Eloquent ORM:** Utilizado para facilitar a interação com o banco de dados. Os modelos `Person` e `Task` definem o relacionamento **BelongsToMany** entre as tabelas `people` e `tasks`.
*   **Migrations:** Utilizadas para definir e gerenciar a estrutura do banco de dados (criação das tabelas `people`, `tasks` e a tabela pivô para o relacionamento muitos-para-muitos).
*   **Factories:** Utilizadas para gerar dados de teste para as entidades `Person` e `Task`.
*   **Seeders:** Utilizados para popular o banco de dados com dados iniciais.
*   **Requests:** Utilizadas para **validação dos dados** das requisições, garantindo que os dados recebidos estejam no formato esperado. São utilizadas as classes `PersonRequest` e `TaskRequest` para definir as regras de validação para as operações de criação e atualização de pessoas e tarefas, respectivamente.
*   **JSON:** Formato utilizado para a troca de dados entre a aplicação (API) e o cliente (ex: Postman, Insomnia). As respostas da API são retornadas no formato JSON.
*   **Composer:** Gerenciador de dependências para PHP e Laravel.
*   **Banco de Dados Relacional:** MySQL.

## Requisitos
- PHP 8.2 ou superior
- Docker
- Composer
- MySQL
- Laravel

## Instalação
Siga os passos abaixo para instalar e configurar a aplicação:

### Passo a passo

Clone Repositório

```sh
git clone https://github.com/CaioFernandes07/teste-pratico-adiplix.git
```

```sh
cd teste-pratico-adiplix
```

Crie o Arquivo .env

```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env

```dosini
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=(Ip da sua máquina)
DB_PORT=3380
DB_DATABASE=db_app
DB_USERNAME=adiplix
DB_PASSWORD=adiplix
```

Inicie a aplicação

```sh
docker-compose up
```

Url base
(http://localhost:8080)
