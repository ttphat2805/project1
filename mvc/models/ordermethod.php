<?php
class ordermethod extends db
{
    public function getOderMethod() {
        $sql = 'select * from `ordermethod` where 1';
        $query = $this->conn->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function insertOder($data) {
        
        if($data['coupon']) {
            $sql = "
            insert into `orders` (`ordermethod_id`,`member_id`,`total`,`fullname`,`address`,`email`,`mobile`,`note`,`coupon_id`) 
            values (:method,:memberid,:total,:name,:address,:email,:phone,:note,".$data['coupon'].");";
        } else {
            $sql = "
            insert into `orders` (`ordermethod_id`,`member_id`,`total`,`fullname`,`address`,`email`,`mobile`,`note`) 
            values (:method,:memberid,:total,:name,:address,:email,:phone,:note);";
        }
       
            
        $query = $this->conn->prepare($sql);
        $query->bindValue(":method", $data['method'], PDO::PARAM_INT);
        $query->bindValue(":memberid", $data['memberid'], PDO::PARAM_INT);
        $query->bindValue(":total", $data['total'], PDO::PARAM_INT);
        $query->bindValue(":name", $data['name'], PDO::PARAM_STR);
        $query->bindValue(":address", $data['address'], PDO::PARAM_STR);
        $query->bindValue(":email", $data['email'], PDO::PARAM_STR);
        $query->bindValue(":phone", $data['phone'], PDO::PARAM_STR);
        $query->bindValue(":note", $data['note'], PDO::PARAM_STR);
       // $query->bindValue(":coupon_id",$data['coupon'], PDO::PARAM_INT);
        $query->execute();

        $sql2 = "select LAST_INSERT_ID() as id from `orders`";
        $query = $this->conn->prepare($sql2);
        $query->execute();

        $id_order = $query->fetch()['id'];
        $sql3 = "INSERT INTO `orderdetail`(`product_type_id`, `order_id`, `quantity`, `price`, `attr_value`) VALUES
        ";
        foreach($data['cart'] as $item) {
            $sql3 .= "(".$item['id_product_type'].",$id_order,".$item['quantity'].",".$item['total'].",'".$item['value']."'),";
        }
        $sql3 = rtrim($sql3, ", ");
        $query = $this->conn->prepare($sql3);
        if($query->execute()) {
            return true;
        } else {
            return false;
        }


    }
}