<?php
Class cartmodels extends db{
    function getCart($id){
        $query = "SELECT a.id as 'idproduct',a.name as 'nameproduct',a.image,a.description,a.status,b.id as 'idproduct_type',b.price,b.quantity FROM products a inner join product_type b on b.product_id = a.id where b.product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    function countcart(){
        $query = "SELECT * FROM orders";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function toporder($limit){
        $query = "SELECT c.quantity,c.price,d.name,d.slug,d.image FROM orders a inner join orderdetail b on a.id=b.order_id
        join product_type c on b.product_type_id = c.id join products d on c.product_id = d.id where a.status = 4 LIMIT $limit";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function toporder_stie($limit){
        $query = "SELECT c.quantity,c.price,d.name,d.slug,d.image FROM orders a inner join orderdetail b on a.id=b.order_id
        join product_type c on b.product_type_id = c.id join products d on c.product_id = d.id where a.status = 4 and c.quantity > 0 LIMIT $limit";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function sale(){
        $query = "SELECT SUM(total) as 'total' FROM `orders` WHERE status = 4";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>