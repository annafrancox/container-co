
# CONTAINER.CO
## Aplicação da disciplina de Modelagem de Sistemas da UFJF

<!--ts-->
   * [Desenvolvedores](#desenvolvedores)
   * [Professores](#professores)
   * [Tecnologias](#tecnologias)
   * [Instalação](#instalação)
   * [Pré-requisitos para utilização](#pré-requisitos-para-utilização)
   * Utilização
      * [Preparação de ambiente](#preparação-de-ambiente)
      * [Compilação](#compilação)
      * [Chaves de usuário](#chaves-de-usuario)
<!--te-->

### Desenvolvedores:
- Anna Letícia Franco Monteiro - 202065106A 
- Davi Esteves dos Santos - 202065504B
- Gabriel do Carmo Silva - 202065030A
- Pedro Campos Lima - 202065521B

### Professores:
- Fabricio Mendonça

### Tecnologias

As seguintes ferramentas foram as principais usadas na construção do projeto:
- [Laravel](https://laravel.com/)
- [JavaScript](https://www.javascript.com/)
- [HTML/CSS](https://www.khanacademy.org/computing/computer-programming/html-css)
- [MySQL](https://www.mysql.com/)

### Instalação:

- Basta clonar ou fazer download do arquivos do repositório.

Para clonar abra o terminal na pasta desejada e digite o comando:
```
git clone https://github.com/annafrancox/container-co.git
```
### Pré-requisitos para utilização:

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas: [Git](https://git-scm.com), [PHP](https://www.php.net/), [npm](https://www.npmjs.com/) e [Composer](https://getcomposer.org/).
Além disto é interessante uma IDE que suporte a linguagem, como [VSCode](https://code.visualstudio.com/) ou [PhpStorm](https://www.jetbrains.com/pt-br/phpstorm/).

### Utilização:
#### Preparação de ambiente:
- Após clonar o repositório ou descompactar o .zip, um banco de dados deverá ser criado e adicionado ao arquivo .env, este sendo uma cópia do arquivo .env.example onde já existem as linhas indicadas para as credecnciais do banco de dados criado. Após isso o usuário deverá utilizar os comandos abaixo:
```
composer install
```
```
npm install
```
```
php artisan migrate:fresh --seed
```
```
php artisan storage:link
```
```
php artisan key:generate
```
Para compilar e executar o programa, siga as instruções abaixo.

#### Compilação
Ainda no terminal, utilize o comando:
```
php artisan serve
```
Após isso, o programa será exibido no link indicado no terminal.

#### Chaves de usuário
O acesso ao sistema existe em dois níveis diferentes, sendo eles funcionário e gerente. Para finalidade de teste existem dois usuários padrão:
- Funcionário -> login: user@user.com.br; senha: 123456
- Gerente -> login: admin@admin.com.br; senha: 123456
