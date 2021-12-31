<?php
class products extends Controller
{
    public $product;
    public $category;

    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->category = $this->model("categorymodels");
        $this->cart = $this->model("cartmodels");

    }
    function Show()
    {
        $_SESSION['namesite'] = "Các sản phẩm";

        $this->view(
            "master2",
            [
                "pages" => "products",
                "category" => $this->category->getcategory(),
                "toporder" => $this->cart->toporder_stie('4'),
            ]
        );
    }

    function fetchproducts()
    {
        
        $output = "";
        $url = BASE_URL;
        $conditions = "";
        if(!isset($_POST['search'])){
            $conditions = '';
        }else{
            $_POST['search'] = trim($_POST['search']);
            $search = explode(" ", $_POST['search']);
            
            foreach($search as $word){
                $conditions .= "a.name LIKE '%".$word."%' OR ";
            }
            $conditions = substr($conditions, 0, -4);
        }

        if(!isset($_POST['page'])){
            $page = 1;
        }else{
            $page = $_POST['page'];
        }
        if(isset($_POST['id_category'])){
            $id_category = $_POST['id_category'];
            $products = $this->product->getsearchcategory($conditions,$id_category);
        }else{
            $products = $this->product->getproduct_home($conditions);
        }
        
        $totalproduct = count($products);
        $productsperpage = 6;
        $prev = ($page - 1);
        $next = ($page + 1);
        $from = ($page - 1) * $productsperpage;
        $totalPage = ceil($totalproduct / $productsperpage);
        if(isset($_POST['id_category'])){
            $result = $this->product->productcatsearch($from,$productsperpage,$conditions,$id_category);
        }else{
            $result = $this->product->productspage($from,$productsperpage,$conditions);
        }
        if(count($result) > 0){
            foreach ($result as $item) {
                $product_attr = $this->product->getproducts_detail_attr($item['idproduct']);
                $attr_id = $this->product->getproducts_type_id($item['idproduct']);
                $output .= '<div class="col-custom product-area product-last col-lg-4 col-md-6 col-sm-6">
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
                    $output .= '<div class="product-size animate-size mb-2">
                            <p>Trọng lượng: </p>';
                    foreach ($product_attr as $key => $size) :
                            if ($key == 0) {
                                $output .= '   <input id="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" type="radio" name="option1"  data-prod='. $size['id'] .' value="' . $size['attribute_id'] . '" checked>
                                    <label for="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" class="sd btn-value-size" id="' . $size['value'] . '">
                                        <span>' . $size['value'] . '</span>
                                    </label>';    
                            } else {
                                $output .= '   <input id="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" type="radio" name="option1"  data-prod='. $size['id'] .' value="' . $size['attribute_id'] . '" checked>
                                    <label for="prod-size-' . $size['value'] . '-' . $item['idproduct'] . '" class="sd btn-value-size" id="' . $size['value'] . '">
                                        <span>' . $size['value'] . '</span>
                                    </label>';
                            }
                            
                        endforeach;
                        $output .= '</div>';
                    else:
                        $output .= "<div class='non-size' data-prod='".$attr_id['id']."'></div>";
                    endif;
                    $output .= '<div class="product-price">
                                <span class="regular-price ">' . number_format($item['price']) . 'đ</span>
                                <span class="old-price"><del>' . number_format($item['price']+12500) . 'đ</del></span>
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
                            <span class="regular-price ">' . number_format($item['price']) . 'đ</span>
                            <span class="old-price"><del>' . number_format($item['price']) . 'đ</del></span>
                        </div>';
                if ($attr_id['attribute_id'] !== NULL) :
                    $output .= '<div class="product-size animate-size list mb-2">
                            <p>Trọng lượng: </p>';
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
                                <span class="regular-price ">' . number_format($item['price']) . 'đ</span>
                                <span class="old-price"><del>' . number_format($item['price']) . 'đ</del></span>
                            </div>
                            
                            <div class="product-action d-flex position-absolute">
                            <a title="+ Giỏ hàng" class="add_to_cart">
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
            // END FOREACH
            if($totalproduct > $productsperpage){
                $output .= '
                <div style="display: flex; justify-content:center; ">
                <div class="pd_page flex-panigation">';
                    if($prev != 0){
                        $output .= '
                            <input type="radio" name="page" class="input-hidden" id="'.$prev.'" value="'.$prev.'"> </input>
                            
                            <label class="panigation" for="'.$prev.'">
                        <i class="ion-ios-arrow-thin-left arrow-css"></i>
                        </label>';
                    }
                    for($i=1 ; $i<=$totalPage ;$i++ ) {
                            $output .= '<input type="radio" name="page" class="input-hidden" id="'.$i.'" value ="'.$i. '"> </input>
                                    <label class="panigation';
                                    if($i == $page) $output .= ' active';else{
                                        $output .= '';
                                    }
                            $output.= '"for="' .$i.'">'.$i.'</label>';
                    }
                    if($next <= $totalPage){
                    $output .='
                    <input type="radio" name="page" class="input-hidden" id="'.$next.'" value="'.$next.'"> </input>
                    <label class="panigation" for="'.$next.'"><i class="ion-ios-arrow-thin-right  arrow-css"></i></label>';
                    }
                    $output .= '
                </div></div>
            ';
            }
            
        }else{
            echo '<p class="noti-search">Không tìm thấy sản phẩm nào <i class="fad fa-times-octagon btn-search-value"></i></p>';
        }
            echo $output;
    }
}
