<?php
class Home extends Controller
{
    function __construct()
    {
    }
    function Show()
    {
        $this->view(
            "master1",
            [
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
