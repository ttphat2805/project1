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

    function countproduct(){
        $query = "SELECT * FROM products";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
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

    function insertproduct($categoryid, $name, $name_slug, $imageName, $description, $status)
    {
        $query = "INSERT INTO products(categoryid,name,slug,image,description,status) 
            values (:categoryid,:name,:slug,:imageName,:description,:status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":categoryid", $categoryid, PDO::PARAM_INT);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":slug", $name_slug, PDO::PARAM_STR);
        $stmt->bindValue(":imageName", $imageName, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":status", $status, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt;
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

    function getproduct_home($search)
    {
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.image,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.name like '%$search%' and a.status = 1 group by a.id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getproductsite()
    {
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.image,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.status = 1 group by a.id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getproduct_trend()
    {
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.image,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.status = 1 group by a.id order by views desc limit 10";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getproductdetails($id)
    {
        $query = "SELECT a.quantity,b.id as 'idproduct',b.name,b.slug,b.image,b.description,b.views,a.*,c.* FROM product_type a inner join products b on a.product_id = b.id inner join prod_image c on c.productid = b.id where b.id = $id";
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

    function get_gallery_image($id)
    {
        $query = "SELECT * FROM prod_image where productid = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getProductId($slug)
    {
        $query = "SELECT id FROM `products` WHERE slug = '$slug' and status = 1";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result->fetch()['id'];
    }
    function updateviews($id)
    {
        $query = "UPDATE products set views=views+1 where id=$id";
        $dm = $this->conn->prepare($query);
        $dm->execute();
    }


    function updateproduct($categoryid, $name, $name_slug, $description, $status, $id)
    {
        $query = "UPDATE products SET categoryid =?, name = ?,slug = ?, description = ?, status = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$categoryid, $name, $name_slug,  $description, $status, $id]);
    }

    function updateimg($imgname, $id)
    {
        $query = "UPDATE products set image = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$imgname, $id]);
    }
    function delete_product_type($id)
    {
        $query = "DELETE FROM product_type WHERE product_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function getgallery($id)
    {
        $query = "SELECT * FROM prod_image WHERE productid = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function delete_image($id)
    {
        $query = "DELETE FROM prod_image WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
    }


    function delete_product($table, $where, $id){
        $query = "DELETE FROM $table WHERE $where = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
    function getproducts_detail_attr($id)
    {
        $query = "SELECT a.*,b.id as 'idattr',b.value,b.name from attribute b inner join product_type a on b.id = a.attribute_id where a.product_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getproducts_type_id($id)
    {
        $query = "SELECT * FROM product_type where product_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    function searchproducts($value)
    {
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.image,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.name like '%$value%' and a.status = 1 group by a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function filltercategory($id)
    {
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.categoryid,a.image,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.categoryid = $id and a.status = 1 group by a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function productspage($from,$productsperpage,$search)
    {
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.image,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.name like '%$search%' and a.status = 1 group by a.id
        LIMIT $productsperpage OFFSET $from";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function productcatsearch($from,$productsperpage,$search,$id_category)
    {
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.image,a.categoryid,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.categoryid = $id_category and a.name like '%$search%' and a.status = 1 group by a.id
        LIMIT $productsperpage OFFSET $from";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getsearchname($search){
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.image,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.name like '%$search%' and a.status = 1 group by a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getsearchcategory($search,$id_category){
        $query = "SELECT a.id as 'idproduct',a.name,a.slug,a.image,a.categoryid,a.description,a.views,b.* FROM product_type b inner join products a on b.product_id = a.id where a.categoryid = $id_category and a.name like '%$search%' and a.status = 1 group by a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function productrelated($price,$id){
        $query = "SELECT a.quantity,b.id as 'idproduct',b.name,b.slug,b.image,b.description,b.views,a.*,c.* FROM product_type a inner join products b on a.product_id = b.id inner join prod_image c on c.productid = b.id where a.price between $price - ($price*20/100) and $price + ($price*20/100)  and a.product_id != $id group by a.product_id limit 5";
        $pd = $this->conn->prepare($query);
        $pd->execute();
        return $pd->fetchAll();
    }
}

