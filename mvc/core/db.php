<?php
    class db{
        public $conn;
        public $host = "localhost"; //địa chỉ mysql server sẽ kết nối đến
        public $dbname="project1"; //tên database sẽ kết nối đến
        public $username = "root"; //username để kết nối đến database 
        public $password = ""; // mật khẩu để kết nối đến database

        function __construct(){
            // kết nối đến database. $conn gọi là đối tượng kết nối. 
            $this->conn = new PDO("mysql:host=$this->host; dbname=$this->dbname; charset=utf8", $this->username, $this->password);   
        }
    }
    define('BASE_URL','https://locahost/project1');
