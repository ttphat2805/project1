<?php
    class app {
        protected $controller = "home";
        protected $action = "Show";
        protected $params = [];

        function __construct() {
            $arr = $this -> UrlProcess();
            if (empty($arr[0])) {
                $arr[0] = $this -> controller;
            }
            // Handle Controller
            if (file_exists("./mvc/controllers/".$arr[0].".php")) {
                $this -> controller = $arr[0];
                unset($arr[0]);
            } else {
                header("location:".BASE_URL."/error404");
                exit();
            }

            require_once "./mvc/controllers/".$this->controller.".php";
            $this -> controller = new $this -> controller;

            // Handle Action
            if (isset($arr[1])) {
                if (method_exists($this -> controller, $arr[1])) {
                    $this->action = $arr[1];
                } else {
                    header("location:".BASE_URL."/error404");
                    exit();
                }
                unset($arr[1]);
            }

            // Handle Params
            $this -> params = $arr ? array_values($arr) : [];
            call_user_func_array([$this -> controller, $this -> action], $this -> params);
        }

        function UrlProcess() {
            if(isset($_GET["url"])) {
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>