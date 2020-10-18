<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o que se trata o sistema

<p style="text-align=justify">Esse App consiste em um sistema simples que tem como intuito  realizar uma requisição via CURL com PHP ao site
Quest MultiMarcas (https://www.questmultimarcas.com.br/estoque) e capturar os dados dos veículos retornados na busca  a partir de um termo de captura.
Os dados capturados são tratados por meio de regex e funcões de manipulação em string. os artigos tratados são inseridos no banco de dados na TABELA DE ARTIGOS.
Após cadastrado é informado ao usuário que tudo foi inserido corretamente no banco e o usuário tem uma opção na barra de menu para listar os artigos ou veículos.</p>

- Tela de Listagem ou exibição de veículos.
- Exibir todos veículos cadastrados com todas as devidas informações listadas em uma tela e uma opção para excluir um veículo do banco.

- Exibir de forma detalhada e individual um veículo.
- Todas as ações feitas no sistema são através de um usuário logado.


## PASSO A PASSO PARA INSTALAÇÃO E USO SISTEMA


1- Instale o wampserve na versão do seu Sistesma Operacional.

2- Clicar na opção baixar diretamente

3- Download ultima versão do WampServer

4- Durante a instalação do wamp selecione a versão mais recente do PHP 7.2.33 e a versão mais recente do mysql 8.0.21.

5- Na instalaçao do wamp ele irá pedir qual browser e qual editor de código você irá utilizar.

6 - Criar no navegador e coloque localhost/phpmyadmin po padrão o usuario é root e a senha deixa em branco.

7 - Criar database com  nome uplexis e collation utf8mb4_general_ci.

8- Ir no site do laravel observar que está versão 8 e realizar download do composer https://getcomposer.org/download/.

9- No momento da instalação do composer selecione a versão do PHP instalada no wamp.

10- Marque a opção ADDPATH.


11- Criar no diretorio de instalação do wamp, na pasta www, crie pasta com o nome  projetos.

12- Entre nessa pasta projetos que você acabou de criar  e abra o powershell.

13- Execute o comando  <b>"git clone https://github.com/rcalmeida95/uplexis-dev.git "</b> para  clonar.

14- Abra a pasta do projeto no seu editor de preferência.

15- Localize  arquivo <b>".env-example"</b> e copie todo o seu conteúdo.

16- Crie um novo arquivo <b>.env</b> e cole todo conteúdo do arquivo anterior.

17- Substitua os valores das variaveis de acordo com as linha abaixo:

Modificar linha

	APP_URL=http://localhost
	Para a url do projeto seguindo do diretório public
	APP_URL=http://localhost/projetos/uplexis/public/

Modificar as linhas abaixo, para o nome de sua base de dados, seu usuário de acesso e sua senha de acesso ao mysql.
	
	DB_DATABASE=uplexis
	DB_USERNAME=root
	DB_PASSWORD=




18- Volte ao  seu powershell e execute o comando <b>'composer install"</b>

19- Logo após execute o comando <b>"php artisan key:generate"</b>

20- Abra o seu navegador e coloque a seguinte url: <b>"http://localhost/projetos/uplexis-dev/public/"</b>

21- Volte ao powershell e execute o comando <b>"php artisan migrate"</b>

22- Execute no powershell o comando <b>"php artisan migrate:seed"</b>

23- Faça o download do arquivo <b>"cacert.perm"</b> no link: http://curl.haxx.se/ca/cacert.pem

24- Coloque o arquivo no diretorio <b>"C:\wamp64\bin\php\versão_php_em_uso"</b> se atente a colocar na pasta da versão do PHP que você está utilizando.

25- Abra o arquivo php.ini pelo wamp da versão que você está utilizando e  remova o ponto e virgula de ";curl.cainfo="  e coloque o conteúdo abaixo após o  caracter de igual 

    C:\wamp64\bin\php\php7.3.21\cacert.pem

26 - Após realizado todos os passo o sistema já estará pronto para uso.

## Como Utilizar o SISTEMA


Colocar no navegador a url composta por localhost/uplexis-dev/public.


    Dados para o LOGIN:

    nome: admin
    senha: admin

O login estando correto você será redirecionado para tela de captura onde você ira colocar um termo no campo de texto, por exemplo a marca: "audi". Após inserir clicar em botão capturar e aguardar o sistema verificar a requisição e fazer a inserção dos dados no banco, ao final ele retornará uma mensagem sobre a situação da captura.


Após inserido você terá a opção de ir para tela listar de artigos, tanto pelo botão ao lado do botão de captura, quanto pela barra de  menu na opção, "Artigos", ao clicar você terá uma lista de tudo que está cadastrado. Nessa tela você poderá filtrar pelo nome do veículo, ver os detalhes e excluir um veículo.


Ao clicar na opção de detalhes você será redirecionado para uma nova tela que mostrará a exibição do produto de forma individual.
Ao clicar na opção deletar você removerá do banco o registro em questão.


