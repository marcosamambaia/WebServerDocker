# 📄 WebServerDocker — Sistema de Currículos com PHP, MySQL e Docker

Este projeto é um sistema simples e funcional para cadastro, listagem e exclusão de currículos. Ele utiliza PHP com Apache, banco de dados MySQL e é totalmente containerizado com Docker.

## 🚀 Tecnologias utilizadas

- PHP 8.2 + Apache
- MySQL 8
- Docker + Docker Compose
- Bootstrap 5
- VS Code no Debian 13

## 📦 Estrutura do projeto

WebServerDocker/
├── docker-compose.yml
├── Dockerfile
├── db/
│   └── init.sql
└── www/
    ├── index.php
    ├── cadastro.php
    ├── listar.php
    ├── excluir.php
    ├── test-db.php
    └── phpinfo.php

## 🛠️ Como executar

1. Clone o repositório:
   git clone https://github.com/marcosamambaia/WebServerDocker.git
   cd WebServerDocker

2. Inicie os containers:
   docker-compose up -d

3. Acesse no navegador:
   http://localhost:8080

## 🧪 Funcionalidades

- Cadastro e listagem de currículos
- Exclusão de registros
- Teste de conexão com o banco
- Visualização de configurações do PHP

## 🗄️ Banco de dados

O banco é criado automaticamente via `init.sql`:

CREATE TABLE IF NOT EXISTS curriculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    mensagem TEXT
);

## 📄 Licença

Este projeto é livre para uso, modificação e aprendizado.
