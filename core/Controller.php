<?php

namespace app\core;


class Controller
{
    protected $layout = "main";
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function getLayout()
    {
        return $this->layout;
    }
}