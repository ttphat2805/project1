<?php
class about extends Controller
{
    function __construct()
    {
    }
    function Show()
    {
    $_SESSION['namesite'] = 'Giới thiệu';

        $this->view(
            "master2",
            [
                "pages" => "about",
            ]
        );
    }
}
