<?php

namespace app\core;

class Responce{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
    public function redirect($url_path)
    {
        header('Location:'.$url_path);
    }
}