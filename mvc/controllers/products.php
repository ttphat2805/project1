<?php
class products extends Controller
{
    public $product;
    public $category;

    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->category = $this->model("categorymodels");
    }
    function Show()
    {
        $_SESSION['namesite'] = "Các món ăn";

        $this->view(
            "master2",
            [
                "pages" => "products",
                "category" => $this->category->getcategory(),
            ]
        );
    }

    function fetchproducts()
    {
        $output = "";
        $url = BASE_URL;

        $products = $this->product->getproduct_home();
        foreach ($products as $item) {
            $product_attr = $this->product->getproducts_detail_attr($item['idproduct']);
            $attr_id = $this->product->getproducts_type_id($item['idproduct']);
            //print_r($attr_id);
            $output .= '<div class="col-custom product-area col-lg-4 col-md-6 col-sm-6">
            <div class="single-product position-relative">
            <input type="hidden" class="idproduct" value="' . $item['idproduct'] . '">
                <div class="product-image">
                    <a class="d-block" href="' . $url . '/productdetail/show/' . $item['slug'] . '">
                        <img src="' . $url . '/public/assets/images/product/' . $item['image'] . '" alt="" class="product-image-1 w-100">
                    </a>
                </div>
                <div class="product-content">
                    <div class="product-title">
                        <h4 class="title-2"> <a href="' . $url . '/productdetail/show/' . $item['slug'] . '">' . $item['name'] . '</a></h4>
                    </div>';
            if ($attr_id['attribute_id'] !== NULL) :
                $output .= '<div class="product-size mb-2">
                        <p>Size :</p>';
                        foreach ($product_attr as $size) :
                            $output .= '   <input id="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" type="radio" checked data-prod='. $size['id'] .' name="option1" value="' . $size['attribute_id'] . '">
                                    <label for="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" class="sd btn-value-size" id="' . $size['value'] . '">
                                        <span>' . $size['value'] . '</span>
                                    </label>';
                        endforeach;
                        $output .= '</div>';
                    else:
                        $output .= "<div class='non-size' data-prod='".$attr_id['id']."'></div>";
                    endif;
                    $output .= '<div class="product-price">
                                <span class="regular-price ">' . number_format($item['price']) . ' VNĐ</span>
                                <span class="old-price"><del>' . number_format($item['price']) . ' VNĐ</del></span>
                            </div>
                            
                            <div class="product-action d-flex position-absolute">
                            <a title="+ Giỏ hàng" class="add_to_cart">
                                <i class="ion-bag"></i>
                            </a>
                    <a class="addtowishlist" title="+ Yêu thích">
                        <i class="ion-ios-heart-outline"></i>
                    </a>
                </div>
                </div>
                <div class="product-content-listview">
                    <div class="product-title">
                        <h4 class="title-2"> <a href="' . $url . '/productdetail/show/' . $item['slug'] . '">' . $item['name'] . '</a></h4>
                    </div>
                    <div class="product-price">
                        <span class="regular-price ">' . number_format($item['price']) . ' VNĐ</span>
                        <span class="old-price"><del>' . number_format($item['price']) . ' VNĐ</del></span>
                    </div>';
            if ($attr_id['attribute_id'] !== NULL) :
                $output .= '<div class="product-size list mb-2">
                        <p>Size :</p>';
                foreach ($product_attr as $size) :
                    $output .= '   <input id="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" type="radio" name="option1" value="' . $size['value'] . '">
                            <label for="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" class="sd btn-value-size" id="' . $size['value'] . '">
                                <span>' . $size['value'] . '</span>
                            </label>';
                endforeach;
                $output .= '</div>';
            endif;


            $output .= '<div class="product-action d-flex">
                    <a href="" title="+ Giỏ hàng" class="add_to_cart">
                        <i class="ion-bag"></i>
                    </a>
                    <a class="addtowishlist" title="+ Yêu thích">
                        <i class="ion-ios-heart-outline"></i>
                    </a>
                </div>
                    <p class="desc-content">
                        ' . $item['description'] . '
                    </p>
                </div>
            </div>
        </div>';
        }
        echo $output;
    }

    function searchproducts()
    {
        if (isset($_POST['action'])) {
            $url = BASE_URL;
            $output = '';
            $value = $_POST['value_input'];
            $check = $this->product->searchproducts($value);
            if ($check->rowCount() > 0) {
                $products = $check->fetchAll();

                foreach ($products as $item) {
                    $product_attr = $this->product->getproducts_detail_attr($item['idproduct']);
                    $attr_id = $this->product->getproducts_type_id($item['idproduct']);
                    $output .= '<div class="col-custom product-area col-lg-4 col-md-6 col-sm-6">
            <div class="single-product position-relative">
            <input type="hidden" class="idproduct" value="' . $item['idproduct'] . '">
                <div class="product-image">
                    <a class="d-block" href="' . $url . '/productdetail/show/' . $item['slug'] . '">
                        <img src="' . $url . '/public/assets/images/product/' . $item['image'] . '" alt="" class="product-image-1 w-100">
                    </a>
                </div>
                <div class="product-content">
                    <div class="product-title">
                        <h4 class="title-2"> <a href="' . $url . '/productdetail/show/' . $item['slug'] . '">' . $item['name'] . '</a></h4>
                    </div>';
                    if ($attr_id['attribute_id'] !== NULL) :
                        $output .= '<div class="product-size mb-2">
                        <p>Size :</p>';
                        foreach ($product_attr as $size) :
                            $output .= '   <input id="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" type="radio" checked data-prod='. $size['id'] .' name="option1" value="' . $size['attribute_id'] . '">
                                    <label for="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" class="sd btn-value-size" id="' . $size['value'] . '">
                                        <span>' . $size['value'] . '</span>
                                    </label>';
                        endforeach;
                        $output .= '</div>';
                    else:
                        $output .= "<div class='non-size' data-prod='".$attr_id['id']."'></div>";
                    endif;
                    $output .= '<div class="product-price">
                                <span class="regular-price ">' . number_format($item['price']) . ' VNĐ</span>
                                <span class="old-price"><del>' . number_format($item['price']) . ' VNĐ</del></span>
                            </div>
                            
                            <div class="product-action d-flex position-absolute">
                            <a title="+ Giỏ hàng" class="add_to_cart">
                                <i class="ion-bag"></i>
                            </a>
                    <a class="addtowishlist" title="+ Yêu thích">
                        <i class="ion-ios-heart-outline"></i>
                    </a>
                </div>
                </div>

                <div class="product-content-listview">
                    <div class="product-title">
                        <h4 class="title-2"> <a href="' . $url . '/productdetail/show/' . $item['slug'] . '">' . $item['name'] . '</a></h4>
                    </div>
                    <div class="product-price">
                        <span class="regular-price ">' . number_format($item['price']) . ' VNĐ</span>
                        <span class="old-price"><del>' . number_format($item['price']) . ' VNĐ</del></span>
                    </div>';
                    if ($attr_id['attribute_id'] !== NULL) :
                        $output .= '<div class="product-size list mb-2">
                        <p>Size :</p>';
                        foreach ($product_attr as $size) :
                            $output .= '   <input id="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" type="radio" name="option1" value="' . $size['value'] . '">
                            <label for="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" class="sd btn-value-size" id="' . $size['value'] . '">
                                <span>' . $size['value'] . '</span>
                            </label>';
                        endforeach;
                        $output .= '</div>';
                    endif;


                    $output .= '<div class="product-action d-flex">
                    <a href="" title="+ Giỏ hàng">
                        <i class="ion-bag"></i>
                    </a>
                    <a class="addtowishlist" title="+ Yêu thích">
                        <i class="ion-ios-heart-outline"></i>
                    </a>
                </div>
                    <p class="desc-content">
                        ' . $item['description'] . '
                    </p>
                </div>
            </div>
        </div>
        ';
                }
                echo $output;
            }else{
                echo '<p class="noti-search">Không tìm thấy sản phẩm nào <i class="fad fa-times-octagon btn-search-value"></i></p>';
            }
        }
    }
}
