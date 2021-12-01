<?php
class myaccount extends Controller
{
    public $account;

    function __construct()
    {
        $this->account = $this->model("accountmodels");
        if (isset($_SESSION['user_infor']['user_name'])) {
            $user_id = $_SESSION['user_infor']['user_id'];
            $this->id = $this->account->getidmember($user_id);
        } else {
            header("Location:" . BASE_URL);
        }
    }
    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "myaccount",
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
}
