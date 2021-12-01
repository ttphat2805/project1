<?php
class blog extends Controller
{
    public $blogmodels;

    function __construct()
    {
        $this->blog = $this->model("blogmodels");
    }
    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "blog",
                "blog"=>$this->blog->getBlog(),
            ]
        );
    }

    function blogdetail($id){
        $this->view(
            "master2",
            [
                "pages" => "blogdetail",
                "blog"=>$this->blog->getblogid($id),
            ]
        );
    }
}
