<?php 
class categorymodels extends db{
    function getcategory(){
        $query = "SELECT * FROM category";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function checkexistname($table,$name,$id = 0){
        $query = "SELECT * FROM $table WHERE name = ? and id!=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name,$id]);
        return $stmt->rowCount();
    }
    function addcategory($name,$status){
        $query = "insert category(name,status) values ('$name','$status')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function infocategory($id){
        $query = "SELECT * FROM category where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function updatecategory($id, $name, $status){
        $query = "update category set name= ?,status= ? where id= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name,$status,$id]);
    }

    function delcategory($id){
        $query = "DELETE from category where id=$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function checkpdcategory($id){
        $selectpd = "SELECT * FROM products WHERE categoryid = ?";
        $stmt = $this->conn->prepare($selectpd);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}