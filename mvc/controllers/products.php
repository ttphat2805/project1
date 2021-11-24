<?php
class products extends Controller
{
    function __construct()
    {
    }
    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "products",
                "products" => $this->product->getproduct_home(),
                "product_trends"=>$this->product->getproduct_trend(),
            ]
        );
    }

}
