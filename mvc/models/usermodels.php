<<<<<<< HEAD
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
=======
<?php 

class usermodels extends db {

    public function findUserByEmail($email) {
        $sql = "SELECT * FROM `user_account` WHERE username like :email";

        $query = $this->conn->prepare($sql);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->execute();
        $query->fetchAll(PDO::FETCH_ASSOC);
        return $query->rowCount();
    }

    public function insertMember($name, $email){
        $sql = "insert into `member` (`fullname`,`email`) values (:name, :email)";
        $query = $this->conn->prepare($sql);
        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        return $query->execute();
    }

    public function registerUserAccount($data) {
        $fullname = $data['first_name']." ".$data['last_name'];
        $email = $data['email'];
        
        $pass = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->insertMember($fullname, $data['email']);
        $sql = "
            INSERT INTO `user_account`(`memberid`, `username`, `password`) 
            VALUES (LAST_INSERT_ID(),:username,:password)
        ";
        $query = $this->conn->prepare($sql);
        $query->bindValue(":username",$email, PDO::PARAM_STR);
        $query->bindValue(":password",$pass,PDO::PARAM_STR);
        return $query->execute();

    }

    public function findUserAccount($data){
        $sql = "select * from `user_account` where `username` like :username";
        $query = $this->conn->prepare($sql);
        $query->bindValue(":username",$data['username'], PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function changePassword($email, $newpass) {
        $newpass = password_hash($newpass, PASSWORD_DEFAULT);
        $sql = "UPDATE `user_account` SET `password` = :newpass WHERE `username` like :username";

        $query = $this->conn->prepare($sql);
        $query->bindValue(":newpass", $newpass, PDO::PARAM_STR);
        $query->bindValue(":username", $email, PDO::PARAM_STR);

        return $query->execute();
    }

    public function getMemberInforById($id) {
        $sql = 'select * from `member` where `id` like :id';
        $query = $this->conn->prepare($sql);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findFacebookAccount($id) {
        $sql = "select * from `facebook_account` where `facebook_id` like :id";
        $query = $this->conn->prepare($sql);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->rowCount();
    }

    public function createFacebookAccount($user_info) {
        $this->insertMember($user_info->name,'');
        $sql = "INSERT INTO `facebook_account`(`memberid`, `facebook_id`) values (LAST_INSERT_ID(),:id)";
        $query = $this->conn->prepare($sql);
        $query->bindValue(":id",$user_info->id, PDO::PARAM_INT);
        try{
            $query->execute();
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function createGoogleAccount($user_info) {
        $this->insertMember($user_info['name'],'');
        $sql = "INSERT INTO `google_account`(`memberid`, `google_id`) values (LAST_INSERT_ID(),:id)";
        $query = $this->conn->prepare($sql);
        $query->bindValue(":id",$user_info['sub'], PDO::PARAM_INT);
        try{
            $query->execute();
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function findGoogleAccount($id) {
        $sql = "select * from `google_account` where `google_id` like :id";
        $query = $this->conn->prepare($sql);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->rowCount();
    }

    public function getInforSocailAcccount($id, $table) {
        $table_name = $table.'_account';
        $table_id = $table.'_id';
        $sql = "select B.id, B.fullname, B.mobile, B.email from `$table_name` A inner join `member` B on A.memberid = B.id where A.$table_id = $id ";
        $query = $this->conn->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
>>>>>>> main
