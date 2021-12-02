<?php
class myaccount extends Controller
{
    public $account;
    public $user;


    function __construct()
    {
        $this->account = $this->model("accountmodels");
        $this->user = $this->model("usermodels");

        if (isset($_SESSION['user_infor']['user_name'])) {
            $user_id = $_SESSION['user_infor']['user_id'];
            $this->id = $this->account->getidmember($user_id);
        } else {
            header("Location:" . BASE_URL);
        }
    }
    function Show()
    {
        $id = $_SESSION['user_infor']['user_id'];
        $this->view(
            "master2",
            [
                "pages" => "myaccount",
                "getmember" => $this->account->getmember($id),
            ]
        );
    }


    function insertwishlist()
    {
        if (isset($_SESSION['user_infor']['user_name'])) {
            if (isset($_POST['action'])) {
                $id_product = $_POST['product_id'];
                $check = $this->account->checkexistwishlist($this->id, $id_product);
                if ($check == 0) {
                    $result = $this->account->insertwishlist($this->id, $id_product);
                    if ($result) {
                        $kq = array(
                            'code' => 'success',
                            'noti' => 'Thêm thành công',
                        );
                        echo json_encode($kq);
                        return;
                    }
                } else {
                    $kq = array(
                        'code' => 'warning',
                        'noti' => 'Sản phẩm này đã được thêm vào yêu thích',
                    );
                    echo json_encode($kq);
                    return;
                }
            }
        }
    }

    function getwishlist()
    {
        $url = BASE_URL;
        $output = "";
        $check = $this->account->getwishlist($this->id);
        if ($check->rowCount() > 0) {
            $fetchwishlist = $check->fetchAll();
            foreach ($fetchwishlist as $item) {
                $output .= '<table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="20%">
                            <img src="' . $url . '/public/assets/images/product/' . $item['image'] . '" alt="">
                        </td>
                        <td width="50%">' . $item['name'] . '</td>
                        <td width="20%">' . number_format($item['price']) . ' VNĐ </td>
                        <td class="pro-remove"><a class="btn_del_wishlist" id="' . $item['prodidwl'] . '">
                        <i class="ion-trash-b"></i>
                        </a></td>
                    </tr>
                </tbody>
            </table>';
            }
        } else {
            $output .= '<p class="noti-wishlist">Chưa có món ăn nào được yêu thích <i class="fal fa-star-shooting"></i></p>';
        }
        echo $output;
    }

    function deletewishlist()
    {
        if (isset($_POST['id_product'])) {
            $id_product = $_POST['id_product'];
            $this->account->deletewishList($this->id, $id_product);
        }
    }


    function updateaccount()
    {
        if (isset($_POST['action'])) {
            $id = $_SESSION['user_infor']['user_id'];
            $fullname = filter_var($_POST['full_name']);
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email = $_POST['email'];
            }
            $address = filter_var($_POST['address']);
            $mobile = filter_var($_POST['mobile']);
            if(strlen($mobile) > 10 || strlen($mobile) < 10) {
                $output = ['type' => 'fail'];
                $output = json_encode($output);
                echo $output;
                return;
            }
            $check = $this->account->checkexistemailaccount($email, $id);
            if ($check->rowCount() > 0) {
                $output = ['type' => 'fail'];
                $output = json_encode($output);
                echo $output;
                return;
            } else {
                $this->account->updatemyaccount($fullname, $mobile, $address, $email, $id);
                $output = ['type' => 'success'];
                $output = json_encode($output);
                echo $output;
                return;
            }
        }
    }


    function checkexistemail()
    {
        if (isset($_POST['action'])) {
            $email = filter_var($_POST['email']);
            $id = $_SESSION['user_infor']['user_id'];
            $check = $this->account->checkexistemailaccount($email, $id);
            if ($check->rowCount() > 0) {
                echo 'Email này đã tồn tại trên hệ thống';
            }
        }
    }

    function changepassword()
    {
        if (isset($_POST['action'])) {
            $id = $_SESSION['user_infor']['user_id'];
            $password = $_POST['password'];
            $newpassword = $_POST['newpassword'];
            $re_newpassword = $_POST['re_newpassword'];
            if (empty($password) || empty($newpassword) || empty($re_newpassword)) {
                echo 'Nhập đầy đủ thông tin';
            } else {
                $user = $this->user->checkpassworduser($id);
                if (password_verify($password, $user['password']) == false) {
                    echo 'Mật khẩu không chính xác';
                } else{
                    if(strlen($newpassword) < 6){
                        echo 'Mật khẩu phải lớn hơn 6 kí tự';
                    }
                    else if ($newpassword === $re_newpassword) {
                        $this->user->changePassword($id, $newpassword);
                        echo 'Thành công';
                    } else {
                        echo 'Mật khẩu xác nhận không khớp';
                    }
                }
            }
        }
    }
}
