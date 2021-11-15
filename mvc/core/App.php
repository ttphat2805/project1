<?php
    class App{
        
        protected $controller="home";
        protected $action="Show";
        protected $params=[];

        function __construct(){
            $arr = $this->UrlProcess();
            
            // Xử lí Controller
            if(file_exists("./mvc/controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;
            
            // Xư lí action
            if(isset($arr[1])){
                if(method_exists($this->controller, $arr[1])){
                    $this->action= $arr[1];
                }
                unset($arr[1]);
            }
            // xu li params
            $this->params = $arr?array_values($arr):[];

            call_user_func_array([$this->controller, $this->action], $this->params);
            // echo $this->controller ."<br/>";
            // echo $this->action ."<br/>";
            // print_r($this->params);
        }

        function UrlProcess(){
            if(isset($_GET["url"])){
                return explode("/",filter_var(trim($_GET["url"],'/')));
                // $u=$_GET["url"];
            }
        }
    }
?>