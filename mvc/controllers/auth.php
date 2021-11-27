<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once dirname(dirname(__FILE__)) . '/core/PHPMailer/vendor/autoload.php';
class Auth extends Controller
{

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->User = $this->model('usermodels');
    }

    public function facebooklogin()
    {
        if (isset($_GET['code'])) {
            $secret = "cae98d72b03cd738ceca1dace2ec6d75";
            $client_id = '4520117901402470';
            $redirect_url = BASE_URL . "/auth/facebooklogin";
            $code = $_GET['code'];
            $facebook_access_token_url = "https://graph.facebook.com/v12.0/oauth/access_token?client_id=$client_id&redirect_uri=$redirect_url&client_secret=$secret&code=$code";
            $call = curl_init();
            curl_setopt($call, CURLOPT_URL, $facebook_access_token_url);
            curl_setopt($call, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($call, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($call);
            $response = json_decode($response);
            $response = $response->access_token;
            curl_close($call);

            $url_get_info_user = "https://graph.facebook.com/me?access_token=$response";

            $call = curl_init();
            curl_setopt($call, CURLOPT_URL, $url_get_info_user);
            curl_setopt($call, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($call, CURLOPT_SSL_VERIFYPEER, false);

            $user_info = curl_exec($call);
            curl_close($call);

            // kiểm tra tài khoản facebook này đã tồn tại hay chưa
            $user_info = json_decode($user_info);
            if ($this->User->findFacebookAccount($user_info->id) == 0) {
                $this->User->createFacebookAccount($user_info);
                $user_social_account_info = $this->User->getInforSocailAcccount($user_info->id, 'facebook');
                $_SESSION['user_infor']['user_id'] = $user_social_account_info[0]['id'];
                $_SESSION['user_infor']['user_name'] = $user_social_account_info[0]['fullname'];
                $_SESSION['user_infor']['user_phone'] = $user_social_account_info[0]['mobile'];
                $_SESSION['user_infor']['user_email'] = $user_social_account_info[0]['email'];
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "đăng nhập thành công";
                header("Location: " . BASE_URL);
            } else {
                $user_social_account_info = $this->User->getInforSocailAcccount($user_info->id, 'facebook');
                $_SESSION['user_infor']['user_id'] = $user_social_account_info[0]['id'];
                $_SESSION['user_infor']['user_name'] = $user_social_account_info[0]['fullname'];
                $_SESSION['user_infor']['user_phone'] = $user_social_account_info[0]['mobile'];
                $_SESSION['user_infor']['user_email'] = $user_social_account_info[0]['email'];
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Đăng nhập thành công";
                header("Location: " . BASE_URL);
            }
        }
    }

    private function createClientGoogleObject()
    {
        require_once dirname(dirname(__FILE__)) . '/core/google/vendor/autoload.php';

        $client = new Google_Client();
        $client->setClientId('370384614506-q53opk025rn27pqrqci8q1kajv691985.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri('http://localhost/project1/auth/verifyTokenGG');
        $client->setAccessType('offline');
        $client->addScope('profile');
        $client->addScope('email');

        return $client;
    }

    public function verifyTokenGG()
    {
        $client = $this->createClientGoogleObject();
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            try {
                $google_account_info = $client->verifyIdToken($token['id_token']);

                if ($this->User->findGoogleAccount($google_account_info['sub']) == 0) {
                    $this->User->createGoogleAccount($google_account_info);
                    $user_social_account_info = $this->User->getInforSocailAcccount($google_account_info['sub'], 'google');
                    $_SESSION['user_infor']['user_id'] = $user_social_account_info[0]['id'];
                    $_SESSION['user_infor']['user_name'] = $user_social_account_info[0]['fullname'];
                    $_SESSION['user_infor']['user_phone'] = $user_social_account_info[0]['mobile'];
                    $_SESSION['user_infor']['user_email'] = $user_social_account_info[0]['email'];
                    $_SESSION['toastr-code'] = "success";
                    $_SESSION['toastr-noti'] = "đăng nhập thành công";
                    header("Location: " . BASE_URL);
                    exit();
                } else {
                    $user_social_account_info = $this->User->getInforSocailAcccount($google_account_info['sub'], 'google');
                    $_SESSION['user_infor']['user_id'] = $user_social_account_info[0]['id'];
                    $_SESSION['user_infor']['user_name'] = $user_social_account_info[0]['fullname'];
                    $_SESSION['user_infor']['user_phone'] = $user_social_account_info[0]['mobile'];
                    $_SESSION['user_infor']['user_email'] = $user_social_account_info[0]['email'];
                    $_SESSION['toastr-code'] = "success";
                    $_SESSION['toastr-noti'] = "Đăng nhập thành công";
                    header("Location: " . BASE_URL);
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    public function loginGoogle()
    {
    }

    public function login()
    {
        $_SESSION['namesite'] = "Đăng nhập";
        // $google_client = $this->createClientGoogleObject();
        // $google_login_url = $google_client->createAuthUrl();
        $data = [
            "username" => '',
            "pass" => '',
            "username_error" => '',
            "pass_error" => '',
            // 'google_login_url' => $google_login_url
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // check user name
            if ($_POST['email'] != null) {
                if ($this->User->findUserByEmail($_POST['email']) == 0) {
                    $data['username_error'] = "Tài khoản không tồi tại";

                    return $this->view('master2', ['pages' => 'signin', 'data' => $data]);
                }
            } else {
                $data['username_error'] = 'Bạn phải nhập tên đăng nhập';
            }

            // check password
            if ($_POST['pass'] != null) {
                $data['username'] = $_POST['email'];
                $data['pass'] = $_POST['pass'];
                $user = $this->User->findUserAccount($data);

                //user password_verify to verify password
                if (password_verify($_POST['pass'], $user[0]['password']) == true) {
                    $user_infor = $this->User->getMemberInforById($user[0]['memberid']);

                    $_SESSION['user_infor']['user_id'] = $user_infor[0]['id'];
                    $_SESSION['user_infor']['user_name'] = $user_infor[0]['fullname'];
                    $_SESSION['user_infor']['user_phone'] = $user_infor[0]['mobile'];
                    $_SESSION['user_infor']['user_email'] = $user_infor[0]['email'];
                    header("Location: " . BASE_URL);
                    
                } else {
                    $data['pass_error'] = "Sai mật khẩu";
                }
            } else {
                $data['pass_error'] = 'Bạn chưa nhập mật khẩu';
            }
            if($data['pass_error'] == '' && $data['username_error'] == ''){
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Đăng nhập thành công";
                header('Location: ' . BASE_URL);
                exit();
            }
    
        }
        return $this->view('master2', ['pages' => 'signin', 'data' => $data]);
    }

    public function logout()
    {
       unset($_SESSION['user_infor']);
       $_SESSION['toastr-code'] = "success";
       $_SESSION['toastr-noti'] = "Đã đăng xuất";
       header('Location: ' . BASE_URL);
        exit();
    }

    public function register()
    {
        $_SESSION['namesite'] = "Đăng ký";

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = trim($_POST['firstname']);
            $last_name = trim($_POST['lastname']);
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $re_pass = $_POST['repass'];
            $data['first_name'] = $first_name;
            $data['last_name'] = $last_name;
            $data['email'] = $email;
            $data['password'] = $pass;
            if ($first_name == '') {
                $data['first_name_error'] = "Vui lòng nhập họ..";
            }
            if ($last_name == '') {
                $data['last_name_error'] = "Vui lòng nhập tên..";
            }
            if (empty($email)) {
                $data['email_error'] = "Email không được bỏ trống";
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $data['email_error'] = 'Email không đúng định dạng';
                } else {
                    if ($this->User->findUserByEmail($email) >= 1) {
                        $data['email_error'] = 'Tên đăng nhập đã tồn tại';
                    }
                }
            }

            if (empty($pass)) {
                $data['pass_error'] = "Vui lòng nhập mật khẩu";
            } else {
                if (strlen($pass) >= 6) {
                    if ($pass != $re_pass) {
                        $data['repass_error'] = "Mật khẩu xác nhận không đúng";
                    }
                } else {
                    $data['pass_error'] = "Mật khẩu phải lớn hơn 6 chữ số";
                }
            }

            if (
                empty($data['first_name_error']) && empty($data['last_name_error'])
                && empty($data['email_error']) && empty($data['pass_error']) && empty($data['repass_error'])
            ) {
                $this->User->registerUserAccount($data);
            }
        }

        return $this->view('master2', [
            'pages' => 'signup',
            'data' => $data
        ]);
    }

    public function forgetpass()
    {
        $data = [
            'email_error' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            if ($this->User->findUserByEmail($email) == 0) {
                $data['email_error'] = 'Tên đăng nhập không tồn tại';
            } else {
                $new_pass = random_int(100000, 999999);
                $new_pass = base64_encode($new_pass);
                //$this->User->updatePassword($email,$new_pass);

                $mail = new PHPMailer(true);
                try {
                    //Server settings                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'nghindps16371@fpt.edu.vn';                     //SMTP username
                    $mail->Password   = 'nguyenduynghi';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('nghindps16371@fpt.edu.vn', 'Nghi');
                    $mail->addAddress($email, 'Joe User');     //Add a recipient
                    //Name is optional
                    $mail->addReplyTo('info@example.com', 'Information');
                    $mail->addCC('cc@example.com');
                    $mail->addBCC('bcc@example.com');



                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Hello here is your new password';
                    $mail->Body    = 'đây là mật khẩu mới của bạn <b>' . $new_pass . '</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    $this->User->changePassword($email, $new_pass);
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
        return $this->view('master2', [
            'pages' => 'forgetpass',
            'data' => $data
        ]);
    }

    public function changePassword()
    {
        $data = [
            'username_error' => '',
            'pass_error' => '',
            'newpass_error' => '',
            'confirmpass_error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $new_pass = $_POST['newpass'];
            $confirm_new_pass = $_POST['confirm_pass'];

            $data['username'] = $email;

            if (empty($email) || empty($pass) || empty($new_pass) || empty($confirm_new_pass)) {
                $data['username_error'] = 'bạn phải nhập đầy đủ thông tin';
            } else {
                if ($this->User->findUserByEmail($data['username']) == 0) {
                    $data['username_error'] = 'tên đăng nhập không tồn tại';
                } else {
                    // lấy thông tin mật khẩu cảu user
                    $user = $this->User->findUserAccount($data);
                    if (password_verify($pass, $user[0]['password']) == false) {
                        $data['pass_error'] = "mật khẩu không chính xác";
                    } else {
                        if ($new_pass == $confirm_new_pass) {
                            $this->User->changePassword($email, $new_pass);
                            $_SESSION['toastr-code'] = "success";
                            $_SESSION['toastr-noti'] = "Thêm thành công";
                        } else {
                            $data['confirmpass_error'] = "mật khẩu không khớp";
                        }
                    }
                }
            }
        }
        // return $this->view('master2', [
        //     'pages' => 'myaccount',
        //     'data' => $data
        // ]);
    }


}
