<?php
Class attributemodels extends db{
    function insertattribute($name_value,$attr_value){
        $query = "INSERT INTO attribute(name,value) values('$name_value','$attr_value')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function showattribute(){
        $query = "SELECT * FROM attribute";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function infoattribute($id){
        $query = "SELECT * FROM attribute where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function updateattribute($name,$value,$id){
        $query = "UPDATE attribute SET name = ?, value = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name,$value,$id]);
    }

    function getSize(){
        $query = "SELECT * FROM attribute where name = 'size'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getinfoSize($id){
        $query = "SELECT * FROM product_type where product_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getproduct_detail_attr($id){
        $query = "SELECT a.*,b.id as 'idattr',b.value,b.name from attribute b inner join product_type a on b.id = a.attribute_id where a.product_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}