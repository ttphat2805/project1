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
        $query = "SELECT a.id as 'idproduct',a.name as 'nameproduct',a.categoryid as 'category_id',a.image,a.description,a.status,b.id as 'idproduct_type',b.price,b.quantity FROM products a inner join product_type b on b.product_id = a.id group by a.id";
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
    function insertproduct_type_attr($value, $product_id, $price_attr, $quantity_attr)
    {
        $query = "INSERT INTO product_type(attribute_id,product_id,price,quantity) 
            values ('$value','$product_id','$price_attr','$quantity_attr')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function insertproduct_type($product_id, $price_attr, $quantity_attr)
    {
        $query = "insert into product_type(product_id,price,quantity) 
            values ('$product_id','$price_attr','$quantity_attr')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function insertlistimg($id, $final_image)
    {
        $query = "INSERT INTO prod_image(productid,gallery) values ('$id','$final_image')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function selectidproduct()
    {
        $query = "SELECT id from products order by id desc limit 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch()['id'];
    }
    function infoproduct($id)
    {
        $query = "SELECT * FROM products where id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    function getimgproduct($id)
    {
        $query = "SELECT * FROM prod_image where productid = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getproduct_type_id($id)
    {
        $query = "SELECT * FROM product_type where product_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    function getproduct_home()
    {
        $query = "SELECT a.id as 'idproduct',a.name,a.image,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id group by a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getproductdetails($id)
    {
        $query = "SELECT a.quantity,b.id as 'idproduct',b.name,b.image,b.description,b.views,a.*,c.* FROM product_type a inner join products b on a.product_id = b.id inner join prod_image c on c.productid = b.id where b.id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
    function getproductdetailall($id)
    {
        $query = "SELECT b.id as 'idproduct',b.name,b.image,b.description,b.views,a.*,c.* FROM 
        product_type a inner join products b on a.product_id = b.id inner join prod_image c on c.productid = b.id where b.id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_gallery_image($id){
        $query = "SELECT * FROM prod_image where productid = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function updateviews($id)
    {
        $query = "UPDATE products set views=views+1 where id=$id";
        $dm = $this->conn->prepare($query);
        $dm->execute();
    }


    function updateproduct($categoryid, $name, $description, $status,$id)
    {
        $query = "UPDATE products SET categoryid =?, name = ?,description = ?, status = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$categoryid, $name,  $description, $status,$id]);
    }

    function updateimg($imgname){
        $query = "UPDATE products set image = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$imgname]);
    }
    function delete_product_type($id){
        $query = "DELETE FROM product_type WHERE product_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function getgallery($id){
        $query = "SELECT * FROM prod_image WHERE productid = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    function delete_image($id){
        $query = "DELETE FROM prod_image WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
    }

    function delete_product($table, $where, $id){
        $query = "DELETE FROM $table WHERE $where = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }


}