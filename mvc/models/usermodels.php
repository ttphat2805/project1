
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

    function showComment($id){
        $query = "SELECT a.id as 'idmember',a.fullname,b.id as 'idcmt',b.product_id,b.member_id,b.content,b.date,b.status from member a INNER JOIN comments b on a.id = b.member_id where b.status = 1 and b.product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    function insertComment($memberid,$productid,$content){
        $query = "INSERT comments(member_id,product_id,content)
                values ('$memberid','$productid','$content');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }


    function userdeletecmt($memberid,$id){
        $query = "DELETE FROM comments WHERE member_id = ? and id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$memberid,$id]);
    }

    function userupdatecmt($memberid,$id,$content){
        $query = "UPDATE comments set content = ? where member_id = ? and id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$content,$memberid,$id]);
    }
    function deleteComment($id){
        $query = "DELETE FROM comments WHERE id=$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

}
