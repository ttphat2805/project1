<?php

class usermodels extends db
{
    function showComment(){
        $query = "SELECT a.id,a.fullname,a.username,b.memberid,b.id,b.content,b.date,b.status from member a INNER JOIN comments b on a.id = b.memberid where a.id > 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function idComment($username){
        $query = "SELECT * FROM member where username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    function insertComment($memberid,$productid,$content){
        $query = "INSERT comments(memberid,productid,content)
        values ('$memberid','$productid','$content');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}

?>