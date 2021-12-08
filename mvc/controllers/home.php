<?php
class Home extends Controller
{
    public $product;

    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->blog = $this->model("blogmodels");
    }
    function Show()
    {

        $this->view(
            "master1",
            [
                "products" => $this->product->getproductsite(),
                "product_trends" => $this->product->getproduct_trend(),
                "blog" => $this->blog->getBlogpage(),
            ]
        );
    }


    function error()
    {
        $this->view(
            "master2",
            [
                "pages" => "error404",
            ]
        );
    }


    function fetminicart()
    {
        $output = "";
        $url = BASE_URL;

        if (isset($_SESSION['cart_Item'])) {
            $total = 0;
            foreach ($_SESSION['cart_Item'] as $item) {
                $total += $item['total'];
                $output .= '<div class="single-cart-item">
                    <div class="cart-img">
                        <a href="#"><img src="' . $url . '/public/assets/images/product/' . $item['image'] . ' ?>" alt=""></a>
                    </div>
                    <div class="cart-text">
                        <h5 class="title"><a href="#">' . $item['name'] . '</a></h5>
                        <div class="cart-text-btn">
                            <div class="cart-qty">
                                <span>' . $item['quantity'] . '×</span>
                                <span class="cart-price">' . number_format($item['total']) . 'đ</span>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }

        $output .= '<div class="cart-price-total d-flex justify-content-between">
            <h5>Tổng :</h5>
            <h5>';
        if (isset($total)) {
            $output .= number_format($total);
        } else {
            $output .= '';
        }
        $output .= 'đ</h5>
        </div>
        <div class="cart-links d-flex justify-content-center">
            <a class="obrien-button white-btn custom-button-cart" href="' . $url . '/cart">giỏ hàng</a>
            <a class="obrien-button white-btn custom-button-cart" href="' . $url . '/order">Thanh toán</a>
        </div>';
        echo $output;
    }

    function checkwishlist() {
        if(isset($_POST['action'])){
            $output = "";
            $idmember = $_SESSION['user_infor']['user_id'];
            $idproduct = $_POST['product_id'];
            $check = $this->product->checkwishlist($idmember,$idproduct);
            if($check > 0){
                echo '1';
            }else{
                echo '0';
            }
        }
    }
}
