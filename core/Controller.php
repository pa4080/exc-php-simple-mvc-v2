<?php

/**
 * Class Controller
 * 
 * @author  Spas Z. Spasov <spas.z.spasov@metalevel.tech>
 * @package app\core
 * 
 * PHP MVC Framework, based on https://github.com/thecodeholic/php-mvc-framework
 */

namespace app\core;

class Controller
{
    public function render(string $view, array $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}
