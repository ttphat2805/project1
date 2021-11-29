<?php
class contact extends Controller
{
    function __construct()
    {
    }
    function Show()
    {
        $_SESSION['namesite'] = "Liên hệ";

        $this->view(
            "master2",
            [
                "pages" => "contact-us",
            ]
        );
    }

}
