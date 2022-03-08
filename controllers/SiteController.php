<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Application;

class SiteController extends Controller
{
    
    public function home()
    {
        $params = [
            'name' => "This is test"
        ];
        return $this->render('home', $params);
    }
    public function contact()
    {
        return $this->render('contact');
    }
    
    public function handleContact($request){
       $body = $request->getBody();
    }
}