<?php
class error404 extends Controller
{

    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "error404",
            ]
        );
    }
}
