<?php
class Chat extends Controller
{
    public $product;
    public $user;

    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->user = $this->model("usermodels");
    }
    function Show()
    {
        
        $this->view(
            "master1",
            [
                "products" => $this->product->getproduct_home(),
                "product_trends"=>$this->product->getproduct_trend(),
            ]
        );
    }

    function sendMsg()
    {
        if (isset($_POST['send'])){
            $content = $_POST['content'];
            if(isset($_SESSION['user_infor'])){
                $out_id = 3;
                $fullname = $_SESSION['user_infor']['user_name'];
                $in_id = $this->user->idComment($fullname)['id'];
                $this->user->addChat($in_id,$out_id,$content);
            }else{
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "đăng nhập đi thằng lzz";
            }
            
        }
    }

    function SelectMsg()
    {
        $output = "";
        if(isset($_SESSION['user_infor'])){
            $out_id = 3;
            $fullname = $_SESSION['user_infor']['user_name'];
            $in_id = $this->user->idComment($fullname)['id'];
            $result = $this->user->view($in_id, $out_id);
            
            foreach ($result as $row) {
                if ($row['out_msg_id'] == 3) {
                    $output .= '
                                <div class="member-text">
                                    <p>'.$row['content'].'</p>
                                </div>';
                }else{
                    $output .= '<div class="admin-text"> 
                                    <p>'.$row['content'].'</p> 
                                </div>
                                ';
                }
            }
        }else{
            $output .= "đăng nhập để chửi lộn với admin nè bạn";
            
        }
        
        echo $output; 
    }

    function error()
    {
        $this->view(
            "master2",
            [
                "pages" => "error404",
            ]
        );
    }
}
