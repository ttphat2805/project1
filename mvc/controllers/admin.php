<?php
class Admin extends Controller
{
    public $category;
    public $product;
    public $member;
    public $cart;
    public $attribute;

    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->category = $this->model("categorymodels");
        $this->attribute = $this->model("attributemodels");
    }
    function show()
    {
        $this->view(
            "master3",
            [
                "pages" => "adm_homepage",
            ]
        );
    }
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
            $status = $_POST['status'];
            $check = $this->category->checkexistname('category', $name);
            if ($check == 1) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã tồn tại tên danh mục này";
            } else {
                $this->category->addcategory($name, $status);
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
            $status = $_POST['status'];
            $check = $this->category->checkexistname('category', $name, $id);
            if ($check != 0) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã tồn tại danh mục này";
            } else {
                $this->category->updatecategory($id, $name, $status);
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
                    $this->product->insertproduct($categoryid, $name, $imageName, $description, $status);
                }else{
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
            $output .= '<input type="radio" name="closegallery" id="radio1" value="' . $img['id'] . '" class="radio-close">
            <label for="radio1" class="radio-close"><i class="fal fa-times"></i></label>
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
            $check = $this->category->checkexistname('products', $name, $id);
            if ($check != 0) {
                $_SESSION['toastr-code'] = "warning";
                $_SESSION['toastr-noti'] = "Đã tồn tại danh mục này";
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
                $this->product->updateproduct($categoryid, $name, $description, $status, $id);
                if (!empty($imageName)) {
                    $ext = pathinfo($imageName, PATHINFO_EXTENSION);
                    if (in_array($ext, $extension)) {
                        $imageName = time() . '_' . $imageName;
                        move_uploaded_file($imageTemp, $store . $imageName);
                        $this->product->updateimg($imageName);
                    }else{
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




}
