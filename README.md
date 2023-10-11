<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## ----- Detalhes de desenvolvimento -----

Para desenvolver este teste realizei diversas tarefas.

1. Meu pc já estava configurado para inicialização de um projeto em Laravel 10 com PHP 8.2 então realizei simples comandos
de criação de projeto como "composer create-project laravel/laravel technical-test-laravel-10";

2. Em seguida criei o projeto no Github com a url https://github.com/andersondesigner3d/technical-test-laravel-10.git

3. Pelo github Desktop clonei o projeto pra meu pc. Esta pasta vem vazia pois o projeto no github tem somente arquivos básicos de configuração.

4. Copiei os arquivos do projeto criado em meu pc para a pasta clone do git hub e pelo github desktop criei a branch 
1-iniciando-projeto-laravel-10-bootstrap dei o primeiro commit e o push pra enviar para o remoto.

5. Git configurado passei pra instalação do bootstrap com os comandos 
    composer require laravel/ui --dev
    php artisan ui bootstrap --auth	
    npm install bootstrap-icons --save-dev        

Alterei a resources\sass\app.scss adicionando @import 'bootstrap-icons/font/bootstrap-icons.css';

6. Pra finalizar o setup
    npm install

7. Perceba que eu poderia simplesmente adicionar o bootstrap via CDN mas preferi instalar pra mostrar que sei também desta forma, usando layouts e as potencialidades que o bootstrap instalado permite usar apesar de não usufruir do login e do
register porque não foi solicitado isso no teste. 

8. Pra rodar o projeto uso os comandos de servidor e compilação de css e scripts
    npm run dev
    php artisan serve

Perceba que o github não permite salvar o .env do laravel então mandei via whatzapp e por email pra entrevistadora (Amanda).

9. Criei o controller UsersController pra receber a rota "/" com o método usersList();

10. Criei uma camada a mais no MVC do Laravel que chamei de UsersService que serve pra conectar com a API deixando o projeto
mais organizado. No método listPaginateUsers() tive que usar Http::withoutVerifying() porque deu erro de conexão com o SSL

11. Percebi que o retorno da API não vem paginado o que atrasou bastante o desenvolvimento deste teste já que o ideal é que
a API traga listas já paginadas pelo Eloquent do Laravel e assim no front fica muito mais dinâmico mostrar a paginação.
Como a API não veio paginada eu tive que criar um algorítimo de paginação manual capturando parâmetros GET na url e dividindo o array de resposta em pedaços. Perceba que o PDF não determinou a forma como deveria ser capturados estes parâmetros então escolhi desta forma mas poderia ser via url no .web tipo 

    Route::get('/{page}', [App\Http\Controllers\UsersController::class, 'usersList'])->name('usersList');

Como o PDF não especificou fiz pelo Request mas em produção perguntaria ao programador sênior o padrão que ele usa pra isto.

12. Como o PDF também não determinou o nome das blades usei a primeira Welcome que vem por padrão porém bebendo do layout da 
app.blade.php

13. O PDF diz pra somente deixar uma tabela dentro de um card paginando os usuários com botões de exclusão e edição mas eu decidi por liberdade adicionar javascript pra controlar modais de edição de exclusão e uma máscara pra o input de idade. Deixei os formulários preparados mas parei ai porque o PDF não pedia mais do que isso.

14. Minhas considerações finais é que o arquivo de Sprint semanal ou de simples lista de funções a serem executadas como este PDF quanto mais detalhado for melhor mas sei que numa eventual contratação a empresa deverá ter um programador sênior que deve repassar todos os padrões de projeto e boas práticas executadas na mesma facilitando o trabalho do júnior.