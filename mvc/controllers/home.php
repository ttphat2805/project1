<?php
class Home extends Controller
{
    public $product;

    function __construct()
    {
        $this->product = $this->model("productmodels");
    }
    function Show()
    {
        
        $this->view(
            "master1",
            [
                "products" => $this->product->getproductsite(),
                "product_trends"=>$this->product->getproduct_trend(),
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
}
