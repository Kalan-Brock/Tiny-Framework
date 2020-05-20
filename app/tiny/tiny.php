<?php

namespace DxMonkey;

use Jenssegers\Blade\Blade;

class Tiny
{
    private $method;
    private $path;
    private $blade;

    function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        if(isset($_GET['path'])) {

            $this->path = $_GET['path'];

        } 
        else {

            $this->path = 'home';

        }

        $this->blade = new Blade('views', 'cache');
        $this->serve();
    }

    private function serve()
    {
        if($this->method == 'GET') 
        {
            if(file_exists('./views/pages/'.$this->path.'.blade.php')) {

                $data = [
                    'path' => $this->path
                ];

                echo $this->blade->render('pages.'.$this->path, $data);
            }
            else{

                http_response_code(404);
                echo $this->blade->render('pages.notfound');

            }
        }
        else if($this->method == 'POST')
        {
            switch($this->path)
            {
                case 'contact': 
                {

                    break;
                }
                default: {

                    http_response_code(405);
                    break;
                }
            }
        }

        exit();
    }
}
