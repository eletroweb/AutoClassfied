# Instalação e configuração
* ## Requerimentos
     Para realizar a instalação do Único Dono é necessário o Php7.1+ e o MySQL 5.6+
* ## Instalação
     * Instale as dependências através do composer:`composer install` no diretório onde está localizado o único dono.
     * Construa toda a estrutura do banco de dados:`php artisan migrate` no diretório onde está localizado o único dono.
* ## Configuração
     1.  Adicione o seu e-mail (adm) ao array `$adms` no model User (App\User)
     2.  Crie a sua conta
     3.  Acesse a página administrativa através do menu principal.
     4.  No menu administrativo configure as credenciais do PagSeguro na aba correspondente.
     5.  Adicione ou importe Marcas, modelos e versões de veículos para possibilitar o cadastro de anúncios.

***

**Este documento está em construção**

