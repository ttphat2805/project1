<?php
class myaccount extends Controller
{
    function __construct()
    {
    }
    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "myaccount",
            ]
        );
    }
}
