<?php
class products extends Controller
{
    public $product;

    function __construct()
    {
        $this->product = $this->model("productmodels");
    }
    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "products",
                "products" => $this->product->getproduct_home(),
                "product_trends" => $this->product->getproduct_trend(),
            ]
        );
    }
}
