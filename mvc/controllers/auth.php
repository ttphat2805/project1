<?php 

class Auth extends Controller{
    
    public function login(){
        
        return $this->view('master2',['pages'=>'signin']);
    }

    public function logout() {
        echo "a";
    }

    public function register() {
        $data = [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            're_password' => '',
            'first_name_error' => '',
            'last_name_error' => '',
            'email_error' => '',
            'pass_error' => '',
            'repass_error' => ''             
        ];
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $re_pass = $_POST['repass'];
            
            if($first_name == ''){
                $data['first_name_error'] = "Bạn phải nhập đầy đủ họ";
            }
            if($last_name == ''){
                $data['last_name_error'] = "bạn phải nhập tên";
            }
            if(empty($email)){
                $data['email_error'] = "Bạn phải nhập email";
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $data['email_error'] = 'email sai định dạng';
                }
            }

            if(empty($pass)){
                $data['pass_error'] = "Bạn phải nhập mật khẩu";
            } else {
                if(strlen($pass) >= 6){
                    if($pass != $re_pass) {
                        $data['repass_error'] = "Mật khẩu không trùng khớp";
                    }
                } else {
                    $data['pass_error'] = "Mật khẩu phải lớn hơn 6 chữ số";
                }
            }

            if(
                empty($data['first_name_error']) && empty($data['last_name_error'])
                && empty($data['email_error']) && empty($data['pass_error']) && empty($data['repass_error'])
                ){
                    
                }
            
        }

        return $this->view('master2', [
                                        'pages' => 'signup',
                                        'data' => $data
                                     ]);
    }

}