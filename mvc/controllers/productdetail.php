<?php
class productdetail extends Controller
{
    public $product;
    public $attribute;
    public $user;

    function __construct()
    {

        $url = explode("/", filter_var(trim($_GET["url"], "/")));
        if (count($url) > 3) {
            header("location:" . BASE_URL . "/error404");
            exit();
        }

        // if(strstr($_GET['url'], '')){
        //     if (!isset($url[2])) {
        //         header("Location:".BASE_URL."pagenotfound");
        //         exit();
        //     }
        // }
        $this->product = $this->model("productmodels");
        $this->attribute = $this->model("attributemodels");
        $this->user = $this->model("usermodels");
    }


    function show($slug)
    {
        $_SESSION['namesite'] = 'Chi tiết món ăn';
        // print_r($this->product->getproduct_type_id($id));

        {
            $id = $this->product->getProductId($slug);



            $this->view(
                "master2",
                [
                    "pages" => "product_details",
                    "detailviews" => $this->product->updateviews($id),
                    "productdetails" => $this->product->getproductdetails($id),
                    "productdetailall" => $this->product->getproductdetailall($id),
                    "gallery" => $this->product->get_gallery_image($id),
                    "productdetailattr" => $this->attribute->getproduct_detail_attr($id),
                    "product_type" => $this->product->getproduct_type_id($id),
                ]
            );
        }
    }
    function showcmt($id)
    {
        $check = $this->user->showComment($id);
        $output = '';
        if ($check->rowCount() > 0) {
            $comments = $check->fetchAll();
            foreach ($comments as $cmt) {
                $output .= '<div class="pro_review mb-5">
                <div class="review_thumb">
                    <input type="hidden" class="getidcmt" value="' . $cmt['idcmt'] . '">
                    <img alt="review images" src="/public/assets/images/logo/user.png">
                </div>
                <div class="review_details">
                    <div class="review_info mb-2">
                        <h5>' . $cmt['fullname'] . ' - <span>' . $cmt['date'] . '</span></h5>
                    </div>
                    <p class="content">' . $cmt['content'] . '</p>
                    <a class="user_deletecmt"> Xoas</a>
                    <a class="user_updatecmt"> sửa</a><br/>
                </div>
                
            </div>
            <input type="text" class="updatecmt" style="display:none;"> <span class="spanupdatecmt" style="display:none;">Cập nhật</span>
            ';
            }
        } else {
            $output .= " <p class='noti-cmt'>Sản phẩm này chưa có bình luận nào...</p>";
        }
        echo $output;
    }

    function insertcmt()
    {
        if (isset($_POST['action'])) {
            if (isset($_SESSION['user_infor'])) {
                $memberid = $_SESSION['user_infor']['user_id'];
                $idproduct = $_POST['idproduct'];
                $content = $_POST['content'];
                $this->user->insertComment($memberid, $idproduct, $content);
                echo 'ok';
            } else {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Bạn phải đăng nhập để bình luận";
                echo 'sai';
            }
        }
    }

    function userdeletecmt()
    {
        if (isset($_POST['action'])) {
            if (isset($_SESSION['user_infor'])) {
                $id = $_POST['id_cmt'];
                $memberid = $_SESSION['user_infor']['user_id'];
                echo 'id: ' . $id . 'memberid' . $memberid;
                $this->user->userdeletecmt($memberid, $id);
            } else {
                echo 'Vui lòng đăng nhập';
            }
        }
    }

    function userupdatecmt()
    {
        if (isset($_POST['action'])) {
            if (isset($_SESSION['user_infor'])) {
                $id = $_POST['id_cmt'];
                $content = $_POST['content'];
                $memberid = $_SESSION['user_infor']['user_id'];
                $this->user->userupdatecmt($memberid, $id, $content);
            } else {
                echo 'Vui lòng đăng nhập';
            }
        }
    }

    function change_price($size)
    {
        $size = $this->attribute->getsizedetail('price', $size);
        $output = number_format($size);
        echo $output;
    }

    function change_oldprice($size)
    {
        $hi = $this->attribute->getsizedetail('price', $size);
        $hi += 12500;
        $output = number_format($hi);
        echo $output;
    }

    function change_quantitysize($size)
    {
        $hi = $this->attribute->getsizedetail('quantity', $size);
        echo $hi;
    }
}
