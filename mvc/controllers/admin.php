<?php
class Admin extends Controller
{
    public $category;
    public $product;
    public $member;
    public $cart;
    public $attribute;
    public $coupon;
    public $user;



    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->category = $this->model("categorymodels");
        $this->attribute = $this->model("attributemodels");
        $this->coupon = $this->model("couponmodels");
        $this->user = $this->model("usermodels");
    }
    function show()
    {
        if (!isset($_SESSION['user_infor'])) {
            header('Location:' . BASE_URL . '/auth/login');
            exit();
        }
        $this->view(
            "master3",
            [
                "pages" => "adm_homepage",
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
                $this->user->updatestatus($status, $role,$id);
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
                echo $name_slug;
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
                    $this->product->insertproduct($categoryid, $name, $name_slug, $imageName, $description, $status);
                } else {
                    $_SESSION['toastr-code'] = "warning";
                    $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                    header('Location: ' . BASE_URL . '/admin/addproduct');
                    exit();
                }
                $product_id = $this->product->selectidproduct();

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

                if (!isset($galleryName)) {
                    foreach ($_FILES['gallery']['tmp_name'] as $key => $value) {
                        $galleryName = $_FILES['gallery']['name'][$key];
                        $galleryTemp = $_FILES['gallery']['tmp_name'][$key];
                        $ext = pathinfo($galleryName, PATHINFO_EXTENSION);
                        // echo $ext.'duoi file';
                        // print_r($galleryName);
                        $final_image = '';

                        if (in_array($ext, $extension)) {
                            $newgalleryName = time() . '_' . $galleryName;
                            move_uploaded_file($galleryTemp, $store . $newgalleryName);
                            $final_image = $newgalleryName;
                            $this->product->insertlistimg($product_id, $final_image);
                        } else {
                            $_SESSION['toastr-code'] = "warning";
                            $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                            header('Location: ' . BASE_URL . '/admin/addproduct');
                            exit();
                        }
                    }

                    $_SESSION['toastr-code'] = "success";
                    $_SESSION['toastr-noti'] = "Thêm thành công";
                    header('Location: ' . BASE_URL . '/admin/showproduct');
                    exit();
                }
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
                "product_type" => $this->product->getproduct_type_id($id),
            ]
        );
    }

    function updateproduct()
    {
        if (isset($_POST['btn__submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $name_slug = change_slug($name);
            $check = $this->category->checkexistname('products', $name, $id);
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
                    }
                }
                if ($categoryid !== 19) {
                    $this->product->delete_product_type($id);
                }
                if ($categoryid == 19) {
                    $size_value = $_POST['size_value'];
                    $this->product->delete_product_type($id);
                    foreach ($size_value as $key => $value) {
                        $price_value = $_POST['price_attribute'][$key];
                        $quantity_attr = $_POST['quantity_attribute'][$key];
                        $this->product->insertproduct_type_attr($value, $id, $price_value, $quantity_attr);
                    }
                }
                if ($_POST['price'] != 0) {
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $this->product->insertproduct_type($id, $price, $quantity);
                }

                // $this->product->delete_image($id);
                if (!empty($_FILES['gallery'])) {
                    foreach ($_FILES['gallery']['tmp_name'] as $key => $value) {
                        $galleryName = $_FILES['gallery']['name'][$key];
                        $galleryTemp = $_FILES['gallery']['tmp_name'][$key];
                        $ext = pathinfo($galleryName, PATHINFO_EXTENSION);
                        $final_image = '';
                        if (in_array($ext, $extension)) {
                            $newgalleryName = time() . '_' . $galleryName;
                            // echo $newgalleryName;
                            move_uploaded_file($galleryTemp, $store . $newgalleryName);
                            $final_image = $newgalleryName;
                            $this->product->insertlistimg($id, $final_image);
                        }
                    }
                }
                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Cập nhật thành công";
                header('Location: ' . BASE_URL . '/admin/infoproduct/' . $id);
                exit();
            }
        }
    }



    function deleteproduct($id)
    {
        $this->product->delete_product('prod_image', 'productid', $id);
        $this->product->delete_product('product_type', 'product_id', $id);
        $this->product->delete_product('products', 'id', $id);
        $_SESSION['toastr-code'] = "success";
        $_SESSION['toastr-noti'] = "Xóa thành công";
        header('Location: ' . BASE_URL . '/admin/showproduct');
        exit();
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
            $type = $_POST['type'];
            $discout = $_POST['coupon_value'];
            $quantity = $_POST['quantity'];
            $min_order = $_POST['min_order'];
            $date_created = $_POST['date_created'];
            $date_out = $_POST['date_out'];
            $status = $_POST['status'];
            if ($name == '' || $code == '' || $type == '' || $discout == '' || $quantity == '' || $min_order == '' || $date_created == '' || $date_out == '') {
                $_SESSION['toastr-code'] = "info";
                $_SESSION['toastr-noti'] = "Vui lòng nhập đầy đủ thông tin";
            } else {
                $this->coupon->insertcoupon($name, $code, $discout, $type, $min_order, $quantity, $date_created, $date_out, $status);

                $_SESSION['toastr-code'] = "success";
                $_SESSION['toastr-noti'] = "Thêm thành công mã giảm giá";
                header('Location: ' . BASE_URL . '/admin/showcoupon');
            }
        }

        $this->view(
            "master3",
            [
                "pages" => "adm_addcoupon",
            ]
        );
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
    function showblog(){
        $this->view(
            "master3",
            [
                "pages" => "adm_showblog",
                "blog" => $this->blog->getBlog(),
            ]
        );
    }

    function addblog(){
        if(isset($_POST['btn__submit'])){
            $title = $_POST['title'];
            $title_slug = change_slug($title);
            $description = $_POST['description'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            // exit();
        //     //Xử lý phần ảnh!!!!
            $extension = array('jpeg', 'jpg', 'png', 'gif', 'webp');
            $store = "public/assets/images/blog/";
            $imageName = $_FILES['image']['name'];
            $imageTemp = $_FILES['image']['tmp_name'];
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
                $imageName = time() . '_' . $imageName;
                move_uploaded_file($imageTemp, $store . $imageName);
                $this->blog->insertblog($title,$title_slug,$description,$content,$imageName,$status);
            } else {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                header('Location: ' . BASE_URL . '/admin/addblog');
                exit();
            }
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Thêm thành công";
            header('Location: ' . BASE_URL . '/admin/showblog');
            exit();
        }

        $this->view(
            "master3",
            [
                "pages" => "adm_addblog",
            ]
        );
    }

    function infoblog($id){
        $this->view(
            "master3",
            [
                "pages" => "adm_updateblog",
                "blog" =>$this->blog->getblogid($id),
            ]
        );
    }

    function updateblog(){
        if(isset($_POST['btn__submit'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $title_slug = change_slug($title);
            $description = $_POST['description'];
            $content = $_POST['content'];
            $status = $_POST['status'];
        //     //Xử lý phần ảnh!!!!
            $extension = array('jpeg', 'jpg', 'png', 'gif', 'webp');
            $store = "public/assets/images/blog/";
            $imageName = $_FILES['image']['name'];
            $imageTemp = $_FILES['image']['tmp_name'];
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $this->blog->updateblog($title,$title_slug,$description, $content, $status,$id);
            if(!empty($imageName)){
                if (in_array($ext, $extension)) {
                    $imageName = time() . '_' . $imageName;
                    move_uploaded_file($imageTemp, $store . $imageName);
                    $this->blog->updateimageblog($imageName,$id);
                } else {
                    $_SESSION['toastr-code'] = "warning";
                    $_SESSION['toastr-noti'] = "File này không phải là file ảnh";
                    header('Location: ' . BASE_URL . '/admin/updateblog');
                    exit();
                }
            }
            $_SESSION['toastr-code'] = "success";
            $_SESSION['toastr-noti'] = "Sửa thành công";
            header('Location: ' . BASE_URL . '/admin/showblog');
            exit();
        }



        
    }

    function deleteblog($id){

        $this->blog->deleteblog($id);
        $_SESSION['toastr-code'] = "success";
        $_SESSION['toastr-noti'] = "Xóa thành công";
        header('Location:' . BASE_URL . '/admin/showblog');
        exit();
    }
    // END BLOG

    // show chat
    function showchat(){
        $this->view(
            "master3",
            [
                "pages" => "adm_showchat",
                "chat" => $this->user->showChatForAdmin(),
            ]
        );
    }

    function addChat($id){
        $in_id = 3;
        if(isset($_POST['send'])){
            $content = $_POST['content'];
            $this->user->addChat($in_id,$id,$content);
        }
        
        $this->view(
            "master3",
            [
                "pages" => "adm_addchat",
                "view" => $this->user->view($in_id,$id),
            ]
        );
    }

    // END chat
}
