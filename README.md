<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o que se trata o sistema

-Esse App consistem em um sistema simples que tem como intuito  realizar uma requisição via CURL com PHP ao site
Quest MultiMarcas (https://www.questmultimarcas.com.br/estoque) e capturar os dados dos veículos retornados na busca  a partir de um termo de captura.
Os dados capturados são tratados por meio de regex e funcões de manipulação em string. os artigos tratados são inseridos no banco de dados na TABELA DE ARTIGOS.
Após cadastrado é informado ao usuário que tudo foi inserido corretamente no banco e o usuário tem uma opção na barra de menu para listar os artigos ou veículos.

- Tela de Listagem ou exibição de veículos
    -Exibir todos veículos cadastrados com todas as devidas informações listadas em uma tela e uma opção para excluir um veículo do banco.
Tela de detalhes
    - Exibir de forma detalhada e individual um veículo.
- Todas as ações feitas no sistema são através de um usuário logado.


## PASSO A PASSO PARA INSTALAÇÃO E USO SISTEMA


1- Instale o wampserve na versão do seu Sistesma Operacional.

2- clicar na opção baixar diretamente

3- Download ultima versão do WampServer

4- Durante a instalação do wamp selecione a versão mais recente do PHP 7.2.33 e a versão mais recente do mysql 8.0.21.

5- NA instalaçao do wamp ele irá pedir qual browser e qual editor de código você irá utilizar.

6 - va no navegador e coloque localhost/phpmyadmin po padrão o usuario é root e a senha deixa em branco.

7 - criar database com  nome uplexis e collation utf8mb4_general_ci.

8- Ir no site do laravel observar que está versão 8 e realizar download do composer https://getcomposer.org/download/.

9- No momento da instalação do composer selecione a versão do PHP instalada no wamp.

10- Marque a opção ADDPATH.


11- Var no diretorio de instalação do wamp, na pasta www, crie um projetos.

12- entre nessa pasta e abra o powershell.

13- entre na pasta que você acabou de clonar.


14- abra a pasta do projeto no seu editor de preferência.

15- copie todo o conteudo do arquivo .env-example.

16- crie um arquivo.env e cole todo conteúdo.

17- substitua os valores das variaveis 	

Modificar linha
	APP_URL=http://localhost
	Para a url do projeto seguindo do diretório public
	APP_URL=http://localhost/projetos/uplexis/public/

Modificar as linhas abaixo, para o nome de sua base de dados, seu usuário de acesso e sua senha de acesso ao mysql.
	
	DB_DATABASE=uplexis
	DB_USERNAME=root
	DB_PASSWORD=


https://github.com/rcalmeida95/

18- Va no seu powershell e rode o comando composer install

19- rode o comando php artisan key:generate

20- va no seu navegador e coloque localhost/projetos/uplexis-dev/public/

21- rode no powershell php artisan migrate 

22- rode no powershell php artisan migrate:seed

23- faça o download do arquivo cacert.perm no link http://curl.haxx.se/ca/cacert.pem

24- coloque o arquivo no diretorio C:\wamp64\bin\php\versão_php_em_uso

25- remova o ponto e virgula de ";curl.cainfo" = e coloque esse valor após o igual C:\wamp64\bin\php\php7.3.21\cacert.pem



## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

## Como Utilizar o SISTEMA


colocar no navegador a url composta por localhost/uplexis-dev/public.


Dados para o LOGIN:

nome: admin
senha: admin

O login estando correto você será redirecionado para tela de captura onde você ira colocar um termo no campo de texto, por exemplo a marca: "audi". Após inserir clicar em botão capturar e aguardar o sistema verificar a requisição e fazer a inserção dos dados no banco, ao final ele retornará uma mensagem sobre a situação da captura.


Após inserido você terá a opção de ir para tela listar de artigos, tanto pelo botão ao lado do botão de captura, quanto pela barra de  menu na opção Arigos, ao clicar você terá uma lista de tudo que está cadastrado. Nessa tela você poderá filtrar pelo nome do veículo, ver os detalhes e excluir um veículo.


Ao clicar na opção de detalhes você será redirecionado para uma nova tela que mostrará a exibição do produto de forma individual
Ao clicar na opção deletar você removerá do banco o registro em questão.


