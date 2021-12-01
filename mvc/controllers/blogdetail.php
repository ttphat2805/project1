<?php
class blogdetail extends Controller
{
    public $blog;

    function __construct()
    {
        $this->blog = $this->model("blogmodels");
    }
    function show($slug)
    {
        $_SESSION['namesite'] = 'Chi tiết bài viết';
        $id = $this->blog->getblogid($slug);

        $this->view(
            "master2",
            [
                "pages" => "blogdetail",
                "blog" => $this->blog->blogid($id),
                "getblogdifferent" => $this->blog->getblogdifferent($id),
            ]
        );
    }
}
