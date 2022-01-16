<?php
    class App{
        protected $controller = 'home'; // file
        protected $method = 'index'; // function
        protected $params = [];

        public function __construct(){
            $url = $this->parseURL();

            // Controller
            if(file_exists('../app/controllers/'.$url[0].'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            // Method
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // Params
            if(!empty($url)){
                $this->params = array_values($url);
                var_dump($url);
            }

            // Jalankan controller & method, serta kirimkan params jika ada
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseURL(){            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/'); // rtrim() digunakan untuk menghilangkan tanda '/' di akhir url
                $url = filter_var($url, FILTER_SANITIZE_URL); // digunakan untuk mencegah request yang berbaya
                $url = explode('/',$url);// digunkan untuk mengubah url menjadi string
                return $url;
            }
        }
    }