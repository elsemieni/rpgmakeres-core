## Requirements 

You will need:

- A web server
- PHP 7.x connected to your webserver and in CLI
- Composer (https://getcomposer.org)

##### And eventually ... (optional)

- A database, SQL compatible, capable of connecting with PHP via PDO interface.

### Setup

- Put all files in your PHP-enabled server, and point your web server to public folder.
- Make a copy of config-example.php , rename it config.php and tweak it as you want.
- Run composer install for the dependencies
- Run php cron.php -u for generate all webpages. 
- (Optional) Setup a cron that runs php cron.php -u in a certain amount of time to keep pages updated.