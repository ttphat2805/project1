<?php
Class attributemodels extends db{
    function insertattribute($name_value,$attr_value){
        $query = "INSERT INTO attribute(name,value) values(:name,'$attr_value')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":name",$name_value,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
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

    function deleteattribute($id){
        $query = "DELETE FROM attribute where id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
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
    
    function getproduct_type(){
        $query = "SELECT attribute_id FROM product_type";
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

    function getsizedetail($table,$size,$id){
        $query = "SELECT $table FROM product_type a inner join attribute b on a.attribute_id = b.id where b.value = ? and a.product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$size,$id]);
        return $stmt->fetch()[$table];
    }

}