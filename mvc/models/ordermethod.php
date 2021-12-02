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
        $sql = "
            insert into `orders` (`ordermethod_id`,`member_id`,`total`,`fullname`,`address`,`email`,`mobile`,`note`) 
            values (".$data['method'].",".$data['memberid'].",".$data['total'].",".$data['name'].",".$data['address'].",".$data['email'].",".$data['phone'].",".$data['note'].");
        ";
        $query = $this->conn->prepare($sql);
        $query->execute();
        
        $sql = "
        SET @order_id = LAST_INSERT_ID();
        INSERT INTO `orderdetail`(`product_type_id`, `order_id`, `quantity`, `price`, `attr_value`) VALUES";
        foreach($data['cart'] as $item) {
            $sql .= "(".$item['id_product_type'].",@order_id,".$item['quantity'].",".$item['total'].",".$item['value'].")";
        }
        $query = $this->conn->prepare($sql);
        $query->execute();
    }
}