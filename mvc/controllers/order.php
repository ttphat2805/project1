<?php

use PHPMailer\PHPMailer\POP3;

class order extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user_infor'])) {
            header("Location: " . BASE_URL . '/auth/login');
        } else if(empty($_SESSION['cart_Item'])){
            header("Location: " . BASE_URL . '/products');
        }
        $this->ordermethod = $this->model('ordermethod');
        $this->coupon = $this->model('couponmodels');
        $this->user = $this->model('usermodels');

    }

    public function Show()
    {

        $_SESSION['namesite'] = 'Thanh toán';
        $idmember = $_SESSION['user_infor']['user_id'];

        $method = $this->ordermethod->getOderMethod();
        return   $this->view(
            "master2",
            [
                "pages" => "checkout",
                "method" => $method,
                'infomember' => $this->user->getmemberid($idmember),
            ]
        );
    }

    public function create()
    {
        $_SESSION['namesite'] = 'Đặt hàng thành công';
        $idmember = $_SESSION['user_infor']['user_id'];
        $name = $_POST['fullname'];
        if(isset($_POST['address'])) {
            $address = $_POST['address'];
        } else {
            if(empty($_POST['tinh']) || empty($_POST['quan']) || empty($_POST['phuong'])){
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Bạn phải chọn đầy đủ tỉnh thành";
                header("Location: ".BASE_URL.'/order');
                exit;
            }
            $address = $_POST['tinh'] . ' ' . $_POST['quan'] . ' ' . $_POST['phuong'];
        }
        $method = $_POST['method'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
        $total = $_POST['total'];
        $idcoupon = $_POST['coupon'];
        $data = [
            'memberid' => $idmember,
            'name' => $name,
            'address' => $address,
            'method' => $method,
            'email' => $email,
            'phone' => $phone,
            'note' => $note,
            'total' => $total,
            'cart' => $_SESSION['cart_Item'],
            'coupon' => $idcoupon,
        ];


        if ($this->ordermethod->insertOder($data) === true) {
            foreach ($_SESSION['cart_Item'] as $soluong) {
                $this->coupon->updatequantityproducttype($soluong['quantity'], $soluong['id_product_type']);
            }
            unset($_SESSION['cart_Item']);
            unset($_SESSION['cart_number']);
        } else {
            echo '';
        }
        return   $this->view(
            "master2",
            [
                "pages" => "order-success",
            ]
        );
    }
}
