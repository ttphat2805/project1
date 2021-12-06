<?php

use PHPMailer\PHPMailer\POP3;

class order extends Controller {

    public function __construct()
    {
        if(!isset($_SESSION['user_infor'])){
            header("Location: ".BASE_URL.'/auth/login');
        }

        $this->ordermethod = $this->model('ordermethod');
    }

    public function Show () {

        $_SESSION['namesite'] = 'Đặt hàng';

        $method = $this->ordermethod->getOderMethod();
        return   $this->view(
            "master2",
            [
                "pages" => "checkout",
                "method" => $method
            ]
        );
    }

    public function create() {
        $name = $_POST['ho'].' '.$_POST['ten'];
        $address = $_POST['tinh'].' '.$_POST['quan'].' '.$_POST['phuong'];
        $method = $_POST['method'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
        $total = $_POST['total'];
        
        $data = [
            'memberid' => $_SESSION['user_infor']['user_id'],
            'name' => $name,
            'address' => $address,
            'method' => $method,
            'email' => $email,
            'phone' => $phone,
            'note' =>$note,
            'total' => $total,
            'cart' => $_SESSION['cart_Item'],
            'coupon' => $_POST['coupon']
        ];
        $this->ordermethod->insertOder($data);
    }
}