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

        // if(strstr($_GET['url'], 'show')){
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
        $_SESSION['namesite'] = 'Chi tiết sản phẩm';
        // print_r($this->product->getproduct_type_id($id));
        $id = $this->product->getProductId($slug);
        $price = $this->product->getproductdetails($id);
        $price = $price['price'];
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
                "product_related" => $this->product->productrelated($price,$id),

            ]
        );
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
                    <input type="hidden" class="getidmembercmt" value="' . $cmt['idmember'] . '">
                    <input type="hidden" class="getidcmt" value="' . $cmt['idcmt'] . '">
                    <img alt="review images" src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-Clipart.png" width="80px" height="75px">
                </div>
                <div class="review_details">
                    <div class="review_info mb-2">
                        <h5>' . $cmt['fullname'] . ' - <span>' . $cmt['date'] . '</span></h5>
                    </div>
                    <p class="content">' . $cmt['content'] . '</p>';
                if(isset($_SESSION['user_infor']['user_id'])){
                    $output.= '    <input type="hidden" class="sessionidmember" value="' .$_SESSION['user_infor']['user_id'] . '">';
                if($cmt['idmember'] ==  $_SESSION['user_infor']['user_id']){
                $output.= '
                    <a class="user_deletecmt edit-user-comment"><i class="fal fa-trash-alt"></i> xóa</a>
                    <a class="user_updatecmt edit-user-comment"> <i class="far fa-pen"></i> sửa</a><br/>
                </div>
                ';}}
            $output.= '</div>
            <textarea type="text" class="updatecmt update_comment_style" style="display:none;"> </textarea><span class="spanupdatecmt comment-submit btn obrien-button primary-btn" style="display:none;">Cập nhật</span>
            
            </div>
            ';}
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

    function change_price()
    {   
        $size = $_POST['size'];
        $id = $_POST['id'];
        $price = $this->attribute->getsizedetail('price', $size,$id);
        $output = number_format($price);
        echo $output;
    }

    function change_oldprice()
    {
        $size = $_POST['size'];
        $id = $_POST['id'];
        $old_price = $this->attribute->getsizedetail('price', $size,$id);
        $old_price += 12500;
        $output = number_format($old_price);
        echo $output;
    }

    function change_quantitysize()
    {
        $id = $_POST['id'];
        $size = $_POST['size'];
        $hi = $this->attribute->getsizedetail('quantity', $size,$id);
        echo $hi;
    }
}
