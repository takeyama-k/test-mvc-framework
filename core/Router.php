<?php

namespace app\core;

class Router
{
    protected $routes = [];
    public $request;
    public $responce;
    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function __construct($request, $responce){
        $this->request = $request;
        $this->responce = $responce;
    }

    
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            $this->responce->setStatusCode(404);
            return $this->renderView("_404");
        }

        if(is_string($callback)){
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        echo call_user_func($callback, $this->request);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view,  $params);

        return str_replace('{{content}}',$viewContent,$layoutContent);
    }

    public function renderOnlyView($view, $params){
        ob_start();
        foreach($params as $key => $value){
            $$key = $value;
        }
        require_once Application::$ROOT_DIR."/../views/$view.php";
        return ob_get_clean();
    }

    protected function layoutContent(){
        $layout = Application::$app->controller->getLayout();
        ob_start();
        require_once Application::$ROOT_DIR."/../views/layouts/$layout.php";
        return ob_get_clean();
    }
}