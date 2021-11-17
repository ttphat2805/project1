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
                "products" => $this->product->getproduct_home(),
            ]
        );
    }


    function productdetails()
    {
        $this->view(
            "master2",
            [
                "pages" => "product_details",
            ]
        );
    }
}
