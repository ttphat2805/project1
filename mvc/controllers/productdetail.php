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
            header("location:".BASE_URL."/error404");
            exit();
        }

        if(strstr($_GET['url'], 'show')){
            if (!isset($url[2])) {
                header("Location:".BASE_URL."pagenotfound");
                exit();
            }
        }
        $this->product = $this->model("productmodels");
        $this->attribute = $this->model("attributemodels");
        $this->user = $this->model("usermodels");


    }


    function show($slug)
    {
        $id = $this->product->getProductId($slug);
        if(isset($_POST['btn__submit'])){
            $content = $_POST['content'];
            if(isset($_SESSION['user_infor'])){
                $fullname = $_SESSION['user_infor']['user_name'];
                $productid = $id;
                $memberid = $this->user->idComment($fullname)['id'];
                $this->user->insertComment($memberid,$productid,$content);
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "bình luận thành công";
            }else{
                $productid = $id;
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Bạn phải đăng nhập để bình luận";
                // if(isset())
                $_SESSION['check_CMT']= $_GET['url'];
                echo $_SESSION['check_CMT'];
                header('Location: '.BASE_URL.'/auth/login/');
            }
        }

        
        $this->view(
            "master2",
            [
                "pages" => "product_details",
                "detailviews"=>$this->product->updateviews($id),                
                "productdetails" => $this->product->getproductdetails($id),
                "productdetailall" => $this->product->getproductdetailall($id),
                "gallery" => $this->product->get_gallery_image($id),
                "productdetailattr" =>$this->attribute->getproduct_detail_attr($id),
                "product_type" => $this->product->getproduct_type_id($id),
                "getSLComment"=>$this->user->getSLcomment($id),
                "getComment"=>$this->user->getComment($id),
            ]
        );
    }

    function change_price($size){
        $size = $this->attribute->getsizedetail('price',$size);
        $output = number_format($size);
        echo $output;
    }

    function change_oldprice($size){
        $hi = $this->attribute->getsizedetail('price',$size);
        $hi += 12500;
        $output = number_format($hi);
        echo $output;
    }

    function change_quantitysize($size){
        $hi = $this->attribute->getsizedetail('quantity',$size);
        echo $hi;
    }

    


}
?>
