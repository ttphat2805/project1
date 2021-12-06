<?php
class cart extends Controller
{
    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->category = $this->model("categorymodels");
    }


    function Show()
    {

        $_SESSION['namesite'] = "Giỏ hàng";

        if (isset($_SESSION['cart_Item'])) {
            $list_cart = $_SESSION['cart_Item'];
        } else {
            $list_cart = null;
        }


        return   $this->view(
            "master2",
            [
                "pages" => "cart",

                'list' => $list_cart
            ]
        );
    }

    public function addcart($id)
    {
        $product_type_id = $_POST['option1'];
        $quantity = $_POST['quantity'];
        $this_product = $this->product->getProductCart($product_type_id);
        var_dump($this_product);
        $Item = [
            'id_product_type' => $product_type_id,
            'id_attr' => '',
            'quantity' => $quantity
        ];
        if (isset($_SESSION['cart_Item'])) {
            $index = count($_SESSION['cart_Item']);
            $test = false;
            for ($i = 0; $i < $index; $i++) {
                if ($_SESSION['cart_Item'][$i]['id_product_type'] == $Item['id_product_type']) {
                    $old_quanlity = $_SESSION['cart_Item'][$i]['quantity'];
                    $_SESSION['cart_Item'][$i]['quantity'] += $quantity;

                    if ($_SESSION['cart_Item'][$i]['quantity'] > $this_product['quantity']) {
                        $_SESSION['cart_Item'][$i]['quantity'] = $this_product['quantity'];
                        $Item['quantity'] = $this_product['quantity'];
                        $_SESSION['cart_number'] -= $old_quanlity;
                        $_SESSION['cart_number'] += $Item['quantity'];
                        $_SESSION['cart_Item'][$i]['total'] = $_SESSION['cart_Item'][$i]['quantity'] * $_SESSION['cart_Item'][$i]['price'];
                        header("Location: " . BASE_URL . '/cart');
                        exit();
                    }
                    $_SESSION['cart_Item'][$i]['total'] = $_SESSION['cart_Item'][$i]['quantity'] * $_SESSION['cart_Item'][$i]['price'];
                    $test = true;
                }
            }

            if ($test == false) {
                $Item_cart = $this->product->getProductCart($Item['id_product_type']);
                $Item['price'] = $Item_cart['price'];
                $Item['sold'] = $Item_cart['sold'];
                $Item['name'] = $Item_cart['name'];
                $Item['image'] = $Item_cart['image'];
                $Item['value'] = $Item_cart['value'];
                $Item['total'] = $Item['quantity'] * floatval($Item['price']);
                $_SESSION['cart_Item'][$index] = $Item;
            }
        } else {
            // use id product_type to get product info and storange in session cart_Item
            $Item_cart = $this->product->getProductCart($Item['id_product_type']);
            $Item['price'] = $Item_cart['price'];
            $Item['sold'] = $Item_cart['sold'];
            $Item['name'] = $Item_cart['name'];
            $Item['image'] = $Item_cart['image'];
            $Item['value'] = $Item_cart['value'];
            $Item['total'] = $Item['quantity'] * floatval($Item['price']);

            $_SESSION['cart_Item'][0] = $Item;
        }
        $_SESSION['cart_number'] += $Item['quantity'];

        header("Location: " . BASE_URL . '/cart');
        //   unset($_SESSION['cart_number']);
        // unset($_SESSION['cart_Item']);

    }

    public function addToCart()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data_attr = $_POST['data_attr'];
            $data_id_prod_type = $_POST['data_id_prod_type'];


            $Item = [
                'id_product_type' => $data_id_prod_type,
                'id_attr' => $data_attr,
                'quantity' => 1
            ];
            if (isset($_SESSION['cart_Item'])) {
                $index = count($_SESSION['cart_Item']);
                $test = false;
                for ($i = 0; $i < $index; $i++) {
                    if ($_SESSION['cart_Item'][$i]['id_product_type'] == $Item['id_product_type']) {
                        $_SESSION['cart_Item'][$i]['quantity'] += 1;
                        $_SESSION['cart_Item'][$i]['total'] = $_SESSION['cart_Item'][$i]['quantity'] * $_SESSION['cart_Item'][$i]['price'];
                        $test = true;
                    }
                }

                if ($test == false) {
                    $Item_cart = $this->product->getProductCart($Item['id_product_type']);
                    $Item['price'] = $Item_cart['price'];
                    $Item['sold'] = $Item_cart['sold'];
                    $Item['name'] = $Item_cart['name'];
                    $Item['image'] = $Item_cart['image'];
                    $Item['value'] = $Item_cart['value'];
                    $Item['total'] = $Item['quantity'] * floatval($Item['price']);
                    $_SESSION['cart_Item'][$index] = $Item;
                }
            } else {
                // use id product_type to get product info and storange in session cart_Item
                $Item_cart = $this->product->getProductCart($Item['id_product_type']);
                $Item['price'] = $Item_cart['price'];
                $Item['sold'] = $Item_cart['sold'];
                $Item['name'] = $Item_cart['name'];
                $Item['image'] = $Item_cart['image'];
                $Item['value'] = $Item_cart['value'];
                $Item['total'] = $Item['quantity'] * floatval($Item['price']);

                $_SESSION['cart_Item'][0] = $Item;
            }
            $_SESSION['cart_number'] += 1;
            // unset($_SESSION['cart_Item']);
            // unset($_SESSION['cart_number']);
            echo $_SESSION['cart_number'];
            //echo json_encode($_SESSION['cart_Item']);
        }
    }

    public function modify()
    {
        $id_prod_type = $_POST['id_product_type'];
        $this_product = $this->product->getproductTypeByProductTypeId($id_prod_type);
        
        if ($_POST['method'] == 'dec') {
            for ($i = 0; $i < count($_SESSION['cart_Item']); $i++) {
                if ($_SESSION['cart_Item'][$i]['id_product_type'] == $id_prod_type) {
                    if ($_SESSION['cart_Item'][$i]['quantity'] == 1) {
                        exit();
                    }
                    $_SESSION['cart_Item'][$i]['quantity'] -= 1;
                    $_SESSION['cart_Item'][$i]['total'] = $_SESSION['cart_Item'][$i]['price'] * $_SESSION['cart_Item'][$i]['quantity'];
                    $_SESSION['cart_number'] -= 1;
                    $result = [
                        'price' => $_SESSION['cart_Item'][$i]['price'],
                        'quantity' => $_SESSION['cart_Item'][$i]['quantity'],
                        'total' => $_SESSION['cart_Item'][$i]['total'],
                        'cart_num' => $_SESSION['cart_number']
                    ];
                    $result = json_encode($result);
                    echo $result;
                    exit();
                }
            }
        } elseif ($_POST['method'] == 'inc') {
            for ($i = 0; $i < count($_SESSION['cart_Item']); $i++) {
                if ($_SESSION['cart_Item'][$i]['id_product_type'] == $id_prod_type) {
                    $old_quanlity = $_SESSION['cart_Item'][$i]['quantity'];
                    $_SESSION['cart_Item'][$i]['quantity'] += 1;
                    $_SESSION['cart_number'] += 1;
                    if ($_SESSION['cart_Item'][$i]['quantity'] > $this_product[0]['quantity']) {
                        
                        $_SESSION['cart_Item'][$i]['quantity'] = $this_product[0]['quantity'];
                        $_SESSION['cart_number'] -= $old_quanlity;
                        $_SESSION['cart_number'] += $this_product[0]['quantity'];
                
                    }
                    $_SESSION['cart_Item'][$i]['total'] = $_SESSION['cart_Item'][$i]['price'] * $_SESSION['cart_Item'][$i]['quantity'];
                    
                    $result = [
                        'price' => $_SESSION['cart_Item'][$i]['price'],
                        'quantity' => $_SESSION['cart_Item'][$i]['quantity'],
                        'total' => $_SESSION['cart_Item'][$i]['total'],
                        'cart_num' => $_SESSION['cart_number']
                    ];
                    $result = json_encode($result);
                    echo $result;
                    // session_destroy();
                    exit();
                }
            }
        }
    }
    public function remove()
    {
        $id = $_POST['id_product_type'];
        $quantity = null;
        $total = null;

        for ($i = 0; $i < count($_SESSION['cart_Item']); $i++) {
            if ($_SESSION['cart_Item'][$i]['id_product_type'] == $id) {
                $quantity = $_SESSION['cart_Item'][$i]['quantity'];
                $total = $_SESSION['cart_Item'][$i]['total'];
                $_SESSION['cart_number'] -= $quantity;
                $result = [

                    'total' => $_SESSION['cart_Item'][$i]['total'],
                    'cart_num' => $_SESSION['cart_number']
                ];

                array_splice($_SESSION['cart_Item'], $i, 1);
                $result = json_encode($result);
                echo $result;
                exit();
            }
        }
    }
}
