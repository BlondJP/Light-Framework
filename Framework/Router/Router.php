<?php

namespace Framework\Router;

class Router
{
    const CONTROLLER = 0;
    const ACTION = 0;

    /**
     * 'route' => 'controller/action'
     *
     * @var array $routes
     */
    private $routes;

    /**
     * Variable représentant la route passée en paramètre
     *
     * @var string $currentRoute
     */
    private $currentRoute;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Retourne l'action associé à la route passée en paramètre
     *
     * @return string
     * @throws \Exception
     */
    public function getAction() : \Action
    {
        $this->currentRoute = $this->getRoute();

        if ($this->isRouteValid() === false) {
            throw new \Exception('Cette ressource n\'existe pas.', 404 );
        }

        $segmentAction = $this->routes[$this->currentRoute];
        $action = $this->createActionFromSegment($segmentAction);

        return $action;
    }

    /**
     * @param string $segment
     * @return \Action
     */
    public function createActionFromSegment(string $segment) : \Action
    {
        $action = new \Action();

        $segments = explode('/', $segment);
        $action->action = $segments[self::ACTION] . 'Action';
        $action->controller = $segments[self::CONTROLLER] . 'Controller';

        return $action;
    }

    /**
     * Extraite la route passée en paramètre et la retourne
     *
     * @return string
     */
    private function getRoute() : string
    {
        $route = $_SERVER['REQUEST_URI'];
        return $route;
    }

    /**
     * Si cette route est rattachée à une action par l'utilisateur,
     * Cette méthode renvoie true
     *
     * @return bool
     * @throws \Exception
     */
    private function isRouteValid() : bool
    {
        if (is_string($this->currentRoute) === false) {
            throw new \Exception('Mauvais usage du router.', 500 );
        }

        return array_key_exists($this->currentRoute, $this->routes);
    }

    /**
     * Vérifie la syntaxe des routes existantes
     *
     * @throws \Exception
     */
    private function handleParsingRoutesErrors()
    {
        if (is_array($this->routes) === false) {
            throw new \Exception('Mauvaise syntaxe des routes', 500 );
        }

        foreach ($this->routes as $route => $action) {
            if (is_string($route) === false || is_string($action) === false) {
                throw new \Exception('Les routes et les actions doivent être des chaines de caracteres', 500 );
            }
        }
    }
}