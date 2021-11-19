<?php
class productdetail extends Controller
{
    public $product;
    public $attribute;

    function __construct()
    {
        $this->product = $this->model("productmodels");
        $this->attribute = $this->model("attributemodels");


    }


    function show($id)
    {
        // print_r($this->product->getproduct_type_id($id));

    
        $this->view(
            "master2",
            [
                "pages" => "product_details",
                "detailviews"=>$this->product->updateviews($id),                
                "productdetails" => $this->product->getproductdetails($id),
                "productdetailall" => $this->product->getproductdetailall($id),
                "gallery" => $this->product->get_gallery_image($id),
                "productdetailattr" =>$this->attribute->getproduct_detail_attr($id),
                "product_type" => $this->product->getproduct_type_id($id),
            ]
        );
    }

    function change_price($size){
        $size = $this->attribute->getsizedetail($size);
        $output = number_format($size);
        echo $output;
    }

    function change_oldprice($size){
        $hi = $this->attribute->getsizedetail($size);
        $hi += 12500;
        $output = number_format($hi);
        echo $output;
    }

    function change_quantitysize($size){
        $hi = $this->attribute->getquantitysize($size);
        echo $hi;
    }


}
