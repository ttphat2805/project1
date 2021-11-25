<?php
class contact extends Controller
{
    function __construct()
    {
    }
    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "contact-us",
            ]
        );
    }

}
