# Documentação do Sistema de Gerenciamento de Tarefas


## Visão Geral:

```
Este sisetma foi desenvolvida em Laravel 12 e Bootstrap. Os dados são armazenados em um banco de dados Postgres SQL.
```

## Requisitos

- **PHP 8.4+ ou superior**
- **Servidor Web (Apache)**
- **Banco de Dados Postgres SQL 17**
- **Composer** (para gerenciamento de dependências)

## Instalação

1. **Clone o Repositório:**
   
```  
   bash
   git clone https://seu_repositorio.git
   cd seu_repositorio
```

2. **Baixar as dependências do projeto**
   
```   
composer install
```
2.1 **Rodar**   

```
 php artisan serve
```


3. **Rodar:**


```
php artisan migrate 
```

4. **Configuração da Conexão com o Banco de Dados:**

```
No arquivo env.php insira as credenciais do seu banco de dados:
```
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=
DB_USERNAME=postgres
DB_PASSWORD=
```
## Uso

5. **Faça o registro de usuário para logar e criar/editar e deletar posts:**

```
http://127.0.0.1:8000/
```

