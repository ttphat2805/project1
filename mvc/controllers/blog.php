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
                "blog" => $this->blog->getBlogpage(),
            ]
        );
    }

    function fetchblog()
    {
        if (isset($_POST['action'])) {
            $output = "";
            $blog = $this->blog->getBlogpage();
            $url = BASE_URL;

            if (!isset($_POST['page'])) {
                $page = 1;
            } else {
                $page = $_POST['page'];
            }
            $totalblog = count($blog);
            $blogperpage = 1;
            $from = ($page - 1) * $blogperpage;
            $totalPage = ceil($totalblog / $blogperpage);
            $result = $this->blog->blogperpage($blogperpage, $from);
            foreach ($result as $blog) {
                $output .= '
                <div class="col-lg-4 col-md-6 col-custom mb-4">
                <div class="single-blog">
                    <div class="single-blog-thumb">
                        <a href="' . $url . '/blogdetail/show/' . $blog['slug'] . '">
                            <img src="' . $url . '/public/assets/images/blog/' . $blog['image'] . '" alt="Blog Image">
                        </a>
                    </div>
                    <div class="single-blog-content position-relative">
                        <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                            <span>14</span>
                            <span>01</span>
                        </div>
                        <div class="post-meta">
                            <span class="author">Nguồn: G6\'Food</span>
                        </div>
                        <h2 class="post-title">
                            <a href="' . $url . '/blogdetail/show/' . $blog['slug'] . '">' . $blog['title'] . '</a>
                        </h2>
                        <p class="desc-content">' . $blog['description'] . '</p>
                    </div>
                </div>
            </div>
                ';
            }
            // END FOREACH
            if ($totalblog > $blogperpage) {
                $output .= '
                <div style="display: flex; justify-content:center;" class="mb-5 mt-3">
                <div class="pd_page flex-panigation">';
                for ($i = 1; $i <= $totalPage; $i++) {
                    $output .= '<input type="radio" name="page" class="input-hidden" id="' . $i . '" value ="' . $i . '"> </input>
                                    <label class="panigation';
                    if ($i == $page) $output .= ' active';
                    else {
                        $output .= '';
                    }
                    $output .= '"for="' . $i . '">' . $i . '</label>';
                }
                $output .= '
                </div></div>
            ';
            }
            echo $output;
        }
    }
}
