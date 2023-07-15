# Projeto BMA CRUD

Este é um projeto de CRUD (Create, Read, Update, Delete) desenvolvido em Laravel. Ele permite gerenciar membros de uma organização, realizando operações como adicionar, editar, visualizar e excluir membros.

## Funcionalidades

O projeto possui as seguintes funcionalidades:

- Adicionar um novo membro com nome, sobrenome e e-mail.
- Visualizar a lista de todos os membros cadastrados.
- Editar as informações de um membro existente.
- Excluir um membro da lista.

## Requisitos

Antes de executar o projeto, verifique se o seu ambiente atende aos seguintes requisitos:

- PHP 7.4 ou superior
- Composer
- Laravel Framework

## Configuração

Siga as etapas abaixo para configurar e executar o projeto:

1. Faça o clone deste repositório para o seu ambiente local.

```bash
git clone https://github.com/seu-usuario/bma_CRUD.git
```

2. Navegue para o diretório do projeto:

```bash
cd bma_CRUD
```

3. Instale as dependências:

```bash
composer install
```

4. Copie o arquivo `.env.example` para `.env`:


5. Configure o arquivo `.env` com as informações do banco de dados.

6. Execute as migrações do banco de dados:

```bash
php artisan migrate
```

7. Inicie o servidor de desenvolvimento:
   
```bash
php artisan serve
```

8. Acesse o aplicativo no seu navegador em `http://localhost:8000`.

## Uso

Você pode usar o BMA CRUD para:

- Adicionar novos membros à equipe
- Exibir a lista de membros
- Atualizar informações de um membro
- Excluir um membro

## Objetivo

Projeto desenvolvido como parte do processo seletivo da [BMA SOLUÇÕES DIGITAIS](https://bmasolucoesdigitais.com.br)


## Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).










