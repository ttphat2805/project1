<?php
class productmodels extends db
{
    function getproduct()
    {
        $query = "SELECT * FROM products where status = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getattradmin()
    {
        $query = "SELECT a.id as 'idproduct',a.name as 'nameproduct',a.image,a.description,a.status,b.id as 'idproduct_type',b.price,b.quantity,c.name as 'nameattr',c.value FROM products a inner join product_type b on b.product_id = a.id inner join attribute c on b.attribute_id = c.id where b.product_id = a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getproductadmin()
    {
        $query = "SELECT a.id as 'idproduct',a.name as 'nameproduct',a.image,a.description,a.status,b.id as 'idproduct_type',b.price,b.quantity,c.name as 'nameattr',c.value FROM products a inner join product_type b on b.product_id = a.id inner join attribute c on b.attribute_id = c.id group by a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function insertproduct($categoryid, $name, $imageName, $description, $status)
    {
        $query = "INSERT INTO products(categoryid,name,image,description,status) 
            values ('$categoryid','$name','$imageName','$description','$status')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
    function insertproduct_type_attr($value, $product_id,$price_attr,$quantity_attr)
    {
        $query = "INSERT INTO product_type(attribute_id,product_id,price,quantity) 
            values ('$value','$product_id','$price_attr','$quantity_attr')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function insertproduct_type($product_id,$price_attr,$quantity_attr)
    {
        $query = "insert into product_type(product_id,price,quantity) 
            values ('$product_id','$price_attr','$quantity_attr')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function insertlistimg($productid, $final_image){
        $query = "INSERT INTO prod_image(productid,gallery) values ('$productid','$final_image')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function selectidproduct(){
        $query = "SELECT id from products order by id desc limit 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch()['id'];
    
    }

  
}
