<?php
class productdetail extends Controller
{
    public $product;
    public $attribute;
    public $user;

    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->attribute = $this->model("attributemodels");
        $this->user = $this->model("usermodels");


    }


    function show($id)
    {
        // print_r($this->product->getproduct_type_id($id));
        $_SESSION['nameSite'] = "Chi tiết";

        if(isset($_POST['btn__submit'])){
            $content = $_POST['content'];
            if(isset($_SESSION['member'])):
            $username = $_SESSION['member'];
            $productid = $id;
            // print_r($this->user->getComment($id));
            // exit();
            $memberid = $this->user->idComment($username)['id'];
            $this->user->insertComment($memberid,$productid,$content);
            ?>
            <script>
                history.back();
            </script><?php
            else:
                $productid = $id;
                $_SESSION['content'] = $content;
                $_SESSION['idcomment'] = $id;
                $_SESSION['notification'] = "Đăng nhập để bình luận !";
                $_SESSION['notification-code'] = "warning";
                header('Location: '.BASE_URL.'/Login/Show/3');
                exit();
            endif;

        }
        $brandid = $this->product->infoproduct($id)['brandid'];
        $price = $this->product->infoproduct($id)['price'];
    
        $this->view(
            "master2",
            [
                "pages" => "product_details",
                "detailviews"=>$this->product->updateviews($id),                
                "productdetails" => $this->product->getproductdetails($id),
                "productdetailall" => $this->product->getproductdetailall($id),
                "productdetailattr" =>$this->attribute->getproduct_detail_attr($id),
                "product_type" => $this->product->getproduct_type_id($id),
            ]
        );
    }
}
