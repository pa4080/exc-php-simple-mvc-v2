<?php 

/**
 * Script that will apply the migration files from the migrations/ directory in their order.
 * 
 * @usage   $ php migrations.php
 * 
 * @author  Spas Z. Spasov <spas.z.spasov@metalevel.tech>
 * 
 * PHP MVC Framework, based on https://github.com/thecodeholic/php-mvc-framework
 */

use app\core\Application;

// Get the root path of the application
$rootPath = __DIR__;

// Load the autoloader, provided by Composer
require_once "$rootPath/vendor/autoload.php";

// Load environment variables from .env file,
// and make them available as $_ENV['name'] or $_SERVER['name'],
// where 'name' is the name of the variable.
// https://github.com/vlucas/phpdotenv
$dotenv = Dotenv\Dotenv::createImmutable($rootPath);
$dotenv->load();

// Create a $config array, which will be passed to the Application class.
// The super global $_ENV is generated by the PHP dotenv library, invoked above.
// Right now it contains only the database configuration.
$config = [
    "db" => [
        "dsn" => $_ENV["DB_DSN"],
        "user" => $_ENV["DB_USER"],
        "password" => $_ENV["DB_PASSWORD"],
    ]
];

$app = new Application($rootPath, $config);

$app->db->applyMigrations();