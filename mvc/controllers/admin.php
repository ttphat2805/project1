<?php
class Admin extends Controller
{
    public $category, $product, $member, $cart, $attribute, $coupon, $user, $blog;

    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->category = $this->model("categorymodels");
        $this->attribute = $this->model("attributemodels");
        $this->coupon = $this->model("couponmodels");
        $this->cart = $this->model("cartmodels");
        $this->user = $this->model("usermodels");
        $this->account = $this->model("accountmodels");
        $this->blog = $this->model("blogmodels");
        $this->chart = $this->model("statisticalmodels");
    }
    function show()
    {
        if (!isset($_SESSION['user_infor'])) {
            header('Location:' . BASE_URL . '/auth/login');
            $_SESSION['checkloginadmin'] = 'check';
            exit();
        }
    }
    function homepage()
    {
        if (!isset($_SESSION['user_infor'])) {
            header('Location:' . BASE_URL . '/auth/login');
            $_SESSION['checkloginadmin'] = 'check';
            exit();
        }
        $this->view(
            "master3",
            [
                "pages" => "adm_homepage",
                "countproduct" => $this->product->countproduct(),
                "countcomments" => $this->user->countcomment(),
                "countmember" => $this->account->countmember(),
                "toporder" => $this->cart->toporder('4'),
                "sale" => $this->cart->sale(),
                "order" => $this->account->unprogress(),
            ]
        );
    }
    // START - MEMBER
    function member()
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_showmember",
                "member" => $this->user->getmember(),

            ]
        );
    }

    function infomember($id)
    {
        $role = $this->user->checkrole($_SESSION['user_infor']['user_id']);
        $_SESSION['role'] = $role;
        $checkroleadmin = $this->user->checkroleadmin($_SESSION['user_infor']['user_id']);
        $checkrolesuperadmin = $this->user->checkrolesuperadmin($_SESSION['user_infor']['user_id']);
        if (!empty($checkrolesuperadmin)) {
            $_SESSION['checkrolesuperadmin'] = $checkrolesuperadmin;
        }
        if (!empty($checkroleadmin)) {
            $_SESSION['checkroleadmin'] = $checkroleadmin;
        }


        $this->view(
            "master3",
            [
                "pages" => "adm_updatemember",
                "memberid" => $this->user->getmemberid($id),

            ]
        );
    }

    function updatemember()
    {
        if (isset($_POST['btn__submit'])) {
            $id = $_POST['id'];
            $status = $_POST['status'];

            if (!isset($_POST['fullname']) || !isset($_POST['address']) || !isset($_POST['mobile']) || !isset($_POST['email'])) {
                $role = $_POST['role'];
                $this->user->updatestatus($status, $role, $id);
            } else {
                $role = $_POST['role'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $mobile = $_POST['mobile'];
                $this->user->updatemember($fullname, $mobile, $email, $address, $role, $status, $id);
            }
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Cập nhật thành công";
            header('Location:' . BASE_URL . '/admin/member');
            exit();
        }
    }


    // END - MEMBER


    // START - CATEGORY
    function showcategory()
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_showcategory",
                "category" => $this->category->getcategory(),
            ]
        );
    }

    function addcategory()
    {
        if (isset($_POST['btn__submit'])) {
            $name = $_POST['name'];
            $name_slug = change_slug($name);
            $status = $_POST['status'];
            $check = $this->category->checkexistname('category', $name);
            if ($check == 1) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã tồn tại tên danh mục này";
            } else {
                $this->category->addcategory($name, $name_slug, $status);
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Thêm thành công";
                header('Location:' . BASE_URL . '/admin/showcategory');
                exit();
            }
        }
        $this->view(
            "master3",
            [
                "pages" => "adm_addcategory",
            ]
        );
    }


    function infocategory($id)
    {

        $this->view(
            "master3",
            [
                "pages" => "adm_updatecategory",
                "category" => $this->category->infocategory($id),

            ]
        );
    }


    function updatecategory()
    {
        if (isset($_POST['btn__submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $name_slug = change_slug($name);
            $status = $_POST['status'];
            $check = $this->category->checkexistname('category', $name, $id);
            if ($check != 0) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã tồn tại danh mục này";
            } else {
                $this->category->updatecategory($name, $name_slug, $status, $id);
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Cập nhật thành công";
            }
            header('Location:' . BASE_URL . '/admin/showcategory');
            exit();
        }
    }

    function delcategory($id)
    {
        $check = $this->category->checkpdcategory($id);
        if ($check == 0) {
            $this->category->delcategory($id);
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Xóa thành công";
        } else {
            $_SESSION['toastr-code'] = "error";
            $_SESSION['toastr-noti'] = "Xóa thất bại";
        }
        header('Location:' . BASE_URL . '/admin/showcategory');
        exit();
    }
    // END - CATEGORY


    // START - PRODUCT 
    function showproduct()
    {

        $this->view(
            "master3",
            [
                "pages" => "adm_showproduct",
                "product" => $this->product->getproductadmin(),
                "productattr" => $this->product->getattradmin(),

            ]
        );
    }

    function addproduct()
    {
        if (isset($_POST['btn__submit'])) {
            $name = $_POST['name'];
            $checkname = $this->category->checkexistname('products', $name);
            if ($checkname != 0) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã tồn tại tên này";
            } else {
                $name_slug = change_slug($name);
                $categoryid = $_POST['categoryid'];
                if (isset($_POST['price'])) {
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                }
                $description = $_POST['description'];
                $status = $_POST['status'];
                //Xử lý phần ảnh!!!!
                $extension = array('jpeg', 'jpg', 'png', 'gif', 'webp');
                $store = "public/assets/images/product/";
                $imageName = $_FILES['image']['name'];
                $imageTemp = $_FILES['image']['tmp_name'];
                $ext = pathinfo($imageName, PATHINFO_EXTENSION);
                if (in_array($ext, $extension)) {
                    $imageName = time() . '_' . $imageName;
                    move_uploaded_file($imageTemp, $store . $imageName);
                } else {
                    $_SESSION['toastr-code'] = "warning";
                    $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                    header('Location: ' . BASE_URL . '/admin/addproduct');
                    exit();
                }
                $this->product->insertproduct($categoryid, $name, $name_slug, $imageName, $description, $status);
                $product_id = $this->product->selectidproduct();
                if (!isset($galleryName)) {
                    foreach ($_FILES['gallery']['tmp_name'] as $key => $value) {
                        $galleryName = $_FILES['gallery']['name'][$key];
                        $galleryTemp = $_FILES['gallery']['tmp_name'][$key];
                        $ext = pathinfo($galleryName, PATHINFO_EXTENSION);
                        $final_image = '';
                        if (!in_array($ext, $extension)) {
                            $_SESSION['toastr-code'] = "warning";
                            $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                            header('Location: ' . BASE_URL . '/admin/addproduct');
                            exit();
                        } else {
                            $newgalleryName = time() . '_' . $galleryName;
                            move_uploaded_file($galleryTemp, $store . $newgalleryName);
                            $final_image = $newgalleryName;
                            $this->product->insertlistimg($product_id, $final_image);
                        }
                    }
                }
                if (isset($_POST['size_value'])) {
                    $size_value = $_POST['size_value'];
                    foreach ($size_value as $key => $value) {
                        $price_value = $_POST['price_attribute'][$key];
                        $quantity_attr = $_POST['quantity_attribute'][$key];
                        $this->product->insertproduct_type_attr($value, $product_id, $price_value, $quantity_attr);
                    }
                } else {
                    $this->product->insertproduct_type($product_id, $price, $quantity);
                }


                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Thêm thành công";
                header('Location: ' . BASE_URL . '/admin/showproduct');
                exit();
            }
        }
        $this->view(
            "master3",
            [
                "pages" => "adm_addproduct",
                "category" => $this->category->getcategory(),
                "size" => $this->attribute->getSize(),
            ]
        );
    }
    function load_gallery($id)
    {
        $output = '<div class="list_gallery" onclick="getIdimg();">';

        $getgallery = $this->product->getgallery($id);
        foreach ($getgallery as $img) {
            $output .= '<input type="radio" name="closegallery" id="radio_' . $img['id'] . '" value="' . $img['id'] . '" class="radio-close">
        <label for="radio_' . $img['id'] . '" class="radio-close"><i class="fal fa-times"></i></label>
        <img src="' . BASE_URL . '/public/assets/images/product/' . $img['gallery'] . '" alt="Ảnh không tồn tại !" width="100px" height="100px">
        <input type="hidden" name="gallery1" class="form-control" value="' . $img['gallery'] . '">';
        }
        $output .= '</div>';
        echo $output;
    }
    function delimg($idimg)
    {
        $this->product->delete_image($idimg);
    }


    function infoproduct($id)
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_updateproduct",
                "product" => $this->product->infoproduct($id),
                "category" => $this->category->getcategory(),
                "gallery" => $this->product->getimgproduct($id),
                "size" => $this->attribute->getinfoSize($id),
                "size_all" => $this->attribute->getSize(),
                "product_type" => $this->product->getproduct_type_id_admin($id),
            ]
        );
    }


    function fetchproduct()
    {
        if (isset($_POST['action'])) {

            $output = "";
            $product = $this->product->getproductadmin();
            $url = BASE_URL;

            if (!isset($_POST['page'])) {
                $page = 1;
            } else {
                $page = $_POST['page'];
            }
            $totalproduct = count($product);
            $productsperpage = 6;
            $from = ($page - 1) * $productsperpage;
            $totalPage = ceil($totalproduct / $productsperpage);
            $result = $this->product->productadminpage($productsperpage, $from);
            $count = 1;
            $output .= '<table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($result as $item) {
                $attr_prod = $this->product->attribute_product($item['idproduct']);
                $attr_single = $this->product->attribute_single($item['idproduct']);
                $output .= '
                <tr>
                <td>' . $count++ . '</td>
                <td>' . $item['idproduct'] . '</td>
                <td>' . $item['nameproduct'] . '</td>
                <td>
                ';
                foreach ($attr_single as $size_single) :
                    if ($size_single['attribute_id'] === NULL) {
                        $output .= '' . number_format($size_single['price']) . 'đ';
                    }
                endforeach;
                foreach ($attr_prod as $price) :
                    $output .= '' . $price['value'] . ': ' . number_format($price['price']) . 'đ <br/>';
                endforeach;

                $output .=  '</td>
                <td><img src="' . $url . '/public/assets/images/product/' . $item['image'] . '" alt=""> </td>
                <td>';
                foreach ($attr_single as $size_single) :
                    if ($size_single['attribute_id'] === NULL) {
                        $output .= '' . $size_single['quantity'] . ' cái';
                    }
                endforeach;
                foreach ($attr_prod as $price) :
                    $output .= '' . $price['value'] . ': ' . $price['quantity'] . ' cái <br/>';
                endforeach;

                $output .= '</td>
                
                <td>';
                if ($item['status'] == 1) {
                    $output .= '<label class="badge badge-success">Còn hàng</label>';
                } else {
                    $output .= '<label class="badge badge-danger">Hết hàng</label>';
                }
                $output .= '</td>
                <td>
                <a class="btn btn-primary" href="' . $url . '/admin/infoproduct/' . $item['idproduct'] . '">
                    <i class="fal fa-money-check-edit"></i>
                </a>
                <a class="btn btn-danger btn__delete" href="' . $url . '/admin/deleteproduct/' . $item['idproduct'] . '">
                    <i class="fal fa-trash-alt"></i>
                </a>
            </td>
                </tr>
                ';
            }
            $output .= '
            </tbody>
            </table>';
            if ($totalproduct > $productsperpage) {
                $output .= '
                            <div style="display: flex; justify-content:center;" class="click-page">
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
    function updateproduct()
    {
        if (isset($_POST['btn__submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $name_slug = change_slug($name);
            $check = $this->category->checkexistname('products', $name, $id);
            $checkorder = $this->product->checkproductorder($id);
            // if ($checkorder > 0) {
            //     $_SESSION['toastr-code'] = "warning";
            //     $_SESSION['toastr-noti'] = "Sản phảm này đã tồn tại trong đơn hàng";
            //     header('Location: ' . BASE_URL . '/admin/infoproduct/' . $id);
            // } else
            if ($check != 0) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã tồn tại sản phẩm này";
                header('Location: ' . BASE_URL . '/admin/infoproduct/' . $id);
            } else {
                $categoryid = $_POST['categoryid'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                //Xử lý phần ảnh!!!!
                $extension = array('jpeg', 'jpg', 'png', 'gif', 'webp');
                $store = "public/assets/images/product/";
                $imageName = $_FILES['image']['name'];
                $imageTemp = $_FILES['image']['tmp_name'];
                $this->product->updateproduct($categoryid, $name, $name_slug, $description, $status, $id);
                if (!empty($imageName)) {
                    $ext = pathinfo($imageName, PATHINFO_EXTENSION);
                    if (in_array($ext, $extension)) {
                        $imageName = time() . '_' . $imageName;
                        move_uploaded_file($imageTemp, $store . $imageName);
                        $this->product->updateimg($imageName, $id);
                    } else {
                        $_SESSION['toastr-code'] = "warning";
                        $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                        header('Location: ' . BASE_URL . '/admin/infoproduct/' . $id);
                        return;
                    }
                }
                if ($categoryid != 19) {
                    $this->product->delete_product_type($id);
                } else {
                    $size_value = $_POST['size_value'];
                    $this->product->delete_product_type($id);
                    foreach ($size_value as $key => $value) {
                        $price_value = $_POST['price_attribute'][$key];
                        $quantity_attr = $_POST['quantity_attribute'][$key];
                        $this->product->insertproduct_type_attr($value, $id, $price_value, $quantity_attr);
                    }
                }
                if ($_POST['price'] != "") {
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $this->product->insertproduct_type($id, $price, $quantity);
                }
                if (($_FILES['gallery']['name'][0]) !== "") {
                    foreach ($_FILES['gallery']['tmp_name'] as $key => $value) {
                        $galleryName = $_FILES['gallery']['name'][$key];
                        $galleryTemp = $_FILES['gallery']['tmp_name'][$key];
                        $ext = pathinfo($galleryName, PATHINFO_EXTENSION);
                        $final_image = '';
                        if (in_array($ext, $extension)) {
                            $newgalleryName = time() . '_' . $galleryName;
                            move_uploaded_file($galleryTemp, $store . $newgalleryName);
                            $final_image = $newgalleryName;
                            $this->product->insertlistimg($id, $final_image);
                        } else {
                            $_SESSION['toastr-code'] = "warning";
                            $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                            header('Location: ' . BASE_URL . '/admin/infoproduct/' . $id);
                            return;
                        }
                    }
                }
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Cập nhật thành công";
                header('Location: ' . BASE_URL . '/admin/infoproduct/' . $id);
            }
        }
    }



    function deleteproduct($id)
    {
        $check = $this->product->checkproductorder($id);
        if ($check > 0) {
            $_SESSION['toastr-code'] = "warning";
            $_SESSION['toastr-noti'] = "Sản phảm này đã tồn tại trong đơn hàng";
            header('Location: ' . BASE_URL . '/admin/showproduct');
            exit();
        } else {
            $this->product->delete_product('prod_image', 'productid', $id);
            $this->product->delete_product('product_type', 'product_id', $id);
            $this->product->delete_product('products', 'id', $id);
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Xóa thành công";
            header('Location: ' . BASE_URL . '/admin/showproduct');
            exit();
        }
    }
    // END - PRODUCT


    // START - ATTRIBUTE
    function showattr()
    {

        $this->view(
            "master3",
            [
                "pages" => "adm_showattr",
                "attribute" => $this->attribute->showattribute(),
            ]
        );
    }

    function addattribute()
    {
        if (isset($_POST['btn__submit'])) {
            $name_value = $_POST['name_value'];
            $attr_value = $_POST['attr_value'];
            if ($attr_value == "") {
                $_SESSION['toastr-code'] = "error";
                $_SESSION['toastr-noti'] = "Không được bỏ trống giá trị";
                header('Location: ' . BASE_URL . '/admin/addattribute');
                exit();
            }
            $this->attribute->insertattribute($name_value, $attr_value);
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Thêm thành công";
            header('Location: ' . BASE_URL . '/admin/showattr');
            exit();
        }

        $this->view(
            "master3",
            [
                "pages" => "adm_addattr",
                "category" => $this->category->getcategory(),
            ]
        );
    }

    function infoattribute($id)
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_updateattr",
                "attribute" => $this->attribute->infoattribute($id),
                "category" => $this->category->getcategory(),
            ]
        );
    }

    function updateattribute()
    {
        if (isset($_POST['btn__submit'])) {
            $id = $_POST['id'];
            $attribute_id = $this->attribute->getproduct_type();
            foreach ($attribute_id as $item) {
                if ($item['attribute_id'] === $id) {
                    $_SESSION['toastr-code'] = "error";
                    $_SESSION['toastr-noti'] = "Không thể cập nhật, đã có sản phẩm chứa thuộc tính này";
                    header('Location: ' . BASE_URL . '/admin/showattr');
                    exit();
                }
            }
            $name = $_POST['name_value'];
            $value = $_POST['attr_value'];
            $this->attribute->updateattribute($name, $value, $id);
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Cập nhật thành công";
            header('Location: ' . BASE_URL . '/admin/showattr');
            exit();
        }
    }

    function deleteattribute($id)
    {
        $attribute_id = $this->attribute->getproduct_type();
        foreach ($attribute_id as $item) {
            if ($item['attribute_id'] === $id) {
                $_SESSION['toastr-code'] = "error";
                $_SESSION['toastr-noti'] = "Không thể xóa, đã có sản phẩm chứa thuộc tính này";
                header('Location: ' . BASE_URL . '/admin/showattr');
                exit();
            }
        }
        $this->attribute->deleteattribute($id);
        $_SESSION['toastr-code'] = "success";
        $_SESSION['toastr-noti'] = "Xóa thành công";
        header('Location: ' . BASE_URL . '/admin/showattr');
        exit();
    }

    // END - ATTRIBUTE

    // START - COUPON

    // --- show
    function showcoupon()
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_showcoupon",
                "coupon" => $this->coupon->getcouponhome(),
            ]
        );
    }

    // --- add  

    function addcoupon()
    {
        if (isset($_POST['btn__submit'])) {
            $name = $_POST['name'];
            $code = $_POST['code'];
            $discout = $_POST['coupon_value'];
            $quantity = $_POST['quantity'];
            $min_order = $_POST['min_order_new'];
            $date_created = $_POST['date_created'];
            $date_out = $_POST['date_out'];
            $status = $_POST['status'];
            if ($name == '' || $code == '' || $discout == '' || $quantity == '' || $min_order == '' || $date_created == '' || $date_out == '') {
                $_SESSION['toastr-code'] = "info";
                $_SESSION['toastr-noti'] = "Vui lòng nhập đầy đủ thông tin";
            } else if ($discout > $min_order) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đơn hàng tối thiếu phải lớn hơn số tiền giảm giá";
            } else {
                $this->coupon->insertcoupon($name, $code, $discout, $min_order, $quantity, $date_created, $date_out, $status);
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Thêm thành công mã giảm giá";
                header('Location: ' . BASE_URL . '/admin/showcoupon');
                exit();
            }
        }

        $this->view(
            "master3",
            [
                "pages" => "adm_addcoupon",
            ]
        );
    }


    function infocoupon($id)
    {


        $this->view(
            "master3",
            [
                "pages" => "adm_updatecoupon",
                "infocoupon" => $this->coupon->infocoupon($id),

            ]
        );
    }

    function updatecoupon()
    {
        if (isset($_POST['btn__submit'])) {
            $id = $_POST['id'];
            $check = $this->coupon->checkdelcoupon($id);
            if ($check > 0) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Mã giảm giá đã được sử dụng không thể cập nhật";
                header('Location: ' . BASE_URL . '/admin/showcoupon');
            } else {
                $name = $_POST['name'];
                $code = $_POST['code'];
                $discout = $_POST['coupon_value'];
                $quantity = $_POST['quantity'];
                $min_order = $_POST['min_order_new'];
                $date_created = $_POST['date_created'];
                $date_out = $_POST['date_out'];
                $status = $_POST['status'];
                if ($name == '' || $code == ''  || $discout == '' || $quantity == '' || $min_order == '' || $date_created == '' || $date_out == '') {
                    $_SESSION['toastr-code'] = "info";
                    $_SESSION['toastr-noti'] = "Vui lòng nhập đầy đủ thông tin";
                } else {
                    $this->coupon->updatecoupon($name, $code, $discout, $min_order, $quantity, $date_created, $date_out, $status, $id);
                    $_SESSION['toastr-code'] = "success";
                    $_SESSION['toastr-noti'] = "Cập nhật thành công";
                    header('Location: ' . BASE_URL . '/admin/showcoupon');
                }
            }
        }
    }

    function deletecoupon($id)
    {
        $check = $this->coupon->checkdelcoupon($id);
        if ($check > 0) {
            $_SESSION['toastr-code'] = "warning";
            $_SESSION['toastr-noti'] = "Mã giảm giá đã được sử dụng";
        } else {
            $this->coupon->delcoupon($id);
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Xóa thành công";
        }
        header('Location:' . BASE_URL . '/admin/showcoupon');
        exit();
    }
    // --- get coupon
    function getcoupon()
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $res = "G6";
        for ($i = 0; $i < 5; $i++) {
            $res .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        echo $res;
    }


    // END - COUPON


    // START - ORDER
    function order($stt)
    {
        $_SESSION['status_back_order'] = $stt;
        $status = 1;
        $title = "";
        switch ($stt) {
            case 'unprogress':
                $title = "Đơn hàng chưa xử lý";
                $status = 1;
                break;
            case 'processing':
                $title = "Đơn hàng đang xử lý";
                $status = 2;
                break;
            case 'progress':
                $title = "Đơn hàng đang giao";
                $status = 3;
                break;
            case 'progressed':
                $title = "Đơn hàng đã giao";
                $status = 4;
                break;
        }


        $this->view("master3", [
            "pages" => "adm_showorder",
            "order" => $this->account->status_order($status),
            "title" => $title,
            "status" => $status,
        ]);
    }

    public function orderdetail($id)
    {

        $this->view(
            "master3",
            [
                "pages" => "adm_orderdetail",
                "inforder" => $this->account->infoOder($id),
                "orderpd" => $this->account->order_pd($id),
                "codeorder" => $id,
            ]
        );
    }
    function update_orderdetail()
    {
        if (isset($_POST['btn__submit'])) {
            $id = $_POST['id'];
            $status = $_POST['status'];
            $this->account->update_orderdetail($status, $id);
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Cập nhật thành công";
            header('Location:' . BASE_URL . '/admin/orderdetail/' . $id);
            exit();
        }
    }

    function deleteorder($id)
    {
        if (isset($id)) {
            $this->account->deleteOrderdetail($id);
            $this->account->deleteOrder($id);
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Đã xóa";
            header('Location:' . BASE_URL . '/admin/order/progressed');
            exit();
        }
    }

    // END - ORDER


    // COMMENT

    function showcomment()
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_showcomment",
                "showcomment" => $this->user->showcommentadmin(),
            ]
        );
    }


    function fetchcomment()
    {
        $result = $this->user->showcommentadmin();
        echo json_encode($result);
    }
    function infocomment($id)
    {

        $this->view(
            "master3",
            [
                "pages" => "adm_updatecomment",
                "infocomment" => $this->user->infocomment($id),

            ]
        );
    }

    function updatecomment()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];
        $check = $this->user->updatecomment($status, $id);
        $_SESSION['toastr-code'] = "success";
        $_SESSION['toastr-noti'] = "Cập nhật thành công";
        header('Location: ' . BASE_URL . '/admin/showcomment');
        if ($check == true) {
        }
    }

    // Blog Start
    function showblog()
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_showblog",
                "blog" => $this->blog->getBlog(),
            ]
        );
    }

    function addblog()
    {
        if (isset($_POST['btn__submit'])) {
            $title = $_POST['title'];
            $title_slug = change_slug($title);
            $description = $_POST['description'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $check = $this->blog->checkexisttitle($title);
            if($check > 0){
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã có tiêu đề bài viết này";
                header('Location: ' . BASE_URL . '/admin/addblog');
                exit();
            }else{
                $extension = array('jpeg', 'jpg', 'png', 'gif', 'webp');
                $store = "public/assets/images/blog/";
                $imageName = $_FILES['image']['name'];
                $imageTemp = $_FILES['image']['tmp_name'];
                $ext = pathinfo($imageName, PATHINFO_EXTENSION);
                if (in_array($ext, $extension)) {
                    $imageName = time() . '_' . $imageName;
                    move_uploaded_file($imageTemp, $store . $imageName);
                    $this->blog->insertblog($title, $title_slug, $description, $content, $imageName, $status);
                    $_SESSION['toastr-code'] = "success";
                    $_SESSION['toastr-noti'] = "Thêm thành công";
                    header('Location: ' . BASE_URL . '/admin/showblog');
                } else {
                    $_SESSION['toastr-code'] = "warning";
                    $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                    header('Location: ' . BASE_URL . '/admin/addblog');
                    exit();
                }
            }
        }

        $this->view(
            "master3",
            [
                "pages" => "adm_addblog",
            ]
        );
    }

    function infoblog($id)
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_updateblog",
                "blog" => $this->blog->getblogidadmin($id),
            ]
        );
    }

    function updateblog()
    {
        if (isset($_POST['btn__submit'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $title_slug = change_slug($title);
            $description = $_POST['description'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            //     //Xử lý phần ảnh!!!!
            $check = $this->blog->checkexisttitle($title,$id);
            if($check == 1){
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã có tiêu đề bài viết này";
                header('Location: ' . BASE_URL . '/admin/infoblog/' . $id. '');
            }else{
                $extension = array('jpeg', 'jpg', 'png', 'gif', 'webp');
                $store = "public/assets/images/blog/";
                $imageName = $_FILES['image']['name'];
                $imageTemp = $_FILES['image']['tmp_name'];
                $ext = pathinfo($imageName, PATHINFO_EXTENSION);
                $this->blog->updateblog($title, $title_slug, $description, $content, $status, $id);
                if (!empty($imageName)) {
                    if (in_array($ext, $extension)) {
                        $imageName = time() . '_' . $imageName;
                        move_uploaded_file($imageTemp, $store . $imageName);
                        $this->blog->updateimageblog($imageName, $id);
                    } else {
                        $_SESSION['toastr-code'] = "warning";
                        $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                        header('Location: ' . BASE_URL . '/admin/infoblog/' . $id. '');
                        exit();
                    }
                }
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Sửa thành công";
                header('Location: ' . BASE_URL . '/admin/showblog');
                exit();
            }
        }
    }

    function deleteblog($id)
    {

        $this->blog->deleteblog($id);
        $_SESSION['toastr-code'] = "success";
        $_SESSION['toastr-noti'] = "Xóa thành công";
        header('Location:' . BASE_URL . '/admin/showblog');
        exit();
    }
    // END BLOG

    // show chat
    // show chat
    function showchat()
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_showchat",
                "chat" => $this->user->showChatForAdmin(),
            ]
        );
    }

    function addChat($id)
    {
        $out_id = $id;
        $fullname = $_SESSION['user_infor']['user_name'];
        $in_id = $this->user->idComment($fullname)['id'];
        if (isset($_POST['send'])) {
            $content = $_POST['content'];
            $this->user->addChat($in_id, $out_id, $content);
        }

        $this->view(
            "master3",
            [
                "pages" => "adm_addchat",
                "id" => $id,
                "view" => $this->user->view($in_id, $id),
            ]
        );
    }

    function SelectMsg($id)
    {
        $output = "";
        $out_id = $id;
        $fullname = $_SESSION['user_infor']['user_name'];
        $in_id = $this->user->idComment($fullname)['id'];
        $result = $this->user->view($in_id, $out_id);

        foreach ($result as $row) {
            if ($row['out_msg_id'] != 3) {
                $output .= '
                              <div class="member-text">
                                  <p>' . $row['content'] . '</p>
                              </div>';
            } else {
                $output .= '<div class="admin-text"> 
                                  <p>' . $row['content'] . '</p> 
                              </div>
                              ';
            }
        }
        echo $output;
    }


    function deletechat($id)
    {
        $this->user->deletechat($id);
        $_SESSION['toastr-code'] = "success";
        $_SESSION['toastr-noti'] = "Xóa thành công";
        header('Location:' . BASE_URL . '/admin/showchat');
        exit();
    }
    // END chat

    function chart()
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_chart",
                "countproduct" => $this->chart->productincat(),
                "countcomment" => $this->chart->countcomment(),

            ]
        );
    }

    function chartdate()
    {

        if (isset($_POST['action'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
            $result = $this->chart->filterbydate($fromdate, $todate);
            foreach ($result as $value) {
                $chart_data[] = array(
                    'quantity' => $value['quantity'],
                    'total' => $value['total'],
                    'date' => $value['created_at'],
                );
            }
            echo json_encode($chart_data);
        }
    }

    function getorderdays()
    {
        $result = $this->chart->chartdays();
        foreach ($result as $value) {
            $chart_data[] = array(
                'quantity' => $value['quantity'],
                'total' => $value['total'],
                'date' => $value['created_at'],
            );
        }
        echo json_encode($chart_data);
    }
}
