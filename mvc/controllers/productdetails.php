<?php
class productdetails extends Controller
{
    function __construct()
    {
    }


    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "product_details",
            ]
        );
    }
}
