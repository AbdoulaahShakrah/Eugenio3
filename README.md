<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://labsi2.ipbeja.pt/eugenio/img/header/EugenioIcon.png" width="150" alt="Laravel Logo"></a></p>


# Versão 3 de Eugénio - Teste de Circuitos

Esta aplicação é desenvolvida com Laravel. Para correr esta aplicação é necessário ter uma base de dados mysql criadas com o nome eugenio3.

Esta aplicação permite criar e gerir sessões, jogadores e configurações. O utilizador pode realizar testes de input de texto para analisar a sua velocidade a escreve documentos com o menor nº de erros possível, o mais rapidamente possível.

1. Criar BD MySQL ou MariaDB (CREATE DATABASE eugenio3)
1. php artisan migrate:fresh --seed
2. php artisan serve

## Histórico de Commits

### 1.  First project commit

Commit inicial, começo da versão 3

### 2. commit test

Correções realizadas a versão anterior

### 3. rebuild model with migration and seeders

Criadas migrações, seeders e models para corresponder a base de dados desenhada nesta nova versão.

### 4. readme file updated with project information

ficheiro readme foi corrigido. Todos os seguintes commits terão informação adicional do desenvolvimento do projeto.

### 5. Refactored routes and added functionalities

Foram configuradas as rotas para os botões da pagina inicial de "Gerir sessões" e "Gerir configurações" foram criados 3 controladores "ConfigurationController", "SessionController" e "PlayerConfiguration" e as vistas que correspondem as tarefas de mostrar os configurações, sessões, jogadores de uma determinada sessão e adicionar sessão e jogador.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
