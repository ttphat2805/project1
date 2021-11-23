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
            ]
        );
    }

}
