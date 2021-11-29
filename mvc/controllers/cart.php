<?php
class cart extends Controller
{
    function __construct()
    {
    }

    
    function Show()
    {
        $this->view(
            "master2",
            [
                "pages" => "cart",
            ]
        );
    }


    public function addToCart() {

        if($_SERVER['REQUEST_METHOD'] == "POST"){
             $data_attr = $_POST['data_attr'];
             $data_id_prod_type = $_POST['data_id_prod_type'];
            $Item = [
                'id_product_type' => $data_id_prod_type,
                'id_attr' => $data_attr
            ];
             $_SESSION['cart_Item'] = $Item;
             
            $_SESSION['cart_number'] = 0;
            
            echo json_encode($_SESSION['cart_Item']);
        }
        
    }
}
