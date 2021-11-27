<?php 
class categorymodels extends db{
    function getcategory(){
        $query = "SELECT * FROM category where status = 1";
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
    function addcategory($name,$name_slug,$status){
        $query = "insert category(name,slug,status) values (:name,:slug,$status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":slug",$name_slug,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
    function infocategory($id){
        $query = "SELECT * FROM category where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function updatecategory($name, $name_slug, $status,$id){
        $query = "update category set name= ?,slug = ?, status= ? where id= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name,$name_slug,$status,$id]);
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