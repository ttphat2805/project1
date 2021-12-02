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
}
?>