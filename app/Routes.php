<?php
# imports
require_once(appPath.'ExceptionHandler/CustomException.php');
require_once(appPath.'Controller/ContactController.php');

ini_set("display_errors", "1");
error_reporting(E_ALL);

class Routes
{
    /**
     * Array com roats cadastradas
     **/
    private $mapRoutes = [
        0 => [
            'method' => 'registerContact',
            'class' => ContactController::class
        ],
        1 => [
            'method' => 'listContacts',
            'class' => ContactController::class
        ],
        2 => [
            'method' => 'editContacts',
            'class' => ContactController::class
        ]
    ];

    /**
     * Método que valida se a rota existe.
     * Caso não exita redireciona para mensagem de erro
     **/
    public function validateRoute($route, $request)
    {
        if( !isset( $this->mapRoutes[$route] ) )
            throw new \CustomException("A rota solicitada não existe!", 404);

        $controller = new $this->mapRoutes[$route]['class']();

        if( method_exists($controller, $this->mapRoutes[$route]['method']) )
            return $controller->{$this->mapRoutes[$route]['method']}($request);
        else
            throw new \CustomException("A rota solicitada não existe!", 404);
    }
}